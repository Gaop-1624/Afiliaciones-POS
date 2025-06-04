<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $role1 = Role::create(['name' => 'Administrador',
                                'description' => 'Control del Sistema']);
        $role2 = Role::create(['name' => 'Ventas',
                                'description' => 'Venta de Afiliaciones']);
        $role3 = Role::create(['name' => 'Pagos',
                                'description' => 'Pagos por Mes']);
        $role4 = Role::create(['name' => 'Afiliaciones',
                                'description' => 'Registrar Afiliacion']);


        Permission::create(['name' => 'admin.empresa.edit',
                                'description' => 'Actualizar Datos Empresa'])->syncRoles([$role1]);
        
        Permission::create(['name' => 'admin.roles.index',
                                'description' => 'Listado de Roles'])->syncRoles([$role1]);
        Permission::create(['name' => 'admin.users.index',
                                'description' => 'Listado de Usuarios'])->syncRoles([$role1]);
        Permission::create(['name' => 'admin.afiliados.index',
                                'description' => 'Listado de Ailiados'])->syncRoles([$role1, $role4]);
        Permission::create(['name' => 'admin.ventas.index',
                                'description' => 'Listado de Ventas'])->syncRoles([$role1]);
        Permission::create(['name' => 'admin.pagos.index',
                                'description' => 'Listado de Pagos'])->syncRoles([$role1]);

        Permission::create(['name' => 'admin.users.create',
                                'description' => 'Crear Usuarios'])->syncRoles([$role1]);
        Permission::create(['name' => 'admin.roles.create',
                                'description' => 'Crear Roles'])->syncRoles([$role1]);
        Permission::create(['name' => 'admin.afiliados.create',
                                'description' => 'Crear Afiliados'])->syncRoles([$role1, $role4]);
        Permission::create(['name' => 'admin.ventas.create',
                                'description' => 'Crear Venta'])->syncRoles([$role1]);
        Permission::create(['name' => 'admin.pagos.create',
                                'description' => 'Crear pagos'])->syncRoles([$role1]);

        Permission::create(['name' => 'admin.users.edict',
                                    'description' => 'Edictar Usuarios'])->syncRoles([$role1]);
        Permission::create(['name' => 'admin.roles.edict',
                                    'description' => 'Edictar Roles'])->syncRoles([$role1]);
        Permission::create(['name' => 'admin.afiliados.edict',
                                    'description' => 'Edictar Afiliados'])->syncRoles([$role1, $role4]);
        Permission::create(['name' => 'admin.ventas.edict',
                                    'description' => 'Edictar ventas'])->syncRoles([$role1]);
        Permission::create(['name' => 'admin.pagos.edict',
                                    'description' => 'Edictar pagos'])->syncRoles([$role1]);
       

        Permission::create(['name' => 'admin.users.delete',
                                    'description' => 'Eliminar Usuarios'])->syncRoles([$role1]);
        Permission::create(['name' => 'admin.roles.delete',
                                    'description' => 'Eliminar Roles'])->syncRoles([$role1]);
        Permission::create(['name' => 'admin.afiliados.delete',
                                    'description' => 'Eliminar Afiliados'])->syncRoles([$role1, $role4]);
        Permission::create(['name' => 'admin.ventas.delete',
                                    'description' => 'Eliminar ventas'])->syncRoles([$role1]);
        Permission::create(['name' => 'admin.pagos.delete',
                                    'description' => 'Eliminar pagos'])->syncRoles([$role1]);
        
    }
}
