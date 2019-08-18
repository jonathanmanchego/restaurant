<?php

namespace restaurant\Http\Controllers;

use Illuminate\Http\Request;
use restaurant\models\mesa;
use restaurant\models\producto;
use restaurant\models\carta;
use restaurant\models\carta_item;

class OrdenController extends Controller
{
    public function listar()
    {
        $arr = array (
            array("id" => "1",
            "mesa" => "03",  
            "estado" => "atendido",
            "hora" => "19:34:24"
            ),
            array("id" => "2",
            "mesa" => "04",  
            "estado" => "pendiente",
            "hora" => "19:39:10"
            ),
            array("id" => "3",
            "mesa" => "02",  
            "estado" => "pendiente",
            "hora" => "19:40:13"
            )
            );
        return view('sistema.chef.index',['title' => 'ORDENES','data' => $arr]);
    }
    public function detalle(Request $request)
    {
        $mesas = mesa::where('id', $request->id)->first();//es ejemplo para mostrar
        return $mesas;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('sistema.orden.index',['title' => 'ORDENES','action' => '/orden']);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //$headers = zona::getPull();
        $mesas = mesa::all();
        $productos = producto::all();
        $cartaActiva = carta::where('estado', 1)->first();
        // $productos = carta_item::with('productos')->where('carta_id', $cartaActiva->id)->get();
        // return $productos;
        return view('sistema.orden.crear', ['title' => 'NUEVA ORDEN','action' => '/orden', 'mesas' => $mesas, 'productos' => $productos]);
        //return view('sistema.orden.crear',['title' => 'NUEVA ORDEN','action' => '/orden']);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
