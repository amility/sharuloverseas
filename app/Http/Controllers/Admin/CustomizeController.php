<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ViewModel;
use DB;
class CustomizeController extends Controller
{
    public function index()
    {
        $viewData =  ViewModel::all();
        return view('admin.cutomize_product.index',compact('viewData'));
    }
    // public function textIndex()
    // {
    //     return view('admin.cutomize_product.text_index');
    // }
   
    public function viewStore(Request $request)
    {
        $request->validate([
            'view_id' => 'required|unique:custom_view,view_id',
            'price'=>'required|numeric',
        ]);
        $store = new ViewModel();
        $store->view = $request->view_id;
        $store->price = $request->price;
        $store->save();
        return redirect()->back()->with('success',"View save successfully");
    }
    public function viewEdit(Request $request)
    {   
         $viewData =  ViewModel::where('view_id', $request->view_id)->first();
         if(!$viewData)
         {
            return redirect()->back();
         }

         return view('admin.cutomize_product.view_edit')->with('data',$viewData);

    }
    public function viewEditSave(Request $request)
    {
        $viewData =  ViewModel::where('view_id', $request->id)->first();
        if(!$viewData)
        {
           return redirect()->back();
        } 
         
        $input =  $request->all();
        unset($input['_token']);
        unset($input['id']);
        ViewModel::where('view_id', $request->id)->update($input);
        return redirect(route('customize.index'));

    }
    public function activeInactive(Request $request)
    {
        $viewData =  ViewModel::where('view_id', $request->view_id)->first();
        if(!$viewData)
        {
           return redirect()->back();
        }  
        if($request->status_value == 1)
        {
            DB::table('custom_view')
            ->where('view_id',$request->view_id)
            ->update(['is_active'=>'0']);
            return response()->json([
                'message' => '<div class="alert alert-success alert-dismissible fade show" role="alert">
                 Status Inactive
             <button type="button" class="close" data-dismiss="alert" aria-label="Close">
               <span aria-hidden="true">&times;</span>
             </button>
           </div>',
               ]);
        }
        else
        {
            DB::table('custom_view')
            ->where('view_id',$request->view_id)
            ->update(['is_active'=>'1']);
            return response()->json([
                'message' => '<div class="alert alert-success alert-dismissible fade show" role="alert">
                 Status Active
             <button type="button" class="close" data-dismiss="alert" aria-label="Close">
               <span aria-hidden="true">&times;</span>
             </button>
           </div>',
               ]);
        }
       
        
    }
    public function viewDestroy(Request $request)
    {
        $viewData =  ViewModel::where('view_id', $request->id)->first();
        if(!$viewData)
        {
           return redirect()->back();
        }
        ViewModel::where('view_id', $request->id)->delete();
        return redirect(route('customize.index'));

    }
}
