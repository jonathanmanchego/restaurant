<?php

namespace restaurant\Http\Controllers;

use Illuminate\Http\Request;
use restaurant\models\restaurant;
use restaurant\Http\Requests\restaurant\formValidacion;
class restaurantController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = restaurant::all();
        $headers = restaurant::getHeaders();
        return view('sistema.restaurant.index',['data' => $data,'title' => 'RESTAURANT','action' => '/restaurant','headers' =>$headers]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $headers = restaurant::getPull();
        return view('sistema.restaurant.crear',['title' => 'RESTAURANT NUEVO' , 'action'=>'/restaurant','headers'=>$headers]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(formValidacion $request)
    {
        $rest = new restaurant();
        $rest->nombre = $request->input('nombre');
        $rest->direccion = $request->input('direccion');
        $rest->telefono1 = $request->input('telefono1');
        $rest->telefono2 = $request->input('telefono2');
        $rest->celular1 = $request->input('celular1');
        $rest->celular2 = $request->input('celular2');
        $rest->ruc = $request->input('ruc');
        $rest->save();
        return redirect('/sistema/restaurant');
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
        $rest = restaurant::find($id);
        $headers = restaurant::getPull();
        return view('sistema.restaurant.editar',['title'=>'RESTAURANT - EDITAR','action' => '/restaurant/'.$id,'data' => $rest,'headers' => $headers]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(formValidacion $request, $id)
    {
        $rest = restaurant::find($id);
        $rest->update($request->all());
        return redirect('/sistema/restaurant');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $rest = restaurant::find($id);
        $rest->delete();
        return redirect('/sistema/restaurant');
    }
}
