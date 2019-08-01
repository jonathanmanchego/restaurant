<?php

namespace restaurant\models;

use Illuminate\Database\Eloquent\Model;

class estado_ordenes extends Model
{
    protected $table = "estado_ordenes";
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
