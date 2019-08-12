<?php

namespace App\Http\Controllers;

use App\Despachos;
use Illuminate\Http\Request;
use App\Choferes;
use App\Asignaciones;
use App\Recepciones;
use App\Http\Requests\DespachosRequest;
date_default_timezone_set("America/Caracas");
ini_set('date.timezone','America/Caracas');
/*
date_default_timezone_set("America/Santiago");
ini_set('date.timezone','America/Santiago');
*/
class DespachosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $hoy=date('Y-m-d');

        //dd($hoy);
        $despachos=Despachos::where('fecha',$hoy)->get();
        //dd($despachos);
        return view('despachos.index',compact('despachos'));


    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $choferes=Asignaciones::where('status','Asignado')->get();
        $hora=date('H:i:s');
        $despachos=Despachos::where('fecha',date('Y-m-d'))->get();
        return view('despachos.create',compact('choferes','hora','despachos'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(DespachosRequest $request)
    {
        $despacho=new Despachos();
        $despacho->fecha=date('Y-m-d');
        $despacho->fill($request->except('fecha'))->save();
        $recepcion=new Recepciones();
        $recepcion->id_despacho=$despacho->id;
        $recepcion->save();
        flash('<i class="icon-circle-check"></i> Despacho registrado satisfactoriamente!')->success()->important();
        return redirect()->to('despachos');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Despachos  $despachos
     * @return \Illuminate\Http\Response
     */
    public function show(Despachos $despachos)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Despachos  $despachos
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $despacho=Despachos::find($id);
        $choferes=Asignaciones::where('status','Asignado')->get();
        $hora=date('H:i:s');
        $despachos=Despachos::where('fecha',date('Y-m-d'))->get();
        return view('despachos.edit',compact('despacho','choferes','hora','despachos'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Despachos  $despachos
     * @return \Illuminate\Http\Response
     */
    public function update(DespachosRequest $request,$id)
    {
        $despacho=Despachos::find($id);
        
        $despacho->fill($request->except('fecha'))->save();

        flash('<i class="icon-circle-check"></i> Despacho actualizado satisfactoriamente!')->success()->important();
        return redirect()->to('despachos');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Despachos  $despachos
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $despacho=Despachos::find($request->id_despacho);

        if ($despacho->delete()) {
            flash('<i class="icon-circle-check"></i> Registro eliminado satisfactoriamente!')->success()->important();
            return redirect()->to('despachos');
        } else {
            flash('<i class="icon-circle-check"></i> No se pudo eliminar al Conductor!')->warning()->important();
            return redirect()->to('despachos');
        }
    }

    public function cambiar_status(Request $request)
    {
        $despacho=Despachos::find($request->id_despacho);

        $despacho->status=$request->status;
        $despacho->save();

        flash('<i class="icon-circle-check"></i>Status de Despacho cambiado a <b>'.$request->status.'</b>  satisfactoriamente!')->success()->important();
        return redirect()->to('despachos');
    }
}
