<?php

namespace App\Http\Controllers;

use App\Camiones;
use Illuminate\Http\Request;
use App\Http\Requests\CamionesRequest;
use App\Http\Requests\CamionesUpdateRequest;
use App\Asignaciones;
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

        $camiones_act=Camiones::where('status','Activo')->count();
        $camiones_tal=Camiones::where('status','Taller')->count();
        $camiones_ret=Camiones::where('status','Retirado')->count();
        // ExampleController.php

        $chartjs = app()->chartjs
        ->name('pieChartTest')
        ->type('doughnut')
        ->size(['width' => 300, 'height' => 100])
        ->labels(['Activo: '.$camiones_act, 'Taller: '.$camiones_tal, 'Retirado: '.$camiones_ret ])
        ->datasets([
            [
                'backgroundColor' => ['#32CD32', '#FFD700', '#FF4500'],
                'hoverBackgroundColor' => ['#32CD32', '#FFD700', '#FF4500'],
                'data' => [$camiones_act, $camiones_tal, $camiones_ret]
            ]
        ])
        ->options([]);

        return view('camiones.index',compact('camiones','chartjs'));
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

        $camion->fill($request->all())->save();

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
            $camion->fill($request->all())->save();
            flash('<i class="icon-circle-check"></i> Datos el Camión actualizados satisfactoriamente!')->success()->important();
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
            flash('<i class="icon-circle-check"></i> No se pudo eliminar al Conductor!')->warning()->important();
            return redirect()->to('camiones');
        }
    }

    public function cambiar_status(Request $request)
    {
        //dd($request->all());
        $camion=Camiones::find($request->id_camion);

        $camion->status=$request->status;
        $camion->save();
        if ($request->status!=="Activo") {
            $buscar=Asignaciones::where('id_camion',$request->id_camion)->where('status','Asignado')->first();
            $buscar->status='Retirado';
            $buscar->save();

        }

        flash('<i class="icon-circle-check"></i> Ha sido cambiado el Status del Camión a '.$request->status.'!')->success()->important();
            return redirect()->to('camiones');
    }
}
