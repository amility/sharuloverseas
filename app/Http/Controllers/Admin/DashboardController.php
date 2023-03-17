<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Products;
use App\Models\Customers;
use App\Models\Order;
use DB;

class DashboardController extends Controller
{
    public function index()
    {
    	$total['total_product']=Products::count();
    	$total['total_customer']=Customers::count();
    	$total['total_order']=Order::count();
    	$total['total_sales']=Order::where('status','=','delivered')->count();
    	//DB::enableQueryLog();
    	$total['latest_order']=DB::table('orders')
          ->select('orders.*','customers.name as customer_name','transactions.payment_method','order_billing_addresses.first_name')
		->join('customers','customers.id','=','orders.customer_id')
		->join('order_billing_addresses','order_billing_addresses.order_id','=','orders.id')
		->join('transactions','transactions.order_id','=','orders.id')
		->orderBy('orders.id','desc')		
         ->get();
         
         
		
         
		

// and then you can get query log
// $query = DB::getQueryLog();
//     dd(end($query));
         $total['order_id']=DB::table('orders')
          ->select('products.prod_name','order_details.order_id')
		->join('order_details','order_details.order_id','=','orders.id')	
		->join('products','products.id','=','order_details.product_id')	
         ->get();
         
         //dd($total);
    
        return view('admin.dashboard.index')->with($total);
    }
}
