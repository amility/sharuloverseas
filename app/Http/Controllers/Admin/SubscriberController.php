<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Subscriber;
use Flash;
use DB;
use Response;

class SubscriberController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $subscriber=Subscriber::all();
        //dd($subscriber);
        return view('admin.subscriber.index',)
           ->with('subscriber', $subscriber);


    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
         $data= Subscriber::find($id);

        if (empty($data)) {
            Flash::error('Subscriber not found');

            return redirect('admin/subscriber');;
        }

        return view('admin.subscriber.show')->with('subscriber', $data);    
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
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $subscriber = Subscriber::find($id);

        if (empty($subscriber)) {
            Flash::error('Subscriber not found');

            return redirect('admin/subscriber');
        }

        $subscriber->delete($id);

        Flash::success('Subscriber deleted successfully.');

        return  redirect('admin/subscriber');
    }
    public function subscriberChangeStatus(Request $request){
        //dd($request);
         $user = Subscriber::find($request['id']);
        $user->is_active = $request['is_active'];

        $data = $user->save();
        if($data){
           Flash::success('Subscriber status updated successfully.');

        return redirect('admin/subscriber');
        }else{
            Flash::error('Something went wronge.');

        return redirect('admin/subscriber');
        }
  
    }
}
