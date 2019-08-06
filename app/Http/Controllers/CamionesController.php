<?php

namespace App\Http\Controllers;

use App\Camiones;
use Illuminate\Http\Request;

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
        //
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
    public function edit(Camiones $camiones)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Camiones  $camiones
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Camiones $camiones)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Camiones  $camiones
     * @return \Illuminate\Http\Response
     */
    public function destroy(Camiones $camiones)
    {
        //
    }
}
