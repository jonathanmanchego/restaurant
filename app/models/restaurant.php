<?php

namespace restaurant\models;

use Illuminate\Database\Eloquent\Model;

class restaurant extends Model
{
    protected $table = "restaurant";   
    protected $fillable = ['nombre','direccion','telefono1','telefono2','celular1','celular2','ruc'];
    protected $guarded = ['id'];
    public $timestamps = false;
    public static function getHeaders(){
    	return ['id','nombre','direccion','telefono1','telefono2','celular1','celular2','ruc'];
    }
    public static function getPull(){
    	return ['nombre','direccion','telefono1','telefono2','celular1','celular2','ruc'];
    }
}
