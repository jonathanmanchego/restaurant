<?php

namespace restaurant\models;

use Illuminate\Database\Eloquent\Model;

class sucursal extends Model
{
    protected $table = "sucursal";
    public $timestamps = false;
    public static function getHeaders(){
        return ['id','nombre'];
    }
}
