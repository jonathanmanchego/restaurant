<?php

namespace restaurant\Http\Controllers\sisAuth;

use restaurant\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
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
    protected $redirectTo = '/sistema';
    protected function guard(){
        return Auth::guard('sis');
    }
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        
        $this->middleware('guest')->except('logout');
    }
    protected function loggedOut()
    {
        return redirect('/empleados/login')->with('success','Sesion Finalizada');
    }

    protected function authenticated()
    {
        return redirect('/sistema')->with('success','Ingreso Exitoso');
    }

    public function username(){
        return 'username';
    }
    public function showLoginForm()
    {
        return view('sis-auth.login');
    }
}
