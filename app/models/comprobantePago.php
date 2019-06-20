<?php

namespace restaurant\models;

use Illuminate\Database\Eloquent\Model;

class comprobantePago extends Model
{
    protected $table = "comprobantePago";
    public $timestamps = false;
    protected $guarded = ['id','orden_id','id_comprobante'];
}
