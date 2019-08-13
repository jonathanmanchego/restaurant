<?php

namespace restaurant\Http\Controllers;

use Illuminate\Http\Request;
use restaurant\models\producto;
use restaurant\Http\Requests\general\productoValidacion;
use restaurant\models\ingrediente;

class ProductoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = producto::all();
        $headers = producto::getHeaders();
        return view('sistema.producto.index',['data' => $data,'title' => 'PRODUCTO','action' => '/producto' , 'headers' => $headers]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $headers = producto::getPull();
        $types = producto::getTypes();
        
        // return $datos_aux;
        return view('sistema.producto.crear',['title' => 'PRODUCTO - NUEVO' ,'action' => '/producto','headers' => $headers,'tipos' => $types]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(productoValidacion $request)
    {
        $p = new producto();
        $p->nombre = $request->nombre;
        $p->imagen = null;
        if($request->hasFile('image')){
            $file = $request->file('image');
            $name = $request->nombre.'.'.$file->extension();
            $file->move(public_path().'/uploads',$name);
            $p->imagen = $name;
        }
        $p->video = null;
        if($request->hasFile('video')){
            $file2 = $request->file('video');
            $name = $request->nombre.'.'.$file2->extension();
            $file2->move(public_path().'/uploads',$name);
            $p->video = $name;
        }
        $p->descripcion = $request->descripcion;
        $p->precio = $request->precio;
        $p->codigo = $request->codigo;
        $p->eliminado = $request->eliminado;
        $p->tiempo_espera = $request->tiempo_espera;
        $p->fecha_validez = $request->fecha_validez;
        $p->save();
        // return $name;
        return redirect('/sistema/producto');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $dato = producto::find($id);
    	return view('productos.producto',compact('dato'));
    }
    /**
     * Exhibicion de los productos
     */
    public function exhibicion(){
        $data = producto::all();
    	return view('productos.productos',compact('data'));	
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = producto::getOne($id);
        $headers = producto::getPull();
        $datos_aux = [
            'title' => 'Ingredientes',
            'headers' => ingrediente::getPull(),
            'content' => ingrediente::getAll()
        ];
        // return $data;
        return view('sistema.producto.editar',['datos_aux' => $datos_aux,'title' => "PRODUCTO - EDITAR",'action' => '/producto/'.$id,'data' => $data,'headers' => $headers]);
    }
    public function addIngrediente(Request $data){
        $p = producto::find($data->id);
        $p->addIngrediente($data->ingrediente);
    }
    public function removeIngrediente(Request $data){
        $p = producto::find($data->id);
        $p->removeIngrediente($data->ingrediente);
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(productoValidacion $request, $id)
    {
        $p = producto::find($id);
        $p->nombre = $request->nombre;
        if($request->hasFile('image')){
            $file = $request->file('image');
            $name = $request->nombre.'.'.$file->extension();
            $file->move(public_path().'/uploads',$name);
            $p->imagen = $name;
        }
        if($request->hasFile('video')){
            $file2 = $request->file('video');
            $name = $request->nombre.'.'.$file2->extension();
            $file2->move(public_path().'/uploads',$name);
            $p->video = $name;
        }
        $p->descripcion = $request->descripcion;
        $p->precio = $request->precio;
        $p->eliminado = $request->eliminado;
        $p->tiempo_espera = $request->tiempo_espera;
        $p->fecha_validez = $request->fecha_validez;
        $p->save();
        // return $name;
        return redirect('/sistema/producto');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $p = producto::find($id);
        $p->delete();
        return redirect('/sistema/producto');
    }
}
