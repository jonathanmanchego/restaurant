<?php

namespace restaurant\models;

use Illuminate\Database\Eloquent\Model;
use restaurant\models\unidad_medida;
use restaurant\models\producto;

class ingrediente extends Model
{
    protected $fillable = ['nombre','cantidad','precio_compra','unidad_medida_id'];
    protected $guarded = ['id','fecha_ingreso']; 
    public $timestamps = false;
    public static function getHeaders(){
        return ['id','nombre','cantidad','fecha_ingreso','precio_compra','unidad medida'];
    } 
    public static function getPull(){
        return ['id','nombre','cantidad','precio_compra'];
    }
    public function unidad(){
        return $this->belongsTo(unidad_medida::class,'unidad_medida_id');
    }
    public static function getAll(){
        $data = ingrediente::all();
        foreach($data as $dat){
            $dat['unidad'] = unidad_medida::where('id',$dat['unidad_medida_id'])->first();
        }
        return $data;
    }
    public static function getOne($id){
        $d = ingrediente::find($id);
        $d->unidad;
        return $d;
    }
    public function productos(){
        return $this->belongsToMany(producto::class,'productos_composicion','ingredientes_id','producto_id');
    }
}
