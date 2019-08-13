<?php

namespace restaurant\Http\Controllers;

use Illuminate\Http\Request;
use restaurant\Models\producto as ProductosModel;
use restaurant\Models\CarritoModel;

class CarritoController extends Controller
{
	
    public function __construct(){
        $this->middleware('auth');
    	(\Session::has('carrito'))?:\Session::put('carrito',new CarritoModel());
    }
    public function show(){
    	$car = \Session::get('carrito');
    	if($car->getCantidad() < 1){
    		return redirect()->route('home');
    	}
     	return view('carrito.index')->with(['carrito' => $car->getProductos(),'total' => $car->getTotal(), 
            'items' => $car->getItem()]);
    }
    public function add(ProductosModel $producto,$cantidadAdd){
    	$car = \Session::get('carrito');
    	$car->addItem($producto,$cantidadAdd);
    	\Session::put('carrito',$car);
    	return redirect()->route('Carrito');
    }
    public function update(ProductosModel $producto,$cantidadAdd){
        $car = \Session::get('carrito');
        $car->addItem($producto,$cantidadAdd);
        \Session::put('carrito',$car);
        return true;
    }
    public function remove(ProductosModel $producto,$cantidadRemove){
    	$car = \Session::get('carrito');
    	$x = $car->removeItem($producto,$cantidadRemove);
    	\Session::put('carrito',$car);

    	return $x;

    }
    public function reset(){
        \Session::get('carrito')->reset();
        return redirect()->route('productos');
    }

}
