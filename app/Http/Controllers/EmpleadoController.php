<?php

namespace restaurant\Http\Controllers;

use Illuminate\Http\Request;
use restaurant\models\empleado;
use restaurant\models\tipo_empleado;
use restaurant\models\tipo_documento;
use Illuminate\Support\Facades\Hash;
use restaurant\models\zona;
use restaurant\Http\Requests\general\empleadosValidacion;


class EmpleadoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = empleado::getAll();
        $headers = empleado::getHeaders();
        // return $data;
        return view('sistema.empleados.index',['data'=>$data,'title'=> 'EMPLEADOS','action' => '/empleados','headers' => $headers]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $headers = empleado::getPull();
        $tipos = tipo_empleado::all();
        $tipoD = tipo_documento::all();
        $tipD = empleado::getTypes();
        $zonas = zona::all();
        return view('sistema.empleados.crear',['title' =>'EMPLEADO','action'=> '/empleados','headers' => $headers,'tiposEmpleados' => $tipos,'tiposDocs' => $tipoD,'tipos' => $tipD,'zonas' => $zonas]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(empleadosValidacion $data)
    {
        // return $data;
        $usu = empleado::create([
            'nombre' => $data['nombre'],
            'apellido' => $data['apellido'],
            'username' => $data['username'],
            'password' => Hash::make($data['password']),
            'tipo_documento_id' => $data['tipo_documento'],
            'nrodocumento' => $data['nrodocumento'],
            'telefono' => $data['telefono'],
            'celular' => $data['celular'],
            'direccion' => $data['direccion'],
            'zonas_id' => $data['zona_'],
            'tipo_empleado_id' => $data['tipo_empleado']
        ]);
        return redirect('/sistema/empleados');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
        //
    }
}
