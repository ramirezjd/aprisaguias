<?php

namespace App\Http\Controllers;

use App\estado;
use Illuminate\Http\Request;

class EstadoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
     * @param  \App\estado  $estado
     * @return \Illuminate\Http\Response
     */
     public function show(estado $estado)
     {
         //
     }

    /**
     * Display the specified resource.
     *
     * @param  \App\estado  $estado
     * @return \Illuminate\Http\Response
     */
     public function getChild(Request $request)
     {  
         $id = $request->estado_id;
         $estado = estado::findOrFail($id);
         return $estado->municipios;
         //return response()->json(['success'=>'Got Simple Ajax Request.']);
         
     }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\estado  $estado
     * @return \Illuminate\Http\Response
     */
    public function edit(estado $estado)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\estado  $estado
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, estado $estado)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\estado  $estado
     * @return \Illuminate\Http\Response
     */
    public function destroy(estado $estado)
    {
        //
    }
}
