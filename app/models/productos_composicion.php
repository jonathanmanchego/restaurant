<?php

namespace restaurant\models;

use Illuminate\Database\Eloquent\Model;

class productos_composicion extends Model
{
    protected $table = "productos_composicion";
    public $timestamps = false;
    protected $fillable = ['producto_id','ingredientes_id','cantidad'];
    protected $guarded = ['id'];
}
