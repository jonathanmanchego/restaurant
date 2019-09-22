<?php

namespace restaurant\Http\Controllers;

use Illuminate\Http\Request;
use DB;
class GeneralController extends Controller
{
    public function index(){
    	return view('sistema.index',['title' => 'SISTEMA - RESTAURANT']);
    }
    public function profile(){
        return view('general.usuario.perfil',['title' => 'RESTAURANT - PERFIL']);
    }
    public function datosGrafico(Request $request){
        $ordenes = DB::select('call graficar_ventas(?)',array($request->year)); 
        //$ordenes= DB::table('orden')->selectRaw('ROUND(SUM(total), 2) as total_ventas')->whereYear('fecha', $request->year)->selectRaw('month(fecha) as mes')->groupBy('mes')->whereNotNull('total')->get();
        //$ordenes= orden::whereYear('fecha', '=', 2019)->orderByRaw('MONTH(Fecha)')->raw('SUM(total) as total_ventas')->get();//usar procedimientos almacenados DB::select('exec sp_nombre("año", "mes", etc)');
        //SELECT SUM(total) FROM orden where YEAR(Fecha)=2019 GROUP BY MONTH(Fecha)
        return $ordenes;
    }
}
