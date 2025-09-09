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
            // KAPANEWON BAMBANGLIPURO
            // Mulyodadi (id=1)
            ['nama' => 'Bregan', 'kelurahan_id' => 1],
            ['nama' => 'Cangkring', 'kelurahan_id' => 1],
            ['nama' => 'Carikan', 'kelurahan_id' => 1],
            ['nama' => 'Destan', 'kelurahan_id' => 1],
            ['nama' => 'Jomblang', 'kelurahan_id' => 1],
            ['nama' => 'Kepuh', 'kelurahan_id' => 1],
            ['nama' => 'Kraton', 'kelurahan_id' => 1],
            ['nama' => 'Mejing', 'kelurahan_id' => 1],
            ['nama' => 'Ngambah', 'kelurahan_id' => 1],
            ['nama' => 'Paker', 'kelurahan_id' => 1],
            ['nama' => 'Plumutan', 'kelurahan_id' => 1],
            ['nama' => 'Tulasan', 'kelurahan_id' => 1],
            ['nama' => 'Warungpring', 'kelurahan_id' => 1],
            ['nama' => 'Wonodoro', 'kelurahan_id' => 1],

            // Sidomulyo (id=2)
            ['nama' => 'Cangkring', 'kelurahan_id' => 2],
            ['nama' => 'Glodogan', 'kelurahan_id' => 2],
            ['nama' => 'Kuwon', 'kelurahan_id' => 2],
            ['nama' => 'Ngajaran', 'kelurahan_id' => 2],
            ['nama' => 'Ngireng-ireng', 'kelurahan_id' => 2],
            ['nama' => 'Palihan', 'kelurahan_id' => 2],
            ['nama' => 'Pinggir', 'kelurahan_id' => 2],
            ['nama' => 'Plebengan', 'kelurahan_id' => 2],
            ['nama' => 'Plematung', 'kelurahan_id' => 2],
            ['nama' => 'Ponggok', 'kelurahan_id' => 2],
            ['nama' => 'Prenggan', 'kelurahan_id' => 2],
            ['nama' => 'Selo', 'kelurahan_id' => 2],
            ['nama' => 'Sirat', 'kelurahan_id' => 2],
            ['nama' => 'Tempel', 'kelurahan_id' => 2],
            ['nama' => 'Turi', 'kelurahan_id' => 2],

            // Sumbermulyo (id=3)
            ['nama' => 'Bondalem', 'kelurahan_id' => 3],
            ['nama' => 'Caben', 'kelurahan_id' => 3],
            ['nama' => 'Cepoko', 'kelurahan_id' => 3],
            ['nama' => 'Gedongan', 'kelurahan_id' => 3],
            ['nama' => 'Gersik', 'kelurahan_id' => 3],
            ['nama' => 'Gunungan', 'kelurahan_id' => 3],
            ['nama' => 'Jogodayoh', 'kelurahan_id' => 3],
            ['nama' => 'Kaligondang', 'kelurahan_id' => 3],
            ['nama' => 'Kanutan', 'kelurahan_id' => 3],
            ['nama' => 'Kedon', 'kelurahan_id' => 3],
            ['nama' => 'Kintelan', 'kelurahan_id' => 3],
            ['nama' => 'Kutu', 'kelurahan_id' => 3],
            ['nama' => 'Plumbungan', 'kelurahan_id' => 3],
            ['nama' => 'Samen', 'kelurahan_id' => 3],
            ['nama' => 'Siten', 'kelurahan_id' => 3],
            ['nama' => 'Tangkilan', 'kelurahan_id' => 3],

            // KAPANEWON BANGUNTAPAN
            // Banguntapan (id=4)
            ['nama' => 'Jaranan', 'kelurahan_id' => 4],
            ['nama' => 'Jomblangan', 'kelurahan_id' => 4],
            ['nama' => 'Karangjambe', 'kelurahan_id' => 4],
            ['nama' => 'Modalan', 'kelurahan_id' => 4],
            ['nama' => 'Pelemwulung', 'kelurahan_id' => 4],
            ['nama' => 'Plumbon', 'kelurahan_id' => 4],
            ['nama' => 'Pringgolayan', 'kelurahan_id' => 4],
            ['nama' => 'Sorowajan', 'kelurahan_id' => 4],
            ['nama' => 'Tegal Tandan', 'kelurahan_id' => 4],
            ['nama' => 'Wonocatur', 'kelurahan_id' => 4],

            // Baturetno (id=5)
            ['nama' => 'Giang', 'kelurahan_id' => 5],
            ['nama' => 'Kalangan', 'kelurahan_id' => 5],
            ['nama' => 'Manggisan', 'kelurahan_id' => 5],
            ['nama' => 'Mantup', 'kelurahan_id' => 5],
            ['nama' => 'Ngipik', 'kelurahan_id' => 5],
            ['nama' => 'Pelem', 'kelurahan_id' => 5],
            ['nama' => 'Plakaran', 'kelurahan_id' => 5],
            ['nama' => 'Wiyoro', 'kelurahan_id' => 5],

            // Jagalan (id=6)
            ['nama' => 'Bodon', 'kelurahan_id' => 6],
            ['nama' => 'Sayangan', 'kelurahan_id' => 6],

            // Jambidan (id=7)
            ['nama' => 'Bintaran', 'kelurahan_id' => 7],
            ['nama' => 'Combongan', 'kelurahan_id' => 7],
            ['nama' => 'Dhuku', 'kelurahan_id' => 7],
            ['nama' => 'Joho', 'kelurahan_id' => 7],
            ['nama' => 'Kretek', 'kelurahan_id' => 7],
            ['nama' => 'Pamotan', 'kelurahan_id' => 7],
            ['nama' => 'Ponegaran', 'kelurahan_id' => 7],

            // Potorono (id=8)
            ['nama' => 'Balong Lor', 'kelurahan_id' => 8],
            ['nama' => 'Banjardadap', 'kelurahan_id' => 8],
            ['nama' => 'Condrowangsan', 'kelurahan_id' => 8],
            ['nama' => 'Mertosanan Kulon', 'kelurahan_id' => 8],
            ['nama' => 'Mertosanan Wetan', 'kelurahan_id' => 8],
            ['nama' => 'Nglaren', 'kelurahan_id' => 8],
            ['nama' => 'Potorono', 'kelurahan_id' => 8],
            ['nama' => 'Prangwedanan', 'kelurahan_id' => 8],
            ['nama' => 'Salakan', 'kelurahan_id' => 8],

            // Singosaren (id=9)
            ['nama' => 'Singosaren I', 'kelurahan_id' => 9],
            ['nama' => 'Singosaren II', 'kelurahan_id' => 9],
            ['nama' => 'Singosaren III', 'kelurahan_id' => 9],

            // Tamanan (id=10)
            ['nama' => 'Glagah Kidul', 'kelurahan_id' => 10],
            ['nama' => 'Glagah Lor', 'kelurahan_id' => 10],
            ['nama' => 'Grojogan', 'kelurahan_id' => 10],
            ['nama' => 'Kauman', 'kelurahan_id' => 10],
            ['nama' => 'Kragilan', 'kelurahan_id' => 10],
            ['nama' => 'Krobokan', 'kelurahan_id' => 10],
            ['nama' => 'Nglebeng', 'kelurahan_id' => 10],
            ['nama' => 'Sokowaten', 'kelurahan_id' => 10],
            ['nama' => 'Tamanan', 'kelurahan_id' => 10],

            // Wirokerten (id=11)
            ['nama' => 'Botokenceng', 'kelurahan_id' => 11],
            ['nama' => 'Glondong', 'kelurahan_id' => 11],
            ['nama' => 'Grojogan', 'kelurahan_id' => 11],
            ['nama' => 'Kepuh Kulon', 'kelurahan_id' => 11],
            ['nama' => 'Kepuh Wetan', 'kelurahan_id' => 11],
            ['nama' => 'Mutihan', 'kelurahan_id' => 11],
            ['nama' => 'Sampangan', 'kelurahan_id' => 11],
            ['nama' => 'Tobratan', 'kelurahan_id' => 11],

            // KAPANEWON BANTUL
            // Bantul (id=12)
            ['nama' => 'Babadan', 'kelurahan_id' => 12],
            ['nama' => 'Badegan', 'kelurahan_id' => 12],
            ['nama' => 'Bintaran', 'kelurahan_id' => 12],
            ['nama' => 'Bantul Warung', 'kelurahan_id' => 12],
            ['nama' => 'Bejen', 'kelurahan_id' => 12],
            ['nama' => 'Gandekan', 'kelurahan_id' => 12],
            ['nama' => 'Geblag', 'kelurahan_id' => 12],
            ['nama' => 'Grujugan', 'kelurahan_id' => 12],
            ['nama' => 'Karanggayam', 'kelurahan_id' => 12],
            ['nama' => 'Kurahan', 'kelurahan_id' => 12],
            ['nama' => 'Nyangkringan', 'kelurahan_id' => 12],
            ['nama' => 'Serayu', 'kelurahan_id' => 12],
            ['nama' => 'Teruman', 'kelurahan_id' => 12],

            // Palbapang (id=13)
            ['nama' => 'Bolon', 'kelurahan_id' => 13],
            ['nama' => 'Dagaran', 'kelurahan_id' => 13],
            ['nama' => 'Kadirojo', 'kelurahan_id' => 13],
            ['nama' => 'Karangasem', 'kelurahan_id' => 13],
            ['nama' => 'Karasan', 'kelurahan_id' => 13],
            ['nama' => 'Ngringinan', 'kelurahan_id' => 13],
            ['nama' => 'Peni', 'kelurahan_id' => 13],
            ['nama' => 'Serut', 'kelurahan_id' => 13],
            ['nama' => 'Sumuran', 'kelurahan_id' => 13],
            ['nama' => 'Taskombang', 'kelurahan_id' => 13],

            // Ringinharjo (id=14)
            ['nama' => 'Bantul Karang', 'kelurahan_id' => 14],
            ['nama' => 'Deresan', 'kelurahan_id' => 14],
            ['nama' => 'Gemahan', 'kelurahan_id' => 14],
            ['nama' => 'Gumuk', 'kelurahan_id' => 14],
            ['nama' => 'Mandingan', 'kelurahan_id' => 14],
            ['nama' => 'Soropaten', 'kelurahan_id' => 14],

            // Sabdodadi (id=15)
            ['nama' => 'Dukuh', 'kelurahan_id' => 15],
            ['nama' => 'Kadibeso', 'kelurahan_id' => 15],
            ['nama' => 'Keyongan', 'kelurahan_id' => 15],
            ['nama' => 'Manding', 'kelurahan_id' => 15],
            ['nama' => 'Neco', 'kelurahan_id' => 15],

            // Trirenggo (id=16)
            ['nama' => 'Bakulan', 'kelurahan_id' => 16],
            ['nama' => 'Bantul Timur', 'kelurahan_id' => 16],
            ['nama' => 'Bogoran', 'kelurahan_id' => 16],
            ['nama' => 'Cepoko', 'kelurahan_id' => 16],
            ['nama' => 'Gandekan', 'kelurahan_id' => 16],
            ['nama' => 'Gedongan', 'kelurahan_id' => 16],
            ['nama' => 'Gempolan', 'kelurahan_id' => 16],
            ['nama' => 'Karangmojo', 'kelurahan_id' => 16],
            ['nama' => 'Klembon', 'kelurahan_id' => 16],
            ['nama' => 'Kweden', 'kelurahan_id' => 16],
            ['nama' => 'Manding', 'kelurahan_id' => 16],
            ['nama' => 'Nogosari', 'kelurahan_id' => 16],
            ['nama' => 'Pasutan', 'kelurahan_id' => 16],
            ['nama' => 'Pepe', 'kelurahan_id' => 16],
            ['nama' => 'Priyan', 'kelurahan_id' => 16],
            ['nama' => 'Sragan', 'kelurahan_id' => 16],
            ['nama' => 'Sumberbatikan', 'kelurahan_id' => 16],

            // KAPANEWON DLINGO
            // Dlingo (id=17)
            ['nama' => 'Dlingo I', 'kelurahan_id' => 17],
            ['nama' => 'Dlingo II', 'kelurahan_id' => 17],
            ['nama' => 'Karipan I', 'kelurahan_id' => 17],
            ['nama' => 'Karipan II', 'kelurahan_id' => 17],
            ['nama' => 'Kebosungu I', 'kelurahan_id' => 17],
            ['nama' => 'Kebosungu II', 'kelurahan_id' => 17],
            ['nama' => 'Pakis I', 'kelurahan_id' => 17],
            ['nama' => 'Pakis II', 'kelurahan_id' => 17],
            ['nama' => 'Pokoh I', 'kelurahan_id' => 17],
            ['nama' => 'Pokoh II', 'kelurahan_id' => 17],

            // Jatimulyo (id=18)
            ['nama' => 'Bandean', 'kelurahan_id' => 18],
            ['nama' => 'Dodogan', 'kelurahan_id' => 18],
            ['nama' => 'Gayam', 'kelurahan_id' => 18],
            ['nama' => 'Kedug Ayak', 'kelurahan_id' => 18],
            ['nama' => 'Loputih', 'kelurahan_id' => 18],
            ['nama' => 'Maladan', 'kelurahan_id' => 18],
            ['nama' => 'Rejosari', 'kelurahan_id' => 18],
            ['nama' => 'Semuten', 'kelurahan_id' => 18],
            ['nama' => 'Tegallawas', 'kelurahan_id' => 18],

            // Mangunan (id=19)
            ['nama' => 'Cempluk', 'kelurahan_id' => 19],
            ['nama' => 'Kanigoro', 'kelurahan_id' => 19],
            ['nama' => 'Kediwung', 'kelurahan_id' => 19],
            ['nama' => 'Lemahbang', 'kelurahan_id' => 19],
            ['nama' => 'Mangunan', 'kelurahan_id' => 19],
            ['nama' => 'Sukorame', 'kelurahan_id' => 19],

            // Muntuk (id=20)
            ['nama' => 'Banjarharjo I', 'kelurahan_id' => 20],
            ['nama' => 'Banjarharjo II', 'kelurahan_id' => 20],
            ['nama' => 'Gunung Cilik', 'kelurahan_id' => 20],
            ['nama' => 'Karangasem', 'kelurahan_id' => 20],
            ['nama' => 'Muntuk', 'kelurahan_id' => 20],
            ['nama' => 'Sanggrahan I', 'kelurahan_id' => 20],
            ['nama' => 'Sanggrahan II', 'kelurahan_id' => 20],
            ['nama' => 'Seropan I', 'kelurahan_id' => 20],
            ['nama' => 'Seropan II', 'kelurahan_id' => 20],
            ['nama' => 'Seropan III', 'kelurahan_id' => 20],
            ['nama' => 'Tangkil', 'kelurahan_id' => 20],

            // Temuwuh (id=21)
            ['nama' => 'Jambewangi', 'kelurahan_id' => 21],
            ['nama' => 'Jurug', 'kelurahan_id' => 21],
            ['nama' => 'Kapingan', 'kelurahan_id' => 21],
            ['nama' => 'Klepu', 'kelurahan_id' => 21],
            ['nama' => 'Lungguh', 'kelurahan_id' => 21],
            ['nama' => 'Ngalempangan', 'kelurahan_id' => 21],
            ['nama' => 'Ngunu', 'kelurahan_id' => 21],
            ['nama' => 'Salam', 'kelurahan_id' => 21],
            ['nama' => 'Tanjan', 'kelurahan_id' => 21],
            ['nama' => 'Tanjung', 'kelurahan_id' => 21],
            ['nama' => 'Tekik', 'kelurahan_id' => 21],
            ['nama' => 'Temuwuh', 'kelurahan_id' => 21],

            // Terong (id=22)
            ['nama' => 'Kebo Kuning', 'kelurahan_id' => 22],
            ['nama' => 'Ngenep', 'kelurahan_id' => 22],
            ['nama' => 'Pencitrejo', 'kelurahan_id' => 22],
            ['nama' => 'Rejosari', 'kelurahan_id' => 22],
            ['nama' => 'Saradan', 'kelurahan_id' => 22],
            ['nama' => 'Sendangsari', 'kelurahan_id' => 22],
            ['nama' => 'Terong I', 'kelurahan_id' => 22],
            ['nama' => 'Terong II', 'kelurahan_id' => 22],

            // KAPANEWON IMOGIRI
            // Girirejo (id=23)

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
