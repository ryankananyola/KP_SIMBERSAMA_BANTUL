<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    // Dashboard utama user
    public function dashboard()
    {
        return view('dashboard.user.dashboard_user');
    }

    // Halaman Data Umum
    public function showDataUmum()
    {
        $akun = Auth::user();
        return view('dashboard.user.data_umum_user', compact('akun'));
    }

    // Update Data Umum
    public function updateDataUmum(Request $request)
    {
        $akun = Auth::user();

        $request->validate([
            'nama' => 'required|string|max:255',
            'username' => 'required|string|max:255|unique:akun,username,' . $akun->id,
            'email' => 'required|email|unique:akun,email,' . $akun->id,
            'nomor_wa' => 'nullable|string|max:20',
        ]);

        $akun->update([
            'nama' => $request->nama,
            'username' => $request->username,
            'email' => $request->email,
            'nomor_wa' => $request->nomor_wa,
        ]);

        return redirect()->route('user.data_umum')->with('success', 'Data berhasil diperbarui!');
    }

    // Halaman Data Periodik
    public function dataPeriodik()
    {
        return view('dashboard.user.data_periodik');
    }

    // Halaman Upload SK
    public function uploadSK()
    {
        return view('dashboard.user.upload_sk_user');
    }
}
