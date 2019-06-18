<?php

namespace restaurant\Http\Controllers;

use Illuminate\Http\Request;
use restaurant\tipo_usuario;

class TipoUsuarioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tu = new tipo_usuario();
        $data = $tu->all();
        $headers = $tu->getHeaders();
        // return $headers;
        return view('sistema.tipo_usuario.index',['data' => $data,'title' => 'TIPOS_USUARIO','action'=> '/sistema/tipousuario','headers' => $headers]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $headers = tipo_usuario::getHeaders();
        return view('sistema.tipo_usuario.crear',['title' => 'TIPOS_USUARIO NUEVO','action'=>'/sistema/tipousuario','headers' => $headers]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $tu = new tipo_usuario();
        $tu->nombre = $request->input('nombre');
        $tu->descripcion = $request->input('descripcion');
        $tu->save();
        return redirect('/sistema/tipousuario');
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
        $tu = tipo_usuario::find($id);
        $headers = tipo_usuario::getHeaders();
        return view('sistema.tipo_usuario.editar',['title' => 'TIPOS_USUARIO - EDITAR','action' => '/sistema/tipousuario/'.$id, 'data' => $tu,'headers' => $headers]);
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
        $tu = tipo_usuario::find($id);
        $tu->nombre = $request->input('nombre');
        $tu->descripcion = $request->input('descripcion');
        $tu->save();
        return redirect('/sistema/tipousuario');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $tu = tipo_usuario($id);
        $tu->delete();
        return redirect('/sistema/tipousuario');
    }
}
