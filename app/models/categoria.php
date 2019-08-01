<?php

namespace restaurant\models;

use Illuminate\Database\Eloquent\Model;
use restaurant\models\carta_item;
class categoria extends Model
{
    protected $table = "categoria";
    protected $fillable = ['nombre'];
    protected $guarded = ['id'];
    public $timestamps = false;
    public static function getHeaders()
    {
        return ['id', 'nombre'];
    }
    public static function getPull()
    {
        return ['nombre'];
    }
    public function getItem()
    {
        return $this->hasMany(carta_item::class);
    }
}
