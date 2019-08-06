<?php

namespace App\Http\Controllers;

use App\Camiones;
use Illuminate\Http\Request;
use App\Http\Requests\CamionesRequest;
use App\Http\Requests\CamionesUpdateRequest;
class CamionesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $camiones=Camiones::all();

        return view('camiones.index',compact('camiones'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('camiones.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CamionesRequest $request)
    {
        //dd($request->all());

        $camion= new Camiones();

        $camion->fill($request)->save();

        flash('<i class="icon-circle-check"></i> Camión registrado satisfactoriamente!')->success()->important();
        return redirect()->to('camiones');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Camiones  $camiones
     * @return \Illuminate\Http\Response
     */
    public function show(Camiones $camiones)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Camiones  $camiones
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $camion=Camiones::find($id);

        return view('camiones.edit',compact('camion'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Camiones  $camiones
     * @return \Illuminate\Http\Response
     */
    public function update(CamionesUpdateRequest $request,$id)
    {
        //dd($request->all());

        $buscar_vin=Camiones::where('vin',$request->vin)->where('id','<>',$id)->first();

        if (!empty($buscar_vin)) {
            flash('<i class="icon-circle-check"></i> El VIN ya se encuentra registrado!')->warning()->important();
            return redirect()->back();
        } else {
            $camion=Camiones::find($id);
            $camion->fill($request)->save();
            flash('<i class="icon-circle-check"></i> Conductor actualizado satisfactoriamente!')->success()->important();
            return redirect()->to('camiones');

        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Camiones  $camiones
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $camion=Camiones::find($request->id_camion);

        if ($camion->delete()) {
            flash('<i class="icon-circle-check"></i> Registro eliminado satisfactoriamente!')->success()->important();
            return redirect()->to('camiones');
        } else {
            flash('<i class="icon-circle-check"></i> No se udo eliminar al Conductor!')->success()->important();
            return redirect()->to('camiones');
        }
    }
}
