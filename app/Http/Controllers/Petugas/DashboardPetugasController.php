<?php

namespace App\Http\Controllers\Petugas;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\LaporanPeriodik;

class DashboardPetugasController extends Controller
{
    public function dashboard()
    {   
        $laporan = LaporanPeriodik::selectRaw('
            SUM(organik_rumah_tangga) as organik_rumah_tangga,
            SUM(organik_pasar) as organik_pasar,
            SUM(organik_kantor) as organik_kantor,
            SUM(anorganik_rumah_tangga) as anorganik_rumah_tangga,
            SUM(anorganik_pasar) as anorganik_pasar,
            SUM(anorganik_kantor) as anorganik_kantor,
            SUM(b3_rumah_tangga) as b3_rumah_tangga,
            SUM(b3_pasar) as b3_pasar,
            SUM(b3_kantor) as b3_kantor
        ')->first();

        return view('dashboard.petugas.dashboard_petugas', compact('laporan'));
    }

    public function dataUmum()
    {
        return view('dashboard.petugas.data_umum_petugas');
    }
    
    public function dataPeriodik()
    {
        return view('dashboard.petugas.data_periodik_petugas');
    }

    public function akunDitangguhkan()
    {
        return view('dashboard.petugas.akun_ditangguhkan');
    }

    public function profile()
    {
        $user = Auth::guard('adminstaf')->user();
        return view('dashboard.petugas.profile_petugas', compact('user'));
    }

    public function updateProfile(Request $request)
    {
        $user = Auth::guard('adminstaf')->user();

        $request->validate([
            'email'    => 'required|email|unique:akun,email,' . $user->id,
            'nomor_wa' => 'nullable|string|max:20',
            'foto'     => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        if ($request->hasFile('foto')) {
            $path = $request->file('foto')->store('profile', 'public');
            $user->foto = $path;
        }

        $user->email    = $request->email;
        $user->nomor_wa = $request->nomor_wa;
        $user->save();

        return redirect()->route('petugas.profile')->with('success', 'Profil berhasil diperbarui!');
    }
}
