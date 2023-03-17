<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use App\Models\Customers;
use App\Models\CustomerPasswordReset;
use Illuminate\Support\Str;
use Carbon\Carbon;
use Mail;
use Response;

class CustomerPasswordResetController extends Controller
{
    public function passwordReset(){
       return view('templates.default.screen.account_reset_email');
    }

    public function passwordForgot(Request $request){
        $email = $request->email;
        $token = Str::random(40);
        $customer = Customers::where('email', $email)->first();
        if($customer==null){
            return redirect()->back()->with('success', 'Email not exists.');
        }
        CustomerPasswordReset::updateOrCreate(['email'=>$email],['email' => $email, 'token' => $token, 'created_at' => Carbon::parse(date('Y-m-d'))->setTimezone('UTC')]);
        $data['email'] = $email;
        $data['token'] = $token;
        Mail::send('emails.reset_password', ['data' => $data], function($message) use ($email) {
            $message->to($email)->subject('Reset password [G&B Custom Embroidery]');
        });
        return redirect()->back()->with('success', 'Password reset link sent to your email.');
    }

    public function confirmPassView($id, $mail){
    	$token = $id;
    	$email = $mail;
    	return view('templates.default.screen.account_reset_confirm', compact('token', 'email'));
    }

    protected function validator(array $data)
    {
        return Validator::make($data, [
            'pass_token' => ['required'],
            'email' => ['required'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
    }

    public function confirmPassword(Request $request){

    	$this->validator($request->all())->validate();
    	$customer = CustomerPasswordReset::where('email', $request->email)->first();
    	if($customer==null){
    		return redirect('customer/password_forgot')->with('success', 'Link expired');
    	}
    	if($request->pass_token == $customer['token'] && $request->email == $customer['email']){
    		Customers::where('email', $request->email)->update(['password' => Hash::make($request['password'])]);
    		CustomerPasswordReset::where('email', $request->email)->delete();
    	}
    	return redirect('customer/login')->with('success', 'Password reset successfully');
    }
}
