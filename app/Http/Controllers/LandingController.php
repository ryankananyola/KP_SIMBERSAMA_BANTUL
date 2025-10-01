<?php
namespace App\Http\Controllers;

use App\Models\Akun;
use App\Models\DokumenSK;
use App\Models\LaporanPeriodik;
use App\Http\Controllers\Controller; 

class LandingController extends Controller
{
    public function index()
    {
        $totalBankSampah = Akun::where('role', 0)
            ->whereHas('dokumenSk', function($q) {
                $q->where('status', 'Aktif');
            })
            ->count();

        $totalOrganik = LaporanPeriodik::sum('organik_rumah_tangga')
            + LaporanPeriodik::sum('organik_pasar')
            + LaporanPeriodik::sum('organik_kantor');

        $totalAnorganik = LaporanPeriodik::sum('anorganik_rumah_tangga')
            + LaporanPeriodik::sum('anorganik_pasar')
            + LaporanPeriodik::sum('anorganik_kantor');

        $totalB3 = LaporanPeriodik::sum('b3_rumah_tangga')
            + LaporanPeriodik::sum('b3_pasar')
            + LaporanPeriodik::sum('b3_kantor');

        $jenisTerbanyak = collect([
            'Organik'   => $totalOrganik,
            'Anorganik' => $totalAnorganik,
            'B3'        => $totalB3,
        ])->sortDesc()->keys()->first();

        $totalSampah = $totalOrganik + $totalAnorganik + $totalB3;

        if ($totalSampah >= 1000) {
            $formattedTotalSampah = number_format($totalSampah / 1000, 2, ',', '.') . ' ton';
        } else {
            $formattedTotalSampah = number_format($totalSampah, 0, ',', '.') . ' kg';
        }

        return view('landing', compact('totalBankSampah', 'jenisTerbanyak', 'formattedTotalSampah'));

    }
}
