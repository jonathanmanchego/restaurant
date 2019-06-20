<?php

namespace restaurant\models;

use Illuminate\Database\Eloquent\Model;

class mesa extends Model
{
    protected $table = "mesa";
    public $timestamps = false;
    protected $fillable = ['numero','capacidad','estado_mesas_id'];
    protected $guarded = ['id'];
    public static function getHeaders(){
    	return ['id','capacidad','numero','estado_mesas_id'];
    }
    public static function getPull(){
        return ['numero','capacidad'];
    }
}
