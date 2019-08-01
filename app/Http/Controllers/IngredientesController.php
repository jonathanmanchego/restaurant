<?php

namespace restaurant\Http\Controllers;

use Illuminate\Http\Request;
use restaurant\models\ingrediente;
use restaurant\models\unidad_medida;
use restaurant\Http\Requests\restaurant\unidadValidacion;

class IngredientesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $in = ingrediente::getAll();
        $headers = ingrediente::getHeaders();
        // return $in;
        return view('sistema.ingredientes.index', ['data' => $in, 'title' => 'INGREDIENTES', 'action' => '/ingredientes', 'headers' => $headers]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $headers = ingrediente::getPull();
        $unidad = unidad_medida::all();
        return view('sistema.ingredientes.crear',['title' =>'INGREDIENTE','action'=> '/ingredientes','headers' => $headers,'medidas' => $unidad]);
     }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(unidadValidacion $request)
    {
        $in = new ingrediente();
        $in->nombre = $request->nombre;
        $in->cantidad = $request->cantidad;
        $in->precio_compra = $request->precio_compra;
        $in->unidad_medida_id = $request->unidadMedida;
        $in->save();
        return redirect('/sistema/ingredientes');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = ingrediente::getOne($id);
        $headers = ingrediente::getPull();
        $unidad = unidad_medida::all();
        return view('sistema.ingredientes.editar',['title' => "INGREDIENTE - EDITAR",'action' => '/ingredientes/'.$id,'data' => $data,'headers' => $headers,'medidas'=> $unidad]);
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
        $c = ingrediente::find($id);
        $c->nombre = $request->nombre;
        $c->cantidad = $request->cantidad;
        $c->precio_compra = $request->precio_compra;
        $c->unidad_medida_id = $request->unidadMedida;
        $c->save();
        return redirect('/sistema/ingredientes');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $in = ingrediente::find($id);
        $in->delete();
        return redirect('/sistema/ingredientes');
    }
}
