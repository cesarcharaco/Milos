<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Camiones extends Model
{
    protected $table='camiones';

    protected $fillable=['modelo','marca','vin','anio','capacidad','status'];


    public function asignacion()
    {
    	return $this->hasOne('App\Asignaciones','id_camion','id');
    }
}
