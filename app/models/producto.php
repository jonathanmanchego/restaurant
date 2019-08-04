<?php

namespace restaurant\models;

use Illuminate\Database\Eloquent\Model;

class producto extends Model
{
    protected $table = "producto";
    protected $fillable = ['nombre','descripcion','imagen','precio','codigo','eliminado','tiempo_espera','video','fecha_validez'];
    protected $guarded = ['id'];
    public $timestamps = false;
    public static function getHeaders(){
        return ['id','nombre','descripcion','precio','codigo','fecha_validez','tiempo_espera'];
    }
    public static function getPull(){
        return ['id','nombre','descripcion','precio','codigo','tiempo_espera'];
    }
    public static function getTypes(){
        $x[3] = 'number';
        $x[5] = 'number';
        return $x;
    }
    public function ingredientes(){
        return $this->belongsToMany(ingrediente::class,'productos_composicion','producto_id','ingredientes_id');
    }
    public static function getOne($id){
        $d = producto::find($id);
        $d->ingredientes;
        return $d;
    }
}
