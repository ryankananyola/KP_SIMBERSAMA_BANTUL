<?php

namespace App\Http\Controllers\Petugas;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\LaporanPeriodik;

class DataPeriodikPetugasController extends Controller
{
    public function index()
    {
        $laporan = LaporanPeriodik::with('user')
                    ->latest()
                    ->get();

        return view('dashboard.petugas.data_periodik_petugas', compact('laporan'));
    }

    public function show($id)
    {
        $laporan = LaporanPeriodik::with('user')->findOrFail($id);

        return view('dashboard.petugas.detail_data_periodik_petugas', compact('laporan'));
    }
}
