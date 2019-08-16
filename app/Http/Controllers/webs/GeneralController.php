<?php

namespace restaurant\Http\Controllers\webs;

use Illuminate\Http\Request;
use restaurant\Http\Controllers\Controller;
use restaurant\models\producto;

class GeneralController extends Controller
{
    public function index(){
        return view('index',['title' => 'RESTAURANT']);
    }
    /**
     * Exhibicion de los productos
     */
    public function exhibicion(){
        $data = producto::all();
    	return view('productos.productos',compact('data'));	
    }
}
