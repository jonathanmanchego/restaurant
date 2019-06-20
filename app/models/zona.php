<?php

namespace restaurant\models;

use Illuminate\Database\Eloquent\Model;

class zona extends Model
{  
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
