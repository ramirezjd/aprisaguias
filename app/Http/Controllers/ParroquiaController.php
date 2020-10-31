<?php

namespace App\Http\Controllers;

use App\parroquia;
use Illuminate\Http\Request;

class ParroquiaController extends Controller
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
     * @param  \App\parroquia  $parroquia
     * @return \Illuminate\Http\Response
     */
    public function show(parroquia $parroquia)
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
        $id = $request->parroquia_id;
        $parroquia = parroquia::findOrFail($id);
        return $parroquia->zip_code;
        //return response()->json(['success'=>'Got Simple Ajax Request.']);

    }




    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\parroquia  $parroquia
     * @return \Illuminate\Http\Response
     */
    public function edit(parroquia $parroquia)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\parroquia  $parroquia
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, parroquia $parroquia)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\parroquia  $parroquia
     * @return \Illuminate\Http\Response
     */
    public function destroy(parroquia $parroquia)
    {
        //
    }
}
