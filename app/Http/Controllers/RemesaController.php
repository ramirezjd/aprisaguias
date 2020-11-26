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
        $guias = guia::where([['instalacion_actual_id', '=', $user->instalacion->id],
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
        $remesa = remesa::findOrFail($remesa->id);
        $guias_paquetes = guias_x_remesa::where('remesa_id', $remesa->id)->with('guia.paquetes')->get();

        return view ('remesas.show', compact('remesa'), compact('guias_paquetes'));
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


    public function recibir(Request $request)
    {
        $remesa = remesa::findOrFail($request->id);
        $guias_paquetes = guias_x_remesa::where('remesa_id', $request->id)->with('guia.paquetes')->get();

        return view ('remesas.recibir', compact('remesa'), compact('guias_paquetes'));
    }

    public function terminar(Request $request)
    {
        $remesa = remesa::where('id',$request->id)->with(['vehiculo','transportista'])->first();
        $remesa->status= 'Cerrada';
        $remesa->save();

        $vehiculo = $remesa->vehiculo;
        $vehiculo->status = 'Disponible';
        $vehiculo->save();

        $transportista = $remesa->transportista;
        $transportista->status = 'Disponible';
        $transportista->save();

        $user = User::findOrFail(Auth::id());
        $instalacion = $user->instalacion;

        $index = 0;
        foreach($request->guias as $id){
            $flag = 0;
            $guia = guia::where('id',$id)->with('paquetes')->first();
            if($request->novedades[$index] != NULL){
                $guia->novedad = $request->novedades[$index];
                $flag = 1;
            }
            else{
                $guia->novedad = 'OK';
            }

            if($guia->instalacion_destino_id == $instalacion->id){
                $guia->status = 'En destino';
            }
            else{
                $guia->status = 'Pendiente';
            }

            $guia->cod_actual = $instalacion->codigo;
            $guia->instalacion_actual_id = $instalacion->id;

            $index= $index+1;

            $index2 = 0;
            foreach($guia->paquetes as $paquete){
                if($request->paquetes[$index2] != NULL){
                    $paquete->novedad = $request->paquetes[$index2];
                    $flag = 1;
                }
                else{
                    $paquete->novedad = 'OK';
                }
                $paquete->save();
                $index2 = $index2+1;
            }

            if($flag == 1){
                $guia->status = 'Novedad';
            }

            $guia->save();
        }
        return redirect()->route('remesas.index');
    }
}
