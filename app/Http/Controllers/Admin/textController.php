<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\text;
use Flash;
use DB;
use Illuminate\Support\Facades\Validator;
class textController extends Controller
{
    
    public function store(Request $request)
    {
        
        $request->validate([
            'name' => 'required',
            'doc' => 'required',
            'price'=>'required|numeric',
        ]);
       $input = $request->all();
        unset($input['_token']);
         if($request->hasFile('doc'))
        {
            $image = $request->file('doc');
            $new_name = $image->getClientOriginalName();
            $image->move(public_path('fontFile'), $new_name);
            $input['doc'] = $new_name;
        }
        $input['link'] = null;
        text::create($input);
        Flash::success('Text saved successfully.');
        return redirect('admin/color');   
    }
    public function edit(Request $request)
    {
        $viewData =  text::where('text_id', $request->text_id)->where('deleted_at',null)->first();
        if(!$viewData)
        {
           return redirect()->back();
        }
        return view('admin.cutomize_product.text_edit')->with('data',$viewData);

    }
    public function update(Request $request)
    {
        $viewData =  text::where('text_id', $request->text_id)->first();
        if(!$viewData)
        {
           return redirect()->back();
        } 
         
        $input =  $request->all();
        unset($input['_token']);
        unset($input['text_id']);
        if($request->hasFile('doc'))
        {
            $image = $request->file('doc');
            $new_name = $image->getClientOriginalName();
            $image->move(public_path('fontFile'), $new_name);
            $input['doc'] = $new_name;

            if(\File::exists(public_path('fontFile/'.$viewData->doc))){
                \File::delete(public_path('fontFile/'.$viewData->doc));
                 }
               // else{
                // dd('File does not exists.');
                // }

        }
        $input['link'] = null;

        text::where('text_id', $request->text_id)->update($input);
        Flash::success('Text updated successfully.');
        return redirect(route('customize.text_index'));

    }
    public function activeInactive(Request $request)
    {
        $viewData =  text::where('text_id', $request->view_id)->first();
        if(!$viewData)
        {
           return redirect()->back();
        }  
        if($request->status_value == 1)
        {
            DB::table('text')
            ->where('text_id',$request->view_id)
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
            DB::table('text')
            ->where('text_id',$request->view_id)
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
        $viewData =  text::where('text_id', $request->text_id)->first();
        if(!$viewData)
        {
           return redirect()->back();
        }
             if(\File::exists(public_path('fontFile/'.$viewData->doc))){
            \File::delete(public_path('fontFile/'.$viewData->doc));
            }
        text::where('text_id', $request->text_id)->delete();
        Flash::success('Color deleted successfully.');
        return redirect(route('customize.text_index'));

    }

}
