<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Auth;

class CustomerLoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->middleware('customer')->except('logout');
    }

    public function userLogin(Request $request)
    {
        if (!empty(Auth::guard('customer')->user())) {
            return redirect()->intended('/customer');
        }

        return view('templates.default.screen.account_login');
    }

    public function loginCustomer(Request $request)
    {
        $this->validate($request, [
            'email'   => 'required|email',
            'password' => 'required'
        ]);
        $remember_me = $request->get('remember') ? true : false;
        if (Auth::guard('customer')->attempt(['email' => $request->email, 'password' => $request->password, 'status' => '1'], $remember_me)) {
            return redirect()->intended('/customer');
        }

        //return back()->withInput($request->only('email', 'password'));
        return back()->with('error', 'Invalid credential or account is not verified');        
    }

    public function customerLogout(Request $request)
    {
        $this->guard('customer')->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        if ($response = $this->loggedOut($request)) {
            return redirect()->intended('/customer');
        }

        return $request->wantsJson() ? new JsonResponse([], 204) : redirect('/customer/login');
    }
}
