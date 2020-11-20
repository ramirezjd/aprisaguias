<?php

namespace App\Http\Controllers;

use App\transportista;
use Illuminate\Http\Request;

class TransportistaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $transportistas = transportista::all();
        return view('transportistas.index', compact('transportistas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('transportistas.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'tipo_documento' => 'required',
            'documento' => 'required',
            'nombres' => 'required',
            'apellidos' => 'required',
            'telefono' => 'required',
            'direccion' => 'required',
        ]);

        transportista::create([
            'tipo_documento' => request('tipo_documento'),
            'documento' => request('documento'),
            'nombres' => request('nombres'),
            'apellidos' => request('apellidos'),
            'telefono' => request('telefono'),
            'direccion' => request('direccion'),
        ]);

        return redirect()->route('transportistas.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\transportista  $transportista
     * @return \Illuminate\Http\Response
     */
    public function show(transportista $transportista)
    {
        return view('transportistas.show',compact('transportista'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\transportista  $transportista
     * @return \Illuminate\Http\Response
     */
    public function edit(transportista $transportista)
    {
        return view('transportistas.edit',compact('transportista'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\transportista  $transportista
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, transportista $transportista)
    {
        $request->validate([
            'tipo_documento' => 'required',
            'documento' => 'required',
            'nombres' => 'required',
            'apellidos' => 'required',
            'telefono' => 'required',
            'direccion' => 'required',
        ]);

        $transportista->update($request->all());
        return redirect()->route('transportistas.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\transportista  $transportista
     * @return \Illuminate\Http\Response
     */
    public function destroy(transportista $transportista)
    {
        $transportista->delete();

        return redirect()->route('transportistas.index');
    }
}
