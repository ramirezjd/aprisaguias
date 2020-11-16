<?php

namespace App\Http\Controllers;
use App\guia;
use App\estado;
use App\municipio;
use App\ciudad;
use App\parroquia;
use App\zip_code;
use App\direccion;
use App\cliente;
use App\paquete;
use App\paquetes_x_guia;
use App\User;
use DB;
use Auth;

use App\remesa;
use Illuminate\Http\Request;

class RemesaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return 'What r u looking 4?';
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $user = User::findOrFail(Auth::id());

        $guias = guia::where('instalacion_origen_id', $user->instalacion->id)->get()->with('user');
        return $guias;

        return view('remesas.create', [
            'user' => $user,
            'guias' => $guias,
        ]);
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
     * @param  \App\remesa  $remesa
     * @return \Illuminate\Http\Response
     */
    public function show(remesa $remesa)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\remesa  $remesa
     * @return \Illuminate\Http\Response
     */
    public function edit(remesa $remesa)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\remesa  $remesa
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, remesa $remesa)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\remesa  $remesa
     * @return \Illuminate\Http\Response
     */
    public function destroy(remesa $remesa)
    {
        //
    }
}
