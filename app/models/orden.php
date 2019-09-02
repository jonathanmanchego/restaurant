<?php

namespace restaurant\models;

use Illuminate\Database\Eloquent\Model;

class orden extends Model
{
    protected $table = "orden";
    
    public $timestamps = false;
    public function getDetalleOrdenes(){
        return $this->hasMany(detalle_orden::class,'orden_id');
    }
    public function tipo(){
        return $this->belongsTo(tipo_orden::class,'tipo_orden_id');
    }
    public function estado(){
        return $this->belongsTo(estado_ordenes::class,'estado_ordenes_id');
    }
    public function mesa(){
        return $this->belongsTo(mesa::class,'mesa_id');
    }
    public function getEmpleado(){
        return $this->belongsTo(empleado::class,'empleado_usuario_id');            
    }
}
