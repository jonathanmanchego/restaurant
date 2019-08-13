<?php

namespace restaurant\Http\Controllers\Auth;

use restaurant\models\usuario;
use restaurant\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use restaurant\models\tipo_documento;
use restaurant\models\zona;
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
    protected $redirectTo = '/';

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
        $tipo_docs = tipo_documento::all();
        $zonas = zona::all();
        return view('auth.register',['tipo_docs' => $tipo_docs,'zonas' => $zonas]);
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
            'password' => ['required', 'string', 'min:8'],
            'tipo_documento' => ['required','numeric'],
            'nrodocumento' => ['required', 'string', 'max:20','unique:usuario,nrodocumento'],
            'telefono' => ['nullable'],
            'celular' => ['required', 'string', 'max:20'],
            'direccion' => ['required', 'string', 'max:100'],
            'zona' => ['numeric']
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
            'direccion' => $data['direccion'],
            'zonas_id' => $data['zona']
        ]);
        return $usu;
    }
}
