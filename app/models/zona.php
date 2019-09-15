<?php

namespace restaurant\models;

use Illuminate\Database\Eloquent\Model;
use restaurant\models\usuario;

class zona extends Model
{
    protected $fillable = ['nombre'];
    protected $guarded = ['id'];
    public $timestamps = false;
    public static function getHeaders()
    {
        return ['id', 'nombre'];
    }
    public static function getPull()
    {
        return ['id','nombre'];
    }
    public function getUsuarios()
    {
        return $this->hasMany(usuario::class);
    }
}
