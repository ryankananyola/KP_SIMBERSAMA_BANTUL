<?php

namespace App\Http\Controllers\Petugas;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\LaporanPeriodik;
use Barryvdh\DomPDF\Facade\Pdf;
use App\Models\Akun;


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

        $users = Akun::all();

        $sudahIsi = $laporan->pluck('user_id')->toArray();

        $belumIsi = $users->whereNotIn('id', $sudahIsi);

        return view('dashboard.petugas.data_periodik_petugas', [
            'laporan'   => $laporan,
            'belumIsi'  => $belumIsi,
            'periode'   => $request->periode,
            'tahun'     => $request->tahun,
        ]);
    }

    public function show($id)
    {
        $laporan = LaporanPeriodik::with('user')->findOrFail($id);

        return view('dashboard.petugas.detail_data_periodik_petugas', compact('laporan'));
    }

    public function exportPdf(Request $request)
    {
        $laporan = LaporanPeriodik::with('user')
            ->when($request->periode, fn($q) => $q->where('periode', $request->periode))
            ->when($request->tahun, fn($q) => $q->where('tahun', $request->tahun))
            ->get();

        if ($laporan->isEmpty()) {
            return back()->with('error', 'Tidak ada data sesuai filter untuk diekspor.');
        }

        $pdf = Pdf::loadView('dashboard.petugas.pdf_data_periodik', [
            'laporan' => $laporan,
            'periode' => $request->periode,
            'tahun'   => $request->tahun
        ])->setPaper('A4', 'portrait');

        return $pdf->stream('laporan-periodik.pdf');
    }

    public function exportSinglePdf($id)
    {
        $laporan = LaporanPeriodik::with(['user.kapanewon','user.kelurahan','user.padukuhan'])
                    ->findOrFail($id);

        $pdf = Pdf::loadView('dashboard.petugas.pdf_data_periodik_single', [
            'laporan' => $laporan
        ])->setPaper('A4', 'portrait');

        return $pdf->stream('laporan-periodik-'.$laporan->id.'.pdf');
    }
}
