<?php

namespace restaurant\models;

use Illuminate\Database\Eloquent\Model;

class estado_mesa extends Model
{
    // protected $table = "estado_mesas";
    protected $fillable = ['nombre'];
    protected $guarded = ['id'];
    public $timestamps = false;
    public static function getHeaders(){
    	return ['id','nombre'];
    }
    public static function getPull(){
        return ['id','nombre'];
    }
}
