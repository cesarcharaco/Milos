<?php

namespace App\Http\Controllers;

use App\Despachos;
use Illuminate\Http\Request;

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
    public function edit(Despachos $despachos)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Despachos  $despachos
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Despachos $despachos)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Despachos  $despachos
     * @return \Illuminate\Http\Response
     */
    public function destroy(Despachos $despachos)
    {
        //
    }
}
