<?php

namespace App\Http\Controllers;

use App\tipo_paquete;
use Illuminate\Http\Request;

class TipoPaqueteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tipos = tipo_paquete::all();
        return view('tipopaquetes.index',compact('tipos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('tipopaquetes.create');
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
            'nombre' => 'required',
            'descripcion' => 'required',
            'precio' => 'required',
        ]);

        tipo_paquete::create([
            'nombre' => request('nombre'),
            'descripcion' => request('descripcion'),
            'precio' => request('precio'),
        ]);

        return redirect()->route('tipopaquetes.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\tipo_paquete  $tipo_paquete
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $tipo_paquete = tipo_paquete::find($id);
        return view('tipopaquetes.show',compact('tipo_paquete'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\tipo_paquete  $tipo_paquete
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $tipo_paquete = tipo_paquete::find($id);
        return view('tipopaquetes.edit',compact('tipo_paquete'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\tipo_paquete  $tipo_paquete
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $tipo_paquete = tipo_paquete::find($id);

        $request->validate([
            'nombre' => 'required',
            'descripcion' => 'required',
            'precio' => 'required',
        ]);

        $tipo_paquete->update([
            'nombre' => request('nombre'),
            'descripcion' => request('descripcion'),
            'precio' => request('precio'),
        ]);
        return redirect()->route('tipopaquetes.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\tipo_paquete  $tipo_paquete
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $tipo_paquete = tipo_paquete::find($id);
        $tipo_paquete->delete();

        return redirect()->route('tipopaquetes.index');
    }
}
