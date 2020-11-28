<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\User;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RolesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $roles = role::all()->except('1');

        return view('roles.index', [
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
        $permissions = Permission::all();
        return view('roles.create', compact('permissions'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $rol = Role::create(['name' => $request->name]);

        if($request->get('permissions')){
            $permissions_array = $request->get('permissions');
            $max = count($permissions_array);

            for($i=0; $i < $max; $i++){
                $permiso = DB::table('permissions')->where('id', '=', $permissions_array[$i])->first();
                $rol->givePermissionTo($permiso->name);
            }
        }

        return redirect()->route('roles.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $role = role::find($id);
        $permissions = $role->getAllPermissions();

        return view('roles.show', [
            'role' => $role,
            'permissions' => $permissions,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

/*
<div class="row mx-4">
    @foreach ($role->getAllPermissions() as $permission)
    <div class="col-2">
        <span>-{{$permission->name}}</span>
    </div>
    @endforeach
</div>
*/
    public function edit($id)
    {
        $role = role::find($id);
        $permissions = permission::all();

        return view('roles.edit', [
            'role' => $role,
            'permissions' => $permissions,
        ]);
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
        $affected = role::find($id);

        $affected->update(['name' => $request->name]);

        $permissions = Permission::all();

        foreach ($permissions as $permission){
            if($affected->hasPermissionTo($permission->id)){
                $affected->revokePermissionTo($permission->name);
            }
        }

        if($request->get('permissions')){
            $permissions_array = $request->get('permissions');
            $max = count($permissions_array);

            for($i=0; $i < $max; $i++){
                $affected->givePermissionTo($permissions_array[$i]);
            }
        }

        return redirect()->route('roles.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $affected = role::find($id);
        $affected->delete();
        return redirect()->route('roles.index');
    }

    public function getpermissions(Request $request){
        $id = $request->id;
        $role = role::find($id);
        return $role->getAllPermissions();
    }
}
