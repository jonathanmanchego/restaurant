<?php

namespace restaurant\Http\Controllers\webs;

use Illuminate\Http\Request;
use restaurant\Http\Controllers\Controller;
use restaurant\models\producto;
use restaurant\models\zona;
use restaurant\models\tipo_documento;
use restaurant\models\sucursal;
class GeneralController extends Controller
{
    public function index(){
        $sli = sucursal::take(3)->orderBy('id','desc')->get();
        return view('index',['title' => 'RESTAURANT','sli' => $sli]);
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
