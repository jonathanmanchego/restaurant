<?php

namespace restaurant\models;

use Illuminate\Database\Eloquent\Model;

class unidad_medida extends Model
{
    protected $table = "unidad_medida";
    public $timestamps = false;
    protected $fillable = ['nombre'];
    protected $guarded = ['id'];
    public static function getHeaders(){
    	return ['id','nombre'];
    }
    public static function getPull(){
        return ['nombre'];
    }
}
