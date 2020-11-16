<?php

namespace App\Http\Controllers;

use App\instalacion;
use App\estado;
use App\ciudad;
use App\municipio;
use App\parroquia;
use App\zip_code;

use App\direccion;
use App\tipo_instalacion;
use Illuminate\Http\Request;
use InstalacionSeeder;
use Symfony\Component\VarDumper\VarDumper;

class InstalacionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $instalaciones = instalacion::with('tipo_instalacion')->get();
        return view('instalaciones.index', [
            'instalaciones' => $instalaciones,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('instalaciones.create', [
            'estados' => estado::orderBy('estado')->get(),
            'tipos' => tipo_instalacion::orderBy('nombre')->get(),
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
            'descripcion' => 'required',
            'tipo_instalacion' => 'required',
            'estados' => 'required',
            'municipios' => 'required',
            'ciudades' => 'required',
            'parroquias' => 'required',
            'zip_codes' => 'required',
            'urbanizacion' => 'required',
            'edificio_casa' => 'required',
            'punto_referencia' => 'required',
            'via_principal' => 'required',
        ]);

        if($request->get('estados')<10){
            $aux = '0';
        }
        else{
            $aux= '';
        }

        if(strlen($request->get('zip_codes')) == 1){
            $aux2 = '000';
        }
        elseif (strlen($request->get('zip_codes')) == 2) {
            $aux2 = '00';
        }
        elseif (strlen($request->get('zip_codes')) == 3) {
            $aux2 = '0';
        }
        elseif (strlen($request->get('zip_codes')) == 4) {
            $aux2 = '';
        }

        $codigo = '58-'.$aux.$request->get('estados').$aux2.$request->get('zip_codes');

        $instalacion = instalacion::create([
            'codigo' => $codigo,
            'descripcion' => request('descripcion'),
            'tipo_instalacion_id' => request('tipo_instalacion'),
            'urbanizacion' => request('urbanizacion'),
            'via_principal' => request('via_principal'),
            'edificio_casa' => request('edificio_casa'),
            'punto_referencia' => request('punto_referencia'),
            'estado_id' => request('estados'),
            'ciudad_id' => request('ciudades'),
            'municipio_id' => request('municipios'),
            'parroquia_id' => request('parroquias'),
            'zip_code_id' => request('zip_codes'),
        ]);

        return redirect()->route('instalacion.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\instalacion  $instalacion
     * @return \Illuminate\Http\Response
     */
    public function show(instalacion $instalacion)
    {
        return view('instalaciones.show',compact('instalacion'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\instalacion  $instalacion
     * @return \Illuminate\Http\Response
     */
    public function edit(instalacion $instalacion)
    {

        //$parroquia = parroquia::findOrFail($instalacion->parroquia_id);
        //return $parroquia->zip_code;

        $municipios = estado::findOrFail($instalacion->estado_id)->municipios;
        $ciudades = municipio::findOrFail($instalacion->municipio_id)->ciudades;
        $parroquias = municipio::findOrFail($instalacion->municipio_id)->parroquias;
        $zip_code = zip_code::findOrFail($instalacion->zip_code_id);

        return view('instalaciones.edit', [
            'instalacion' => $instalacion,
            'estados' => estado::orderBy('estado')->get(),
            'municipios' => $municipios,
            'ciudades' => $ciudades,
            'parroquias' => $parroquias,
            'zip_code' => $zip_code,
            'tipos' => tipo_instalacion::orderBy('nombre')->get(),
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\instalacion  $instalacion
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, instalacion $instalacion)
    {
        $request->validate([
            'descripcion' => 'required',
            'tipo_instalacion' => 'required',
            'estados' => 'required',
            'municipios' => 'required',
            'ciudades' => 'required',
            'parroquias' => 'required',
            'zip_codes' => 'required',
            'urbanizacion' => 'required',
            'edificio_casa' => 'required',
            'punto_referencia' => 'required',
            'via_principal' => 'required',
        ]);


        $instalacion->update([
            'descripcion' => request('descripcion'),
            'tipo_instalacion_id' => request('tipo_instalacion'),
            'urbanizacion' => request('urbanizacion'),
            'via_principal' => request('via_principal'),
            'edificio_casa' => request('edificio_casa'),
            'punto_referencia' => request('punto_referencia'),
            'estado_id' => request('estados'),
            'ciudad_id' => request('ciudades'),
            'municipio_id' => request('municipios'),
            'parroquia_id' => request('parroquias'),
            'zip_code_id' => request('zip_codes'),
        ]);


        return redirect()->route('instalacion.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\instalacion  $instalacion
     * @return \Illuminate\Http\Response
     */


    public function destroy(instalacion $instalacion)
    {
        $instalacion->delete();
        return redirect()->route('instalacion.index');
    }
}
