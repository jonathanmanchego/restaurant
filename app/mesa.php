<?php

namespace restaurant;

use Illuminate\Database\Eloquent\Model;

class mesa extends Model
{
    protected $table = "mesa";
    public $timestamps = false;
    public static function getHeaders(){
    	return ['id','capacidad','estado','nombre','numero'];
    }
}
