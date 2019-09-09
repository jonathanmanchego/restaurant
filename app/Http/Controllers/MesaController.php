<?php

namespace restaurant\Http\Controllers;

use Illuminate\Http\Request;
use restaurant\models\mesa;
use restaurant\Http\Requests\general\mesaValidacion;
use restaurant\models\estado_mesa;
use restaurant\models\ambiente;
use restaurant\Http\Requests\general\ambienteValidacion;
class MesaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = mesa::all();
        $headers = mesa::getHeaders();
        return view('sistema.mesa.index',['data' => $data,'title' => 'MESA','action' => '/mesa','headers' =>$headers]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $headers = mesa::getPull();
        $estados = estado_mesa::all();
        $ambientes = ambiente::all();
        return view('sistema.mesa.crear',['title' => 'MESAS NUEVO','action' => '/mesa','headers' => $headers,'estados' => $estados,'ambientes' => $ambientes]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(mesaValidacion $request)
    {
        mesa::create($request->all());
        return redirect('/sistema/mesa');
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
        $mesa = mesa::find($id);
        $headers = mesa::getPull();
        $estados = estado_mesa::all();
        $ambientes = ambiente::all();
        return view('sistema.mesa.editar',['title' => 'MESA - EDITAR','action' => '/mesa/'.$id,'data' => $mesa,'headers' => $headers,'estados' => $estados, 'ambientes' =>$ambientes]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(mesaValidacion $request, $id)
    {
        mesa::find($id)->update($request->all());
        return redirect('/sistema/mesa');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        mesa::destroy($id);
        return redirect('/sistema/mesa');
    }
    public function layout()
    {
        $data = ambiente::all();
        return view('sistema.mesa.layout-mesa',['data' => $data,'title' => 'MESAS LAYOUT','action' => '/mesas_layout']);
    }
    public function cambiarAmbiente(Request $request)
    {
        $data = mesa::where('ambiente_id', $request->idAmbiente)->get();
        return $data;
    }
    public function saveLayout(Request $request)
    {
        $mensaje ="";
        $mesas=explode("|",$request->coordenadasxy);
        $nm=count($mesas)-1;
			for($i=0;$i<$nm;$i++)
			{	
                $m=explode("*",$mesas[$i]);
                mesa::find($m[0])->update(['coordenadas' => $m[1]]);
                $mensaje .= $i . " save _ ";
            }
        return $mensaje;
    }
    public function mesaShow()
    {
        $data = ambiente::all();
        return view('sistema.mesa.show-mesa',['data' => $data,'title' => 'MESAS LAYOUT','action' => '/mesas_layout']);
    }
}
