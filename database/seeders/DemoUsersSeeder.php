<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Role;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class DemoUsersSeeder extends Seeder
{
    public function run()
    {
        /*
        |--------------------------------------------------------------------------
        | ROLES
        |--------------------------------------------------------------------------
        */

        $adminRole = Role::firstOrCreate(['name' => 'admin']);
        $vipRole   = Role::firstOrCreate(['name' => 'vip']);
        $userRole  = Role::firstOrCreate(['name' => 'user']);

        /*
        |--------------------------------------------------------------------------
        | 1. ADMIN USER (1)
        |--------------------------------------------------------------------------
        */

        $admin = User::firstOrCreate(
            ['email' => 'admin@example.com'],
            [
                'name' => 'Admin User',
                'password' => Hash::make('password'),
                'email_verified_at' => now(),
                'remember_token' => Str::random(10),
            ]
        );

        $admin->roles()->syncWithoutDetaching([$adminRole->id]);

        /*
        |--------------------------------------------------------------------------
        | 2. VIP USERS (3)
        |--------------------------------------------------------------------------
        */

        for ($i = 1; $i <= 3; $i++) {

            $vip = User::firstOrCreate(
                ['email' => "vip{$i}@example.com"],
                [
                    'name' => "VIP User {$i}",
                    'password' => Hash::make('password'),
                    'email_verified_at' => now(),
                    'remember_token' => Str::random(10),
                ]
            );

            $vip->roles()->syncWithoutDetaching([$vipRole->id]);
        }

        /*
        |--------------------------------------------------------------------------
        | 3. NORMAL USERS (10)
        |--------------------------------------------------------------------------
        */

        for ($i = 1; $i <= 10; $i++) {

            $user = User::firstOrCreate(
                ['email' => "user{$i}@example.com"],
                [
                    'name' => "User {$i}",
                    'password' => Hash::make('password'),
                    'email_verified_at' => now(),
                    'remember_token' => Str::random(10),
                ]
            );

            $user->roles()->syncWithoutDetaching([$userRole->id]);
        }
    }
}