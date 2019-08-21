<?php

namespace restaurant\models;

use Illuminate\Database\Eloquent\Model;
use restaurant\models\tipo_carta;
use restaurant\models\carta_item;
class carta extends Model
{
    protected $table = "carta";
    protected $fillable = ['version','estado','tipo_carta_id'];
    protected $guarded = ['id','fecha'];
    public $timestamps = false;
    private $id;
    private $version;
    private $fecha;
    private $estado;
    private $tipo;
    public function __construct($id = 0,$version = "",$fecha = "",$tipo = null,$estado = false)
    {
        $this->id = $id;
        $this->version = $version;
        $this->fecha = $fecha;
        $this->estado = $estado;
        $this->tipo = $tipo;
    }
    public function changeEstado(){
        if($this->estado == 0){
            $this->estado = 1;
        }else{
            $this->estado = 0;
        }
    }
    public static function getHeaders(){
        return ['id','version','fecha','estado','tipo'];
    }
    public static function getPull(){
    	return ['id','version'];
    }
    public static function getAll(){
        $data = carta::all();
        foreach($data as $dat){
            $dat['tipo'] = tipo_carta::where('id',$dat['tipo_carta_id'])->first();
        }
        return $data;
    }
    public function getOne(){
        $data = carta::find($this->id);
        // $data['tipo'] = $this->tipo;
        $data->tipo;
        return $data;
    }
    public function getProductos(){
        $x = $this->belongsToMany(producto::class,'carta_item','carta_id','producto_id');
        return $x;
        // return $this->belongsToMany(ingrediente::class,'productos_composicion','producto_id','ingredientes_id');
    }
    public function tipo(){
        return $this->belongsTo(tipo_carta::class,'tipo_carta_id');
    }
}
