<?php

namespace restaurant\Http\Controllers\webs;

use Illuminate\Http\Request;
use restaurant\Http\Controllers\Controller;
use restaurant\models\producto;
use restaurant\models\zona;
use restaurant\models\tipo_documento;

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
    public function profile(){
        $tipo_docs = tipo_documento::all();
        $zonas = zona::all();
    	return view('general.usuario.profile',['title' => 'RESTAURANT - PERFIL','tipo_docs' => $tipo_docs,'zonas' => $zonas]);
    }
    public function contacto(){
    	return view('general.contacto',['title' => 'RESTAURANT - CONTACTO']);
    }
    public function nosotros(){
    	return view('general.nosotros',['title' => 'RESTAURANT - NOSOTROS']);
    }
    public function articulos(){
    	return view('general.articulos',['title' => 'RESTAURANT - ARTICULOS']);
    }
}
