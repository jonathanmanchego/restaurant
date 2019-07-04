<?php

namespace restaurant\models;

use Illuminate\Database\Eloquent\Model;

class carta extends Model
{
    protected $table = "carta";
    protected $fillable = ['version'];
    protected $guarded = ['id','fecha'];
    public $timestamps = false;
    public function getHeaders(){
        return ['id','version','fecha'];
    }
    public static function getPull(){
    	return ['id','version'];
    }
}
