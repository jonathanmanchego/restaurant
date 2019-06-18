<?php

namespace restaurant;

use Illuminate\Database\Eloquent\Model;

class tipo_usuario extends Model
{
    protected $table = "tipo_usuario";
    public $timestamps = false;
    public static function getHeaders(){
    	return ['id','nombre','descripcion'];
    }
}
