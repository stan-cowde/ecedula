<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class DummyApplicantAccountSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $userId = DB::table('users')->insertGetId([
            'firstname' => 'John',
            'lastname' => 'Doe',
            'email' => fake()->email,
            'username' => fake()->userName(),
            'password' => Hash::make('password'),
            'role' => 2,
            'verified' => 0,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('personal_details')->insert([
            'pd_user_id' => $userId,
            'first_name' => 'John',
            'last_name' => 'Doe',
            'middle_name' => 'Smith',
            'citizenship' => 'Filipino',
            'date_of_birth' => '1990-01-01',
            'gender' => 'Male',
            'weight' => 65.50,
            'height' => 175.25,
            'civil_status' => 'Single',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        // Create identity details
        DB::table('identity_details')->insert([
            'id_details_user_id' => $userId,
            'valid_id' => 'Passport',
            'id_number' => 'A123456789',
            'occupation' => 'Software Engineer',
            'place_of_birth' => 'Cityville',
            'tin' => 123456789,
            'icr' => 987654321,
            'monthly_income' => '5000',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        // Create family details
        DB::table('family_details')->insert([
            'fd_user_id' => $userId,
            'father_name' => 'Richard Doe',
            'mother_name' => 'Jane Doe',
            'guardian_name' => 'N/A',
            'spouse_name' => 'Mary Doe',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        // Create address details
        DB::table('address_details')->insert([
            'ad_user_id' => $userId,
            'address' => '123 Main St',
            'birth_place' => 'Digos City',
            'municipality' => 'Cityville',
            'barangay' => 'Barangay 1',
            'block_number' => 'Block 1',
            'street' => 'Main St',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        // Create application request
        DB::table('application_request')->insert([
            'ar_user_id' => $userId,
            'status' => 'Pending',
            'reviewed_by' => null,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
