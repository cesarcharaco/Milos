<?php

namespace App\Http\Controllers;

use App\Recepciones;
use App\Despachos;
use Illuminate\Http\Request;
use App\Http\Requests\RecepcionesRequest;
date_default_timezone_set("America/Caracas");
ini_set('date.timezone','America/Caracas');
class RecepcionesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $hoy=date('Y-m-d');
        $despachos= Despachos::where('fecha',$hoy)->get();

        return view('recepciones.index',compact('despachos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Recepciones  $recepciones
     * @return \Illuminate\Http\Response
     */
    public function show(Recepciones $recepciones)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Recepciones  $recepciones
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $despacho=Despachos::find($id);
        $hora=date('H:i:s');

        return view('recepciones.edit',compact('despacho','hora'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Recepciones  $recepciones
     * @return \Illuminate\Http\Response
     */
    public function update(RecepcionesRequest $request,$id)
    {
        $recepcion=Recepciones::where('id_despacho',$id)->first();
        $despacho=Despachos::find($id);

        if ($despacho->status=="Cancelado" && $request->status=="Recibido") {
            flash('<i class="icon-circle-check"></i> El Despacho fue Cancelado no se puede marcar como <b>Recibido</b> a la Recepción, por favor elija otro status!')->warning()->important();
            return redirect()->back();
        } else {
            
        $recepcion->kg_pesaje=$request->kg_pesaje;
        $recepcion->num_guia_romana=$request->num_guia_romana;
        $recepcion->hora_llegada=$request->hora_llegada;
        $recepcion->total_kg_entrega=$request->total_kg_entrega;
        $recepcion->status=$request->status;
        $recepcion->observaciones=$request->observaciones;
        $recepcion->save();
        if ($request->status=="Cancelado" || $request->status=="Devuelto") {
            
            $despacho->status="Cancelado";
            $despacho->save();
            flash('<i class="icon-circle-check"></i> Recepción fue <b>'.$request->status.'</b> satisfactoriamente, y el Despacho se cambió a status <b>Cancelado</b>!')->success()->important();
        } else {
            
            flash('<i class="icon-circle-check"></i> Recepción registrada satisfactoriamente!')->success()->important();    
        }
        
        return redirect()->to('recepciones');  

        }
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Recepciones  $recepciones
     * @return \Illuminate\Http\Response
     */
    public function destroy(Recepciones $recepciones)
    {
        //
    }
}
