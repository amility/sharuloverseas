<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
class ContactController extends Controller
{
   public function index(Request $request)
   {
    $request->validate([
        'name'=>'required',
        'email'=>'required|email|unique:contact,email',
        'phone' => 'required',
       
    ]);
    unset($request['_token']);
    DB::table('contact')->insert($request->all());
    return redirect()->back()->with('msg','Contact save successfully');
   } 
   
   public function index1(Request $request)
   {
    $request->validate([
        'name'=>'required',
        'email'=>'required',
        'phone' => 'required',
       
    ]);
    unset($request['_token']);
    DB::table('contact')->insert($request->all());
    return response()->json(['success'=>'Saved']);
   } 
}
