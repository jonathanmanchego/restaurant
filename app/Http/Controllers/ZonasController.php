<?php

namespace restaurant\Http\Controllers;

use Illuminate\Http\Request;
use restaurant\zona;

class ZonasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $zona = new zona();
        $data = $zona->all();
        $headers = $zona->getHeaders();
        return view('sistema.zona.index',['data' => $data,'title' => 'ZONAS','headers' => $headers,'action' => '/sistema/zona']);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $headers = zona::getHeaders();
        return view('sistema.zona.crear',['title' => 'ZONAS NUEVO','action' => '/sistema/zona','headers' => $headers]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $zona = new zona();
        $zona->nombre = $request->input('nombre');
        $zona->save();
        return redirect('/sistema/zona');
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
        $zona = zona::find($id);
        $headers = $zona->getHeaders();
        return view('sistema.zona.editar',['title' => 'ZONA - EDITAR','action' => '/sistema/zona/'.$id, 'data' => $zona,'headers' => $headers]);
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
        $zona = zona::find($id);
        $zona->nombre = $request->input('nombre');
        $zona->save();
        return redirect('/sistema/zona');
        // return redirect(url($))
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $zona = zona::find($id);
        $zona->delete();
        return redirect('/sistema/zona');
    }
}
