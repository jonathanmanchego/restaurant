<?php

namespace restaurant;

use Illuminate\Database\Eloquent\Model;

class restaurant extends Model
{
    protected $table = "restaurant";   
    public $timestamps = false;
    public static function getHeaders(){
    	return ['id','nombre','direccion','telefono1','telefono2','celular1','celular2','ruc'];
    }
}
