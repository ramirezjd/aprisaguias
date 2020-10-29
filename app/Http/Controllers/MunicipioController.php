<?php

namespace App\Http\Controllers;

use App\municipio;
use Illuminate\Http\Request;

class MunicipioController extends Controller
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
     * @param  \App\municipio  $municipio
     * @return \Illuminate\Http\Response
     */
    public function show(municipio $municipio)
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
        $id = $request->municipio_id;
        $municipio = municipio::findOrFail($id);
        return $municipio->ciudades;
        //return response()->json(['success'=>'Got Simple Ajax Request.']);

    }



    /**
     * Display the specified resource.
     *
     * @param  \App\estado  $estado
     * @return \Illuminate\Http\Response
     */
    public function getChild2(Request $request)
    {
        $id = $request->municipio_id;
        $municipio = municipio::findOrFail($id);
        return $municipio->parroquias;
        //return response()->json(['success'=>'Got Simple Ajax Request.']);

    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\municipio  $municipio
     * @return \Illuminate\Http\Response
     */
    public function edit(municipio $municipio)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\municipio  $municipio
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, municipio $municipio)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\municipio  $municipio
     * @return \Illuminate\Http\Response
     */
    public function destroy(municipio $municipio)
    {
        //
    }
}
