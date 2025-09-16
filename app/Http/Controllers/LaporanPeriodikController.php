<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\LaporanPeriodik;
use Illuminate\Support\Facades\Auth;

class LaporanPeriodikController extends Controller
{
    public function create()
    {
        return view('dashboard.user.data_periodik_user');
    }

    public function store(Request $request)
    {
        $request->validate([
            'periode' => 'required|in:1,2',
            'tahun' => 'required|digits:4|integer',
            'organik_rumah_tangga' => 'nullable|numeric',
            'organik_pasar' => 'nullable|numeric',
            'organik_kantor' => 'nullable|numeric',
            'anorganik_rumah_tangga' => 'nullable|numeric',
            'anorganik_pasar' => 'nullable|numeric',
            'anorganik_kantor' => 'nullable|numeric',
            'b3_rumah_tangga' => 'nullable|numeric',
            'b3_pasar' => 'nullable|numeric',
            'b3_kantor' => 'nullable|numeric',
        ]);

        LaporanPeriodik::create([
            'user_id' => Auth::id(),
            'periode' => $request->periode,
            'tahun' => $request->tahun,
            'organik_rumah_tangga' => $request->organik_rumah_tangga ?? 0,
            'organik_pasar' => $request->organik_pasar ?? 0,
            'organik_kantor' => $request->organik_kantor ?? 0,
            'anorganik_rumah_tangga' => $request->anorganik_rumah_tangga ?? 0,
            'anorganik_pasar' => $request->anorganik_pasar ?? 0,
            'anorganik_kantor' => $request->anorganik_kantor ?? 0,
            'b3_rumah_tangga' => $request->b3_rumah_tangga ?? 0,
            'b3_pasar' => $request->b3_pasar ?? 0,
            'b3_kantor' => $request->b3_kantor ?? 0,
        ]);

        return redirect()->route('user.riwayat_laporan_user')
            ->with('success', 'Laporan periodik berhasil disimpan');
    }

    public function riwayat()
    {
        $laporan = LaporanPeriodik::where('user_id', Auth::id())
            ->orderBy('tahun', 'desc')
            ->orderBy('periode', 'desc')
            ->get();

        return view('dashboard.user.riwayat_laporan_user', compact('laporan'));
    }

    public function detail($id)
    {
        $laporan = LaporanPeriodik::where('id', $id)
            ->where('user_id', Auth::id())
            ->firstOrFail();

        return view('dashboard.user.detail_laporan_user', compact('laporan'));
    }
}
