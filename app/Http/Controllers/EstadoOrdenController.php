<?php

namespace restaurant\Http\Controllers;

use Illuminate\Http\Request;
use restaurant\models\estado_ordenes;
use restaurant\Http\Requests\general\estadoOrdenValidacion;

class EstadoOrdenController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tu = new estado_ordenes();
        $data = $tu->all();
        $headers = $tu->getHeaders();
        // return $headers;
        return view('sistema.estado_ordenes.index',['data' => $data,'title' => 'ESTADO_ORDENES','action'=> '/estado_ordenes','headers' => $headers]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $headers = estado_ordenes::getPull();
        return view('sistema.estado_ordenes.crear',['title' => 'ESTADO_ORDENES NUEVO','action'=>'/estado_ordenes','headers' => $headers]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(estadoOrdenValidacion $request)
    {
        $tu = new estado_ordenes();
        $tu->nombre = $request->input('nombre');
        $tu->save();
        return redirect('/sistema/estado_ordenes');
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
        $tu = estado_ordenes::find($id);
        $headers = estado_ordenes::getPull();
        return view('sistema.estado_ordenes.editar',['title' => 'ESTADO_ORDENES - EDITAR','action' => '/estado_ordenes/'.$id, 'data' => $tu,'headers' => $headers]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(estadoOrdenValidacion $request, $id)
    {
        $tu = estado_ordenes::find($id);
        $tu->nombre = strtoupper($request->input('nombre'));
        $tu->save();
        return redirect('/sistema/estado_ordenes');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $tu = estado_ordenes::find($id);
        $tu->delete();
        return redirect('/sistema/estado_ordenes');
    }
}
