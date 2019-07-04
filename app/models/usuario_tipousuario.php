<?php

namespace restaurant\models;

use Illuminate\Database\Eloquent\Model;

class usuario_tipousuario extends Model
{
    protected $table = 'usuario_tipousuario';
    protected $fillable = ['usuario_id','tipo_usuario_id','estado'];
    public $timestamps = false;
}
