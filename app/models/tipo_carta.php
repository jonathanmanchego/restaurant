<?php

namespace restaurant\models;

use Illuminate\Database\Eloquent\Model;

class tipo_carta extends Model
{
    protected $table = "tipo_carta";
    protected $fillable = ['nombre'];
    protected $guarded = ['id'];
    public $timestamps = false;
    public static function getHeaders(){
    	return ['id','nombre'];
    }
    public static function getPull(){
        return ['nombre'];
    }
}
