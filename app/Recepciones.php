<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Recepciones extends Model
{
    protected $table='recepciones';

    protected $fillable=['id_despacho','num_guia_romana','kg_pesaje','hora_llegada','total_kg_entrega','observaciones'];

    public function despacho()
    {
    	return $this->belongsTo('App\Despachos','id_despacho');
    }
}
