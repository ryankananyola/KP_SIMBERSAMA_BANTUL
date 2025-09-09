<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Padukuhan;

class PadukuhanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            // Timbulharjo (id=1)
            ['nama' => 'Balong', 'kelurahan_id' => 1],
            ['nama' => 'Bibis', 'kelurahan_id' => 1],
            ['nama' => 'Dadapan', 'kelurahan_id' => 1],
            // Pendowoharjo (id=2)
            ['nama' => 'Gabusan', 'kelurahan_id' => 2],
            ['nama' => 'Gatak', 'kelurahan_id' => 2],
            // Panggungharjo (id=3)
            ['nama' => 'Kowen I', 'kelurahan_id' => 3],
            ['nama' => 'Kowen II', 'kelurahan_id' => 3],
            // dst, tambahkan sesuai kebutuhan
        ];
        foreach ($data as $item) {
            Padukuhan::create($item);
        }
    }
}
