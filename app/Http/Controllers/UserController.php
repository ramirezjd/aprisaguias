<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\User;
use App\instalacion;
use App\usuarios_x_instalacion;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::all();

        return view('users.index', [
            'users' => $users,
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
        $roles = Role::all()->except(1);
        $instalaciones = instalacion::all()->except(1);

        return view('users.create', [
            'permissions' => $permissions,
            'roles' => $roles,
            'instalaciones' => $instalaciones,
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

        $permissions = Permission::all();
        $request->validate([
            'username' => 'required',
            'nombres' => 'required',
            'apellidos' => 'required',
            'email' => 'required',
            'password' => 'required',
            'instalacion' => 'required'
        ]);

        $user = User::create([
            'username' => request('username'),
            'nombres' => request('nombres'),
            'apellidos' => request('apellidos'),
            'email' => request('email'),
            'password' => Hash::make(request('password')),
            'instalacion_id' => request('instalacion'),
        ]);

        usuarios_x_instalacion::create([
            'instalacion_id' => request('instalacion'),
            'user_id' => $user->id,
        ]);

        $user->assignRole($request->get('roles'));

        $permissions_array = $request->get('permissions');
        $max = count($permissions_array);


        for($i=0; $i < $max; $i++){
            foreach($permissions as $permission){
                if($permission->id == $permissions_array[$i]){
                    $user->givePermissionTo($permission->name);
                }
            }
        }

        return redirect()->route('users.index');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = User::find($id);

        $permissions = $user->getDirectPermissions();
        $roles = $user->getRoleNames();
        return $permissions;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::find($id);
        $permissions = Permission::all();
        $roles = Role::all()->except(1);
        $instalaciones = instalacion::all()->except(1);
        $aspermissions = $user->getAllPermissions();
        $aroles = $user->getRoleNames();
        $role_id = DB::table('roles')->where('name', $aroles)->first();


        $arraypermisos = array();
        $count = 0;
        foreach ($aspermissions as $permiso){
            $arraypermisos[$count] = $permiso->id;
            $count++;
        }

        return view('users.edit', [
            'user' => $user,
            'permissions' => $permissions,
            'roles' => $roles,
            'instalaciones' => $instalaciones,
            'arraypermisos' => $arraypermisos,
            'alength' => count($arraypermisos),
            'role_id' => $role_id,
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
        //
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
}
