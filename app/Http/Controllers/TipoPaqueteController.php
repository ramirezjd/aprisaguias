<?php

namespace App\Http\Controllers;

use App\tipo_paquete;
use Illuminate\Http\Request;

class TipoPaqueteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return 'hola';
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\tipo_paquete  $tipo_paquete
     * @return \Illuminate\Http\Response
     */
    public function show(tipo_paquete $tipo_paquete)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\tipo_paquete  $tipo_paquete
     * @return \Illuminate\Http\Response
     */
    public function edit(tipo_paquete $tipo_paquete)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\tipo_paquete  $tipo_paquete
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, tipo_paquete $tipo_paquete)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\tipo_paquete  $tipo_paquete
     * @return \Illuminate\Http\Response
     */
    public function destroy(tipo_paquete $tipo_paquete)
    {
        //
    }
}
