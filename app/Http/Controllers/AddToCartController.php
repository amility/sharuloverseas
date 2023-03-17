<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateAddToCartRequest;
use App\Http\Requests\UpdateAddToCartRequest;
use App\Repositories\AddToCartRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Contracts\Encryption\DecryptException;
use Flash;
use Response;
use Auth;
use DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use App\Models\User;
use App\Models\Customers;
use App\Models\AddToCart;
use App\Models\Products;
use App\Models\Terms;
use App\Models\CustomerAddress;
use App\Models\ShippingModel;
use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\Transaction;
use App\Models\OrderBillingAddress;
use App\Models\OrderShippingAddress;
use App\Models\Country;
use App\Models\State;
use App\Models\City;
use App\Models\PromoModel;
use App\Models\UsedPromo;
use App\Models\PromoProduct;
use Carbon\Carbon;
use Cart;
use Session;
use App\Traits\MailTrait;
ini_set('max_execution_time', 300);

class AddToCartController extends AppBaseController
{
    use MailTrait;
    /** @var  AddToCartRepository */
    private $addToCartRepository;

    public function __construct(AddToCartRepository $addToCartRepo)
    {
        $this->addToCartRepository = $addToCartRepo;
    }

    /**
     * Display a listing of the AddToCart.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
         if(Auth::guard('customer')->user()){
            $customerData = Auth::guard('customer')->user()->toArray();
            $arrObj['addToCarts'] = $this->addToCartRepository->allQuery(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
            )->where('user_id', $customerData['id'])->get()->toArray();

            $arrObj['total_price'] = $this->addToCartRepository->allQuery()->where('user_id', $customerData['id'])->sum('total');
            if($arrObj['addToCarts']==null){
                return view('templates.default.screen.cart_empty');
            }

            // return view('add_to_carts.index')
            return view('templates.default.screen.cart')->with($arrObj);
        }
        if(!empty(Session::get('usercartId')) && !empty(Cart::session(Session::get('usercartId'))->getContent()->toArray())){
            return view('templates.default.screen.guestCart');
        }
        return view('templates.default.screen.cart_empty');
    }

    /**
     * Show the form for creating a new AddToCart.
     *
     * @return Response
     */
    public function create()
    {
        return view('add_to_carts.create');
    }

    /**
     * Store a newly created AddToCart in storage.
     *
     * @param CreateAddToCartRequest $request
     *
     * @return Response
     */
    public function store(CreateAddToCartRequest $request)
    {
        if(Auth::guard('customer')->user()){
            $customerData = Auth::guard('customer')->user()->toArray();
            $input = $request->all();
            $json['product_name'] = $input['product_name'];
            $json['image'] = $input['image'];

            $data['user_id'] = $customerData['id'];
            $data['product_id'] = $input['product_id'];
            $data['price'] = $input['product_price'];
            $data['quantity'] = $input['quantity'];
            $data['total'] = $input['product_price']*$input['quantity'];
            $data['attributes'] = json_encode($json, true);
            $data['created_by'] = $customerData['id'];
            $data['updated_by'] = $customerData['id'];
            $addToCart = $this->addToCartRepository->create($data);

            Flash::success('Add To Cart saved successfully.');
            return redirect(route('addToCarts.index'));
        }else{

            $this->addToGuestCart($request->all());
            
            Flash::success('Add To Cart saved successfully.');
            return redirect(route('addToCarts.index'));
        }
        return view('templates.default.screen.account_login');
    }

