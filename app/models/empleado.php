<?php

namespace restaurant\models;

use Illuminate\Foundation\Auth\User as Authenticatable;
class empleado extends Authenticatable
{
    protected $table = "empleado";
    public $timestamps = false;
    protected $fillable = ['nombre','apellido','username','password','tipo_documento_id',
                            'nrodocumento','telefono','celular','direccion','zonas_id','tipo_empleado_id'];
    public function zona(){
        return $this->belongsTo(zona::class,'zonas_id');
    }
    public function doc(){
        return $this->belongsTo(tipo_documento::class,'tipo_documento_id');
    }
    public static function getHeaders(){
        return ['id','nombre','tipo','celular','username','documento'];
    }
    public static function getPull()
    {
        return usuario::getPull();
    }
    public static function getTypes(){
        return usuario::getTypes();
    }
    public function tipo(){
        return $this->belongsTo(tipo_empleado::class,'tipo_empleado_id');
    }
    public static function getAll(){
        $data = empleado::all();
        foreach($data as $dt){
            $dt->zona;
            $dt->doc;
        }
        return $data;
    }
}
