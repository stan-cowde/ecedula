<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserAccountSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insertGetId([
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
    }
}
