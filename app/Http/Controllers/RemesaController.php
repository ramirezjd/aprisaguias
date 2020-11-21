<?php

namespace App\Http\Controllers;
use App\guia;
use App\instalacion;
use App\vehiculo;
use App\transportista;
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
        $instalaciones = instalacion::all()->except(['1', $user->instalacion_id]);
        $guias = guia::where('instalacion_origen_id', $user->instalacion->id)->with(['user' , 'paquetes'])->get();
        $transportistas = transportista::all();
        $vehiculos = vehiculo::all();

        return view('remesas.create', [
            'user' => $user,
            'guias' => $guias,
            'instalaciones' => $instalaciones,
            'transportistas' => $transportistas,
            'vehiculos' => $vehiculos,
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
            'guiasarray' => 'required',
            'instalacion_destino' => 'required',
            'vehiculo' => 'required',
            'transportista' => 'required',
        ]);

        $peso_total = 0;
        $dim_ancho_total = 0;
        $dim_alto_total = 0;
        $dim_fondo_total = 0;
        $peso_volumetrico_total = 0;

        if($request->get('guiasarray')){

            $guias_array = $request->get('guiasarray');
            $max = count($guias_array);

            for($i=0; $i < $max; $i++){
                $guia = guia::where('id', $guias_array[$i])->first();
                foreach($guia->paquetes as $paquete){
                    $peso_total+= $paquete->peso;
                    $dim_ancho_total+= $paquete->dim_ancho;
                    $dim_alto_total+= $paquete->dim_alto;
                    $dim_fondo_total+= $paquete->dim_fondo;
                    $peso_volumetrico_total+= $paquete->peso_volumetrico;
                }
            }
        }
        $volumen_total = $dim_ancho_total*$dim_alto_total*$dim_fondo_total;

        $user = User::findOrFail(Auth::id());
        $origen = $user->instalacion_id;

        $remesas = remesa::create([
            'codigo' => request('codigo'),
            'origen' => $origen,
            'destino' => request('instalacion_destino'),
            'peso_volumetrico_total' => $peso_volumetrico_total,
            'volumen_total' => $volumen_total,
            'peso_total' => $peso_total,
            'vehiculo_id' => request('codigo'),
            'transportista_id' => request('transportista'),
        ]);



        return redirect()->route('users.index');
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
