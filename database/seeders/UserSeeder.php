<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert([
            [
                'role_id' => 1, // admin
                'username' => 'admin',
                'email' => 'admin@example.com',
                'password' => Hash::make('admin123'),
                'full_name' => 'Admin SiQurban',
                'phone' => '081234567890',
                'address' => 'Kantor Pusat',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'role_id' => 2, // user
                'username' => 'pengguna',
                'email' => 'user@example.com',
                'password' => Hash::make('user123'),
                'full_name' => 'Pengguna Biasa',
                'phone' => '089876543210',
                'address' => 'Jalan Raya',
                'created_at' => now(),
                'updated_at' => now(),
            ]
        ]);
    }
}
