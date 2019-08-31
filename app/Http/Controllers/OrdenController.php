<?php

namespace restaurant\Http\Controllers;

use Illuminate\Http\Request;
use restaurant\models\mesa;
use restaurant\models\producto;
use restaurant\models\carta;
use restaurant\models\carta_item;
use JavaScript;
use restaurant\models\detalle_orden;
use restaurant\models\empleado;
use restaurant\models\estado_ordenes;
use restaurant\models\orden;
use restaurant\models\tipo_orden;
use Auth;
use restaurant\models\estado_mesa;
use restaurant\models\usuario;

class OrdenController extends Controller
{
    
    public function listar()
    {
        $ordenes = orden::all();
        return view('sistema.chef.index',['title' => 'ORDENES','data' => $ordenes]);
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
    public function index(Request $req)
    {
        if($req->ajax()){
            $ordenes = orden::orderBy('id','desc')->get();
            foreach ($ordenes as $key => $value) {
                $value->getDetalleOrdenes;
                $value->tipo;
                $value->estado;
                $value->mesa;
            }
            return $ordenes;
        }else{
            return view('sistema.orden.index',['title' => 'ORDENES','action' => '/orden']);
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function new()
    {
        //$headers = zona::getPull();
        $mesas = mesa::all();
        $productos = producto::all();
        $cartaActiva = carta::where('estado', 1)->first();
        $itemActiva = carta_item::where('carta_id',$cartaActiva->id)->get();
        $productos = $cartaActiva->getProductos;
        foreach($productos as $y){
            foreach($itemActiva as $item){
                if($y->id == $item->producto_id){
                    $y->stock = $item->stock;
                    break;
                }
            }
        }
        JavaScript::put([
            'productos' => $productos,
            'mesas' => $mesas
        ]);
        // $productos = carta_item::with('productos')->where('carta_id', $cartaActiva->id)->get();
        // return $productos;
        return view('sistema.orden.crearF', ['title' => 'NUEVA ORDEN','action' => '/orden', 'mesas' => $mesas, 'productos' => $productos]);
        //return view('sistema.orden.crear',['title' => 'NUEVA ORDEN','action' => '/orden']);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function saveOrden(Request $request)
    {
        /////DIFERENCIAMOS SI ES LOCAL y sus estado y tipos
        $tipo = tipo_orden::where('nombre','LOCAL')->first();///tipo debe ser DELIVERY || LOCAL || ETC si hubiese otro
        $estado = estado_ordenes::where('nombre','PREPARANDOSE')->first();////LUEGO HAREMOS QUE LAS ORDENES SIEMPRE ESTEN ORDENADAS DE LA PRIMERA = PASO 1 ...
        $estado_mesa = estado_mesa::where('nombre','OCUPADA')->first();
        $cartaActiva = carta::where('estado', 1)->first();
        /////instanciamos valores de la orden
        $orden = new orden();
        $orden->total = $request->total;
        $orden->total_redondeado = floor($request->total);
        $orden->comprobante = 0;//$request->comprobante;///AQUI LLEGARA EL NUMERO DEL SISTEMA DE FACTURACION, MANDAR NUMERO 1111
        $orden->tiempo_espera_total = $request->tiempo_espera;///el tiempo de espera por ahora mandalo como la sumatoria de todos los tiempo de espera dividos entre 2 
        $orden->estado_ordenes_id = $estado->id;
        $orden->tipo_orden_id = $tipo->id;
        $orden->mesa_id = ($request->mesa!=0) ? $request->mesa:null;
        $user = usuario::where('nombre','local')->first();/////DEBEMOS TENER UN USUARIO REGISTRADO CON NOMBRE "LOCAL" asi en mayusculas
        $orden->empleado_usuario_id = Auth::user()->id;
        $orden->usuario_id = $user->id;
        $orden->save();
        //////
        $mesa = mesa::find($orden->mesa_id);
        $mesa->estado_mesas_id = $estado_mesa->id;
        $mesa->save();
        foreach($request->detalle as $key => $item){
            $det_orden = new detalle_orden();
            $det_orden->producto_id = $item['producto_id'];
            $det_orden->orden_id = $orden->id;
            $det_orden->cantidad = $item['cantidad'];
            $det_orden->subtotal = $item['subtotal'];
            $det_orden->promociones_id = null;
            $det_orden->comentario = "nada";
            $det_orden->save();
            $item_to_process = carta_item::where('carta_id',$cartaActiva->id)->where('producto_id',$item['producto_id'])->first();
            $item_to_process->stock -=  $item['cantidad'];
            $item_to_process->save();
        }

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
    public function cobrar(){
        return view('sistema.cajero.index',['title'=> "Cajero"]);
    }
    public function realizarCobro(){

    }
}
