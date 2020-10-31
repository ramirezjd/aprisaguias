<?php

namespace App\Http\Controllers;

use App\guia;
use App\estado;
use App\municipio;
use App\ciudad;
use App\parroquia;
use App\zip_code;
use App\direccion;

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

        
        echo "<pre>";
        var_dump($direccion_sender->id);
        echo "</pre>";
        die;
        $direccion_receiver = Direccion::create([
            'urbanizacion' => request('urban_receiver'),
            'via-principal' => request('address_receiver'),
            'edificio-casa' => request('house_receiver'),
            'punto-referencia' => request('reference_receiver'),
            'estado_id' => request('state_receiver_id'),
            'ciudad_id' => request('city_receiver_id'),
            'municipio_id' => request('province_receiver_id'),
            'parroquia_id' => request('parroq_receiver_id'),
            'zip_code_id' => request('zip_receiver_id'),
        ]);



        $guias = Guia::create($request->all());

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
