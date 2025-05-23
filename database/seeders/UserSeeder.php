<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('users')->insert([
            [
                'name' => 'iqbal',
                'email' => 'iqbal@example.com',
                'password' => Hash::make('password'), // ganti 'password' sesuai kebutuhan
                'username' => 'dokter',
                'role' => 'dokter',
                'created_at' => Carbon::parse('2025-05-23 07:03:26'),
                'updated_at' => Carbon::parse('2025-05-23 07:03:26'),
            ],
            [
                'name' => 'iqbal perawat',
                'email' => 'iqbalp@example.com',
                'password' => Hash::make('password'), // ganti juga kalau mau beda
                'username' => 'perawat',
                'role' => 'perawat',
                'created_at' => Carbon::parse('2025-05-23 07:03:26'),
                'updated_at' => Carbon::parse('2025-05-23 07:03:26'),
            ],
            [
                'name' => 'iqbal registrasi',
                'email' => 'iqbalp@example.com',
                'password' => Hash::make('password'), // ganti juga kalau mau beda
                'username' => 'registrasi',
                'role' => 'registrasi',
                'created_at' => Carbon::parse('2025-05-23 07:03:26'),
                'updated_at' => Carbon::parse('2025-05-23 07:03:26'),
            ],
            [
                'name' => 'iqbal apoteker',
                'email' => 'iqbalp@example.com',
                'password' => Hash::make('password'), // ganti juga kalau mau beda
                'username' => 'apoteker',
                'role' => 'apoteker',
                'created_at' => Carbon::parse('2025-05-23 07:03:26'),
                'updated_at' => Carbon::parse('2025-05-23 07:03:26'),
            ],
        ]);        
    }
}
