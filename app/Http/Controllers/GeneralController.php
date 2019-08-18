<?php

namespace restaurant\Http\Controllers;

use Illuminate\Http\Request;

class GeneralController extends Controller
{
    public function index(){
    	return view('sistema.index',['title' => 'SISTEMA - RESTAURANT']);
    }
    public function profile(){
    	return view('general.usuario.profile',['title' => 'RESTAURANT - PERFIL']);
    }
}
