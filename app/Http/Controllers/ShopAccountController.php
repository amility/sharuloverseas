<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Crypt;
use Illuminate\Contracts\Encryption\DecryptException;
use App\Models\BannerImages;
use App\Http\Controllers\AppBaseController;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use App\Models\Customers;
use App\Models\OtpVerify;
use App\Models\CustomerAddress;
use App\Models\Country;
use App\Models\State;
use App\Models\City;
use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\Transaction;
use App\Models\OrderShippingAddress;
use App\Models\OrderBillingAddress;
use Illuminate\Http\Request;
use Flash;
use Response;
use Auth;
use App\Rules\MatchOldPassword;
use Carbon\Carbon;
use Mail;

class ShopAccountController extends AppBaseController
{

    /**
     * Index user profile
     *
     * @return  [view]
     */


    public function userDasboard(Request $request)
    {
        if(Auth::guard('customer')->user()){
            $customerData = Auth::guard('customer')->user()->toArray();
            $customerAddress = CustomerAddress::where(['customer_id'=> $customerData['id'], 'is_primary'=>'1'])->first();
            $objBannerImages = BannerImages::get()->toArray();
            $orders = Order::with('items')->where('customer_id', $customerData['id'])->orderBy('created_at','desc')->take(5)->get()->toArray();
            return view('templates.default.screen.account_dashboard', compact('customerAddress', 'orders'))
                ->with('bannerImage', $objBannerImages);
        }
        return view('templates.default.screen.account_login');
    }

    public function userProfile(Request $request)
    {
        if(Auth::guard('customer')->user()){
            return view('templates.default.screen.account_profile');
        }
        return view('templates.default.screen.account_login');
    }

    public function editUserProfile(Request $request){
        if(Auth::guard('customer')->user()){
            $customerData = Auth::guard('customer')->user()->toArray();
            $request->validate([
                'name' => 'required',
                'email' => 'required|email|unique:customers,email,'.$customerData['id'],
            ]);
            $input = $request->all();
            $customer = Customers::find($customerData['id']);
            $customer->update($input);    
            return redirect()->back()->with('success','Profile updated successfully');
        }
        return view('templates.default.screen.account_login');
    }

    public function userAddress(Request $request)
    {   
        if(Auth::guard('customer')->user()){
            $customerData = Auth::guard('customer')->user()->toArray();
            $addresses = CustomerAddress::where('customer_id', $customerData['id'])->get()->toArray();
            return view('templates.default.screen.account_addresses', compact('addresses'));
        }
        return view('templates.default.screen.account_login');
    }

    public function makeDefaultAddress(Request $request){
       $all = CustomerAddress::where('customer_id', $request->customer_id)->update(['is_primary'=>'0']);
       
        $success = CustomerAddress::where('id', $request->id)->update(['is_primary'=>'1']);
        if($all){
            echo 'yes';
        }
    }

    public function userAddAddress(Request $request)
    {  

        $data['country'] = Country::where('name', 'United States')->get(['id', 'code', 'name', 'phonecode'])->toArray();
        $data['states'] = State::where('country_id', $data['country'][0]['id'])->get(['id','name'])->toArray();
        $data['cities'] = City::where('state_id', $data['states'][0]['id'])->get(['name'])->toArray();
        $states = array_merge($data['states'], $data['cities']);
        $data['kuwait_cities'] = array_map("unserialize", array_unique(array_map("serialize", $states)));
        return view('templates.default.screen.account_addaddress')->with($data);
    }

