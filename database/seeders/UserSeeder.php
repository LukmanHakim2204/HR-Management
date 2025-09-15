<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'name' => 'Admin',
            'email' => 'admin@example.com',
            'password' => Hash::make('password'), // ganti sesuai kebutuhan
            'role' => 'admin', // tambahkan role jika diperlukan
            'email_verified_at' => now(),
        ]);

        User::create([
            'name' => 'HRD',
            'email' => 'hrd@example.com',
            'password' => Hash::make('password'),
            'role' => 'hrms',
            'email_verified_at' => now(),
        ]);

        User::create([
            'name' => 'User Biasa',
            'email' => 'user@example.com',
            'password' => Hash::make('secret123'),
            'role' => 'applicant',
            'email_verified_at' => now(),
        ]);
    }
}
