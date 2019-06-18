<?php

namespace restaurant\Http\Controllers;

use Illuminate\Http\Request;

class GeneralController extends Controller
{
    public function index(){
    	return view('sistema.index',['title' => 'SISTEMA - RESTAURANT']);
    }
}
