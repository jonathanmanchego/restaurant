<?php

namespace restaurant\models;

use Illuminate\Database\Eloquent\Model;

class tipo_documento extends Model
{
	protected $table = "tipo_documento";
	protected $fillable = ['nombre','descripcion'];
	protected $guarded = ['id'];
 	public $timestamps = false;   
 	public static function getHeaders(){
    	return ['id','nombre','descripcion'];
	}
	public static function getPull(){
		return ['nombre','descripcion'];
	}
}
