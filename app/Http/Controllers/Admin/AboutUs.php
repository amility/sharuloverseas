<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\About;
use Flash;
use DB;

class AboutUs extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $about= About::all();
        //dd($about);
        
    return view('admin.about_us.index',)
           ->with('about', $about); 
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      return view('admin.about_us.create');
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
            'about_us' => 'required',
            'title'=>'required'
        ]);
        $status="0";
        $input['title'] = $request['title'];
        $input['about_us'] = $request['about_us'];
        $input['is_active'] = $status;

        About::create($input);
        Flash::success('About Us saved successfully.');
        return redirect('c~AiN:2)Y42,&*/aboutus');
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
        //
        $data= About::find($id);

        if (empty($data)) {
            Flash::error('about Us not found');

            return redirect('c~AiN:2)Y42,&*/aboutus');;
        }

        return view('admin.about_us.show')->with('about', $data);
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
         $about = About::find($id);
         //dd($about);

        if (empty($about)) {
            Flash::error('About Us not found');

            return redirect('c~AiN:2)Y42,&*/aboutus');;
        }

        return view('admin.about_us.edit')->with('about', $about);
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
        //
         $about = About::find($id);

        if (empty($about)) {
            Flash::error('About Us not found');
            return redirect('c~AiN:2)Y42,&*/aboutus');
        }
        $input = $request->all();
        $about->about_us = $request->about_us;
        $about->title = $request->title;
       $about->save();

        Flash::success('About Us updated successfully.');

        return redirect('c~AiN:2)Y42,&*/aboutus');
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
         $about = About::find($id);

        if (empty($about)) {
            Flash::error('About Us not found');

            return redirect('c~AiN:2)Y42,&*/aboutus');
        }

        $about->delete($id);

        Flash::success('About Us deleted successfully.');

        return  redirect('c~AiN:2)Y42,&*/aboutus');
    }
    public function updateStatus($id,Request $request){
        $status= $request['is_active'];
       if($status=="1"){
        $singlestatus="0";
        $updatestatus="0";
       }else{
        $singlestatus="1";
        $updatestatus="0";
       }
     DB::table('about_us')->where('id',$id)->update(array(
                                 'is_active'=>$singlestatus));
     DB::table('about_us')->where('id','!=',$id)->update(array(
                                 'is_active'=>$updatestatus));
     Flash::success('About Us Status Updated successfully.');
     return  redirect('c~AiN:2)Y42,&*/aboutus');

    }
}
