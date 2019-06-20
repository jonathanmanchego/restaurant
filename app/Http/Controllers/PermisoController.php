<?php

namespace restaurant\Http\Controllers;

use Illuminate\Http\Request;
use restaurant\models\permiso;
use restaurant\Http\Requests\general\permisoValidacion;
class PermisoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = permiso::all();
        $headers = permiso::getHeaders();
        return view('sistema.permiso.index',['data'=>$data,'title' => 'Permiso','action' => '/permiso','headers' => $headers]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $headers = permiso::getPull();
        return view('sistema.permiso.crear',['title' => 'PERMISO NUEVO' , 'action' => '/permiso','headers' => $headers]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(permisoValidacion $request)
    {
        permiso::create($request->all());
        return redirect('/sistema/permiso');
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
        $permiso = permiso::find($id);
        $headers = permiso::getPull();
        return view('sistema.permiso.editar',['title' => 'PERMISO - EDITAR','action' => '/permiso/'.$id, 'data' => $permiso,'headers' => $headers]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(permisoValidacion $request, $id)
    {
        permiso::find($id)->update($request->all());
        return redirect('/sistema/permiso');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        permiso::destroy($id);
        return redirect('/sistema/permiso');
    }
}
