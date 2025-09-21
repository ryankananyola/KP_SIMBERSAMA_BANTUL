<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\LaporanPeriodik;

class DataPeriodikAdminController extends Controller
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

        return view('dashboard.admin.data_periodik_admin', compact('laporan'));
    }

    public function show($id)
    {
        $laporan = LaporanPeriodik::with('user')->findOrFail($id);

        return view('dashboard.admin.detail_data_periodik_admin', compact('laporan'));
    }
}
