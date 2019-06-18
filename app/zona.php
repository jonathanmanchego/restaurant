<?php

namespace restaurant;

use Illuminate\Database\Eloquent\Model;

class zona extends Model
{
    public $timestamps = false;
    public static function getHeaders(){
    	return ['id','nombre'];
    }
}
