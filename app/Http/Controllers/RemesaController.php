<?php

namespace App\Http\Controllers;
use App\guia;
use App\instalacion;
use App\vehiculo;
use App\transportista;
use App\guias_x_remesa;
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
        $user = User::findOrFail(Auth::id());
        if($user->hasRole('super-admin')){
            $remesas = remesa::with(['vehiculo' , 'transportista'])->get();
            $remesas_destino = remesa::where('destino', $user->instalacion_id)->with(['vehiculo' , 'transportista'])->get();
        }
        else{
            $remesas = remesa::where('origen', $user->instalacion_id)->with(['vehiculo' , 'transportista'])->get();
            $remesas_destino = remesa::where('destino', $user->instalacion_id)->with(['vehiculo' , 'transportista'])->get();
        }

        return view ('remesas.index', compact('remesas'), compact('remesas_destino'));

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
        $guias = guia::where([['instalacion_origen_id', '=', $user->instalacion->id],
                            ['status', '=', 'Pendiente']
                            ])->with(['user' , 'paquetes'])->get();

        $transportistas = transportista::where('status','Disponible')->get();
        $vehiculos = vehiculo::where('status','Disponible')->get();

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

        $volumen_total = $dim_ancho_total*$dim_alto_total*$dim_fondo_total;

        $user = User::findOrFail(Auth::id());
        $origen = $user->instalacion_id;

        $origen2 = instalacion::find($origen);
        $destino = instalacion::find($request->get('instalacion_destino'));

        $remesa = remesa::create([
            'codigo' => request('codigo'),
            'origen' => $origen,
            'destino' => request('instalacion_destino'),
            'cod_origen' => $origen2->codigo,
            'cod_destino' => $destino->codigo,
            'peso_volumetrico_total' => $peso_volumetrico_total,
            'volumen_total' => $volumen_total,
            'peso_total' => $peso_total,
            'vehiculo_id' => request('vehiculo'),
            'transportista_id' => request('transportista'),
            'status' => 'Creada',
        ]);

        $remesa->save();

        for($i=0; $i < $max; $i++){
            $guia = guia::where('id', $guias_array[$i])->first();
            guias_x_remesa::create([
                'guia_id' => $guia->id,
                'remesa_id' => $remesa->id,
            ]);
            $guia->status = 'En remesa';
            $guia->save();
        }

        $transportista = transportista::findOrFail($request->get('transportista'));
        $transportista->status = 'Viajando';
        $transportista->save();

        $vehiculo = vehiculo::findOrFail($request->get('vehiculo'));
        $vehiculo->status = 'Viajando';
        $vehiculo->save();

        return redirect()->route('remesas.index');
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
        $id = $remesa->id;
        $remesa = remesa::where('id', $id)->with(['vehiculo' , 'transportista'])->first();
        $transportistas = transportista::all();
        $vehiculos = vehiculo::all();
        return view('remesas.edit', [
            'remesa' => $remesa,
            'vehiculos' => $vehiculos,
            'transportistas' => $transportistas,
        ]);
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
        return('asdaskjdas');
    }
}
