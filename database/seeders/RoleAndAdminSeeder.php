<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Role;
use App\Models\User;

class RoleAndAdminSeeder extends Seeder
{
    public function run()
    {
        // Create roles
        $adminRole = Role::create([
            'name' => 'admin',
            'description' => 'Full access'
        ]);

        $userRole = Role::create([
            'name' => 'user',
            'description' => 'Basic user'
        ]);

        // Create admin user
        $admin = User::create([
            'name' => 'System Admin',
            'email' => 'admin@local.com',
            'password' => bcrypt('password123')
        ]);

        // Attach role
        $admin->roles()->attach($adminRole->id);
    }
}