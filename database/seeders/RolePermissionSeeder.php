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

            [
                'group_name' => 'dashboard',
                'permissions' => [
                    'dashboard.view',
                    'dashboard.edit',
                ]
            ],
            [
                'group_name' => 'blog',
                'permissions' => [
                    //Blog Permission
                    'blog.create',
                    'blog.view',
                    'blog.edit',
                    'blog.delete',
                    'blog.approved',
                ]
            ],
            [
                'group_name' => 'admin',
                'permissions' => [
                    //Admin Permission
                    'admin.create',
                    'admin.view',
                    'admin.edit',
                    'admin.delete',
                    'admin.approved',
                ]
            ],
            [
                'group_name' => 'role',
                'permissions' => [
                    //Role Permission
                    'role.create',
                    'role.view',
                    'role.edit',
                    'role.delete',
                    'role.approved',
                ]
            ],
            [
                'group_name' => 'profile',
                'permissions' => [
                    //Profile Permission

                    'profile.view',
                    'profile.edit'
                ]
            ],
        ];

        //Create Permission
        for ($i=0; $i < count($permissions); $i++) {
            $permissionGroup = $permissions[$i]['group_name'];
            for ($j = 0; $j< count($permissions[$i]['permissions']); $j++){
                $permission = Permission::create(['name' => $permissions[$i]['permissions'][$j],'group_name' => $permissionGroup]);
                $roleSupperAdmin->givePermissionTo($permission);
                $permission->assignRole($roleSupperAdmin);
            }

        }
    }
}
