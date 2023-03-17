<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\Customers;
use App\Models\Products;
use App\Models\OrderDetail;
use App\Models\Transaction;
use App\Models\OrderBillingAddress;
use App\Models\OrderShippingAddress;
use Mail;
use Flash;
use App\Traits\MailTrait;
use DB;

class OrderManagementController extends Controller
{
    use MailTrait;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {


        $data['order_list']=DB::table('orders')
        ->select('orders.*','customers.name as customer_name','transactions.payment_method','order_billing_addresses.first_name')
        ->join('customers','customers.id','=','orders.customer_id')
        ->join('order_billing_addresses','order_billing_addresses.order_id','=','orders.id')
        ->join('transactions','transactions.order_id','=','orders.id')
        ->orderBy('orders.id','desc')
        ->get();
         //dd($data);
        return view('admin.orders.index')->with($data);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

       $data['order']=DB::table('orders')
       ->select('orders.*','customers.name as customer_name','transactions.payment_method','order_billing_addresses.first_name')
       ->join('customers','customers.id','=','orders.customer_id')
       ->join('order_billing_addresses','order_billing_addresses.order_id','=','orders.id')
       ->join('transactions','transactions.order_id','=','orders.id')

       ->where('orders.id','=',$id)
       ->get();
       $data['product']=DB::table('orders')
       ->select('products.prod_name','order_details.order_id')
       ->join('order_details','order_details.order_id','=','orders.id')
       ->join('products','products.id','=','order_details.product_id')
       ->where('order_details.order_id','=',$id)
       ->get();
       $data['shippingDetail'] = OrderShippingAddress::where('order_id', $id)->first();

        $data['billingDetail'] = OrderBillingAddress::where('order_id', $id)->first();

          //dd($data);
       return view('admin.orders.show')->with($data);

   }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

       $data=Order::find($id);


         //dd($data);
       return view('admin.orders.edit')->with('orders',$data);
   }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

       $request->validate([

        'status' => 'required'
    ]);

       $query= DB::table('orders')
       ->where('id',$id)
       ->update(array('status' =>$request['status']));
       $recipient=array();


        $orders=Order::find($id);
        $customers=Customers::find($orders['customer_id']);
        $recipient['email']=$customers['email'];
        //dd($recipient);

       $data['status']=$request['status'];
        $data['order'] = Order::where('id', $id)->first();
        $data['orderDetails'] = OrderDetail::where('order_id', $id)->get()->toArray();
        //dd($data['orderDetails']['product_id']);
          if($request['status']=="rejected"){
            if(isset($data['orderDetails'][0]['product_id'])){
            $product_id=$data['orderDetails'][0]['product_id'];
            }
            if(isset($data['orderDetails'][0]['quantity'])){
              $quantity=$data['orderDetails'][0]['quantity'];
            }
            
                
            $products=DB::table('products')->where('id', $product_id)->first();
            $stock=$products->total_stock + $quantity;
           //dd($stock);           
            DB::table('products')
           ->where('id',$product_id)
           ->update(array('total_stock' =>$stock));      
          
        }

        $data['transaction'] = Transaction::where('order_id', $id)->first();
        $data['shippingDetail'] = OrderShippingAddress::where('order_id', $id)->first();

        $data['billingDetail'] = OrderBillingAddress::where('order_id', $id)->first();
        $this->orderStatusChangeMailToCustomer($data, $recipient);
//         $query = DB::getQueryLog();
// $query = end($query);
// dd($query);
         //dd($customer_id);

           Flash::success('Order status updated successfully.');
           return redirect('c~AiN:2)Y42,&*/orders');





    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
    public function updateStatus(Request $request){
       $request->validate([
        'order' => 'array|required',
        'status' => 'required'
    ]);

          //dd($data);
       // DB::enableQueryLog();
       
       $recipient=array();
       for($i=0; $i<count($request['order']); $i++) {
        $query= DB::table('orders')
       ->where('id',$request['order'][$i])
       ->update(array('status' =>$request['status']));

        $orders=Order::find($request['order'][$i]);
        $customers=Customers::find($orders['customer_id']);
        $recipient['email']=$customers['email'];
        //dd($recipient);

       $data['status']=$request['status'];
        $data['order'] = Order::where('id', $request['order'][$i])->first();
       
        $data['orderDetails'] = OrderDetail::where('order_id', $request['order'][$i])->get()->toArray();

        
        if($request['status']=="rejected"){
          for($j=0; $j<count($data['orderDetails']); $j++){
            $product_id=$data['orderDetails'][$j]['product_id'];
            $quantity=$data['orderDetails'][$j]['quantity'];
            
            $products=DB::table('products')->where('id', $product_id)->first();
            $stock=$products->total_stock + $quantity;
           
           DB::table('products')
           ->where('id',$product_id)
           ->update(array('total_stock' =>$stock));

          }
          
        }
        $data['transaction'] = Transaction::where('order_id', $request['order'][$i])->first();
        $data['shippingDetail'] = OrderShippingAddress::where('order_id', $request['order'][$i])->first();

        $data['billingDetail'] = OrderBillingAddress::where('order_id', $request['order'][$i])->first();
          $this->orderStatusChangeMailToCustomer($data, $recipient);   
      }
//         $query = DB::getQueryLog();
// $query = end($query);
// dd($query);
         //dd($customer_id);

           Flash::success('Order status updated successfully.');
           return redirect('c~AiN:2)Y42,&*/orders');






       }
   }
