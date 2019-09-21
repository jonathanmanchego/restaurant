<?php

namespace restaurant\Http\Controllers;

use Illuminate\Http\Request;
use restaurant\models\tipo_orden;
use restaurant\Http\Requests\general\tipoOrdenValidacion;
class TipoOrdenController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = tipo_orden::all();
        $headers = tipo_orden::getHeaders();
        return view('sistema.tipo_orden.index',['data' => $data,'title' => 'TIPO_ORDEN','action' => '/tipo_orden','headers' =>$headers]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $headers = tipo_orden::getPull();
        return view('sistema.tipo_orden.crear',['title' => 'TIPO ORDEN - NUEVO', 'action' => '/tipo_orden','headers' => $headers]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(tipoOrdenValidacion $request)
    {
        // tipo_orden::create($request->all());
        $tp = new tipo_orden();
        $tp->nombre = strtoupper($request->input('nombre'));
        $tp->save();
        return redirect('/sistema/tipo_orden');
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
        $tipoorden = tipo_orden::find($id);
        $headers = tipo_orden::getPull();
        return view('sistema.tipo_orden.editar',['title' => 'TIPO ORDEN - EDITAR','action' => '/tipo_orden/'.$id,'data' => $tipoorden,'headers' => $headers]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(tipoOrdenValidacion $request, $id)
    {
        $tp = tipo_orden::find($id);
        $tp->nombre = strtoupper($request->input('nombre'));
        $tp->save();
        return redirect('/sistema/tipo_orden');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        tipo_orden::destroy($id);
        return redirect('/sistema/tipo_orden');
    }
}
