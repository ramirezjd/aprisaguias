<?php

namespace App\Http\Controllers;

use App\guia;
use App\guias_x_remesa;
use App\estado;
use App\municipio;
use App\ciudad;
use App\parroquia;
use App\zip_code;
use App\direccion;
use App\cliente;
use App\paquete;
use App\tipo_paquete;
use App\User;
use App\instalacion;
use Auth;
use PDF;
use Endroid\QrCode\QrCode;
use Endroid\QrCode\ErrorCorrectionLevel;
use Endroid\QrCode\LabelAlignment;
use File;

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
        $user = User::findOrFail(Auth::id());
        if($user->hasRole('super-admin')){
            $guias_enviar = guia::with(['user' , 'tipo_destino'])->get();
            $guias_entregar = guia::with(['user' , 'tipo_destino'])->get();
            $guias_entregadas = guia::with(['user' , 'tipo_destino'])->get();
        }
        else{
            $guias_enviar = guia::where('instalacion_actual_id', $user->instalacion_id)->where('status', 'Pendiente')->with(['user' , 'tipo_destino'])->get();
            $guias_entregar = guia::where('instalacion_actual_id', $user->instalacion_id)->where('instalacion_destino_id', $user->instalacion_id)->where('status', 'En destino')->with(['user' , 'tipo_destino'])->get();
            $guias_entregadas = guia::where('instalacion_actual_id', $user->instalacion_id)->where('instalacion_destino_id', $user->instalacion_id)->where('status', 'Cerrada')->with(['user' , 'tipo_destino'])->get();
        }

        return view('guias.index',[
            'guias_enviar' => $guias_enviar,
            'guias_entregar' => $guias_entregar,
            'guias_entregadas' => $guias_entregadas,
            'user' => $user,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $user = User::findOrFail(Auth::id());

        $tipo_paquetes = tipo_paquete::all();

        $instalaciones = instalacion::with(['estado', 'ciudad', 'municipio', 'parroquia', 'zip_code'])->get();
        $instalaciones = $instalaciones->except(['1','2', $user->instalacion_id]);

        $instalacion_origen = instalacion::where('id', $user->instalacion_id)->with(['estado', 'ciudad', 'municipio', 'parroquia', 'zip_code'])->first();

        return view('guias.create', [
            'estados' => estado::where('id', '!=', '25')->orderBy('estado')->get(),
            'municipios' => municipio::orderBy('municipio')->get(),
            'ciudades' => ciudad::orderBy('ciudad')->get(),
            'parroquias' => parroquia::orderBy('parroquia')->get(),
            'zip_codes' => zip_code::orderBy('zip_code')->get(),
            'instalaciones' => $instalaciones,
            'instalacion_origen' => $instalacion_origen,
            'tipo_paquetes' => $tipo_paquetes,
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
            //Guide Sender - Cliente 1
            'estados' => 'required',
            'municipios' => 'required',
            'ciudades' => 'required',
            'parroquias' => 'required',
            'zip_codes' => 'required',
            'id_sender' => 'required',
            'mail_sender' => 'required',
            'name_sender' => 'required',
            'phone_sender' => 'required',
            'address_sender' => 'required',
            'house_sender' => 'required',
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

        $client_sender = cliente::where('documento', $request->get('id_sender'))->first();

        if($client_sender != null){
            $direccion_sender= direccion::where('id', $client_sender->direccion_id)->first();
            $direccion_sender->urbanizacion = $request->get('urban_sender');
            $direccion_sender->via_principal = $request->get('address_sender');
            $direccion_sender->edificio_casa = $request->get('house_sender');
            $direccion_sender->punto_referencia = $request->get('reference_sender');
            $direccion_sender->estado_id = $request->get('estados');
            $direccion_sender->ciudad_id = $request->get('ciudades');
            $direccion_sender->municipio_id = $request->get('municipios');
            $direccion_sender->parroquia_id = $request->get('parroquias');
            $direccion_sender->zip_code_id = $request->get('zip_codes');
            $direccion_sender->save();

            $client_sender->nombre_razonsocial = $request->get('name_sender');
            $client_sender->email = $request->get('mail_sender');
            $client_sender->telefono = $request->get('phone_sender');
            $client_sender->save();
        }
        else{
            $direccion_sender = Direccion::create([
                'urbanizacion' => request('urban_sender'),
                'via_principal' => request('address_sender'),
                'edificio_casa' => request('house_sender'),
                'punto_referencia' => request('reference_sender'),
                'estado_id' => request('estados'),
                'ciudad_id' => request('ciudades'),
                'municipio_id' => request('municipios'),
                'parroquia_id' => request('parroquias'),
                'zip_code_id' => request('zip_codes'),
            ]);

            $client_sender = Cliente::create([
                'tipo_documento' => 'V-',
                'documento' => request('id_sender'),
                'nombre_razonsocial' => request('name_sender'),
                'email' => request('mail_sender'),
                'telefono' => request('phone_sender'),
                'direccion_id' => $direccion_sender->id,
            ]);
        }



        $client_receiver = cliente::where('documento', $request->get('id_receiver'))->first();
        if($client_receiver != null){

            $direccion_receiver = direccion::where('id', $client_receiver->direccion_id)->first();

            $direccion_receiver->urbanizacion = $request->get('urban_receiver');
            $direccion_receiver->via_principal = $request->get('address_receiver');
            $direccion_receiver->edificio_casa = $request->get('house_receiver');
            $direccion_receiver->punto_referencia = $request->get('reference_receiver');
            $direccion_receiver->estado_id = $request->get('state_receiver');
            $direccion_receiver->ciudad_id = $request->get('city_receiver');
            $direccion_receiver->municipio_id = $request->get('province_receiver');
            $direccion_receiver->parroquia_id = $request->get('parroq_receiver');
            $direccion_receiver->zip_code_id = $request->get('zip_receiver');
            $direccion_receiver->save();

            $client_receiver->nombre_razonsocial = $request->get('name_receiver');
            $client_receiver->email = $request->get('mail_receiver');
            $client_receiver->telefono = $request->get('phone_receiver');
            $client_receiver->save();
        }
        else{
            $direccion_receiver = Direccion::create([
                'urbanizacion' => request('urban_receiver'),
                'via_principal' => request('address_receiver'),
                'edificio_casa' => request('house_receiver'),
                'punto_referencia' => request('reference_receiver'),
                'estado_id' => request('state_receiver'),
                'ciudad_id' => request('city_receiver'),
                'municipio_id' => request('province_receiver'),
                'parroquia_id' => request('parroq_receiver'),
                'zip_code_id' => request('zip_receiver'),
            ]);

            $client_receiver = Cliente::create([
                'tipo_documento' => 'V-',
                'documento' => request('id_receiver'),
                'nombre_razonsocial' => request('name_receiver'),
                'email' => request('mail_receiver'),
                'telefono' => request('phone_receiver'),
                'direccion_id' => $direccion_receiver->id,

            ]);
        }


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
            'instalacion_actual_id' => request('instalacion_origen'),
            'cod_actual' => $cod_origen->codigo,
            'tipo_destino_id' => request('type_destiny'),
            'tipo_pago_id' => request('type_payment'),
            'status' => 'Pendiente',
        ]);

        $peso_volumetrico_total = 0;
        $peso_total = 0;
        $n_paquetes=0;

        for ($i=0; $i < count(request('weight_pack')); $i++) {

            if(request('weight_pack')[$i] != null){
                $peso = request('weight_pack')[$i];
            }
            else{
                $peso = 1;
            }

            if(request('width_pack')[$i] != null){
                $dim_ancho = request('width_pack')[$i];
            }
            else{
                $dim_ancho = 1;
            }

            if(request('width_pack')[$i] != null){
                $dim_alto = request('height_pack')[$i];
            }
            else{
                $dim_alto = 1;
            }

            if(request('width_pack')[$i] != null){
                $dim_fondo = request('deep_pack')[$i];
            }
            else{
                $dim_fondo = 1;
            }

            $peso_vol = $dim_ancho * $dim_alto *$dim_fondo * 333 / 1000000;
            $peso_volumetrico_total += $peso_vol;
            $peso_total += $peso;
            $n_paquetes++;

            $package = Paquete::create([
                'peso' => $peso,
                'dim_ancho' => $dim_ancho,
                'dim_alto' => $dim_alto,
                'dim_fondo' => $dim_fondo,
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
        $guiaa = guia::where('id', $guia->id)->first();
        $user = User::findOrFail(Auth::id());
        return view('guias.show',['guia'=>$guiaa, 'user'=> $user]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\guia  $guia
     * @return \Illuminate\Http\Response
     */
    public function edit(guia $guia)
    {
        /*
        return view('guias.edit',compact('guia'));
        */
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
        $origen = direccion::where('id', $remitente->direccion_id)->with(['estado', 'ciudad', 'municipio', 'parroquia', 'zip_code'])->first();
        $destino = direccion::where('id', $destinatario->direccion_id)->with(['estado', 'ciudad', 'municipio', 'parroquia', 'zip_code'])->first();
        $paquetes = $guia->paquetes;

        $direccion_origen = $origen->estado->estado. '-' . $origen->municipio->municipio . '-' .
            $origen->ciudad->ciudad . '-' . $origen->parroquia->parroquia . '-' . $origen->zip_code->zip_code;

        $direccion_destino = $destino->estado->estado. '-' . $destino->municipio->municipio . '-' .
            $destino->ciudad->ciudad . '-' . $destino->parroquia->parroquia . '-' . $destino->zip_code->zip_code;

        $data = [
            //meta
            'codigo' => $guia->codigo,
            'peso_total' => $guia->peso_total,
            'peso_volumetrico' => $guia->peso_volumetrico,
            'fecha_creacion' => $guia->fecha_creacion,

            //origen
            'origen' => $guia->cod_origen,
            'remitente_tipo_documento' => $remitente->tipo_documento,
            'remitente_documento' => $remitente->documento,
            'remitente_nombre_razonsocial' => $remitente->nombre_razonsocial,
            'remitente_email' => $remitente->email,
            'remitente_telefono' => $remitente->telefono,
            'remitente_direccion' => $direccion_origen,

            //destino
            'destino' => $guia->cod_destino,
            'destinatario_tipo_documento' => $destinatario->tipo_documento,
            'destinatario_documento' => $destinatario->documento,
            'destinatario_nombre_razonsocial' => $destinatario->nombre_razonsocial,
            'destinatario_email' => $destinatario->email,
            'destinatario_telefono' => $destinatario->telefono,
            'destinatario_direccion' => $direccion_destino,

            'n_paquetes' => count($paquetes),
            'paquetes' => $paquetes->all(),
        ];

        PDF::setOptions([
            'dpi' => 150,
            'defaultFont' => 'sans-serif',
            'fontHeightRatio' => 1,
            'isPhpEnabled' => true,
        ]);

        $qrCode = new QrCode('hello world on qr');
		$qrCode->setSize(300);
		$qrCode->setMargin(10);
		$qrCode->setEncoding('UTF-8');
		$qrCode->setWriterByName('png');
		$qrCode->setErrorCorrectionLevel(ErrorCorrectionLevel::HIGH());
		$qrCode->setForegroundColor(['r' => 0, 'g' => 0, 'b' => 0, 'a' => 0]);
		$qrCode->setBackgroundColor(['r' => 255, 'g' => 255, 'b' => 255, 'a' => 0]);
		$qrCode->setLogoSize(150, 200);
		$qrCode->setValidateResult(false);
		$qrCode->setRoundBlockSize(true);
		$qrCode->setWriterOptions(['exclude_xml_declaration' => true]);
		header('Content-Type: '.$qrCode->getContentType());
		$qrCode->writeFile(public_path('/img/qrcode.png'));

        $pdf = PDF::loadView('guias.pdf', $data);

        //File::delete(public_path('/img/qrcode.png')); //limpiar el archivo luego

        return $pdf->stream('GUIA-'.$guia->codigo);
    }


    public function entregar(request $request){
        $guia = guia::where('id' ,$request->id)->first();

        $guia->status = "Cerrada";
        $guia->update();

        return redirect()->route('guias.index');
    }

    public function tracking($codigo){
        $guia = guia::where('codigo', $codigo)->first();
        if($guia != null){
            $guias = guias_x_remesa::where('guia_id', $guia->id)->orderBy('created_at', 'desc')->with('guia')->with('remesa')->get();
            return view('guias.tracking', ['guias' => $guias, 'guia' =>$guia]);
        }
        else{
            return abort(404);
        }
    }

    /*
    public function regresar(request $request){
        $guia = guia::where('id' ,$request->id)->first();

        $guia->status = "Regresada";
        $guia->update();

        return redirect()->route('guias.index');
    }*/
}
