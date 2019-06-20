<?php

namespace restaurant\Http\Controllers;

use Illuminate\Http\Request;
use restaurant\models\tipo_documento;
use restaurant\Http\Requests\general\formAltValidacion;
class TipoDocumentoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = tipo_documento::all();
        $headers = tipo_documento::getHeaders();
        return view('sistema.tipo_documento.index',
            ['data' => $data, 'title' => 'TIPOS DOCUMENTOS','headers' => $headers,'action' =>'/tipodocumento']); 
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $headers = tipo_documento::getPull();
        return view('sistema.tipo_documento.crear',['title' => 'TIPOS DOCUMENTOS - NUEVO', 'action' => '/tipodocumento','headers' => $headers]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(formAltValidacion $request)
    {
        $tu = new tipo_documento();
        $tu->nombre = $request->input('nombre');
        $tu->descripcion = $request->input('descripcion');
        $tu->save();
        return redirect('/sistema/tipodocumento');
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
        $td = tipo_documento::find($id);
        $headers = $td->getPull();
        return view('sistema.tipo_documento.editar',['title' => 'TIPOS DOCUMENTOS - EDITAR','action' => '/tipodocumento/'.$id,'data' => $td,'headers' => $headers]);
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
        $td = tipo_documento::find($id);
        $td->nombre = $request->input('nombre');
        $td->descripcion = $request->input('descripcion');
        $td->save();
        return redirect('/sistema/tipodocumento');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $td = tipo_documento::find($id);
        $td->delete();
        return redirect('/sistema/tipodocumento');
    }
}
