<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Choferes extends Model
{
    protected $table='choferes';

    protected $fillable=['nombres','apellidos','rut','edad','genero','licencia','certificado','status'];

    public function asignacion()
    {
    	return $this->hasMany('App\Choferes','id_chofer','id');
    }

    public function despachos()
    {
    	return $this->hasMany('App\Despachos','id_chofer','id');
    }
}
