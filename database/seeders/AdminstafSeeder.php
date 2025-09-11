<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class AdminstafSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('adminstaf')->insert([
            [
                'nama' => 'Admin Utama',
                'username' => 'admin2',
                'password' => Hash::make('IniAdmin123'),
                'email' => 'admin2@gmail.com',
                'no_hp' => '081234567890',
                'alamat' => 'Jl. Raya No. 1',
                'role' => 2, // Admin
            ],
            [
                'nama' => 'Petugas Satu',
                'username' => 'petugas2',
                'password' => Hash::make('IniPetugas123'),
                'email' => 'petugas@gmail.com',
                'no_hp' => '089876543210',
                'alamat' => 'Jl. Melati No. 2',
                'role' => 1, // Petugas
            ],
        ]);
    }
}
