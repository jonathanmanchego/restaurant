<?php

namespace restaurant\models;

use Illuminate\Database\Eloquent\Model;

class tipo_empleado extends Model
{
    protected $table = "tipo_empleado";
    protected $fillable = ['nombre'];
    protected $guarded = ['id'];
    public $timestamps = false;
    public static function getHeaders(){
    	return ['id','nombre'];
    }
    public static function getPull(){
    	return ['id','nombre'];
    }
    public function __construct($id = 0, $nombre = "")
    {
        $this->id = $id;
        $this->nombre = $nombre;
    }
}
