<?php

namespace restaurant\Http\Controllers;

use Illuminate\Http\Request;
use restaurant\models\ambiente;
use restaurant\Http\Requests\general\ambienteValidacion;
class AmbienteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = ambiente::all();
        $headers = ambiente::getHeaders();
        return view('sistema.ambiente.index',['data' => $data,'title' => 'AMBIENTE','action' => '/ambiente','headers' =>$headers]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $headers = ambiente::getPull();
        return view('sistema.ambiente.crear',['title' => 'AMBIENTE NUEVO','action' => '/ambiente','headers' => $headers]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ambienteValidacion $request)
    {
        ambiente::create($request->all());
        return redirect('/sistema/ambiente');
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
        $ambiente = ambiente::find($id);
        $headers = ambiente::getPull();
        return view('sistema.ambiente.editar',['title' => 'AMBIENTE - EDITAR','action' => '/ambiente/'.$id,'data' => $ambiente,'headers' => $headers]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ambienteValidacion $request, $id)
    {
        ambiente::find($id)->update($request->all());
        return redirect('/sistema/ambiente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        ambiente::destroy($id);
        return redirect('/sistema/ambiente');
    }
}
