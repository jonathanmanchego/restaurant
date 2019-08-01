<?php

namespace restaurant\Http\Controllers;

use Illuminate\Http\Request;
use restaurant\models\unidad_medida;
use restaurant\Http\Requests\general\formAltValidacion;

class UnidadMedidaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = unidad_medida::all();
        $headers = unidad_medida::getHeaders();
        return view('sistema.unidad_medida.index',
            ['data' => $data, 'title' => 'UNIDAD DE MEDIDAS','headers' => $headers,'action' =>'/unidad_medida']); 
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $headers = unidad_medida::getPull();
        return view('sistema.unidad_medida.crear',['title' => 'UNIDAD DE MEDIDAS - NUEVO', 'action' => '/unidad_medida','headers' => $headers]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(formAltValidacion $request)
    {
        $tu = new unidad_medida();
        $tu->nombre = $request->input('nombre');
        $tu->save();
        return redirect('/sistema/unidad_medida');
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
        $td = unidad_medida::find($id);
        $headers = $td->getPull();
        return view('sistema.unidad_medida.editar',['title' => 'UNIDAD DE MEDIDAS - EDITAR','action' => '/unidad_medida/'.$id,'data' => $td,'headers' => $headers]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(formAltValidacion $request, $id)
    {
        $td = unidad_medida::find($id);
        $td->nombre = $request->input('nombre');
        $td->save();
        return redirect('/sistema/unidad_medida');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $td = unidad_medida::find($id);
        $td->delete();
        return redirect('/sistema/unidad_medida');
    }
}
