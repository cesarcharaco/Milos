<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Asignaciones extends Model
{
    protected $table='asignaciones';

    protected $fillable=['id_chofer','id_camion','status'];

    public function chofer()
    {
    	return $this->belongsTo('App\Choferes','id_chofer');
    }

    public function camion()
    {
    	return $this->belongsTo('App\Camiones','id_camion');
    }
}
