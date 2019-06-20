<?php

namespace restaurant\models;

use Illuminate\Database\Eloquent\Model;

class permiso extends Model
{
    protected $table = 'permiso';
    protected $fillable = ['nombre','slug'];
    protected $guarded = ['id'];
    public $timestamps = false;
    public static function getHeaders(){
        return ['id','nombre','slug'];
    }
    public static function getPull(){
    	return ['nombre','slug'];
    }
}
