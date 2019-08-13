<?php

namespace restaurant\models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
class usuario extends Authenticatable
{
    use Notifiable;
	protected $model = 'models';
    protected $table = "usuario";
    protected $fillable = ['nombre','apellido','username','password','tipo_documento_id',
                            'nrodocumento','telefono','celular','direccion','zonas_id'];
    protected $hidden = ['password'];  
    public $timestamps = false;
    public static function getHeaders(){
        return ['id','nombre','apellido','celular','username','documento'];
    }
    public static function getPull(){
        return ['id','nombre','apellido','celular','telefono','direccion','username','password'];
    }
    public static function getTypes(){
        $x[7] = 'password';
        return $x;
    }
    public function zona(){
        return $this->belongsTo(zona::class,'zonas_id');
    }
    public function doc(){
        return $this->belongsTo(tipo_documento::class,'tipo_documento_id');
    }
}