    /**
     * Display the specified AddToCart.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $addToCart = $this->addToCartRepository->find($id);

        if (empty($addToCart)) {
            Flash::error('Add To Cart not found');

            return redirect(route('addToCarts.index'));
        }

        return view('add_to_carts.show')->with('addToCart', $addToCart);
    }

    /**
     * Show the form for editing the specified AddToCart.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $addToCart = $this->addToCartRepository->find($id);

        if (empty($addToCart)) {
            Flash::error('Add To Cart not found');

            return redirect(route('addToCarts.index'));
        }

        return view('add_to_carts.edit')->with('addToCart', $addToCart);
    }

    /**
     * Update the specified AddToCart in storage.
     *
     * @param int $id
     * @param UpdateAddToCartRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateAddToCartRequest $request)
    {
       
        if(Auth::guard('customer')->user()){
            $customerData = Auth::guard('customer')->user()->toArray();
            $addToCart = $this->addToCartRepository->find($id);

            if (empty($addToCart)) {
                Flash::error('Add To Cart not found');

                return redirect(route('addToCarts.index'));
            }
            $input =$request->all();
            
            $json['product_name'] = $input['product_name'];
            $json['image'] = $input['image'];

            $data['user_id'] = $customerData['id'];
            $data['product_id'] = $input['product_id'];
            $data['price'] = $input['product_price'];
            $data['quantity'] = $input['quantity'];
            $data['total'] = $input['product_price']*$input['quantity'];
            $data['attributes'] = json_encode($json, true);
            $data['created_by'] = $customerData['id'];
            $data['updated_by'] = $customerData['id'];
            $addToCart = $this->addToCartRepository->update($data, $id);

            Flash::success('Cart updated successfully.');

            return redirect()->back();
        }
        return view('templates.default.screen.account_login');
    }

    /**
     * Remove the specified AddToCart from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        if(Auth::guard('customer')->user()){
            $addToCart = $this->addToCartRepository->find($id);

            if (empty($addToCart)) {
                Flash::error('Add To Cart not found');

                return redirect(route('addToCarts.index'));
            }

            $this->addToCartRepository->delete($id);
            Flash::success('Product removed successfully from cart.');

            return redirect(route('addToCarts.index'));
        }
        return view('templates.default.screen.account_login');
    }

    public function addtoCartJs(CreateAddToCartRequest $request)
    {
        if(Auth::guard('customer')->user()){
            $customerData = Auth::guard('customer')->user()->toArray();
            $input = $request->all();
            $addToCartData = AddToCart::where(['product_id' => $input['product_id'], 'user_id' => $customerData['id']])->first(); 

            $json['product_name'] = $input['product_name'];
            $json['image'] = $input['image'];

            $data['user_id'] = $customerData['id'];
            $data['product_id'] = $input['product_id'];
            $data['price'] = $input['product_price'];
            $data['quantity'] = $input['quantity'];
            $data['total'] = $input['product_price']*$input['quantity'];
            $data['attributes'] = json_encode($json, true);
            $data['created_by'] = $customerData['id'];
            $data['updated_by'] = $customerData['id'];
            if($addToCartData != null){
                $addToCart = $this->addToCartRepository->update($data, $addToCartData['id']);
            }else{                
                $addToCart = $this->addToCartRepository->create($data);            
            }

            if($addToCart){
                echo "success";
            }
        }else{
           return $this->addToGuestCart($request->all());
            //echo 'login';    
        }
        
    }

    public function UpdateCart(Request $request){
        if(Auth::guard('customer')->user()){
            $customerData = Auth::guard('customer')->user()->toArray();
            if($request->cart){
                foreach($request->cart as $product){
                    $update = AddToCart::where(['id' => $product['id'], 'product_id' => $product['product_id'], 'user_id' => $customerData['id']])->update(['quantity' => $product['quantity'], 'total' => $product['total']]);
                }
                Flash::success('Cart updated successfully.');
            }
            return redirect(route('addToCarts.index'));
        }
        if(!empty(Session::get('usercartId'))){
            $userId=Session::get('usercartId');
                if($request->cart){
                foreach($request->cart as $product){
                    $update =Cart::session($userId)->update($product['product_id'], array(
                          'quantity' => array(
                                                'relative' => false,
                                                'value' => $product['quantity']
                                              ), 
                        ));
                }
                Flash::success('Cart updated successfully.');
                }             
                
            return redirect(route('addToCarts.index'));
        }
        return view('templates.default.screen.account_login');
    }

    public function removeCartJs(CreateAddToCartRequest $request)
    {
        if(Auth::guard('customer')->user()){
            $addToCart = $this->addToCartRepository->find($request->id);

            if (empty($addToCart)) {
                Flash::error('Product not found');

                echo "empty";
            }
           $delete = $this->addToCartRepository->delete($request->id);
            if($delete){
                echo "success";
            }
        }else{
            return $this->removeGuestCart($request->id);  
        }        
    }

    public function addToGuestCart($input)
    {   
        if(empty(Session::get('usercartId')))
        {
            Session::put('usercartId',rand ( 10 , 99 ));
        }
        $userId  =  Session::get('usercartId');

        $product = Products::where('id',$input['product_id'])->first();
            $json['product_name'] = $input['product_name'];
            $json['image'] = $input['image'];

            $data['id'] = $input['product_id'];
            $data['name'] = $input['product_name'];
            $data['user_id'] = $userId;
            $data['product_id'] = $input['product_id'];
            $data['price'] = $input['product_price'];
            $data['quantity'] = $input['quantity'];
            $data['total'] = $input['product_price']*$input['quantity'];
            $data['attributes'] = json_encode($json, true);
        $cart= \Cart::session($userId)->add($data);
        
        $this->return['status']    = 'true';
        $this->return['cartCount'] = count(Cart::getContent());
        $this->return['message'] = 'Product added to cart successfully!';
        return response()->json($this->return);
    }

    public function removeGuestCart($input)
    {
      $userId=Session::get('usercartId');
        Cart::session($userId)->remove($input);
        return 'success';
    }

    public function userCheckout(Request $request)
    {   
        if(Auth::guard('customer')->user()){
            $customerData = Auth::guard('customer')->user()->toArray();
            $arrObj['cartProducts'] = $this->addToCartRepository->allQuery(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
            )->where('user_id', $customerData['id'])->get()->toArray();
            if(count($arrObj['cartProducts'])>0){
                //$arrObj['total_price'] = $this->addToCartRepository->allQuery()->where('user_id', $customerData['id'])->sum('total');
                $arrObj['billingAddress'] = CustomerAddress::where(['customer_id'=> $customerData['id'], 'is_primary'=>'1'])->first();
                $arrObj['shippingAddresses'] = CustomerAddress::where('customer_id', $customerData['id'])->get()->toArray();

                $arrObj['terms'] = Terms::where('is_active','1')->first();
                return view('templates.default.screen.checkout')->with($arrObj);
            }
            return abort(404);
        }
        return abort(404);
    }

    public function guestUserCheckout(Request $request)
    {   
        if(empty(Cart::session(Session::get('usercartId'))->getContent()->toArray())){
            return view('templates.default.screen.cart_empty');
        }
        $data['terms'] = Terms::where('is_active','1')->first();
        $data['country'] = Country::where('name', 'United States')->get(['id', 'code', 'name', 'phonecode'])->toArray();

        // for kuwait country
        $data['states'] = State::where('country_id', $data['country'][0]['id'])->get(['id','name'])->toArray();
        
       
        $data['cities'] = City::where('state_id', $data['states'][0]['id'])->get(['name'])->toArray();
        $states = array_merge($data['states'], $data['cities']);
        $data['kuwait_cities'] = array_map("unserialize", array_unique(array_map("serialize", $states)));
        return view('templates.default.screen.guest_checkout')->with($data);
    }

    public function customerOrders(Request $request)
    {
    try{
        if(Auth::guard('customer')->user()){
            $customerData = Auth::guard('customer')->user()->toArray();
            $amountData = $this->getLoggedInUserAddtocartPrice($customerData);
            
            $input = $request->all();
            $request->validate([
                'checkbox' =>'accepted',
                'shippingAddress_id' => 'required',
                'checkout_payment_method' => 'required',
            ]);

            // Create order
            DB::beginTransaction();
            if(count($amountData['cartProductsDetails'])>0){
                $order['total_price'] = round($amountData['grandTotal']);
                $promo = false;
                if(isset($input['promo_code']) && $input['promo_code'] != ''){
                  $promoData = $this->getPromoCodeAmount($input['promo_code']);
                  $tot = 0;
                  foreach($amountData['cartProductsDetails'] as $product){
                      $p_weight_id = Products::where('id',$product['product_id'])->first('weight_id');
                      if($p_weight_id['weight_id'] != null)
                      {
                          $sp_weight_price = ShippingModel::where('id',$p_weight_id['weight_id'])->first('price');
                          $tot += $sp_weight_price['price']*$product['quantity'];
                      }

                  } 
                  if(!empty($promoData)){
                    $promo = true;
                    $order['discount_price'] = $promoData['discount'];
                    $order['discount_type'] = $promoData['discount_type'];
                    $order['promo_id'] = $promoData['promo_id'];
                    $order['promo_price'] = $promoData['promo_price'];
                    $order['total_price'] = round($promoData['grandTotal']+$tot);
                  }
                }
                else{
                        // LBW Shipping Calculation
                        $tot = 0;
                        foreach($amountData['cartProductsDetails'] as $product){
                            $p_weight_id = Products::where('id',$product['product_id'])->first('weight_id');
                            if($p_weight_id['weight_id'] != null)
                            {
                                $sp_weight_price = ShippingModel::where('id',$p_weight_id['weight_id'])->first('price');
                                $tot += $sp_weight_price['price']*$product['quantity'];
                            }

                        } 
                           $order['total_price'] = round($amountData['grandTotal']+$tot);
                }
               
                // LBW Shipping Calculation
                $order['order_type'] = 'family';
                $order['order_no'] = $customerData['id'].rand(1000000000, 9999999999);
                $order['customer_id'] = $customerData['id'];
                $order['terms_condition_id'] = $input['terms_condition_id'];
                // LBW Shipping Calculation
                    if($tot > 0)
                    {
                        $order['shipping_price'] = $tot;                
                    }
                    else
                    {
                        $order['shipping_price'] = $amountData['shipping_price'];                
                    }
                // LBW Shipping Calculation
                $order['order_date'] = date('Y-m-d H:m:s');
                $order['order_notes'] = $input['order_notes'];
                $order['shipping_address_id'] = $input['shippingAddress_id'];
                $order['preferred_time'] = $input['preferred_time'];
                $orderData = Order::create($order);
                //Add Billing address
                $billAddrr = CustomerAddress::where(['customer_id' => $customerData['id'], 'is_primary' => '1'])->first()->toArray();
                $shippingAddress = CustomerAddress::where(['id' => $input['shippingAddress_id']])->first()->toArray();
                $billAddrr['order_id'] = $orderData->id;
                unset($billAddrr['id']);
                unset($billAddrr['is_primary']);
                unset($billAddrr['created_at']);
                unset($billAddrr['updated_at']);
                unset($billAddrr['deleted_at']);
                //dd($billAddrr);
                $customerbillAddress = OrderBillingAddress::create($billAddrr); 

                // Add shipping address
                $shippingAddress['order_id'] = $orderData->id;
                unset($shippingAddress['id']);
                unset($shippingAddress['is_primary']);
                unset($shippingAddress['created_at']);
                unset($shippingAddress['updated_at']);
                unset($shippingAddress['deleted_at']);
                $customershippingAddress = OrderShippingAddress::create($shippingAddress);
                // Create order Details
                foreach($amountData['cartProductsDetails'] as $product){
                    $productData = Products::where('id', $product['product_id'])->first();
                    $orderDetails['order_id'] = $orderData->id;
                    $orderDetails['product_id'] = $productData['id'];
                    $orderDetails['product_price'] = $productData['prod_price'];
                    $orderDetails['quantity'] = $product['quantity'];
                    $orderDetails['total'] = $productData['prod_price']*$product['quantity'];
                    $OrderDetailData = OrderDetail::create($orderDetails);
                    stockDecrement($product, $productData);
                }
                AddToCart::where('user_id', $customerData['id'])->delete();
                $data = $this->transaction($customerData['id'], $orderData, $input['checkout_payment_method']);
                if($promo == true){
                    $this->addUsedPromo($customerData['id'], $promoData['promo_id'], $orderData->id);
                    addPromoUser($promoData['promo_id']);
                }
                $parameter= Crypt::encrypt($orderData->id);
                $getadmin = User::where('email', 'like', '%admin%')->first();
                $orderDetailForMail = $this->getOrderDetails($parameter);            
                $this->orderMailToAdmin($orderDetailForMail, $getadmin);
                $this->orderMailToCustomer($orderDetailForMail, $customerData);
                DB::commit();
                return view('templates.default.screen.order_success')->with($orderDetailForMail);
                // return redirect()->route('order-success', [$parameter]);
            }
            return abort(404);
        }
            return abort(404);
        }catch(Throwable $e){
            DB::rollBack();
            dd($e);
        }
        
    }

    public function getLoggedInUserAddtocartPrice($customerData){
        $return['cartProductsDetails'] = $cartProducts = AddToCart::where('user_id', $customerData['id'])->get()->toArray();
        $sum = 0;
        foreach($cartProducts as $product){                    
            $productData = Products::where('id', $product['product_id'])->first();   
            $sum+= $productData['prod_price']*$product['quantity'];
        }        
        
        $total = $sum;
        $seasionalShipping = ShippingModel::where('shipping_method','1')->whereDate('start_date','<=',date('Y-m-d'))->whereDate('end_date','>=',date('Y-m-d'))->first();
        $priceShipping = ShippingModel::where('shipping_method','2')->get()->toArray();
        //dd($priceShipping);
        $price_shipping_charge = 0;
        if(count($priceShipping)>0){
            $minAmount = [];
            $maxAmount = [];
            $sh_charge = [];
            foreach($priceShipping as $key => $value){
             array_push($minAmount, $value['min_value']);
             array_push($maxAmount, $value['max_value']);
             array_push($sh_charge, $value['price']);
            }
            for($i=0; $i < count($minAmount); $i++){
                if($i==0){
                if($total >= $minAmount[$i] && $total <= $maxAmount[$i]){
                    $price_shipping_charge = $sh_charge[$i];  
                }
                }
                if($i>0){
                if($total > $maxAmount[$i-1] && $total <= $maxAmount[$i]){
                    $price_shipping_charge = $sh_charge[$i];
                }
                }
            }
        }else{
            $price_shipping_charge = 0;
        }
        //dd($price_shipping_charge);
        if($seasionalShipping != null){
            $return['grandTotal'] = $total+$seasionalShipping['price'];
            $return['shipping_price'] = $seasionalShipping['price'];
        }else{
            if($price_shipping_charge>=0){
                $return['grandTotal'] = $total+$price_shipping_charge;
                $return['shipping_price'] = $price_shipping_charge;
            }
        }

        return $return;
    }

    public function getGuestAddtocartPrice(){
        if(!empty(Session::get('usercartId'))){
        $total = Cart::session(Session::get('usercartId'))->session(Session::get('usercartId'))->getSubTotal();
        $return['cartProductsDetails'] = Cart::session(Session::get('usercartId'))->getContent()->toArray();
        }else{ 
            $total = 0;
        }
       // dd($total);
        $seasionalShipping = ShippingModel::where('shipping_method','1')->whereDate('start_date','<=',date('Y-m-d'))->whereDate('end_date','>=',date('Y-m-d'))->first();
        $priceShipping = ShippingModel::where('shipping_method','2')->get()->toArray();
        //dd($priceShipping);
        $price_shipping_charge = 0;
        if(count($priceShipping)>0){
            $minAmount = [];
            $maxAmount = [];
            $sh_charge = [];
            foreach($priceShipping as $key => $value){
             array_push($minAmount, $value['min_value']);
             array_push($maxAmount, $value['max_value']);
             array_push($sh_charge, $value['price']);
            }
            for($i=0; $i < count($minAmount); $i++){
                if($i==0){
                if($total >= $minAmount[$i] && $total <= $maxAmount[$i]){
                    $price_shipping_charge = $sh_charge[$i];  
                }
                }
                if($i>0){
                if($total > $maxAmount[$i-1] && $total <= $maxAmount[$i]){
                    $price_shipping_charge = $sh_charge[$i];
                }
                }
            }
        }else{
            $price_shipping_charge = 0;
        }
        //dd($price_shipping_charge);
        if($seasionalShipping != null){
            $return['grandTotal'] = $total+$seasionalShipping['price'];
            $return['shipping_price'] = $seasionalShipping['price'];
        }else{
            if($price_shipping_charge>=0){
                $return['grandTotal'] = $total+$price_shipping_charge;
                $return['shipping_price'] = $price_shipping_charge;
            }
        }

        return $return;
    }

    public function guestOrder(Request $request){
    try{
        if(empty(Cart::session(Session::get('usercartId'))->getContent()->toArray())){
            return view('templates.default.screen.cart_empty');
        }

        $amountData = $this->getGuestAddtocartPrice();
        $input = $request->all();
        $request->validate([
            'billing_address.first_name' => 'required',
            // 'billing_address.last_name' => 'required',
            //'billing_address.email_address' => 'required|email|unique:customers,email',
            'billing_address.email_address' => 'required|email',
            'billing_address.town_city' => 'required|max:125',
            // 'billing_address.state_country' => 'required|max:125',
            'billing_address.country' => 'required|max:125',
            // 'billing_address.postcode_zip' => 'required|integer|regex:/\b\d{6}\b/',
            'billing_address.phone' => 'required',
            // 'billing_address.street_address' => 'required|max:500',
            'billing_address.block' => 'required|max:500',
            // 'billing_address.house_building' => 'required|max:500',
            'checkbox' =>'accepted',
            'checkout_payment_method' => 'required',
        ]);

        if(isset($input['shipping_address_check'])){
            $request->validate([
            'shipping_address.first_name' => 'required',
            // 'shipping_address.last_name' => 'required',
            'shipping_address.email_address' => 'required|email',
            'shipping_address.town_city' => 'required|max:125',
            // 'shipping_address.state_country' => 'required|max:125',
            'shipping_address.country' => 'required|max:125',
            // 'shipping_address.postcode_zip' => 'required|integer|regex:/\b\d{6}\b/',
            'shipping_address.phone' => 'required',
            // 'shipping_address.street_address' => 'required|max:500',
            'shipping_address.block' => 'required|max:500',
            // 'shipping_address.house_building' => 'required|max:500',
        ]);
        }
        // Create customer
        if($input['checkout_payment_method']){
            $customer['email'] = $input['billing_address']['email_address'];
             DB::beginTransaction();
            $checkCustomer = $guest = Customers::where('email', $input['billing_address']['email_address'])->first();
            if(($checkCustomer != null && $checkCustomer['status'] == '0') || $checkCustomer == null || isset($input['create_account'])){
                $customer['name'] = $input['billing_address']['first_name']." ".$input['billing_address']['last_name'];
                $customer['email'] = $input['billing_address']['email_address'];
                $customer['password'] = Hash::make($input['billing_address']['last_name'].".".$input['billing_address']['first_name']).'@12345';
                $customer['phone'] = $input['billing_address']['phone'];
                $customer['customer_type'] = 'guest';
                $guest = Customers::updateOrCreate(['email' => $input['billing_address']['email_address']], $customer);

                if(isset($input['create_account'])){
                    $getadmin = User::where('email', 'like', '%admin%')->first();
                    $this->createAccountMail($customer);
                    $this->createAccountMailToAdmin($customer, $getadmin);
                }
            }

            // Create default address
            $dAddress = $input['billing_address'];
            $dAddress['customer_id'] = $guest->id;
            $dAddress['is_primary'] = '1';
            $billAddress = CustomerAddress::updateOrCreate(['email_address' => $input['billing_address']['email_address']], $dAddress); 

            // Create other address
            if(isset($input['shipping_address_check'])){
                $oAddress = $input['shipping_address'];
                $oAddress['customer_id'] = $guest->id;
                $oAddress['is_primary'] = '0';
                $otherAddress = CustomerAddress::updateOrCreate(['email_address' => $input['shipping_address']['email_address']], $oAddress); 
            }

        // Create order
        $order['total_price'] = round($amountData['grandTotal']);
        $promo = false;
        if(isset($input['promo_code']) && $input['promo_code'] != ''){
          $promoData = $this->getPromoCodeAmountForGuest($input['promo_code'], $input['billing_address']['email_address']);
             // LBW Shipping Calculation
             $tot = 0;
             if(!empty(Session::get('usercartId'))){
             foreach(Cart::session(Session::get('usercartId'))->getContent()->toArray() as $product){
                 $p_weight_id = Products::where('id',$product['id'])->first('weight_id');
                 if($p_weight_id['weight_id'] != null)
                 {
                     $sp_weight_price = ShippingModel::where('id',$p_weight_id['weight_id'])->first('price');
                     $tot += $sp_weight_price['price']*$product['quantity'];
                 }
                
             }
             }
 
         // LBW Shipping Calculation
          if(!empty($promoData)){
            $promo = true;
            $order['discount_price'] = $promoData['discount'];
            $order['discount_type'] = $promoData['discount_type'];
            $order['promo_id'] = $promoData['promo_id'];
            $order['promo_price'] = $promoData['promo_price'];
            $order['total_price'] = round($promoData['grandTotal']+$tot);
          }
        }
        else
        {
             // LBW Shipping Calculation
             $tot = 0;
             if(!empty(Session::get('usercartId'))){
             foreach(Cart::session(Session::get('usercartId'))->getContent()->toArray() as $product){
                 $p_weight_id = Products::where('id',$product['id'])->first('weight_id');
                 if($p_weight_id['weight_id'] != null)
                 {
                     $sp_weight_price = ShippingModel::where('id',$p_weight_id['weight_id'])->first('price');
                     $tot += $sp_weight_price['price']*$product['quantity'];
                 }
                
             }
             }
             $order['total_price'] = round($amountData['grandTotal']+$tot);
 
         // LBW Shipping Calculation
        }
        $order['order_type'] = 'guest';
        $order['order_no'] = $guest->id.rand(1000000000, 9999999999);
        $order['customer_id'] = $guest->id;
        $order['terms_condition_id'] = $input['terms_condition_id'];
        // LBW Shipping Calculation
            if($tot > 0)
            {
                $order['shipping_price'] = $tot;        

            }
            else
            {
                $order['shipping_price'] = $amountData['shipping_price'];        
            }
        // LBW Shipping Calculation
        $order['order_date'] = date('Y-m-d H:m:s');
        $order['order_notes'] = $input['order_notes'];
        $order['shipping_address_id'] = null;
        $order['preferred_time'] = $input['preferred_time'];
        $orderData = Order::create($order);

        // Create order Details
        if(!empty(Session::get('usercartId'))){
        foreach(Cart::session(Session::get('usercartId'))->getContent()->toArray() as $product){
            $productData = Products::where('id', $product['id'])->first();
            $orderDetails['order_id'] = $orderData->id;
            $orderDetails['product_id'] = $productData['id'];
            $orderDetails['product_price'] = $productData['prod_price'];
            $orderDetails['quantity'] = $product['quantity'];
            $orderDetails['total'] = $productData['prod_price']*$product['quantity'];
            $OrderDetailData = OrderDetail::create($orderDetails);
            stockDecrement($product, $productData);
        }
        }
        $userId = Session::get('usercartId');
        Cart::session($userId)->clear();
        //Add Billing address
        $billAddrr = $input['billing_address'];
        $billAddrr['customer_id'] = $guest->id;
        $billAddrr['order_id'] = $orderData->id;
        $customerbillAddress = OrderBillingAddress::create($billAddrr); 

        // Add shipping address
        if(isset($input['shipping_address_check'])){
            $shippingAddress = $input['shipping_address'];
        }else{
            $shippingAddress = $input['billing_address'];
        }
            $shippingAddress['customer_id'] = $guest->id;
            $shippingAddress['order_id'] = $orderData->id;
            $customershippingAddress = OrderShippingAddress::create($shippingAddress); 

        // Create transaction
            $data = $this->transaction($guest->id, $orderData, $input['checkout_payment_method']);
            if($promo == true){
                $this->addUsedPromo($guest->id, $promoData['promo_id'], $orderData->id);
                addPromoUser($promoData['promo_id']);
            }
            $getadmin = User::where('email', 'like', '%admin%')->first();
            $parameter= Crypt::encrypt($orderData->id);
            $orderDetailForMail = $this->getOrderDetails($parameter);            
            // dd($orderDetailForMail);
            $this->orderMailToAdmin($orderDetailForMail, $getadmin);
            $this->orderMailToCustomer($orderDetailForMail, $customer);
            DB::commit();
            return view('templates.default.screen.order_success')->with($orderDetailForMail);
            // return redirect()->route('order-success', [$parameter]);
        }
    }catch(Throwable $e) {
        DB::rollBack();
        dd($e);
    }
    }

    public function transaction($user_id, $orderData, $payMethod){
        $transaction_no = $user_id.time().uniqid();
        $amountData = $this->getGuestAddtocartPrice();
        $transactionData['customer_id'] = $user_id;
        $transactionData['transaction_no'] = $transaction_no;
        $transactionData['order_id'] = $orderData->id;
        $transactionData['order_no'] = $orderData->order_no;
        $transactionData['amount'] = round($amountData['grandTotal']);
        $transactionData['payment_method'] = $payMethod;
        $transactionData['transaction_date'] = date('Y-m-d H:m:s');
        $transactionData['order_date'] = $orderData->order_date;

        return $transactionDetails = Transaction::create($transactionData);
    }

    public function orderSuccess($order_id){
    
            $orderDetail = $this->getOrderDetails($order_id); 
            return view('templates.default.screen.order_success')->with($orderDetail);
    }

    public function getOrderDetails($order_id){
        try {
            $order_id = Crypt::decrypt($order_id);
            $orderDetail['order'] = $orders = Order::where('id', $order_id)->first()->toArray();
            $orderDetail['orderDetails'] = OrderDetail::where('order_id', $order_id)->get()->toArray();
            $orderDetail['transaction'] = Transaction::where('order_id', $order_id)->first();
            
            $orderDetail['shippingDetail'] = OrderShippingAddress::where('order_id', $order_id)->first();
            $orderDetail['billingDetail'] = OrderBillingAddress::where('order_id', $order_id)->first();
            return $orderDetail;
            } catch (DecryptException $e) {
                abort(404);
            }
    }

    public function applyPromoCode(Request $request){
        if(Auth::guard('customer')->user()){
            $input = $request->all();
            $customerData = Auth::guard('customer')->user()->toArray();
            $amountData = $this->getLoggedInUserAddtocartPrice($customerData);
            $getPromoData = PromoModel::where(['promo_code'=>$input['code'], 'status' => '1'])->first();
            if($getPromoData == null){
                $this->return['status']    = 'expire';
                $this->return['data'] = number_format(round($amountData['grandTotal']), 2, '.', ',');
                $this->return['message'] = 'Sorry, this promo code is not valid.';
                return response()->json($this->return);
            }
            $promoProduct = PromoProduct::where('promo_id', $getPromoData['id'])->pluck('product_id')->toArray();
            
            $checkout_product_id = [];
            foreach($amountData['cartProductsDetails'] as $productId){
                if(in_array($productId['product_id'], $promoProduct)){
                    array_push($checkout_product_id, $productId['product_id']);
                }
            }
            //LBS
            $tot = 0;
            foreach($amountData['cartProductsDetails'] as $productId){
                $p_weight_id = Products::where('id',$productId['product_id'])->first('weight_id');
                if($p_weight_id['weight_id'] != null)
                {
                    
                    $sp_weight_price = ShippingModel::where('id',$p_weight_id['weight_id'])->first('price');
                    $tot += $sp_weight_price['price']*$productId['quantity'];
                }  
            }
            
            //LBS
            if(!empty($promoProduct) && empty($checkout_product_id)){
                $this->return['status']    = 'expire';
                $this->return['data'] = number_format(round($amountData['grandTotal']), 2, '.', ',');
                $this->return['message'] = 'Sorry, this promo code is not valid for these products.';
                return response()->json($this->return);
            }
            if(!empty($checkout_product_id)){
                $sum = 0;
                foreach($amountData['cartProductsDetails'] as $cartData){
                    if(in_array($cartData['product_id'], $checkout_product_id)){
                        $sum += $cartData['price']*$cartData['quantity'];
                    }
                }
            }
            if($getPromoData['max_user'] > $getPromoData['used_count']){
                $getUsedPromo = UsedPromo::where(['customer_id' => $customerData['id'], 'promo_id' => $getPromoData['id']])->first();
                if($getUsedPromo == null){
                    
                    $subtotal_price = $amountData['grandTotal']-$amountData['shipping_price'];
                    if($getPromoData['promo_type'] == 'price' && $subtotal_price >= $getPromoData['min_amount'] && empty($checkout_product_id)){
                        $data['discounts'] = $getPromoData['promo_price'];
                        $data['discount'] = number_format($data['discounts'], 2, '.', ',');
                       return $data['grandTotal'] = number_format(round(($amountData['grandTotal']+$tot)-$data['discounts']), 2, '.', ',');
                        $this->return['status']    = 'success';
                        $this->return['data'] = $data;
                        $this->return['message'] = 'Promo code applied successfully.';
                    }else if($getPromoData['promo_type'] == 'percentage' && $subtotal_price >= $getPromoData['min_amount'] && empty($checkout_product_id)){
                            $data['discounts'] = ($getPromoData['promo_price']/100)*$subtotal_price;
                            if($data['discounts']>$getPromoData['upto_amount']){
                                $data['discounts'] = $getPromoData['upto_amount'];
                            }
                            $data['discount'] = number_format($data['discounts'], 2, '.', ',');
                            $data['grandTotal'] = number_format(round(($amountData['grandTotal']+$tot)-$data['discounts']), 2, '.', ',');
                            $this->return['status']    = 'success';
                            $this->return['data'] = $data;
                            $this->return['message'] = 'Promo code applied successfully.';
                    }else if($getPromoData['promo_type'] == 'price' && $subtotal_price >= $getPromoData['min_amount'] && !empty($checkout_product_id)){
                            $data['discounts'] = ($getPromoData['promo_price']/100)*$sum;
                            if($data['discounts']>$getPromoData['upto_amount']){
                                $data['discounts'] = $getPromoData['upto_amount'];
                            }
                            $data['discount'] = number_format($data['discounts'], 2, '.', ',');
                            $data['grandTotal'] = number_format(round(($amountData['grandTotal']+$tot)-$data['discounts']), 2, '.', ',');
                            $this->return['status']    = 'success';
                            $this->return['data'] = $data;
                            $this->return['message'] = 'Promo code applied successfully.';
                    }else if($getPromoData['promo_type'] == 'percentage' && $subtotal_price >= $getPromoData['min_amount'] && !empty($checkout_product_id)){
                            $data['discounts'] = ($getPromoData['promo_price']/100)*$sum;
                            if($data['discounts']>$getPromoData['upto_amount']){
                                $data['discounts'] = $getPromoData['upto_amount'];
                            }
                            $data['discount'] = number_format($data['discounts'], 2, '.', ',');
                            $data['grandTotal'] = number_format(round(($amountData['grandTotal']+$tot)-$data['discounts']), 2, '.', ',');
                            $this->return['status']    = 'success';
                            $this->return['data'] = $data;
                            $this->return['message'] = 'Promo code applied successfully.';
                    }else if($getPromoData['promo_type'] == 'price' && $subtotal_price < $getPromoData['min_amount']){
                            $this->return['status']    = 'amount_alert';
                            $this->return['data'] = number_format(round($amountData['grandTotal']), 2, '.', ',');
                            $this->return['message'] = 'Minimum amount should be '.$getPromoData['min_amount'].'.';
                    }else if($getPromoData['promo_type'] == 'percentage' && $subtotal_price < $getPromoData['min_amount']){
                            $this->return['status']    = 'amount_alert';
                            $this->return['data'] = number_format(round($amountData['grandTotal']), 2, '.', ',');
                            $this->return['message'] = 'Minimum amount should be '.$getPromoData['min_amount'].'.';
                    }
                    
                }else{
                    $this->return['status']    = 'used';
                    $this->return['data'] = number_format(round($amountData['grandTotal']), 2, '.', ',');
                    $this->return['message'] = 'You have already used.';
                }

            }else{
                $this->return['status']    = 'expire';
                $this->return['data'] = number_format(round($amountData['grandTotal']), 2, '.', ',');
                $this->return['message'] = 'Sorry, this promo code is not valid.';
            }
            
            return response()->json($this->return);
        }else{
            return $this->applyPromoCodeForGuest($request->all());
        }
        return view('templates.default.screen.account_login');
    }

    public function getPromoCodeAmount($code){
        if(Auth::guard('customer')->user()){
            $customerData = Auth::guard('customer')->user()->toArray();
            $amountData = $this->getLoggedInUserAddtocartPrice($customerData);
            $getPromoData = PromoModel::where(['promo_code'=>$code, 'status' => '1'])->first();
            if($getPromoData == null){
                $data = [];
                return $data;
            }
            $promoProduct = PromoProduct::where('promo_id', $getPromoData['id'])->pluck('product_id')->toArray();
            
            $checkout_product_id = [];
            foreach($amountData['cartProductsDetails'] as $productId){
                if(in_array($productId['product_id'], $promoProduct)){
                    array_push($checkout_product_id, $productId['product_id']);
                }
            }
            if(!empty($promoProduct) && empty($checkout_product_id)){
                $data = [];
                return $data;
            }
            if(!empty($checkout_product_id)){
                $sum = 0;
                foreach($amountData['cartProductsDetails'] as $cartData){
                    if(in_array($cartData['product_id'], $checkout_product_id)){
                        $sum += $cartData['price']*$cartData['quantity'];
                    }
                }
            }
            if($getPromoData['max_user'] > $getPromoData['used_count']){
                $getUsedPromo = UsedPromo::where(['customer_id' => $customerData['id'], 'promo_id' => $getPromoData['id']])->first();
                if($getUsedPromo == null){
                    
                    $subtotal_price = $amountData['grandTotal']-$amountData['shipping_price'];
                    if($getPromoData['promo_type'] == 'price' && $subtotal_price >= $getPromoData['min_amount'] && empty($checkout_product_id)){
                        $data['discount'] = $getPromoData['promo_price'];
                        $data['grandTotal'] =$amountData['grandTotal']-$data['discount'];
                        $data['discount_type'] = $getPromoData['promo_type'];
                        $data['promo_id'] = $getPromoData['id'];
                        $data['promo_price'] = $getPromoData['promo_price'];
                    }else if($getPromoData['promo_type'] == 'percentage' && $subtotal_price >= $getPromoData['min_amount']  && empty($checkout_product_id)){
                            $data['discount'] = ($getPromoData['promo_price']/100)*$subtotal_price;
                            if($data['discount']>$getPromoData['upto_amount']){
                                $data['discount'] = $getPromoData['upto_amount'];
                            }
                            $data['grandTotal'] =$amountData['grandTotal']-$data['discount'];
                            $data['discount_type'] = $getPromoData['promo_type'];
                            $data['promo_id'] = $getPromoData['id'];
                            $data['promo_price'] = $getPromoData['promo_price'];
                    }else if($getPromoData['promo_type'] == 'price' && $subtotal_price >= $getPromoData['min_amount']  && !empty($checkout_product_id)){
                            $data['discount'] = ($getPromoData['promo_price']/100)*$sum;
                            if($data['discount']>$getPromoData['upto_amount']){
                                $data['discount'] = $getPromoData['upto_amount'];
                            }
                            $data['grandTotal'] =$amountData['grandTotal']-$data['discount'];
                            $data['discount_type'] = $getPromoData['promo_type'];
                            $data['promo_id'] = $getPromoData['id'];
                            $data['promo_price'] = $getPromoData['promo_price'];
                    }else if($getPromoData['promo_type'] == 'percentage' && $subtotal_price >= $getPromoData['min_amount']  && !empty($checkout_product_id)){
                            $data['discount'] = ($getPromoData['promo_price']/100)*$sum;
                            if($data['discount']>$getPromoData['upto_amount']){
                                $data['discount'] = $getPromoData['upto_amount'];
                            }
                            $data['grandTotal'] =$amountData['grandTotal']-$data['discount'];
                            $data['discount_type'] = $getPromoData['promo_type'];
                            $data['promo_id'] = $getPromoData['id'];
                            $data['promo_price'] = $getPromoData['promo_price'];
                    }else if($getPromoData['promo_type'] == 'price' && $subtotal_price < $getPromoData['min_amount']){
                           $data = [];
                    }else if($getPromoData['promo_type'] == 'percentage' && $subtotal_price < $getPromoData['min_amount']){
                           $data = [];
                    }
                   
                }else{
                    $data = [];
                }

            }else{
                $data = [];
            }
            
            return $data;
        }
        return view('templates.default.screen.account_login');
    }

    public function addUsedPromo($user_id, $promo_id, $order_id){
        UsedPromo::insert(['customer_id' => $user_id, 'promo_id' => $promo_id, 'order_id' => $order_id]);
    }

    public function applyPromoCodeForGuest($input){
        $amountData = $this->getGuestAddtocartPrice();
        $getPromoData = PromoModel::where(['promo_code'=>$input['code'], 'status' => '1'])->first();
        if($getPromoData == null){
            $this->return['status']    = 'expire';
            $this->return['data'] = number_format(round($amountData['grandTotal']), 2, '.', ',');
            $this->return['message'] = 'Sorry, this promo code is not valid.';
            return response()->json($this->return);
        }
        $promoProduct = PromoProduct::where('promo_id', $getPromoData['id'])->pluck('product_id')->toArray();       
        
        $checkout_product_id = [];
        foreach($amountData['cartProductsDetails'] as $productId){
            if(in_array($productId['id'], $promoProduct)){
                array_push($checkout_product_id, $productId['id']);
            }
        }

       
         //LBS
         $tot = 0;
         foreach($amountData['cartProductsDetails'] as $productId){
             $p_weight_id = Products::where('id',$productId['id'])->first('weight_id');
             if($p_weight_id['weight_id'] != null)
             {
                 
                 $sp_weight_price = ShippingModel::where('id',$p_weight_id['weight_id'])->first('price');
                 $tot += $sp_weight_price['price']*$productId['quantity'];
             }  
         }
         
         //LBS

        if(!empty($promoProduct) && empty($checkout_product_id)){
            $this->return['status']    = 'expire';
            $this->return['data'] = number_format(round($amountData['grandTotal']), 2, '.', ',');
            $this->return['message'] = 'Sorry, this promo code is not valid for these products.';
            return response()->json($this->return);
        }
        if(!empty($checkout_product_id)){
            $sum = 0;
            foreach($amountData['cartProductsDetails'] as $cartData){
                if(in_array($cartData['id'], $checkout_product_id)){
                    $sum += $cartData['price']*$cartData['quantity'];
                }
            }
        }
        if($getPromoData['max_user'] > $getPromoData['used_count']){
            $customerData = Customers::where('email', $input['email'])->first();
            if($customerData != null){
                $getUsedPromo = UsedPromo::where(['customer_id' => $customerData['id'], 'promo_id' => $getPromoData['id']])->first();
            }
            if($customerData == null || $getUsedPromo == null){
                $subtotal_price = $amountData['grandTotal']-$amountData['shipping_price'];
                if($getPromoData['promo_type'] == 'price' && $subtotal_price >= $getPromoData['min_amount'] && empty($checkout_product_id)){
                    $data['discounts'] = $getPromoData['promo_price'];
                    $data['discount'] = number_format($data['discounts'], 2, '.', ',');
                    $data['grandTotal'] = number_format(round(($amountData['grandTotal']+$tot)-$data['discounts']), 2, '.', ',');
                    $this->return['status']    = 'success';
                    $this->return['data'] = $data;
                    $this->return['message'] = 'Promo code applied successfully.';
                }else if($getPromoData['promo_type'] == 'percentage' && $subtotal_price >= $getPromoData['min_amount'] && empty($checkout_product_id)){
                        $data['discounts'] = ($getPromoData['promo_price']/100)*$subtotal_price;
                        if($data['discounts']>$getPromoData['upto_amount']){
                            $data['discounts'] = $getPromoData['upto_amount'];
                        }
                        $data['discount'] = number_format($data['discounts'], 2, '.', ',');
                        $data['grandTotal'] = number_format(round(($amountData['grandTotal']+$tot)-$data['discounts']), 2, '.', ',');
                        $this->return['status']    = 'success';
                        $this->return['data'] = $data;
                        $this->return['message'] = 'Promo code applied successfully.';
                }else if($getPromoData['promo_type'] == 'price' && $subtotal_price >= $getPromoData['min_amount'] && !empty($checkout_product_id)){
                        $data['discounts'] = ($getPromoData['promo_price']/100)*$sum;
                        if($data['discounts']>$getPromoData['upto_amount']){
                            $data['discounts'] = $getPromoData['upto_amount'];
                        }
                        $data['discount'] = number_format($data['discounts'], 2, '.', ',');
                        $data['grandTotal'] = number_format(round(($amountData['grandTotal']+$tot)-$data['discounts']), 2, '.', ',');
                        $this->return['status']    = 'success';
                        $this->return['data'] = $data;
                        $this->return['message'] = 'Promo code applied successfully.';
                }else if($getPromoData['promo_type'] == 'percentage' && $subtotal_price >= $getPromoData['min_amount'] && !empty($checkout_product_id)){
                        $data['discounts'] = ($getPromoData['promo_price']/100)*$sum;
                        if($data['discounts']>$getPromoData['upto_amount']){
                            $data['discounts'] = $getPromoData['upto_amount'];
                        }
                        $data['discount'] = number_format($data['discounts'], 2, '.', ',');
                        $data['grandTotal'] = number_format(round(($amountData['grandTotal']+$tot)-$data['discounts']), 2, '.', ',');
                        $this->return['status']    = 'success';
                        $this->return['data'] = $data;
                        $this->return['message'] = 'Promo code applied successfully.';
                }else if($getPromoData['promo_type'] == 'price' && $subtotal_price < $getPromoData['min_amount']){
                        $this->return['status']    = 'amount_alert';
                        $this->return['data'] = number_format(round($amountData['grandTotal']), 2, '.', ',');
                        $this->return['message'] = 'Minimum amount should be '.$getPromoData['min_amount'].'.';
                }else if($getPromoData['promo_type'] == 'percentage' && $subtotal_price < $getPromoData['min_amount']){
                        $this->return['status']    = 'amount_alert';
                        $this->return['data'] = number_format(round($amountData['grandTotal']), 2, '.', ',');
                        $this->return['message'] = 'Minimum amount should be '.$getPromoData['min_amount'].'.';
                }
                
            }else{
                $this->return['status']    = 'used';
                $this->return['data'] = number_format(round($amountData['grandTotal']), 2, '.', ',');
                $this->return['message'] = 'You have already used.';
            }

        }else{
            $this->return['status']    = 'expire';
            $this->return['data'] = number_format(round($amountData['grandTotal']), 2, '.', ',');
            $this->return['message'] = 'Sorry, this promo code is not valid.';
        }
        
        return response()->json($this->return);
    }

    public function getPromoCodeAmountForGuest($code, $email){
        $amountData = $this->getGuestAddtocartPrice();
        $getPromoData = PromoModel::where(['promo_code'=>$code, 'status' => '1'])->first();
        if($getPromoData == null){
            $data = [];
            return $data;
        }
        $promoProduct = PromoProduct::where('promo_id', $getPromoData['id'])->pluck('product_id')->toArray();            

        $checkout_product_id = [];
        foreach($amountData['cartProductsDetails'] as $productId){
            if(in_array($productId['id'], $promoProduct)){
                array_push($checkout_product_id, $productId['id']);
            }
        }
        if(!empty($promoProduct) && empty($checkout_product_id)){
            $data = [];
            return $data;
        }
        if(!empty($checkout_product_id)){
            $sum = 0;
            foreach($amountData['cartProductsDetails'] as $cartData){
                if(in_array($cartData['id'], $checkout_product_id)){
                    $sum += $cartData['price']*$cartData['quantity'];
                }
            }
        }
        if($getPromoData['max_user'] > $getPromoData['used_count']){
            $customerData = Customers::where('email', $email)->first();
            if($customerData != null){
                $getUsedPromo = UsedPromo::where(['customer_id' => $customerData['id'], 'promo_id' => $getPromoData['id']])->first();
            }
            if($customerData == null || $getUsedPromo == null){
                $subtotal_price = $amountData['grandTotal']-$amountData['shipping_price'];
                if($getPromoData['promo_type'] == 'price' && $subtotal_price >= $getPromoData['min_amount'] && empty($checkout_product_id)){
                    $data['discount'] = $getPromoData['promo_price'];
                    $data['grandTotal'] =$amountData['grandTotal']-$data['discount'];
                    $data['discount_type'] = $getPromoData['promo_type'];
                    $data['promo_id'] = $getPromoData['id'];
                    $data['promo_price'] = $getPromoData['promo_price'];
                    
                }else if($getPromoData['promo_type'] == 'percentage' && $subtotal_price >= $getPromoData['min_amount'] && empty($checkout_product_id)){
                        $data['discount'] = ($getPromoData['promo_price']/100)*$subtotal_price;
                        if($data['discount']>$getPromoData['upto_amount']){
                            $data['discount'] = $getPromoData['upto_amount'];
                        }
                        $data['grandTotal'] =$amountData['grandTotal']-$data['discount'];
                        $data['discount_type'] = $getPromoData['promo_type'];
                        $data['promo_id'] = $getPromoData['id'];
                        $data['promo_price'] = $getPromoData['promo_price'];
                        
                }else if($getPromoData['promo_type'] == 'price' && $subtotal_price >= $getPromoData['min_amount'] && !empty($checkout_product_id)){
                        $data['discount'] = ($getPromoData['promo_price']/100)*$sum;
                        if($data['discount']>$getPromoData['upto_amount']){
                            $data['discount'] = $getPromoData['upto_amount'];
                        }
                        $data['grandTotal'] =$amountData['grandTotal']-$data['discount'];
                        $data['discount_type'] = $getPromoData['promo_type'];
                        $data['promo_id'] = $getPromoData['id'];
                        $data['promo_price'] = $getPromoData['promo_price'];
                        
                }else if($getPromoData['promo_type'] == 'percentage' && $subtotal_price >= $getPromoData['min_amount'] && !empty($checkout_product_id)){
                        $data['discount'] = ($getPromoData['promo_price']/100)*$sum;
                        if($data['discount']>$getPromoData['upto_amount']){
                            $data['discount'] = $getPromoData['upto_amount'];
                        }
                        $data['grandTotal'] =$amountData['grandTotal']-$data['discount'];
                        $data['discount_type'] = $getPromoData['promo_type'];
                        $data['promo_id'] = $getPromoData['id'];
                        $data['promo_price'] = $getPromoData['promo_price'];
                        
                }else if($getPromoData['promo_type'] == 'price' && $subtotal_price < $getPromoData['min_amount']){
                        $data = [];
                }else if($getPromoData['promo_type'] == 'percentage' && $subtotal_price < $getPromoData['min_amount']){
                        $data = [];
                }
                
            }else{
                $data = [];
            }

        }else{
            $data = [];
        }
        
        return $data;
    }
    public function guestPayment($re)
    {
        
        try{
            if(empty(Cart::session(Session::get('usercartId'))->getContent()->toArray())){
                return view('templates.default.screen.cart_empty');
            }
    
            $amountData = $this->getGuestAddtocartPrice();
            $input = $re;
           
           // Create customer
        if($input['checkout_payment_method']){
            $customer['email'] = $input['billing_address']['email_address'];
             DB::beginTransaction();
            $checkCustomer = $guest = Customers::where('email', $input['billing_address']['email_address'])->first();
            if(($checkCustomer != null && $checkCustomer['status'] == '0') || $checkCustomer == null || isset($input['create_account'])){
                $customer['name'] = $input['billing_address']['first_name']." ".$input['billing_address']['last_name'];
                $customer['email'] = $input['billing_address']['email_address'];
                $customer['password'] = Hash::make($input['billing_address']['last_name'].".".$input['billing_address']['first_name']).'@12345';
                $customer['phone'] = $input['billing_address']['phone'];
                $customer['customer_type'] = 'guest';
                $guest = Customers::updateOrCreate(['email' => $input['billing_address']['email_address']], $customer);

                if(isset($input['create_account'])){
                    $getadmin = User::where('email', 'like', '%admin%')->first();
                    $this->createAccountMail($customer);
                    $this->createAccountMailToAdmin($customer, $getadmin);
                }
            }

            // Create default address
            $dAddress = $input['billing_address'];
            $dAddress['customer_id'] = $guest->id;
            $dAddress['is_primary'] = '1';
            $billAddress = CustomerAddress::updateOrCreate(['email_address' => $input['billing_address']['email_address']], $dAddress); 

            // Create other address
            if(isset($input['shipping_address_check'])){
                $oAddress = $input['shipping_address'];
                $oAddress['customer_id'] = $guest->id;
                $oAddress['is_primary'] = '0';
                $otherAddress = CustomerAddress::updateOrCreate(['email_address' => $input['shipping_address']['email_address']], $oAddress); 
            }

        // Create order
        $order['total_price'] = round($amountData['grandTotal']);
        $promo = false;
        if(isset($input['promo_code']) && $input['promo_code'] != ''){
          $promoData = $this->getPromoCodeAmountForGuest($input['promo_code'], $input['billing_address']['email_address']);
             // LBW Shipping Calculation
             $tot = 0;
             if(!empty(Session::get('usercartId'))){
             foreach(Cart::session(Session::get('usercartId'))->getContent()->toArray() as $product){
                 $p_weight_id = Products::where('id',$product['id'])->first('weight_id');
                 if($p_weight_id['weight_id'] != null)
                 {
                     $sp_weight_price = ShippingModel::where('id',$p_weight_id['weight_id'])->first('price');
                     $tot += $sp_weight_price['price']*$product['quantity'];
                 }
                
             }
             }
 
         // LBW Shipping Calculation
          if(!empty($promoData)){
            $promo = true;
            $order['discount_price'] = $promoData['discount'];
            $order['discount_type'] = $promoData['discount_type'];
            $order['promo_id'] = $promoData['promo_id'];
            $order['promo_price'] = $promoData['promo_price'];
            $order['total_price'] = round($promoData['grandTotal']+$tot);
          }
        }
        else
        {
             // LBW Shipping Calculation
             $tot = 0;
             if(!empty(Session::get('usercartId'))){
             foreach(Cart::session(Session::get('usercartId'))->getContent()->toArray() as $product){
                 $p_weight_id = Products::where('id',$product['id'])->first('weight_id');
                 if($p_weight_id['weight_id'] != null)
                 {
                     $sp_weight_price = ShippingModel::where('id',$p_weight_id['weight_id'])->first('price');
                     $tot += $sp_weight_price['price']*$product['quantity'];
                 }
                
             }
             }
             $order['total_price'] = round($amountData['grandTotal']+$tot);
 
         // LBW Shipping Calculation
        }
        $order['order_type'] = 'guest';
        $order['order_no'] = $guest->id.rand(1000000000, 9999999999);
        $order['customer_id'] = $guest->id;
        $order['terms_condition_id'] = $input['terms_condition_id'];
        // LBW Shipping Calculation
            if($tot > 0)
            {
                $order['shipping_price'] = $tot;        

            }
            else
            {
                $order['shipping_price'] = $amountData['shipping_price'];        
            }
        // LBW Shipping Calculation
        $order['order_date'] = date('Y-m-d H:m:s');
        $order['order_notes'] = $input['order_notes'];
        $order['shipping_address_id'] = null;
        $order['preferred_time'] = $input['preferred_time'];
        $orderData = Order::create($order);

        // Create order Details
        if(!empty(Session::get('usercartId'))){
        foreach(Cart::session(Session::get('usercartId'))->getContent()->toArray() as $product){
            $productData = Products::where('id', $product['id'])->first();
            $orderDetails['order_id'] = $orderData->id;
            $orderDetails['product_id'] = $productData['id'];
            $orderDetails['product_price'] = $productData['prod_price'];
            $orderDetails['quantity'] = $product['quantity'];
            $orderDetails['total'] = $productData['prod_price']*$product['quantity'];
            $OrderDetailData = OrderDetail::create($orderDetails);
            stockDecrement($product, $productData);
        }
        }
        $userId = Session::get('usercartId');
        Cart::session($userId)->clear();
        //Add Billing address
        $billAddrr = $input['billing_address'];
        $billAddrr['customer_id'] = $guest->id;
        $billAddrr['order_id'] = $orderData->id;
        $customerbillAddress = OrderBillingAddress::create($billAddrr); 

        // Add shipping address
        if(isset($input['shipping_address_check'])){
            $shippingAddress = $input['shipping_address'];
        }else{
            $shippingAddress = $input['billing_address'];
        }
            $shippingAddress['customer_id'] = $guest->id;
            $shippingAddress['order_id'] = $orderData->id;
            $customershippingAddress = OrderShippingAddress::create($shippingAddress); 

        // Create transaction
            $data = $this->transaction($guest->id, $orderData, $input['checkout_payment_method']);
            if($promo == true){
                $this->addUsedPromo($guest->id, $promoData['promo_id'], $orderData->id);
                addPromoUser($promoData['promo_id']);
            }
            $getadmin = User::where('email', 'like', '%admin%')->first();
            $parameter= Crypt::encrypt($orderData->id);
            $orderDetailForMail = $this->getOrderDetails($parameter);            
            // dd($orderDetailForMail);
            $this->orderMailToAdmin($orderDetailForMail, $getadmin);
            $this->orderMailToCustomer($orderDetailForMail, $customer);
            DB::commit();
            return view('templates.default.screen.order_success')->with($orderDetailForMail);
            // return redirect()->route('order-success', [$parameter]);
        }
        return abort(404);

        }catch(Throwable $e) {
            DB::rollBack();
            dd($e);
        }
    }
    public function customerPayment($re)
    {
        try{
            if(Auth::guard('customer')->user()){
                $customerData = Auth::guard('customer')->user()->toArray();
                $amountData = $this->getLoggedInUserAddtocartPrice($customerData);
                
                $input = $re;
               // Create order
                 // Create order
            DB::beginTransaction();
            if(count($amountData['cartProductsDetails'])>0){
                $order['total_price'] = round($amountData['grandTotal']);
                $promo = false;
                if(isset($input['promo_code']) && $input['promo_code'] != ''){
                  $promoData = $this->getPromoCodeAmount($input['promo_code']);
                  $tot = 0;
                  foreach($amountData['cartProductsDetails'] as $product){
                      $p_weight_id = Products::where('id',$product['product_id'])->first('weight_id');
                      if($p_weight_id['weight_id'] != null)
                      {
                          $sp_weight_price = ShippingModel::where('id',$p_weight_id['weight_id'])->first('price');
                          $tot += $sp_weight_price['price']*$product['quantity'];
                      }

                  } 
                  if(!empty($promoData)){
                    $promo = true;
                    $order['discount_price'] = $promoData['discount'];
                    $order['discount_type'] = $promoData['discount_type'];
                    $order['promo_id'] = $promoData['promo_id'];
                    $order['promo_price'] = $promoData['promo_price'];
                    $order['total_price'] = round($promoData['grandTotal']+$tot);
                  }
                }
                else{
                        // LBW Shipping Calculation
                        $tot = 0;
                        foreach($amountData['cartProductsDetails'] as $product){
                            $p_weight_id = Products::where('id',$product['product_id'])->first('weight_id');
                            if($p_weight_id['weight_id'] != null)
                            {
                                $sp_weight_price = ShippingModel::where('id',$p_weight_id['weight_id'])->first('price');
                                $tot += $sp_weight_price['price']*$product['quantity'];
                            }

                        } 
                           $order['total_price'] = round($amountData['grandTotal']+$tot);
                }
               
                // LBW Shipping Calculation
                $order['order_type'] = 'family';
                $order['order_no'] = $customerData['id'].rand(1000000000, 9999999999);
                $order['customer_id'] = $customerData['id'];
                $order['terms_condition_id'] = $input['terms_condition_id'];
                // LBW Shipping Calculation
                    if($tot > 0)
                    {
                        $order['shipping_price'] = $tot;                
                    }
                    else
                    {
                        $order['shipping_price'] = $amountData['shipping_price'];                
                    }
                // LBW Shipping Calculation
                $order['order_date'] = date('Y-m-d H:m:s');
                $order['order_notes'] = $input['order_notes'];
                $order['shipping_address_id'] = $input['shippingAddress_id'];
                $order['preferred_time'] = $input['preferred_time'];
                $orderData = Order::create($order);
                //Add Billing address
                $billAddrr = CustomerAddress::where(['customer_id' => $customerData['id'], 'is_primary' => '1'])->first()->toArray();
                $shippingAddress = CustomerAddress::where(['id' => $input['shippingAddress_id']])->first()->toArray();
                $billAddrr['order_id'] = $orderData->id;
                unset($billAddrr['id']);
                unset($billAddrr['is_primary']);
                unset($billAddrr['created_at']);
                unset($billAddrr['updated_at']);
                unset($billAddrr['deleted_at']);
                //dd($billAddrr);
                $customerbillAddress = OrderBillingAddress::create($billAddrr); 

                // Add shipping address
                $shippingAddress['order_id'] = $orderData->id;
                unset($shippingAddress['id']);
                unset($shippingAddress['is_primary']);
                unset($shippingAddress['created_at']);
                unset($shippingAddress['updated_at']);
                unset($shippingAddress['deleted_at']);
                $customershippingAddress = OrderShippingAddress::create($shippingAddress);
                // Create order Details
                foreach($amountData['cartProductsDetails'] as $product){
                    $productData = Products::where('id', $product['product_id'])->first();
                    $orderDetails['order_id'] = $orderData->id;
                    $orderDetails['product_id'] = $productData['id'];
                    $orderDetails['product_price'] = $productData['prod_price'];
                    $orderDetails['quantity'] = $product['quantity'];
                    $orderDetails['total'] = $productData['prod_price']*$product['quantity'];
                    $OrderDetailData = OrderDetail::create($orderDetails);
                    stockDecrement($product, $productData);
                }
                AddToCart::where('user_id', $customerData['id'])->delete();
                $data = $this->transaction($customerData['id'], $orderData, $input['checkout_payment_method']);
                if($promo == true){
                    $this->addUsedPromo($customerData['id'], $promoData['promo_id'], $orderData->id);
                    addPromoUser($promoData['promo_id']);
                }
                $parameter= Crypt::encrypt($orderData->id);
                $getadmin = User::where('email', 'like', '%admin%')->first();
                $orderDetailForMail = $this->getOrderDetails($parameter);            
                $this->orderMailToAdmin($orderDetailForMail, $getadmin);
                $this->orderMailToCustomer($orderDetailForMail, $customerData);
                DB::commit();
                return view('templates.default.screen.order_success')->with($orderDetailForMail);
                // return redirect()->route('order-success', [$parameter]);
            }
            return abort(404);
        }
            return abort(404);
           
            }catch(Throwable $e){
                DB::rollBack();
                dd($e);
            }
            
       
    }
}
