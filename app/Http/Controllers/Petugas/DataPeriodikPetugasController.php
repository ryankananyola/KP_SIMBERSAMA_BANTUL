<?php

namespace App\Http\Controllers\Petugas;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\LaporanPeriodik;

class DataPeriodikPetugasController extends Controller
{
    public function index(Request $request)
    {
        $request->validate([
            'periode' => 'nullable|in:1,2', 
            'tahun'   => 'nullable|integer|min:2020|max:' . date('Y'), 
        ]);

        $query = LaporanPeriodik::query();

        if ($request->filled('periode')) {
            $query->where('periode', $request->periode);
        }

        if ($request->filled('tahun')) {
            $query->where('tahun', $request->tahun);
        }

        $laporan = $query->with('user')->get();

        return view('dashboard.petugas.data_periodik_petugas', compact('laporan'));
    }

    public function show($id)
    {
        $laporan = LaporanPeriodik::with('user')->findOrFail($id);

        return view('dashboard.petugas.detail_data_periodik_petugas', compact('laporan'));
    }
}
