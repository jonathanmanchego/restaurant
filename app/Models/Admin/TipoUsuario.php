<?php

namespace restaurant\Models\Admin;

use Illuminate\Database\Eloquent\Model;

class TipoUsuario extends Model
{
    protected $table = "tipo_usuario";
    protected $fillable = ['nombre','descripcion'];
    protected $guarded = ['id'];
    public $timestamps = false;
}
