<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\User;
use Spatie\Permission\Models\Permission;

class PermissionsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $permissions = DB::table('permissions')->get();
        $roles = DB::table('roles')->get();

        return view('permissions.index', [
            'permissions' => $permissions,
            'roles' => $roles,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
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
        $ca =  \Carbon\Carbon::now();
        $ua = \Carbon\Carbon::now();
        DB::insert('insert into permissions (name, guard_name, created_at, updated_at) values (? , ?, ?, ?)', [$request->name, 'web', $ca, $ua]);
        return redirect('/permissions/');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $permissions = DB::table('permissions')->find($id);
        return view('permissions.show', ['permissions' => $permissions]);
    }

}
