<?php

namespace restaurant\models;

use Illuminate\Database\Eloquent\Model;
use restaurant\models\productos_composicion;
class producto extends Model
{
    protected $table = "producto";
    protected $fillable = ['nombre','descripcion','imagen','precio','codigo','eliminado','tiempo_espera','video','fecha_validez'];
    protected $guarded = ['id'];
    public $timestamps = false;
    public static function getHeaders(){
        return ['id','nombre','precio','codigo','fecha_validez','tiempo_espera'];
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
    public function addIngrediente($id){
        $p_i = new productos_composicion();
        $p_i->producto_id = $this->id;
        $p_i->ingredientes_id = $id;
        $p_i->cantidad = 0;
        $p_i->save();
    }
    public function removeIngrediente($id){
        $p_i = productos_composicion::where('producto_id','=',$this->id)->where('ingredientes_id','=',$id);
        $p_i->delete();
    }
}
