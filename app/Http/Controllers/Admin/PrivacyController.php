<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Privacy;
use Flash;
use DB;

class PrivacyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
         $privacy= Privacy::all();
        //dd($about);
        
    return view('admin.privacy.index',)
           ->with('privacy', $privacy);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('admin.privacy.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'privacy' => 'required',
            'title'=>'required'
        ]);
        $status="0";
       $input['title']=$request['title'];
       $input['privacy']=$request['privacy'];
       $input['is_active']=$status;
       
        Privacy::create($input);
        Flash::success(' Privacy & Policy saved successfully.');
        return redirect('admin/privacy');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data= Privacy::find($id);

        if (empty($data)) {
            Flash::error('Privacy & Policy not found');

            return redirect('admin/privacy');;
        }

        return view('admin.privacy.show')->with('privacy', $data);    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
      $privacy = Privacy::find($id);
         //dd($terms);

        if (empty($privacy)) {
            Flash::error('Privacy & Policy
 not found');

            return redirect('admin/privacy');;
        }

        return view('admin.privacy.edit')->with('privacy', $privacy);
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
         $privacy = Privacy::find($id);

        if (empty($privacy)) {
            Flash::error('Privacy & Policy not found');
            return redirect('admin/privacy');
        }
        $input = $request->all();
        $privacy->privacy = $request->privacy;
        $privacy->title = $request->title;
       $privacy->save();

        Flash::success('Privacy & Policy updated successfully.');

        return redirect('admin/privacy');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $privacy = Privacy::find($id);

        if (empty($privacy)) {
            Flash::error('Privacy & Policy not found');

            return redirect('admin/privacy');
        }

        $privacy->delete($id);

        Flash::success('Privacy & Policy deleted successfully.');

        return  redirect('admin/privacy');
    }
    public function UpdatePrivactStatus($id, Request $request){
        $status= $request['is_active'];
       if($status=="1"){
        $singlestatus="0";
        $updatestatus="0";
       }else{
        $singlestatus="1";
        $updatestatus="0";
       }
     DB::table('privacy')->where('id',$id)->update(array(
                                 'is_active'=>$singlestatus));
     DB::table('privacy')->where('id','!=',$id)->update(array(
                                 'is_active'=>$updatestatus));
     Flash::success('privacy Status Updated successfully.');
     return  redirect('admin/privacy');
    }
}
