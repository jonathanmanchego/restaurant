<?php

namespace restaurant\Models\Admin;

use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    protected $table = "menu";//tabla
    protected $fillable = ['nombre','url','icono'];//campos para crear elementos de forma masiva //ayuda con la seguridad de los menus 
    protected $guarded = ['id'];//atributo que nos dice que campos no se va a poder modificar
    public $timestamps = false;//si no posee campos timestamp
}
