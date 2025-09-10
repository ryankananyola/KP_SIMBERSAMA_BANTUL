<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Kelurahan;

class KelurahanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            // Bambanglipuro (id=1)
            ['nama' => 'Mulyodadi', 'kapanewon_id' => 1],
            ['nama' => 'Sidomulyo', 'kapanewon_id' => 1],
            ['nama' => 'Sumbermulyo', 'kapanewon_id' => 1],

            // Banguntapan (id=2)
            ['nama' => 'Banguntapan', 'kapanewon_id' => 2],
            ['nama' => 'Baturetno', 'kapanewon_id' => 2],
            ['nama' => 'Jagalan', 'kapanewon_id' => 2],
            ['nama' => 'Jambidan', 'kapanewon_id' => 2],
            ['nama' => 'Potorono', 'kapanewon_id' => 2],
            ['nama' => 'Singosaren', 'kapanewon_id' => 2],
            ['nama' => 'Tamanan', 'kapanewon_id' => 2],
            ['nama' => 'Wirokerten', 'kapanewon_id' => 2],
            
            // Bantul (id=3)
            ['nama' => 'Bantul', 'kapanewon_id' => 3],
            ['nama' => 'Palbapang', 'kapanewon_id' => 3],
            ['nama' => 'Ringinharjo', 'kapanewon_id' => 3],
            ['nama' => 'Sabdodadi', 'kapanewon_id' => 3],
            ['nama' => 'Trirenggo', 'kapanewon_id' => 3],

            // Dlingo (id=4)
            ['nama' => 'Dlingo', 'kapanewon_id' => 4],
            ['nama' => 'Jatimulyo', 'kapanewon_id' => 4],
            ['nama' => 'Mangunan', 'kapanewon_id' => 4],
            ['nama' => 'Muntuk', 'kapanewon_id' => 4],
            ['nama' => 'Temuwuh', 'kapanewon_id' => 4],
            ['nama' => 'Terong', 'kapanewon_id' => 4],

            // Imogiri (id=5)
            ['nama' => 'Girirejo', 'kapanewon_id' => 5],
            ['nama' => 'Imogiri', 'kapanewon_id' => 5],
            ['nama' => 'Karangtalun', 'kapanewon_id' => 5],
            ['nama' => 'Karangtengah', 'kapanewon_id' => 5],
            ['nama' => 'Kebonagung', 'kapanewon_id' => 5],
            ['nama' => 'Selopamioro', 'kapanewon_id' => 5],
            ['nama' => 'Sriharjo', 'kapanewon_id' => 5],
            ['nama' => 'Wukirsari', 'kapanewon_id' => 5],

            // Jetis (id=6)
            ['nama' => 'Canden', 'kapanewon_id' => 6],
            ['nama' => 'Patalan', 'kapanewon_id' => 6],
            ['nama' => 'Sumbergagung', 'kapanewon_id' => 6],
            ['nama' => 'Trimulyo', 'kapanewon_id' => 6],

            // Kasihan (id=7)
            ['nama' => 'Bangunjiwo', 'kapanewon_id' => 7],
            ['nama' => 'Ngestiharjo', 'kapanewon_id' => 7],
            ['nama' => 'Tamantirto', 'kapanewon_id' => 7],
            ['nama' => 'Tirtonirmolo', 'kapanewon_id' => 7],

            // Kretek (id=8)
            ['nama' => 'Donotirto', 'kapanewon_id' => 8],
            ['nama' => 'Parangtritis', 'kapanewon_id' => 8],
            ['nama' => 'Tirtohargo', 'kapanewon_id' => 8],
            ['nama' => 'Tirtomulyo', 'kapanewon_id' => 8],
            ['nama' => 'Tirtosari', 'kapanewon_id' => 8],

            // Pajangan (id=9)
            ['nama' => 'Guwosari', 'kapanewon_id' => 9],
            ['nama' => 'Sendangsari', 'kapanewon_id' => 9],
            ['nama' => 'Triwidadi', 'kapanewon_id' => 9],

            // Pandak (id=10)
            ['nama' => 'Caturharjo', 'kapanewon_id' => 10],
            ['nama' => 'Gilangharjo', 'kapanewon_id' => 10],
            ['nama' => 'Triharjo', 'kapanewon_id' => 10],
            ['nama' => 'Wirirejo', 'kapanewon_id' => 10],

            // Piyungan (id=11)
            ['nama' => 'Sitimulyo', 'kapanewon_id' => 11],
            ['nama' => 'Srimartani', 'kapanewon_id' => 11],
            ['nama' => 'Srimulyo', 'kapanewon_id' => 11],

            // Pleret (id=12)
            ['nama' => 'Bawuran', 'kapanewon_id' => 12],
            ['nama' => 'Pleret', 'kapanewon_id' => 12],
            ['nama' => 'Segoroyoso', 'kapanewon_id' => 12],
            ['nama' => 'Wonokromo', 'kapanewon_id' => 12],
            ['nama' => 'Wonolelo', 'kapanewon_id' => 12],

            // Pundong (id=13)
            ['nama' => 'Panjangrejo', 'kapanewon_id' => 13],
            ['nama' => 'Seloharjo', 'kapanewon_id' => 13],
            ['nama' => 'Srihardono', 'kapanewon_id' => 13],

            // Sanden (id=14)
            ['nama' => 'Gadingharjo', 'kapanewon_id' => 14],
            ['nama' => 'Gadingsari', 'kapanewon_id' => 14],
            ['nama' => 'Murtigading', 'kapanewon_id' => 14],
            ['nama' => 'Srigading', 'kapanewon_id' => 14],

            // Sedayu (id=15)
            ['nama' => 'Argodadi', 'kapanewon_id' => 15],
            ['nama' => 'Argomulyo', 'kapanewon_id' => 15],
            ['nama' => 'Argorejo', 'kapanewon_id' => 15],
            ['nama' => 'Argosari', 'kapanewon_id' => 15],

            // Sewon (id=16)
            ['nama' => 'Timbulharjo', 'kapanewon_id' => 16],
            ['nama' => 'Pendowoharjo', 'kapanewon_id' => 16],
            ['nama' => 'Panggungharjo', 'kapanewon_id' => 16],
            ['nama' => 'Bangunharjo', 'kapanewon_id' => 16],
            
            // Srandakan (id=17)
            ['nama' => 'Poncosari', 'kapanewon_id' => 17],
            ['nama' => 'Trimurti', 'kapanewon_id' => 17],
        ];
        foreach ($data as $item) {
            Kelurahan::create($item);
        }
    }
}
