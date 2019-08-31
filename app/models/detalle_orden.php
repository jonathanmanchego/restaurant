<?php

namespace restaurant\models;

use Illuminate\Database\Eloquent\Model;

class detalle_orden extends Model
{
    protected $table = "detalle_orden";
    public $timestamps = false;
    public function getProducto(){
    	return $this->belongsTo(producto::class,'producto_id');
    }
}
