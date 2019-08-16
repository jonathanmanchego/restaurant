<?php

namespace restaurant\Http\Controllers\Auth;

use restaurant\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

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
    protected $redirectTo = '/';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest:web')->except('logout');
    }
    protected function loggedOut()
    {
        return redirect('/login')->with('success','Sesion Finalizada');
    }

    protected function authenticated()
    {
        return redirect('/')->with('success','Ingreso Exitoso');
    }

    public function username(){
        return 'username';
    }
}
