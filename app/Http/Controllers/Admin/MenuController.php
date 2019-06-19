<?php

namespace restaurant\Http\Controllers\Admin;

use Illuminate\Http\Request;
use restaurant\Http\Controllers\Controller;
use restaurant\Models\Admin\Menu;
use restaurant\Http\Requests\ValidarMenu;

class MenuController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()//listar-menus
    {
        return view('admin.menu.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()//crear
    {
        return view('admin.menu.crear');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ValidarMenu $request)//guardar
    {
        //dd($request); //parecido al var_dump+died
        //dd($request -> all());//solo imprimir los valores enviados
        Menu::create($request -> all());
        return redirect('admin/menu/crear')->with('mensaje','Menu creado con exito');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)//mostrar
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)//editar
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
    public function update(Request $request, $id)//actualizar
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)//eliminar
    {
        //
    }
}
