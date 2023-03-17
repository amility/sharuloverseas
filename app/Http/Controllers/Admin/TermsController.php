<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Terms;
use Flash;
use DB;

class TermsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $terms= Terms::all();
        //dd($about);
        
    return view('admin.terms.index',)
           ->with('terms', $terms); 
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('admin.terms.create');
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
        $request->validate([
            'terms' => 'required',
            'title'=>'required'
        ]);
        $status="0";
        $input['title'] = $request['title'];
        $input['terms'] = $request['terms'];
        $input['is_active']=$status;
        //dd($input);
        Terms::create($input);
        Flash::success('Terms & Condition saved successfully.');
        return redirect('admin/terms');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data= Terms::find($id);

        if (empty($data)) {
            Flash::error('Terms & Condition not found');

            return redirect('admin/terms');;
        }

        return view('admin.terms.show')->with('terms', $data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $terms = Terms::find($id);
         //dd($terms);

        if (empty($terms)) {
            Flash::error('Terms & Conditions
 not found');

            return redirect('admin/terms');;
        }

        return view('admin.terms.edit')->with('terms', $terms);
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
       $terms = Terms::find($id);

        if (empty($terms)) {
            Flash::error('Terms & Conditions not found');
            return redirect('admin/terms');
        }
        $input = $request->all();
        $terms->terms = $request->terms;
        $terms->title = $request->title;
       $terms->save();

        Flash::success('Terms & Conditions updated successfully.');

        return redirect('admin/terms');
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
        $terms = Terms::find($id);

        if (empty($terms)) {
            Flash::error('About Us not found');

            return redirect('admin/terms');
        }

        $terms->delete($id);

        Flash::success('Terms & Conditions deleted successfully.');

        return  redirect('admin/terms');
    }
    public function changeTermStatus($id, Request $request){
        $status= $request['is_active'];
       if($status=="1"){
        $singlestatus="0";
        $updatestatus="0";
       }else{
        $singlestatus="1";
        $updatestatus="0";
       }
     DB::table('terms')->where('id',$id)->update(array(
                                 'is_active'=>$singlestatus));
     DB::table('terms')->where('id','!=',$id)->update(array(
                                 'is_active'=>$updatestatus));
     Flash::success('Terms and Conditions Status Updated successfully.');
     return  redirect('admin/terms');
    }
}
