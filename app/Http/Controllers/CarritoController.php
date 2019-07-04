<?php

namespace restaurant\Http\Controllers;

use Illuminate\Http\Request;

class CarritoController extends Controller
{
    public function __construct(){
    	(session('carrito'))?: session(['carrito' => array()]);
    }

    public function index(){
    	return 'CarritoController' ;
    }
    public function add(restaurant\models\producto $producto){
    	return var_dump($producto->getAll());
    }
}