    public function userStoreAddress(Request $request){
        if(Auth::guard('customer')->user()){
            $customerData = Auth::guard('customer')->user()->toArray();
            $request->validate([
                'first_name' => 'required',
                'last_name' => 'required',
                'email_address' => 'required|email',
                'town_city' => 'required|max:125',
                // 'state_country' => 'required|max:125',
                'country' => 'required|max:125',
                // 'postcode_zip' => 'required|integer|regex:/\b\d{6}\b/',
                'phone' => 'required',
                'street_address' => 'required|max:500',
                'block' => 'required|max:500',
                'house_building' => 'required|max:500',
            ]);
            $input = $request->all();
            $checkAdd = CustomerAddress::where('customer_id', $customerData['id'])->get()->toArray();
            if(count($checkAdd) == 0){
                $input['is_primary'] = '1';
            }
            $input['customer_id'] = $customerData['id'];
            $customer = CustomerAddress::create($input);
            if(request()->redirect == 'checkout'){
                return redirect('customer/checkout')->with('success','Address added successfully');
            } 
            return redirect('customer/account-addresses')->with('success','Profile added successfully');
        }
        return view('templates.default.screen.account_login');
    }
public function userEditAddress(Request $request)
    {   
        if(Auth::guard('customer')->user()){
            $customerData = Auth::guard('customer')->user()->toArray();
            $data['customerAddress'] = $customerAddress = CustomerAddress::where(['customer_id'=> $customerData['id'], 'is_primary'=>'1'])->first();
             $data['countries'] = Country::where('name', 'United States')->get(['id', 'code', 'name', 'phonecode'])->toArray();
            $data['states'] = State::where('country_id', $data['countries'][0]['id'])->get(['id','name'])->toArray();
            $data['cities'] = City::where('state_id', $data['states'][0]['id'])->get(['name'])->toArray();
            $states = array_merge($data['states'], $data['cities']);
            $data['kuwait_cities'] = array_map("unserialize", array_unique(array_map("serialize", $states)));
            
            return view('templates.default.screen.account_edit_address')->with($data);
        }
        return view('templates.default.screen.account_login');
    }

    public function userEditAddresses($id, Request $request)
    {   
        if(Auth::guard('customer')->user()){
            $data['customerAddress'] = $customerAddress = CustomerAddress::where(['id'=> $id])->first();
            $data['countries'] = Country::where('name', 'United States')->get(['id', 'code', 'name', 'phonecode'])->toArray();
            $data['states'] = State::where('country_id', $data['countries'][0]['id'])->get(['id','name'])->toArray();
            $data['cities'] = City::where('state_id', $data['states'][0]['id'])->get(['name'])->toArray();
            $states = array_merge($data['states'], $data['cities']);
            $data['kuwait_cities'] = array_map("unserialize", array_unique(array_map("serialize", $states)));
            return view('templates.default.screen.account_edit_address')->with($data);
        }
        return view('templates.default.screen.account_login');
    }
    public function userUpdateAddress(Request $request){
        if(Auth::guard('customer')->user()){
            $customerData = Auth::guard('customer')->user()->toArray();
            $request->validate([
                'first_name' => 'required',
                'last_name' => 'required',
                'email_address' => 'required|email',
                'town_city' => 'required|max:125',
                // 'state_country' => 'required|max:125',
                'country' => 'required|max:125',
                //'postcode_zip' => 'required|integer|regex:/\b\d{6}\b/',
                'phone' => 'required',
                'street_address' => 'required|max:500',
                'block' => 'required|max:500',
                'house_building' => 'required|max:500',
            ]);
            $input = $request->all();
            $customer = CustomerAddress::find($request->id);
            $customer->update($input);    
            return redirect()->back()->with('success','Address updated successfully');
        }
        return view('templates.default.screen.account_login');
    }

    public function userDestroyAddresses($id){
        if(Auth::guard('customer')->user()){
            $success = CustomerAddress::where('id',$id)->delete();
            if($success){
                return redirect()->back()->with('success','Address deleted successfully');
            }
            return redirect()->back()->with('success','Something went wrong');
        }
        return view('templates.default.screen.account_login');
        
    }    

