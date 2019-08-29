<?php

namespace restaurant\Http\Controllers\sisAuth;

use restaurant\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;
use restaurant\models\sucursal;
use Illuminate\Http\Request;
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
        
        $this->middleware('guest:sis')->except('logout');
    }
    protected function loggedOut()
    {
        return redirect('/empleados/login')->with('success','Sesion Finalizada');
    }

    protected function authenticated(Request $request, $user)
    {
        $user->tipo;
        return redirect()->intended($this->redirectPath())->with('success','Ingreso Exitoso');
    }

    public function username(){
        return 'username';
    }
    public function showLoginForm()
    {
        $sli = sucursal::take(3)->get();
        return view('sis-auth.login',['sli' => $sli]);
    }
}
