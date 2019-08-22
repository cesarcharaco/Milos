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
        $conductores=Choferes::all();
        $total_conductores=count($conductores);

        $camiones=Camiones::all();
        $total_camiones=count($camiones);

        $despachos=Despachos::all();
        $total_despachos=count($despachos);

        $recepciones=Recepciones::all();
        $total_recepciones=count($recepciones);
        
        $hoy=date('Y-m-d');
        $despachos1=Despachos::where('fecha',$hoy)->get();

        $despacho_r=Despachos::where([['fecha',$hoy],['status','Realizado']])->count();
        $despacho_c=Despachos::where([['fecha',$hoy],['status','Cancelado']])->count();

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


        return view('reportes.index',compact('total_conductores','total_camiones','total_despachos','total_recepciones','despachos1','chartjs'));
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
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
