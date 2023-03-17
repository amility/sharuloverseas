<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\color;
use App\Models\text;
use Flash;
use DB;
use Illuminate\Support\Facades\Validator;
class colorController extends Controller
{
    public function index()
    {
         $color = color::where('deleted_at',null)->orderby('color_id','desc')->get();
         $text = text::where('deleted_at',null)->orderby('text_id','desc')->get();
        return view('admin.cutomize_product.text_index',compact('color','text'));
    }
    public function store(Request $request)
    {
        $rules = array(
            'name' => 'required',
            'code'=>'required',
            'price'=>'required|numeric',
        );
        $validation = Validator::make($request->all(), $rules);
        // Validate the input and return correct response
        if ($validation->fails())
        {
            return response()->json([
                'message' => $validation->getMessageBag()->toArray(),
                'style'  => 'color: red;
                font-size: 12px;
                font-family: ui-sans-serif;'
               ]);
        }
        $input = $request->all();
        unset($input['_token']);
        color::create($input);
        return response()->json([
            'status'=>'success',
             'message1' => '<div class="alert alert-success alert-dismissible fade show" role="alert">
                Color save successfully
             <button type="button" class="close" data-dismiss="alert" aria-label="Close">
               <span aria-hidden="true">&times;</span>
             </button>
           </div>',
            ]);

    }
    public function edit(Request $request)
    {
        $viewData =  color::where('color_id', $request->color_id)->where('deleted_at',null)->first();
        if(!$viewData)
        {
           return redirect()->back();
        }
        return view('admin.cutomize_product.color_edit')->with('data',$viewData);

    }
    public function update(Request $request)
    {
        $rules = array(
            'name' => 'required',
            'code'=>'required',
            'price'=>'required|numeric',
        );
        $validation = Validator::make($request->all(), $rules);
        // Validate the input and return correct response
        if ($validation->fails())
        {
            return response()->json([
                'message' => $validation->getMessageBag()->toArray(),
                'style'  => 'color: red;
                font-size: 12px;
                font-family: ui-sans-serif;'
               ]);
        }
        $input = $request->all();
        unset($input['_token']);
        unset($input['color_id']);
        color::where('color_id', $request->color_id)->update($input);

        return response()->json([
            'status'=>'success',
             'message1' => '<div class="alert alert-success alert-dismissible fade show" role="alert">
                Color updated successfully
             <button type="button" class="close" data-dismiss="alert" aria-label="Close">
               <span aria-hidden="true">&times;</span>
             </button>
           </div>',
            ]);

       
    }
    public function activeInactive(Request $request)
    {
        $viewData =  color::where('color_id', $request->view_id)->first();
        if(!$viewData)
        {
           return redirect()->back();
        }  
        if($request->status_value == 1)
        {
            DB::table('colors')
            ->where('color_id',$request->view_id)
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
            DB::table('colors')
            ->where('color_id',$request->view_id)
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
    public function destroy(Request $request)
    {
        $viewData =  color::where('color_id', $request->color_id)->first();
        if(!$viewData)
        {
           return redirect()->back();
        }
        // if(\File::exists(public_path('clipArt/'.$viewData->image))){
        //     \File::delete(public_path('clipArt/'.$viewData->image));
        //     }else{
        //     dd('File does not exists.');
        //     }
        Color::where('color_id', $request->color_id)->delete();
        Flash::success('Color deleted successfully.');
        return redirect(route('customize.text_index'));

    }
}
