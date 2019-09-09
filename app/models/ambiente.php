<?php

namespace restaurant\models;

use Illuminate\Database\Eloquent\Model;

class ambiente extends Model
{
    protected $table = "ambiente";
    public $timestamps = false;
    protected $fillable = ['nombre','descripcion'];
    protected $guarded = ['id'];
    public static function getHeaders(){
    	return ['id','nombre','descripcion'];
    }
    public static function getPull(){
        return ['id','nombre','descripcion'];
    }
}
