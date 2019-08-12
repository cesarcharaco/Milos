<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Choferes;
use App\Camiones;
use App\Despachos;
use App\Recepciones;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
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

        return view('home',compact('total_conductores','total_camiones','total_despachos','total_recepciones','despachos1'));
    }
}
