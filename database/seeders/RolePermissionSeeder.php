<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RolePermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $roleAdmin        = Role::create(['name' => 'admin']);
        $roleSupperAdmin  = Role::create(['name' => 'supperAdmin']);
        $roleEditor       = Role::create(['name' => 'editor']);
        $roleUser         = Role::create(['name' => 'user']);


        ///Permissin List
        $permissions = [
            //Dashboard
            'dashboard.view',

            //Blog Permission
            'blog.create',
            'blog.view',
            'blog.edit',
            'blog.delete',
            'blog.approved',

            //Admin Permission
            'admin.create',
            'admin.view',
            'admin.edit',
            'admin.delete',
            'admin.approved',

            //Role Permission
            'role.create',
            'role.view',
            'role.edit',
            'role.delete',
            'role.approved',

            //Profile Permission

            'profile.view',
            'profile.edit'

        ];

        //Create Permission
        for ($i=0; $i < count($permissions); $i++) {
           $permission = Permission::create(['name' => $permissions[$i]]);
           $roleSupperAdmin->givePermissionTo($permission);
           $permission->assignRole($roleSupperAdmin);
        }
    }
}
