<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
//Para Roles Y permisos
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RolesAndPermissions extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
          //
        // Reset cache roles y permisos
        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();
        // creando los permisos

      // this can be done as separate statements
      // Rol desarrollador
        $role1 = Role::create(['name' => 'super-admin']); 
        // Rol Ejecutivo/Viceministro-Director General
        $role2 = Role::create(['name' => 'ejecutivo']); 
         // Rol administrador/Director de Unidad
        $role3 = Role::create(['name' => 'operativo']);
         // Rol Técnico
        $role4 = Role::create(['name' => 'tecnico']);
          // Rol usuarios(solicitante)
        $role5 = Role::create(['name' => 'solicitante']);
      
        //Permisos
        Permission::create(['name' => 'admin.personal'])->syncRoles([$role1,$role2,$role3]);
    }
}
