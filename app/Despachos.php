<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Despachos extends Model
{
    protected $table='despachos';

    protected $fillable=['num_guia','patente','id_chofer','kg_pesaje','hora_salida','total_kg_salida','observaciones','fecha','status'];

    public function chofer()
    {
    	return $this->belongsTo('App\Choferes','id_chofer');
    }

    public function recepciones()
    {
    	return $this->hasOne('App\Recepciones','id_despacho','id');
    }
}
