<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Kapanewon;

class KapanewonSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            ['nama' => 'Bambanglipuro'],
            ['nama' => 'Banguntapan'],
            ['nama' => 'Bantul'],
            ['nama' => 'Dlingo'],
            ['nama' => 'Imogiri'],
            ['nama' => 'Jetis'],
            ['nama' => 'Kasihan'],
            ['nama' => 'Kretek'],
            ['nama' => 'Pajangan'],
            ['nama' => 'Pandak'],
            ['nama' => 'Piyungan'],
            ['nama' => 'Pleret'],
            ['nama' => 'Pundong'],
            ['nama' => 'Sanden'],
            ['nama' => 'Sedayu'],
            ['nama' => 'Sewon'],
            ['nama' => 'Srandakan']
        ];
        foreach ($data as $item) {
            Kapanewon::create($item);
        }
    }
}
