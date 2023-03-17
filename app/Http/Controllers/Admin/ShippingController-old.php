<?php

namespace App\Http\Controllers\admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ShippingModel;
use Illuminate\Support\Facades\Storage;
use Flash;
use DB;


class ShippingController extends Controller
{
    //
    public function index(){
    	$shipping= DB::table('shipping')->get();
    	
    return view('admin.shipping.index',)
           ->with('shipping', $shipping);	
    }
    public function create()
    {
        return view('admin.shipping.create');
    }
    public function store(Request $request)
    {
        
        if($request->shipping_method=="1"){
               ShippingModel::create([
                'shipping_method'=>$request->shipping_method,
                'start_date'=>$request->start_date,
                'end_date'=>$request->end_date,
                'price'=>$request->price
               ]);
               
        }elseif ($request->shipping_method=="2") {
             ShippingModel::create([
                'shipping_method'=>$request->shipping_method,
                'min_value'=>$request->min_value,
                'max_value'=>$request->max_value,
                'price'=>$request->price
               ]);
               
        }

        
   
        Flash::success('Shipping saved successfully.');
        return redirect('admin/shipping');
    }
    public function edit($id)
    {
        //
         $shipping= ShippingModel::find($id);
        if (empty($shipping)) {
            Flash::error('shipping not found');
            return redirect('admin.shipping');
        }

        return view('admin.shipping.edit')->with('shipping', $shipping);
    }
    public function update(Request $request,$id){

    	$shipping = ShippingModel::find($id);

        if (empty($shipping)) {
            Flash::error('shipping not found');
            return redirect('admin/shipping');
        }
        $request->validate([
                'shipping_method' => 'required',
                'price'=>'required'
            ]);

        $input = $request->all();
        if($request->shipping_method == "1"){

           $shipping->start_date = $request->start_date;
            $shipping->end_date = $request->end_date;        
            $shipping->price = $request->price;
        }else{
             $shipping->min_value = $request->min_value;
             $shipping->max_value = $request->max_value;        
             $shipping->price = $request->price;
        }

        //PromoModel::save($input, $id);      
        
        
        $shipping->save();

        Flash::success('Shipping updated successfully.');

        return redirect('admin/shipping');
    }
    public function destroy($id)
    {
        //
        $shipping = ShippingModel::find($id);

       
         if (empty($shipping)) {
            Flash::error('Shipping not found');

            return redirect(route('admin.shipping.index'));
        }

         $shipping->forceDelete();

        Flash::success('Shipping deleted successfully.');

        return redirect('admin/shipping');
    }
    public function show($id)
    {
     $data= ShippingModel::find($id);

        if (empty($data)) {
            Flash::error('Shipping not found');

            return redirect(route('admin.shipping.index'));
        }

        return view('admin.shipping.show')->with('shipping', $data);
    }
}
