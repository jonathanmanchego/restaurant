<?php

namespace restaurant;

use Illuminate\Database\Eloquent\Model;

class tipo_documento extends Model
{
    protected $table = "tipo_documento";
 	public $timestamps = false;   
 	public static function getHeaders(){
    	return ['id','nombre','descripcion'];
    }
}
