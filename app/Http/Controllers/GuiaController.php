<?php

namespace App\Http\Controllers;

use App\guia;
use App\estado;
use App\municipio;
use App\ciudad;
use App\parroquia;
use App\zip_code;

use Illuminate\Http\Request;

class GuiaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $guias = Guia::latest()->paginate(5);

        return view('guias.index',compact('guias'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('guias.create', [
            'estados' => estado::orderBy('estado')->get(),
            'municipios' => municipio::orderBy('municipio')->get(),
            'ciudades' => ciudad::orderBy('ciudad')->get(),
            'parroquias' => parroquia::orderBy('parroquia')->get(),
            'zip_codes' => zip_code::orderBy('zip_code')->get()
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
        $request->validate([
            'codigo' => 'required',
            'peso' => 'required',
            'dimensiones' => 'required',
            'precio' => 'required',
            'fecha_entrega' => 'required',
            'direccion_destino' => 'required',
            'punto_referencia_destino' => 'required'
        ]);

        Guia::create($request->all());

        return redirect()->route('guias.index')
                        ->with('success','Guía Creadas Exitosamente.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\guia  $guia
     * @return \Illuminate\Http\Response
     */
    public function show(guia $guia)
    {
        return view('guias.show',compact('guia'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\guia  $guia
     * @return \Illuminate\Http\Response
     */
    public function edit(guia $guia)
    {
        return view('guias.edit',compact('guia'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\guia  $guia
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, guia $guia)
    {

        $request->validate([
            'codigo' => 'required',
            'peso' => 'required',
            'dimensiones' => 'required',
            'precio' => 'required',
            'fecha_entrega' => 'required',
            'direccion_destino' => 'required',
            'punto_referencia_destino' => 'required'
        ]);

        $guia->update($request->all());

        return redirect()->route('guias.index')
                        ->with('success','Guía Actualizada Exitosamente.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\guia  $guia
     * @return \Illuminate\Http\Response
     */
    public function destroy(guia $guia)
    {
        $guia->delete();

        return redirect()->route('guias.index')
                        ->with('success','Guía Eliminada Exitosamente.');
    }
}
