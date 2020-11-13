<?php

namespace App\Http\Controllers;

use App\privilegio;
use DB;
Use Carbon\Carbon;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Illuminate\Http\Request;


class PrivilegioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $permissions = Permission::all();
        return view('permissions.index', [
            'permissions' => $permissions
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('permissions.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $ca =  \Carbon\Carbon::now();
        $ua = \Carbon\Carbon::now();
        DB::insert('insert into permissions (name, guard_name, created_at, updated_at) values (? , ?, ?, ?)', [$request->name, 'web', $ca, $ua]);
        return redirect('/permissions/')
            ->with('Success','Yay.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\privilegio  $privilegio
     * @return \Illuminate\Http\Response
     */
    public function show(permission $privilegio)
    {
        return $privilegio;
        return view('permissions.show', ['privilegio' => $privilegio]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\privilegio  $privilegio
     * @return \Illuminate\Http\Response
     */
    public function edit(privilegio $privilegio)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\privilegio  $privilegio
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, privilegio $privilegio)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\privilegio  $privilegio
     * @return \Illuminate\Http\Response
     */
    public function destroy(privilegio $privilegio)
    {
        //
    }
}
