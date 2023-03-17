<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use Flash;

class ContactController extends Controller
{
    public function index()
    {
      $contact_list = DB::table('contact')->orderby('id','desc')->get();
       
        return view('admin.contact.index')->with('contact_list', $contact_list);


    }
    public function show($id)
    {
      $data = DB::table('contact')->where('id',$id)->first();

        if (empty($data)) {
            Flash::error('Contact not found');

            return redirect('c~AiN:2)Y42,&*/contactUs');;
        }

        return view('admin.contact.show')->with('subscriber', $data);    
    }

    public function destroy($id)
    {
      $contact = DB::table('contact')->where('id',$id)->first();

      if (empty($contact)) {
          Flash::error('Contact not found');

          return redirect('c~AiN:2)Y42,&*/contactUs');
      }

      DB::table('contact')->where('id',$id)->delete($id);

      Flash::success('Contact deleted successfully.');

      return  redirect('c~AiN:2)Y42,&*/contactUs');
    }
}
