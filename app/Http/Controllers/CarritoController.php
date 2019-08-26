<?php

namespace restaurant\Http\Controllers;

use Illuminate\Http\Request;
use restaurant\Models\producto as ProductosModel;
use restaurant\Models\CarritoModel;
use restaurant\models\estado_ordenes;
use restaurant\models\orden;
use restaurant\models\tipo_orden;

class CarritoController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        (\Session::has('carrito')) ?: \Session::put('carrito', new CarritoModel());
    }
    public function show()
    {
        $car = \Session::get('carrito');
        if ($car->getCantidad() < 1) {
            return redirect()->route('home');
        }
        // return $car->getProductos();
        return view('carrito.index')->with([
            'carrito' => $car->getProductos(),'total' => $car->getTotal(),
            'items' => $car->getItem()
        ]);
    }
    public function add(ProductosModel $producto, $cantidadAdd)
    {
        $car = \Session::get('carrito');
        $car->addItem($producto, $cantidadAdd);
        \Session::put('carrito', $car);
        return redirect()->route('Carrito');
    }
    public function update(ProductosModel $producto, $cantidadAdd)
    {
        $car = \Session::get('carrito');
        $car->addItem($producto, $cantidadAdd);
        \Session::put('carrito', $car);
        return array('out' => "success");
    }
    public function remove(ProductosModel $producto, $cantidadRemove)
    {
        $car = \Session::get('carrito');
        $x = $car->removeItem($producto, $cantidadRemove);
        \Session::put('carrito', $car);
        return $x;
    }
    public function removeItem(ProductosModel $id){
        $car = \Session::get('carrito');
        $x = $car->removeProducto($id);
        \Session::put('carrito', $car);
        return redirect()->route('Carrito');
    }
    public function reset()
    {
        \Session::get('carrito')->reset();
        return redirect()->route('productos');
    }
    public function hacerPedido(){
        $car = \Session::get('carrito');
        $tipo_orden = tipo_orden::where('nombre','DELIVERY')->first();
        $mesa = mesa::where('nombre','DELIVERY')->first();
        // $estado_orden = estado_ordenes::where('nombre','')
        $orden = new orden();
        $orden->tipo_orden_id = $tipo_orden->id;
        $orden->mesa_id = $mesa->id;
        $orden->total = $car->getTotal();
        $orden->total_redondeado = $car->getTotal();
        $orden->comprobante = 0;////ESTE VALOR SE OBTENDRA DEL SISTEMA DE FACTURAS ELECTRONICAS
        foreach($car->getProductos() as $prod){
            $orden->tiempo_espera += $prod->tiempo_espera;
        }

        foreach($car->getProductos() as $prod){

        }
        // $new detalle_orden()
    }
}
