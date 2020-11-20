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
use App\User;
use App\instalacion;
use Auth;
use PDF;

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
        $guias = Guia::with(['user', 'tipo_destino'])->get();
        return view('guias.index', compact('guias'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $user = User::findOrFail(Auth::id());


        $instalaciones = instalacion::with(['estado', 'ciudad', 'municipio', 'parroquia', 'zip_code'])->get();
        $instalaciones = $instalaciones->except(['1', $user->instalacion_id]);

        $instalacion_origen = instalacion::where('id', $user->instalacion_id)->with(['estado', 'ciudad', 'municipio', 'parroquia', 'zip_code'])->first();


        return view('guias.create', [
            'estados' => estado::orderBy('estado')->get(),
            'municipios' => municipio::orderBy('municipio')->get(),
            'ciudades' => ciudad::orderBy('ciudad')->get(),
            'parroquias' => parroquia::orderBy('parroquia')->get(),
            'zip_codes' => zip_code::orderBy('zip_code')->get(),
            'instalaciones' => $instalaciones,
            'instalacion_origen' => $instalacion_origen,
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
            //'date_deliver' => 'required',
            'type_destiny' => 'required',
            'type_payment' => 'required',
            //Package
            'weight_pack' => 'required',
            'width_pack' => 'required',
            'height_pack' => 'required',
            'deep_pack' => 'required',
            'description_pack' => 'required',
            //Guide Location - Direccion
             'estados' => 'required',
             'municipios' => 'required',
             'ciudades' => 'required',
             'parroquias' => 'required',
             'zip_codes' => 'required',
            //Guide Sender - Cliente 1
            'id_sender' => 'required',
            'mail_sender' => 'required',
            'name_sender' => 'required',
            'phone_sender' => 'required',
            'address_sender' => 'required',
            //'state_sender_id' => 'required',
            //'province_sender_id' => 'required',
            //'city_sender_id' => 'required',
            //'urban_sender' => 'required',
            //'parroq_sender_id' => 'required',
            'house_sender' => 'required',
            //'zip_sender_id' => 'required',
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
            'estado_id' => request('estados'),
            'ciudad_id' => request('ciudades'),
            'municipio_id' => request('municipios'),
            'parroquia_id' => request('parroquias'),
            'zip_code_id' => request('zip_codes'),
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


        $cod_origen = instalacion::findOrFail($request->get('instalacion_origen'));
        $cod_destino = instalacion::findOrFail($request->get('instalacion_destino'));

        $guides = Guia::create([
            'codigo' => request('codigo'),
            'precio' => request('price_package'),
            'asegurado' => 0,
            'fecha_creacion' => request('date_creation'),
            'fecha_entrega' => request('date_deliver'),
            'user_id' => Auth::id(),
            'cliente_remitente_id' => $client_sender->id,
            'cliente_destinatario_id' => $client_receiver->id,
            'instalacion_origen_id' => request('instalacion_origen'),
            'cod_origen' => $cod_origen->codigo,
            'instalacion_destino_id' => request('instalacion_destino'),
            'cod_destino' => $cod_destino->codigo,
            'tipo_destino_id' => request('type_destiny'),
            'tipo_pago_id' => request('type_payment'),
            'status' => 'Pendiente',
        ]);

        $peso_volumetrico_total = 0;
        $peso_total = 0;
        $n_paquetes=0;

        for ($i=0; $i < count(request('weight_pack')); $i++) {
            $peso_vol = $request->get('width_pack')[$i] * $request->get('height_pack')[$i] * $request->get('deep_pack')[$i] * 333 / 1000000;
            $peso_volumetrico_total += $peso_vol;
            $peso_total += request('weight_pack')[$i];
            $n_paquetes++;

            $package = Paquete::create([
                'peso' => request('weight_pack')[$i],
                'dim_ancho' => request('width_pack')[$i],
                'dim_alto' => request('height_pack')[$i],
                'dim_fondo' => request('deep_pack')[$i],
                'peso_volumetrico' => $peso_vol,
                'descripcion' => request('description_pack')[$i],
                'tipo_paquete_id' => request('type_package')[$i],
                'guia_id' => $guides->id,
            ]);
        }

        $guides->peso_total = $peso_total;
        $guides->peso_volumetrico = $peso_volumetrico_total;
        $guides->n_paquetes = $n_paquetes;
        $guides->save();

        // echo "<pre>";
        // var_dump($package);
        // die;
        // echo "</pre>";

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

    public function pdftest($id){
        $guia = guia::findOrFail($id);
        $remitente = cliente::findOrFail($guia->cliente_remitente_id);
        $destinatario = cliente::findOrFail($guia->cliente_destinatario_id);

        $pdf = PDF::loadView('guias.pdf',compact('guia', 'remitente', 'destinatario'));
        return $pdf->download('guia-'.$guia->codigo.'.pdf');
        //return view('guias.pdf')->with(compact('guia', 'remitente', 'destinatario'));

    }

    public function createPDF() {
        // retreive all records from db
        $data = guia::all();

        // share data to view
        view()->share('employee',$data);
        $pdf = PDF::loadView('pdf_view', $data);

        // download PDF file with download method
        return $pdf->download('pdf_file.pdf');
      }
}
