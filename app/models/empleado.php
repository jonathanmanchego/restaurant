<?php

namespace restaurant\models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Hash;
use restaurant\models\usuario;

class empleado extends Model
{
    protected $table = "empleado";
    protected $timestamps = false;
    public function getUsuario()
    {
        return $this->belongsTo(usuario::class);
    }
    public static function getHeaders()
    {
        return usuario::getHeaders();
    }
    public static function getPull()
    {
        return usuario::getPull();
    }
    public function save()
    { 
        $usu = usuario::create([
            'nombre' => $this->nombre,
            'apellido' => $this->apellido,
            'username' => $this->username,
            'password' => Hash::make($this->password),
            'tipo_documento_id' => $this->tipo_documento,
            'nrodocumento' => $this->nrodocumento,
            'telefono' => $this->telefono,
            'celular' => $this->celular,
            'direccion' => $this->direccion
        ]);
        usuario_tipousuario::create([
            'usuario_id' => $usu['id'],
            'tipo_usuario_id' => $data['tipo_usuario_id'],
            'estado' => '1'
        ]);
        return $usu;
    }
}
