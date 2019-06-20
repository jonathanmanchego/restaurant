<?php

namespace restaurant\models;

use Illuminate\Database\Eloquent\Model;

class menu extends Model
{
    protected $table = "menu";
    protected $fillable = ['nombre','url','icono'];
    protected $guarded = ['id'];
    public $timestamps = false;
    public static function getHeaders(){
    	return ['id','nombre','url','icono'];
    }
    public static function getPull(){
        return ['nombre','url','icono'];
    }
}
