<?php

namespace restaurant\Http\Controllers;

use Illuminate\Http\Request;
use restaurant\models\estado_mesa;
use restaurant\Http\Requests\general\estadoMesaValidacion;
class EstadoMesaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = estado_mesa::all();
        $headers = estado_mesa::getHeaders();
        return view('sistema.estado_mesa.index',['data' => $data,'title' => 'ESTADO MESA','action' => '/estado_mesas','headers' =>$headers]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $headers = estado_mesa::getPull();
        return view('sistema.estado_mesa.crear',['title' => 'ESTADO MESA - NUEVO','action' => '/estado_mesas','headers' => $headers]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(estadoMesaValidacion $request)
    {
        estado_mesa::create($request->all());
        return redirect('/sistema/estado_mesas');
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
        $estado_mesa = estado_mesa::find($id);
        $headers = estado_mesa::getPull();
        return view('sistema.estado_mesa.editar',['title' => 'ESTADO MESA - EDITAR','action' => '/estado_mesas/'.$id,'data' => $estado_mesa,'headers' => $headers]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(estadoMesaValidacion $request, $id)
    {
        estado_mesa::find($id)->update($request->all());
        return redirect('/sistema/estado_mesa');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        estado_mesa::destroy($id);
        return redirect('/sistema/estado_mesas');
    }
}
