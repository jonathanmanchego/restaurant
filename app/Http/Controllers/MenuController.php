<?php

namespace restaurant\Http\Controllers;

use Illuminate\Http\Request;
use restaurant\models\menu;
use restaurant\Http\Requests\menu\MenuValidacion;
class MenuController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = menu::all();
        $headers = menu::getHeaders();
        return view('sistema.menu.index',['data' => $data,'title' => 'MENU','action' => '/menu','headers' =>$headers]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $headers = menu::getPull();
        return view('sistema.zona.crear',['title' => 'MENU NUEVO','action' => '/menu','headers'=>$headers]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(MenuValidacion $request)
    {
        menu::create($request->all());
        // $menu->save();
        return redirect('/sistema/menu')->with('confirmacion',"Menu creado con exito");
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
