<?php

namespace App\Http\Controllers;

use App\direccion;
use App\estado;
use App\ciudad;
use App\municipio;
use App\parroquia;
use App\cliente;

use Illuminate\Http\Request;

class DireccionController extends Controller
{
    public function EstadoGetMunicipios(Request $request)
    {
        $id = $request->estado_id;
        $estado = estado::findOrFail($id);
        $municipios = municipio::where('estado_id', $estado->id)->orderBy('municipio')->get();
        return $municipios;
    }

    public function MunicipioGetCiudades(Request $request)
    {
        $id = $request->municipio_id;
        $municipio = municipio::findOrFail($id);
        $ciudades = ciudad::where('municipio_id', $municipio->id)->orderBy('ciudad')->get();
        return $ciudades;
    }

    public function MunicipioGetParroquias(Request $request)
    {
        $id = $request->municipio_id;
        $municipio = municipio::findOrFail($id);
        $parroquias = parroquia::where('municipio_id', $municipio->id)->orderBy('parroquia')->get();
        return $parroquias;
    }

    public function ParroquiaGetZipCodes(Request $request)
    {
        $id = $request->parroquia_id;
        $parroquia = parroquia::findOrFail($id);
        return $parroquia->zip_code;
    }

    public function getAddress(Request $request)
    {
        $id = $request->cliente_id;
        $cliente = cliente::where('documento', $id)->with('direccion')->first();

        if($cliente){
            $respuesta = $cliente;
        }
        else{
            $respuesta = collect(['estado_id' => 'NULL']);
            $respuesta->toJson();
        }

        return $respuesta;
    }




}
