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
}
