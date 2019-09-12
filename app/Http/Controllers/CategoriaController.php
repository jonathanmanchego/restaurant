<?php

namespace restaurant\Http\Controllers;

use Illuminate\Http\Request;
use restaurant\models\categoria;
use restaurant\Http\Requests\general\CategoriaValidacion;
class CategoriaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = categoria::all();
        $headers = categoria::getHeaders();
        return view('sistema.categoria.index',
            ['data' => $data, 'title' => 'CATEGORIAS','headers' => $headers,'action' =>'/categoria']); 
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $headers = categoria::getPull();
        return view('sistema.categoria.crear',['title' => 'CATEGORIAS - NUEVO', 'action' => '/categoria','headers' => $headers]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CategoriaValidacion $request)
    {
        $tu = new categoria();
        $tu->nombre = $request->input('nombre');
        $tu->save();
        return redirect('/sistema/categoria');
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
        $td = categoria::find($id);
        $headers = $td->getPull();
        return view('sistema.categoria.editar',['title' => 'CATEGORIAS - EDITAR','action' => '/categoria/'.$id,'data' => $td,'headers' => $headers]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CategoriaValidacion $request, $id)
    {
        $td = categoria::find($id);
        $td->nombre = $request->input('nombre');
        $td->save();
        return redirect('/sistema/categoria');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $td = categoria::find($id);
        $td->delete();
        return redirect('/sistema/categoria');
    }
}
