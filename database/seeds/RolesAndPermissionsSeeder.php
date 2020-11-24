<?php

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RolesAndPermissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Reset cached roles and permissions
        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();


        //Instalacion related
        Permission::create(['name' => 'crear instalacion']);   //c
        Permission::create(['name' => 'ver instalacion']);     //r
        Permission::create(['name' => 'editar instalacion']);  //u
        Permission::create(['name' => 'borrar instalacion']);  //d

        //Guia related
        Permission::create(['name' => 'crear guia']);   //c
        Permission::create(['name' => 'ver guia']);     //r
        Permission::create(['name' => 'editar guia']);  //u
        Permission::create(['name' => 'borrar guia']);  //d

        //Remesa related
        Permission::create(['name' => 'crear remesa']);   //c
        Permission::create(['name' => 'ver remesa']);     //r
        Permission::create(['name' => 'editar remesa']);  //u
        Permission::create(['name' => 'borrar remesa']);  //d

        //Transportista related
        Permission::create(['name' => 'crear transportista']);   //c
        Permission::create(['name' => 'ver transportista']);     //r
        Permission::create(['name' => 'editar transportista']);  //u
        Permission::create(['name' => 'borrar transportista']);  //d

        //Vehiculo related
        Permission::create(['name' => 'crear vehiculo']);   //c
        Permission::create(['name' => 'ver vehiculo']);     //r
        Permission::create(['name' => 'editar vehiculo']);  //u
        Permission::create(['name' => 'borrar vehiculo']);  //d

        //Usuario related
        Permission::create(['name' => 'crear usuario']);   //c
        Permission::create(['name' => 'ver usuario']);     //r
        Permission::create(['name' => 'editar usuario']);  //u
        Permission::create(['name' => 'borrar usuario']);  //d

        //Tipo_paquete related
        Permission::create(['name' => 'crear tipo_paquete']);   //c
        Permission::create(['name' => 'ver tipo_paquete']);     //r
        Permission::create(['name' => 'editar tipo_paquete']);  //u
        Permission::create(['name' => 'borrar tipo_paquete']);  //d

        //Tipo_instalacion related
        Permission::create(['name' => 'crear tipo_instalacion']);   //c
        Permission::create(['name' => 'ver tipo_instalacion']);     //r
        Permission::create(['name' => 'editar tipo_instalacion']);  //u
        Permission::create(['name' => 'borrar tipo_instalacion']);  //d

        //Tipo_destino related
        Permission::create(['name' => 'crear tipo_destino']);   //c
        Permission::create(['name' => 'ver tipo_destino']);     //r
        Permission::create(['name' => 'editar tipo_destino']);  //u
        Permission::create(['name' => 'borrar tipo_destino']);  //d

        //Role related
        Permission::create(['name' => 'crear roles']);   //c
        Permission::create(['name' => 'ver roles']);     //r
        Permission::create(['name' => 'editar roles']);  //u
        Permission::create(['name' => 'borrar roles']);  //d

        //Permission related
        Permission::create(['name' => 'crear permisos']);   //c
        Permission::create(['name' => 'ver permisos']);     //r
        Permission::create(['name' => 'editar permisos']);  //u
        Permission::create(['name' => 'borrar permisos']);  //d

        /*
        // this can be done as separate statements
        $role = Role::create(['name' => 'writer']);
        $role->givePermissionTo('edit articles');

        // or may be done by chaining
        $role = Role::create(['name' => 'moderator'])
            ->givePermissionTo(['publish articles', 'unpublish articles']);
        */
        $role = Role::create(['name' => 'super-admin']);
        $role->syncPermissions(Permission::all());
        $role = Role::create(['name' => 'Jefe de sucursal']);
        $role = Role::create(['name' => 'Operario de guias']);
        $role = Role::create(['name' => 'Encargado de Deposito']);
        $role = Role::create(['name' => 'Rol de ejemplo']);
    }
}

