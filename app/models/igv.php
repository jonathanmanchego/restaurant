<?php

namespace restaurant\models;

use Illuminate\Database\Eloquent\Model;

class igv extends Model
{
    protected $table = "igv";
    public $timestamps = false;
    public static function getHeaders(){
    	return ['id','porcentaje','fecha_inicio'];
    }
}
