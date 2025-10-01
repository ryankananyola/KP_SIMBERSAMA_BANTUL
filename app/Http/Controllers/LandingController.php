<?php
namespace App\Http\Controllers;

use App\Models\Akun;
use App\Models\DokumenSK;
use App\Http\Controllers\Controller; // penting!

class LandingController extends Controller
{
    public function index()
    {
        $totalBankSampah = Akun::where('role', 0)
            ->whereHas('dokumenSk', function($q) {
                $q->where('status', 'Aktif');
            })
            ->count();

        return view('landing', compact('totalBankSampah'));
    }
}
