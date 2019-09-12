<?php

namespace restaurant\Http\Controllers;

use Illuminate\Http\Request;
use restaurant\models\tipo_carta;
use restaurant\Http\Requests\general\TipoCartaValidacion;

class TipoCartaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = tipo_carta::all();
        $headers = tipo_carta::getHeaders();
        return view('sistema.tipo_carta.index',
            ['data' => $data, 'title' => 'TIPOS_CARTA','headers' => $headers,'action' =>'/tipo_carta']); 
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $headers = tipo_carta::getPull();
        return view('sistema.tipo_carta.crear',['title' => 'TIPOS_CARTA - NUEVO', 'action' => '/tipo_carta','headers' => $headers]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(TipoCartaValidacion $request)
    {
        $tu = new tipo_carta();
        $tu->nombre = $request->input('nombre');
        $tu->save();
        return redirect('/sistema/tipo_carta');
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
        $td = tipo_carta::find($id);
        $headers = $td->getPull();
        return view('sistema.tipo_carta.editar',['title' => 'TIPOS_CARTA - EDITAR','action' => '/tipo_carta/'.$id,'data' => $td,'headers' => $headers]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(TipoCartaValidacion $request, $id)
    {
        $td = tipo_carta::find($id);
        $td->nombre = $request->input('nombre');
        $td->save();
        return redirect('/sistema/tipo_carta');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $td = tipo_carta::find($id);
        $td->delete();
        return redirect('/sistema/tipo_carta');
    }
}
