<?php

namespace App\Http\Controllers;

use App\direccion;
use App\estado;
use App\municipio;
use App\parroquia;

use Illuminate\Http\Request;

class DireccionController extends Controller
{
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $direccion = direccion::create($request->all());
        return response()->json(['success'=>'Direccion saved successfully.']);
    }

    public function EstadoGetMunicipios(Request $request)
    {
        $id = $request->estado_id;
        $estado = estado::findOrFail($id);
        return $estado->municipios;
    }

    public function MunicipioGetCiudades(Request $request)
    {
        $id = $request->municipio_id;
        $municipio = municipio::findOrFail($id);
        return $municipio->ciudades;
    }

    public function MunicipioGetParroquias(Request $request)
    {
        $id = $request->municipio_id;
        $municipio = municipio::findOrFail($id);
        return $municipio->parroquias;
    }

    public function ParroquiaGetZipCodes(Request $request)
    {
        $id = $request->parroquia_id;
        $parroquia = parroquia::findOrFail($id);
        return $parroquia->zip_code;
    }


}
