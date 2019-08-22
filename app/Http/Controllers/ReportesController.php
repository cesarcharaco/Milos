<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Choferes;
use App\Camiones;
use App\Despachos;
use App\Recepciones;

class ReportesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $despachos1=Despachos::all();

        $despacho_r=Despachos::where('status','Realizado')->count();
        $despacho_c=Despachos::where('status','Cancelado')->count();

        $no_llegado=0;
        $recibido=0;
        $cancelado=0;
        $devuelto=0;

        foreach ($despachos1 as $key) {
            switch ($key->recepciones->status) {
                case 'No ha Llegado':
                    $no_llegado++;
                    break;
                case 'Recibido':
                    $recibido++;
                    break;
                case 'Cancelado':
                    $cancelado++;
                    break;
                case 'Devuelto':
                    $devuelto++;
                    break;
            }
        }

        $chartjs = app()->chartjs
        ->name('barChartTest')
        ->type('bar')
        ->size(['width' => 800, 'height' => 200])
        ->labels(['Gráfica de despachos'])
        ->datasets([
            [
                "label" => "Desp. Realizado:".$despacho_r,
                'backgroundColor' => ['#FFA07A'],
                'data' => [$despacho_r]
            ],
            [
                "label" => "Desp. Cancelado:".$despacho_c,
                'backgroundColor' => ['#FFB6C1'],
                'data' => [$despacho_c]
            ],
            [
                "label" => "Recep. No ha Llegado:".$no_llegado,
                'backgroundColor' => ['#FFA500'],
                'data' => [$no_llegado]
            ],
            [
                "label" => "Recep. ´Recibido:".$recibido,
                'backgroundColor' => ['#EE82EE'],
                'data' => [$recibido]
            ],
            [
                "label" => "Recep. Cancelada:".$cancelado,
                'backgroundColor' => ['#32CD32'],
                'data' => [$cancelado]
            ],
            [
                "label" => "Recep. Devuelta:".$devuelto,
                'backgroundColor' => ['#008B8B'],
                'data' => [$devuelto]
            ]
        ])
        ->options([]);


        return view('reportes.index',compact('despachos1','chartjs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function filtro(Request $request)
    {
        //dd($request->all());
        $despachos_rea = Despachos::select('despachos.fecha','despachos.status')
            ->join('recepciones', 'recepciones.id_despacho', '=', 'despachos.id')
            ->whereBetween('despachos.fecha', [$request->fecha_desde, $request->fecha_hasta])
            ->where('despachos.status','Realizado')->count();

        $despachos_can = Despachos::select('despachos.fecha','despachos.status')
            ->join('recepciones', 'recepciones.id_despacho', '=', 'despachos.id')
            ->whereBetween('despachos.fecha', [$request->fecha_desde, $request->fecha_hasta])
            ->where('despachos.status','Cancelado')->count();

        $despachos_nhl = Despachos::select('despachos.fecha','recepciones.status')
            ->join('recepciones', 'recepciones.id_despacho', '=', 'despachos.id')
            ->whereBetween('despachos.fecha', [$request->fecha_desde, $request->fecha_hasta])
            ->where('recepciones.status','No ha Llegado')->count();

        $despachos_rec = Despachos::select('despachos.fecha','recepciones.status')
            ->join('recepciones', 'recepciones.id_despacho', '=', 'despachos.id')
            ->whereBetween('despachos.fecha', [$request->fecha_desde, $request->fecha_hasta])
            ->where('recepciones.status','Recibido')->count();

        $despachos_rcan = Despachos::select('despachos.fecha','recepciones.status')
            ->join('recepciones', 'recepciones.id_despacho', '=', 'despachos.id')
            ->whereBetween('despachos.fecha', [$request->fecha_desde, $request->fecha_hasta])
            ->where('recepciones.status','Cancelado')->count();

        $despachos_dev = Despachos::select('despachos.fecha','recepciones.status')
            ->join('recepciones', 'recepciones.id_despacho', '=', 'despachos.id')
            ->whereBetween('despachos.fecha', [$request->fecha_desde, $request->fecha_hasta])
            ->where('recepciones.status','Devuelto')->count();

        $chartjs = app()->chartjs
        ->name('barChartTest')
        ->type('bar')
        ->size(['width' => 800, 'height' => 200])
        ->labels(['Gráfica de despachos'])
        ->datasets([
            [
                "label" => "Desp. Realizado:".$despachos_rea,
                'backgroundColor' => ['#FFA07A'],
                'data' => [$despachos_rea]
            ],
            [
                "label" => "Desp. Cancelado:".$despachos_can,
                'backgroundColor' => ['#FFB6C1'],
                'data' => [$despachos_can]
            ],
            [
                "label" => "Recep. No ha Llegado:".$despachos_nhl,
                'backgroundColor' => ['#FFA500'],
                'data' => [$despachos_nhl]
            ],
            [
                "label" => "Recep. ´Recibido:".$despachos_rec,
                'backgroundColor' => ['#EE82EE'],
                'data' => [$despachos_rec]
            ],
            [
                "label" => "Recep. Cancelada:".$despachos_rcan,
                'backgroundColor' => ['#32CD32'],
                'data' => [$despachos_rcan]
            ],
            [
                "label" => "Recep. Devuelta:".$despachos_dev,
                'backgroundColor' => ['#008B8B'],
                'data' => [$despachos_dev]
            ]
        ])
        ->options([]);

        return view('reportes.filtro', compact('chartjs'));

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        dd('show');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