    public function userPassword(Request $request)
    {   
        if(Auth::guard('customer')->user()){
            return view('templates.default.screen.account_password');
        }
        return view('templates.default.screen.account_login');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function changePassword(Request $request)
    {
        if(Auth::guard('customer')->user()){
            $request->validate([
                'current_password' => ['required', new MatchOldPassword],
                'new_password' => ['required', 'min:8'],
                'new_confirm_password' => ['same:new_password'],
            ]);
            Customers::find(Auth::guard('customer')->user()->id)->update(['password'=> Hash::make($request->new_password)]);
       
            return redirect()->back()->with('success','Password changed successfully');
        }
        return view('templates.default.screen.account_login');
    }

    public function userRegister(Request $request)
    {   
        return view('templates.default.screen.account_register');
    }

    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:customers'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
    }

    public function generateOTP(){
        $otp = mt_rand(1000,9999);
        return $otp;
    }
    
    public function registerCustomer(Request $request)
    {   
        $this->validator($request->all())->validate();
        $otp = $this->generateOTP();
        $email = $request['email'];
        $customer = Customers::create([
            'name' => $request['name'],
            'email' => $request['email'],
            'password' => Hash::make($request['password']),
        ]);
        $data['name'] = $request['name'];
        $data['otp'] = $otp;

        Mail::send('emails.otp_register', ['data' => $data], function($message) use ($email) {
            $message->to($email)->subject('GUN OTP for registration');
        });

       OtpVerify::updateOrCreate(['customer_id' =>$customer->id],
                            ['customer_id'=>$customer->id,'otp'=>$otp]);
        return redirect()->route('shop-account.otp', ['id' => $customer->id])->with(['success'=>'OTP sent your email '.$request['email']]);
    }

    public function otpCustomer(){
        return view('templates.default.screen.account_otp');
    }

    public function checkOtpCustomer($id, Request $request){
         $otp = trim(request('otp'));
          $request->validate([
                'otp' => 'required'
            ]);
          $dbotp = OtpVerify::where('customer_id', $id)->first();
         if($otp == $dbotp->otp){
            OtpVerify::where('customer_id', $id)->delete();
            $customer = Customers::where('id', $id)->update(['otp_verified_at' => Carbon::parse(date('Y-m-d'))->setTimezone('UTC'), 'status' => '1']);
            return redirect('customer/login');
         }
         return redirect()->back()->with('success', 'Invalid OTP');
    }

    public function userCart(Request $request)
    {   
        return view('templates.default.screen.cart');
    }

    public function userCheckout(Request $request)
    {   
        return view('templates.default.screen.checkout');
    }

    public function userOrders(Request $request)
    {   if(Auth::guard('customer')->user()){
            $customerData = Auth::guard('customer')->user()->toArray();
            $data['orders'] = Order::with('items')->where('customer_id', $customerData['id'])->orderBy('created_at','desc')->paginate(20);
            return view('templates.default.screen.account_order')->with($data);
        }
        return view('templates.default.screen.account_login');
    }

    public function userOrderDetails($id)
    {   
    try {
        if(Auth::guard('customer')->user()){
            $customerData = Auth::guard('customer')->user()->toArray();
            $order_id = Crypt::decrypt($id);
            $data['order'] = $orders = Order::where('id', $order_id)->first()->toArray();
            $data['orderDetails'] = OrderDetail::where('order_id', $order_id)->get()->toArray();
            $data['transaction'] = Transaction::where('order_id', $order_id)->first();

            // $data['billingDetail'] = CustomerAddress::where(['customer_id' => $customerData['id'], 'is_primary' => '1'])->first();
            // $data['shippingDetail'] = CustomerAddress::where(['id' => $orders['shipping_address_id']])->first();
            $data['shippingDetail'] = OrderShippingAddress::where('order_id', $order_id)->first();
            $data['billingDetail'] = OrderBillingAddress::where('order_id', $order_id)->first();
            return view('templates.default.screen.account_order_details')->with($data);
        }
        return view('templates.default.screen.account_login');
    }
    catch (DecryptException $e) {
        abort(404);
    }
    }
}