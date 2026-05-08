<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Role;
use App\Models\Permission;
use App\Models\User;

class RbacSeeder extends Seeder
{
    public function run()
    {
        /*
        |--------------------------------------------------------------------------
        | 1. PERMISSIONS
        |--------------------------------------------------------------------------
        */


        $permissions = [
    'view-admin-dashboard',

    'view-users',
    'edit-users',
    'delete-users',
    'manage-user-roles',

    'view-roles',
    'create-roles',
    'edit-roles',
    'delete-roles',
    'manage-role-permissions',

    'view-permissions',
    'create-permissions',

    // ⭐ VIP PERMISSIONS
    'access-vip-dashboard',
    'view-vip-content',
    'use-vip-features',
];

        foreach ($permissions as $permission) {
            Permission::firstOrCreate([
                'name' => $permission
            ]);
        }

        /*
        |--------------------------------------------------------------------------
        | 2. ROLES
        |--------------------------------------------------------------------------
        */

        $adminRole = Role::firstOrCreate(['name' => 'admin']);
        $userRole = Role::firstOrCreate(['name' => 'user']);
        $vipRole = Role::firstOrCreate(['name' => 'vip']);

        /*
        |--------------------------------------------------------------------------
        | 3. ASSIGN PERMISSIONS TO ROLES
        |--------------------------------------------------------------------------
        */

        // Admin gets everything
        $adminRole->permissions()->sync(
            Permission::all()->pluck('id')->toArray()
        );

        // Basic user permissions (optional minimal set)
        $userRole->permissions()->sync(
            Permission::whereIn('name', [
                'view-admin-dashboard'
            ])->pluck('id')->toArray()
        );

        $vipRole->permissions()->sync(
            Permission::whereIn('name', [
              'access-vip-dashboard',
              'view-vip-content',
              'use-vip-features',
            ])->pluck('id')->toArray()
        );

        /*
        |--------------------------------------------------------------------------
        | 4. OPTIONAL: Assign admin role to first user
        |--------------------------------------------------------------------------
        */

        $adminUser = User::first();

        if ($adminUser) {
            $adminUser->roles()->syncWithoutDetaching([
                $adminRole->id
            ]);
        }
    }
}