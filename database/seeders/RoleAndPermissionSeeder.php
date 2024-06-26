<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RoleAndPermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $permissions = [
            [
                'name' => 'view cars',
                'guard_name' => 'admin'
            ],
            [
                'name' => 'view car',
                'guard_name' => 'admin'
            ],
            [
                'name' => 'view cars',
                'guard_name' => 'web'
            ],
            [
                'name' => 'view car',
                'guard_name' => 'web'
            ],
            [
                'name' => 'view expenses',
                'guard_name' => 'admin'
            ],
            [
                'name' => 'view expense',
                'guard_name' => 'admin'
            ],
            [
                'name' => 'create expense',
                'guard_name' => 'admin'
            ],
            [
                'name' => 'edit expense',
                'guard_name' => 'admin'
            ],
            [
                'name' => 'delete expense',
                'guard_name' => 'admin'
            ],
        ];

        $roles = [
            [
                'name' => 'Employee',
                'guard_name' => 'admin',
            ],
            [
                'name' => 'Customer',
                'guard_name' => 'web',
            ]
        ];

        foreach($permissions as $permission){
            Permission::create($permission);
        }

        foreach ($roles as $role) {
            $role = Role::create($role);

            // Find the permissions that match the role's guard_name
            $matchingPermissions = collect($permissions)->filter(function ($permission) use ($role) {
                return $permission['guard_name'] === $role->guard_name;
            })->pluck('name')->toArray();

            // Give those permissions to the role
            $role->givePermissionTo($matchingPermissions);
        }
    }
}
