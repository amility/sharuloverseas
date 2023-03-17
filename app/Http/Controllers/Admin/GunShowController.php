<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Gunshow;
use Flash;
use DB;
use DateTime;

class GunshowController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
         $gunshow= Gunshow::all();
        //dd($about);
        
    return view('admin.gunshow.index',)
           ->with('gunshow', $gunshow);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('admin.gunshow.create');
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
            'day' => 'required',
            'month'=>'required',
            'year'=>'required',
            'show_name'=>'required',
            'target_link'=>'required'

        ]);
        $status="0";
    
        $monthNum =$request['month'];
        $dateObj   = DateTime::createFromFormat('!m', $monthNum);
        $monthName = $dateObj->format('F'); 
        $fyear=$request['year'];
        $fmonth= $request['month'];
        $fday=$request['day']; 
        $show_date = strftime("%F", strtotime($fyear."-".$fmonth."-".$fday));
        


       $input['day']=$request['day'];
       $input['month']=$monthName;
       $input['year']=$request['year'];
       $input['show_name']=$request['show_name'];
       $input['target_link']=$request['target_link'];
       $input['show_date']=$show_date;
       $input['is_active']=$status;
       
        Gunshow::create($input);
        Flash::success(' Gun Show  saved successfully.');
        return redirect('c~AiN:2)Y42,&*/gunshow');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data= Gunshow::find($id);

        if (empty($data)) {
            Flash::error('Gunshow not found');

            return redirect('c~AiN:2)Y42,&*/gunshow');;
        }

        return view('admin.gunshow.show')->with('gunshow', $data);    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
      $gunshow = Gunshow::find($id);
         //dd($terms);

        if (empty($gunshow)) {
            Flash::error('Gun Show
 not found');

            return redirect('c~AiN:2)Y42,&*/gunshow');;
        }

        return view('admin.gunshow.edit')->with('gunshow', $gunshow);
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
         $gunshow= Gunshow::find($id);

        if (empty($gunshow)) {
            Flash::error('Gun Show not found');
            return redirect('c~AiN:2)Y42,&*/gunshow');
        }

        $monthNum =$request->month;
        $dateObj   = DateTime::createFromFormat('!m', $monthNum);
        $monthName = $dateObj->format('F'); 




        $fyear=$request->year;
        $fmonth= $request->month;
        $fday=$request->day; 
        $show_date = strftime("%F", strtotime($fyear."-".$fmonth."-".$fday));
        $input = $request->all();
        //$privacy->privacy = $request->privacy;
        $gunshow->day = $request->day;
        $gunshow->month =  $monthName;
        $gunshow->year = $request->year;
        $gunshow->show_name = $request->show_name;
        $gunshow->target_link = $request->target_link;
        $gunshow->show_date=$show_date;
       $gunshow->save();

        Flash::success('Gun Show updated successfully.');

        return redirect('c~AiN:2)Y42,&*/gunshow');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $gunshow = Gunshow::find($id);

        if (empty($gunshow)) {
            Flash::error('Gun Show not found');

            return redirect('c~AiN:2)Y42,&*/gunshow');
        }

        $gunshow->delete($id);

        Flash::success('Gun Show deleted successfully.');

        return  redirect('c~AiN:2)Y42,&*/gunshow');
    }
   /* public function UpdateGunshowStatus($id, Request $request){
        $status= $request['is_active'];
       if($status=="1"){
        $singlestatus="0";
        $updatestatus="0";
       }else{
        $singlestatus="1";
        $updatestatus="0";
       }
     DB::table('gunshow')->where('id',$id)->update(array(
                                 'is_active'=>$singlestatus));
     DB::table('gunshow')->where('id','!=',$id)->update(array(
                                 'is_active'=>$updatestatus));
     Flash::success('Gun Show Status Updated successfully.');
     return  redirect('admin/gunshow');
    }*/
}
