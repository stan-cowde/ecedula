<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class AdminAccountSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        #roles
        $roles = [
            'Super Admin',
            'user',
        ];

        foreach ($roles as $role) {
            DB::table('user_roles')->insert([
                'role_name' => $role,
            ]);
        }

        DB::table('users')->insert([
            'firstname' => 'John',
            'lastname' => 'Doe',
            'email' => fake()->email,
            'username' => fake()->userName(),
            'password' => Hash::make('password'),
            'role' => 1,
            'verified' => 0,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('users')->insert([
            'firstname' => 'John',
            'lastname' => 'Does',
            'email' => fake()->email,
            'username' => 'superadmin',
            'password' => Hash::make('password'),
            'role' => 2,
            'verified' => 0,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
