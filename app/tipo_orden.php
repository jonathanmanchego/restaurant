<?php

namespace restaurant;

use Illuminate\Database\Eloquent\Model;

class tipo_orden extends Model
{
    protected $table = "tipo_orden";
    public $timestamps = false;
    public static function getHeaders(){
    	return ['id','nombre'];
    }
}
