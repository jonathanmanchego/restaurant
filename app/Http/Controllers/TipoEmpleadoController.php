<?php

namespace restaurant\Http\Controllers;

use Illuminate\Http\Request;
use restaurant\models\tipo_empleado;
use restaurant\Http\Requests\general\TipoEmpleadoValidacion;

class TipoEmpleadoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tu = new tipo_empleado();
        $data = $tu->all();
        $headers = $tu->getHeaders();
        // return $headers;
        return view('sistema.tipo_empleado.index',['data' => $data,'title' => 'TIPOS_EMPLEADOS','action'=> '/tipoempleado','headers' => $headers]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $headers = tipo_empleado::getPull();
        return view('sistema.tipo_empleado.crear',['title' => 'TIPOS_EMPLEADOS NUEVO','action'=>'/tipoempleado','headers' => $headers]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(TipoEmpleadoValidacion $request)
    {
        $tu = new tipo_empleado();
        $tu->nombre = $request->input('nombre');
        $tu->save();
        return redirect('/sistema/tipoempleado');
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
        $tu = tipo_empleado::find($id);
        $headers = tipo_empleado::getPull();
        return view('sistema.tipo_empleado.editar',['title' => 'TIPOS_EMPLEADOS - EDITAR','action' => '/tipoempleado/'.$id, 'data' => $tu,'headers' => $headers]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(TipoEmpleadoValidacion $request, $id)
    {
        $tu = tipo_empleado::find($id);
        $tu->nombre = $request->input('nombre');
        $tu->save();
        return redirect('/sistema/tipoempleado');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $tu = tipo_empleado::find($id);
        $tu->delete();
        return redirect('/sistema/tipoempleado');
    }
}
