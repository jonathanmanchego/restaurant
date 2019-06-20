<?php

namespace restaurant\models;

use Illuminate\Database\Eloquent\Model;

class estado_ordenes extends Model
{
    protected $table = "estado_ordenes";
    public $timestamps = false;
    public static function getHeaders(){
    	return ['id','nombre'];
    }
}
