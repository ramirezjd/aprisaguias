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
use Auth;

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
            //Guide Code
            'codigo' => 'required',
            //Guide Requirements
            'price_package' => 'required',
            'date_deliver' => 'required',
            'type_destiny' => 'required',
            'type_payment' => 'required',
            //Package
            'weight_pack' => 'required',
            'width_pack' => 'required',
            'height_pack' => 'required',
            'deep_pack' => 'required',
            'description_pack' => 'required',
            //Guide Location - Direccion
            // 'estados' => 'required',
            // 'municipios' => 'required',
            // 'ciudades' => 'required',
            // 'parroquias' => 'required',
            // 'zip_codes' => 'required',
            //Guide Sender - Cliente 1
            'id_sender' => 'required',
            'mail_sender' => 'required',
            'name_sender' => 'required',
            'phone_sender' => 'required',
            'address_sender' => 'required',
            'state_sender_id' => 'required',
            'province_sender_id' => 'required',
            'city_sender_id' => 'required',
            'urban_sender' => 'required',
            'parroq_sender_id' => 'required',
            'house_sender' => 'required',
            'zip_sender_id' => 'required',
            'reference_sender' => 'required',
            //Guide Receiver - Cliente 2
            'id_receiver' => 'required',
            'mail_receiver' => 'required',
            'name_sender' => 'required',
            'phone_receiver' => 'required',
            'address_receiver' => 'required',
            'state_receiver' => 'required',
            'province_receiver' => 'required',
            'city_receiver' => 'required',
            'parroq_receiver' => 'required',
            'urban_receiver' => 'required',
            'house_receiver' => 'required',
            'zip_receiver' => 'required',
            'reference_receiver' => 'required',
            //Guide Package - Paquete
        ]);
        
        $direccion_sender = Direccion::create([
            'urbanizacion' => request('urban_sender'),
            'via-principal' => request('address_sender'),
            'edificio-casa' => request('house_sender'),
            'punto-referencia' => request('reference_sender'),
            'estado_id' => request('state_sender_id'),
            'ciudad_id' => request('city_sender_id'),
            'municipio_id' => request('province_sender_id'),
            'parroquia_id' => request('parroq_sender_id'),
            'zip_code_id' => request('zip_sender_id'),
        ]);

        
        $direccion_receiver = Direccion::create([
            'urbanizacion' => request('urban_receiver'),
            'via-principal' => request('address_receiver'),
            'edificio-casa' => request('house_receiver'),
            'punto-referencia' => request('reference_receiver'),
            'estado_id' => request('state_receiver'),
            'ciudad_id' => request('city_receiver'),
            'municipio_id' => request('province_receiver'),
            'parroquia_id' => request('parroq_receiver'),
            'zip_code_id' => request('zip_receiver'),
        ]);


        $client_sender = Cliente::create([
            'tipo_documento' => 'V-',
            'documento' => request('id_sender'),
            'nombre-razonsocial' => request('name_sender'),
            'email' => request('mail_sender'),
            'telefono' => request('phone_sender'),
            'direccion_id' => $direccion_sender->id,

        ]);

        $client_receiver = Cliente::create([
            'tipo_documento' => 'V-',
            'documento' => request('id_receiver'),
            'nombre-razonsocial' => request('name_receiver'),
            'email' => request('mail_receiver'),
            'telefono' => request('phone_receiver'),
            'direccion_id' => $direccion_receiver->id,

        ]);

        $guides = Guia::create([
            'codigo' => request('codigo'),
            'precio' => request('price_package'),
            'asegurado' => 0,
            'fecha_creacion' => request('date_creation'),
            'fecha_entrega' => request('date_deliver'),
            'user_id' => Auth::id(),
            'cliente_remitente_id' => $client_sender->id,
            'cliente_destinatario_id' => $client_receiver->id,
            'instalacion_origen_id' => 1,
            'instalacion_destino_id' => 2,
            'tipo_destino_id' => request('type_destiny'),
            'tipo_pago_id' => request('type_payment'),
        ]);

        $package = Paquete::create([
            'peso' => request('weight_pack'),
            'dim_ancho' => request('width_pack'),
            'dim_alto' => request('height_pack'),
            'dim_fondo' => request('deep_pack'),
            'descripcion' => request('description_pack'),
            'tipo_paquete_id' => request('type_package'),
        ]);

        $guide_package = Paquetes_x_guia::create([
            'guia_id' => $guides->id,
            'paquete_id' => $package->id,
        ]);

        echo "<pre>";
        var_dump($guide_package);
        echo "</pre>";
        die;
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
            'precio' => 'required',
            'fecha_creacion' => 'required',
            'fecha_entrega' => 'required'
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
