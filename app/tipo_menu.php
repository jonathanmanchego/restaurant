<?php

namespace restaurant;

use Illuminate\Database\Eloquent\Model;

class tipo_menu extends Model
{
    protected $table = "tipo_menu";
    public $timestamps = false;
    public static function getHeaders(){
    	return ['id','nombre','descripcion'];
    }
}
