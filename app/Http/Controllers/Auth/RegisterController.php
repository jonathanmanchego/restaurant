<?php

namespace restaurant\Http\Controllers\Auth;

use restaurant\models\usuario;
use restaurant\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use restaurant\models\tipo_documento;
use restaurant\models\tipo_usuario;
use restaurant\models\usuario_tipousuario;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/sistema';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }
    public function showRegistrationForm()
    {
        $tipo_usu = tipo_usuario::all();
        $tipo_docs = tipo_documento::all();
        return view('auth.register',['tipo_docs' => $tipo_docs,'tipo_usu' => $tipo_usu]);
    }


    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'nombre' => ['required', 'string', 'max:100'],
            'apellido' => ['required', 'string', 'max:100'],
            'username' => ['required', 'string', 'max:45'],
            'password' => ['required', 'string', 'min:4'],
            'nrodocumento' => ['required', 'string', 'max:20'],
            'celular' => ['required', 'string', 'max:20'],
            'direccion' => ['required', 'string', 'max:100']
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \restaurant\User
     */
    protected function create(array $data)
    {
        $usu = usuario::create([
            'nombre' => $data['nombre'],
            'apellido' => $data['apellido'],
            'username' => $data['username'],
            'password' => Hash::make($data['password']),
            'tipo_documento_id' => $data['tipo_documento'],
            'nrodocumento' => $data['nrodocumento'],
            'telefono' => $data['telefono'],
            'celular' => $data['celular'],
            'direccion' => $data['direccion']
        ]);
        usuario_tipousuario::create([
            'usuario_id' => $usu['id'],
            'tipo_usuario_id' => $data['tipo_usuario_id'],
            'estado' => '1'
        ]);
        return $usu;
    }
}
