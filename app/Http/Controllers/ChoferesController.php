<?php

namespace App\Http\Controllers;

use App\Choferes;
use Illuminate\Http\Request;
use App\Http\Requests\ChoferesRequest;
use App\Http\Requests\ChoferesUpdateRequest;
use App\Asignaciones;
use App\Camiones;
class ChoferesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $choferes=Choferes::all();

        return view('choferes.index',compact('choferes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('choferes.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ChoferesRequest $request)
    {
        //dd($request->all());
        $chofer=new Choferes();
        $chofer->fill($request->all())->save();

        flash('<i class="icon-circle-check"></i> Conductor registrado satisfactoriamente!')->success()->important();
        return redirect()->to('choferes');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Choferes  $choferes
     * @return \Illuminate\Http\Response
     */
    public function show(Choferes $choferes)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Choferes  $choferes
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $chofer=Choferes::find($id);

        return view('choferes.edit',compact('chofer'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Choferes  $choferes
     * @return \Illuminate\Http\Response
     */
    public function update(ChoferesUpdateRequest $request,$id)
    {
        //dd($request->all());

        $buscar_rut=Choferes::where('rut',$request->rut)->where('id','<>',$id)->first();

        if (!empty($buscar_rut)) {
            flash('<i class="icon-circle-check"></i> El RUT ya se encuentra registrado!')->warning()->important();
            return redirect()->back();
        } else {
            $chofer=Choferes::find($id);
            $chofer->fill($request->all())->save();
            flash('<i class="icon-circle-check"></i> Conductor actualizado satisfactoriamente!')->success()->important();
            return redirect()->to('choferes');

        }
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Choferes  $choferes
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $chofer=Choferes::find($request->id_chofer);

        if ($chofer->delete()) {
            flash('<i class="icon-circle-check"></i> Registro eliminado satisfactoriamente!')->success()->important();
            return redirect()->to('choferes');
        } else {
            flash('<i class="icon-circle-check"></i> No se udo eliminar al Conductor!')->success()->important();
            return redirect()->to('choferes');
        }
        
    }

    public function cambiar_status(Request $request)
    {
        $chofer=Choferes::find($request->id_chofer);

        $chofer->status=$request->status;
        $request->save();

        flash('<i class="icon-circle-check"></i> El Status del Conductor ha sido cambiado '.$request->status.' satisfactoriamente!')->success()->important();
        return redirect()->to('choferes');

    }

    public function asignar($id_chofer)
    {
        $chofer = Choferes::find($id_chofer);

        $camiones=Camiones::all();

        $asignaciones=Asignaciones::all();

        return view('choferes.asignar',compact('chofer','camiones','asignaciones'));
    }

    public function asignacion(Request $request)
    {
        $asignacion= new Asignaciones();

        $asignacion->id_chofer=$request->id_chofer;
        $asignacion->id_camion=$request->id_camion;
        $asignacion->save();

        flash('<i class="icon-circle-check"></i> Conductor asignado a Camión satisfactoriamente!')->success()->important();
        return redirect()->to('choferes');
    }

    public function retirar(Request $request)
    {
        $asignacion=Asignaciones::where('id_chofer',$request->id_chofer)->where('status','Asignado')->first();

        $asignacion->status='Retirado';
        $asignacion->save();

        flash('<i class="icon-circle-check"></i> Al Conductor se le ha sido Retirado el Camión asignado!')->success()->important();
        return redirect()->to('choferes');   
    }    
}
