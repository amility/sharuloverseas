<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\clipArt;
use Flash;
use DB;
class ClipController extends Controller
{
    public function index()
    {
       $clipAr = clipArt::where('deleted_at',null)->get();
        return view('admin.cutomize_product.clipArt_index',compact('clipAr'));
    }
    public function store(Request $request)
    {
        $input = $request->all();
        
        $request->validate([
            'name' => 'required',
            'price'=>'required|numeric',
            'image'=> 'required|mimes:jpeg,jpg,png,gif|max:1000',
        ]);
        if($request->hasFile('image'))
        {
            $image = $request->file('image');
               $new_name = rand() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('clipArt'), $new_name);
        }
        $input['image'] = '/clipArt/'.$new_name;
        unset($input['_token']);

        clipArt::create($input);
        Flash::success('ClipArt saved successfully.');
        return redirect(route('customize.clipArt_index'));
    }
    public function edit(Request $request)
    {
        $viewData =  clipArt::where('clip_id', $request->clip_id)->where('deleted_at',null)->first();
        if(!$viewData)
        {
           return redirect()->back();
        }
        return view('admin.cutomize_product.clip_edit')->with('data',$viewData);

    }
    public function update(Request $request)
    {
        $viewData =  clipArt::where('clip_id', $request->clip_id)->first();
        if(!$viewData)
        {
           return redirect()->back();
        } 
         
        $input =  $request->all();
        unset($input['_token']);
        unset($input['clip_id']);
        if($request->hasFile('image'))
        {
            $image = $request->file('image');
            $new_name = rand() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('clipArt'), $new_name);
            $input['image'] = '/clipArt/'.$new_name;
        }
        clipArt::where('clip_id', $request->clip_id)->update($input);
        return redirect(route('customize.clipArt_index'));

    }
    public function activeInactive(Request $request)
    {
        $viewData =  clipArt::where('clip_id', $request->view_id)->first();
        if(!$viewData)
        {
           return redirect()->back();
        }  
        if($request->status_value == 1)
        {
            DB::table('clip_art')
            ->where('clip_id',$request->view_id)
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
            DB::table('clip_art')
            ->where('clip_id',$request->view_id)
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
        $viewData =  clipArt::where('clip_id', $request->clip_id)->first();
        if(!$viewData)
        {
           return redirect()->back();
        }
        if(\File::exists(public_path('clipArt/'.$viewData->image))){
            \File::delete(public_path('clipArt/'.$viewData->image));
            }else{
            dd('File does not exists.');
            }
        clipArt::where('clip_id', $request->clip_id)->delete();
        Flash::success('ClipArt deleted successfully.');
        return redirect(route('customize.clipArt_index'));

    }
    
}
