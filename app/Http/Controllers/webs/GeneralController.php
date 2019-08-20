<?php

namespace restaurant\Http\Controllers\webs;

use Illuminate\Http\Request;
use restaurant\Http\Controllers\Controller;
use restaurant\models\carta;
use restaurant\models\producto;
use restaurant\models\sucursal;

class GeneralController extends Controller
{
    public function index(){
        $sli = sucursal::take(3)->get();
        return view('index',['title' => 'RESTAURANT','sli' => $sli]);
    }
    /**
     * Exhibicion de los productos
     */
    public function exhibicion(){
        $pd = carta::where('estado','1')->first();
        $data = $pd->getProductos;
    	return view('productos.productos',compact('data'));	
    }
    public function profile(){
        return view('general.usuario.perfil',['title' => 'RESTAURANT - PERFIL']);
    }
}
