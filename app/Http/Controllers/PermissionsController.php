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

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $permissions = DB::table('permissions')->find($id);
        return view('permissions.edit', ['permissions' => $permissions]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $affected = DB::table('permissions')
              ->where('id', $id)
              ->update(['name' => $request->name]);

        return redirect()->route('permissions.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    /**
     * Review all permissions given a certain user.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function review()
    {
        $users = User::all();
        $users = $users->except([1]);;
        return view('permissions.userpermissions', [
            'users' => $users
        ]);
    }

    public function getUsers()
    {
        $user = User::all();

        $permissions = $user->getPermissionsViaRoles();

        return $permissions;
    }

    public function reviewbyuser($id)
    {
        $user = User::findOrFail($id);

        $permissions = $user->getPermissionsViaRoles();

        return $permissions;
    }
}