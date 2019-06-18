<?php

namespace restaurant;

use Illuminate\Database\Eloquent\Model;

class menu extends Model
{
    protected $table = "menu";
    public $timestamps = false;
    public static function getHeaders(){
    	return ['id','version','fecha'];
    }
}
