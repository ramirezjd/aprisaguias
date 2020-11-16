<?php

namespace App\Http\Controllers;

use App\direccion;
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

}
