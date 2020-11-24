<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use auth;
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
        $user = User::findOrFail(Auth::id());
        if($user->hasRole('super-admin')){
            $users = User::with('instalacion')->get();
        }
        else{
            $users = User::with('instalacion')->get()->except('1');
        }

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
            'instalacion' => 'required',
            'roles' => 'required'
        ]);

        $user = User::create([
            'username' => request('username'),
            'nombres' => request('nombres'),
            'apellidos' => request('apellidos'),
            'email' => request('email'),
            'password' => Hash::make(request('password')),
            'instalacion_id' => request('instalacion'),
            'rol' => request('roles'),
        ]);

        usuarios_x_instalacion::create([
            'instalacion_id' => request('instalacion'),
            'user_id' => $user->id,
        ]);

        //$user->assignRole($request->get('roles'));

        if($request->get('permissions')){
            $permissions_array = $request->get('permissions');
            $max = count($permissions_array);

            for($i=0; $i < $max; $i++){
                $user->givePermissionTo($permissions_array[$i]);
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
    public function show(user $user)
    {
        $cargo = role::findOrFail($user->rol);
        return view('users.show',['user' => $user, 'cargo' => $cargo]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::findOrFail($id);
        $permissions = Permission::all();
        $roles = Role::all()->except(1);
        $rol = role::findOrFail($user->rol);
        $instalaciones = instalacion::all()->except(1);
        $aspermissions = $user->getAllPermissions();


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
            'role_id' => $user->rol,
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
        $user = User::findOrFail($id);
        $permissions = Permission::all();
        $roles = Role::all()->except(1);

        if($request->get('username')){
            $user->username = $request->get('username');
        }
        if($request->get('nombres')){
            $user->nombres = $request->get('nombres');
        }
        if($request->get('apellidos')){
            $user->apellidos = $request->get('apellidos');
        }
        if($request->get('email')){
            $user->email = $request->get('email');
        }
        if($request->get('password')){
            $user->password = Hash::make($request->get('password'));
        }

        $user->rol = $request->get('roles');

        foreach ($permissions as $permission){
            if($user->hasPermissionTo($permission->id)){
                $user->revokePermissionTo($permission->name);
            }
        }

        if($request->get('permissions')){
            $permissions_array = $request->get('permissions');
            $max = count($permissions_array);

            for($i=0; $i < $max; $i++){
                $user->givePermissionTo($permissions_array[$i]);
            }
        }

        if($request->get('instalacion') != $user->instalacion_id ){
            usuarios_x_instalacion::where([
                ['instalacion_id', '=', $user->instalacion_id],
                ['user_id', '=', $user->id],
            ])->delete();

            usuarios_x_instalacion::create([
                'instalacion_id' => $request->get('instalacion'),
                'user_id' => $user->id,
            ]);
            $user->instalacion_id = $request->get('instalacion');
        }

        $user->save();
        return redirect()->route('users.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::findOrFail($id);
        $user->delete();
        return redirect()->route('users.index');
    }
}
