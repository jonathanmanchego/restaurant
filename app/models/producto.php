<?php

namespace restaurant\models;

use Illuminate\Database\Eloquent\Model;

class producto extends Model
{
    protected $table = "producto";
    protected $fillable = ['nombre','descripcion','imagen','precio','codigo','eliminado','costo','tiempo_espera','video','fecha_validez'];
    protected $guarded = ['id'];
    public $timestamps = false;
    public static function getHeaders(){
        return ['id','nombre','descripcion','imagen','precio','codigo','eliminado','fecha_validez','costo','tiempo_espera','video'];
    }
    public static function getPull(){
        return ['id','nombre','descripcion','imagen','precio','codigo','eliminado','costo','tiempo_espera','video'];
    }
}
