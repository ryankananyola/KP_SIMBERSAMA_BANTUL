<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;

class DashboardUserController extends Controller
{
    public function dashboard()
    {
        return view('dashboard.user.dashboard_user');
    }

    public function showDataUmum()
    {
        $akun = Auth::user();
        return view('dashboard.user.data_umum_user', compact('akun'));
    }

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

    public function dataPeriodik()
    {
        return view('dashboard.user.data_periodik');
    }

    public function uploadSK()
    {
        return view('dashboard.user.upload_sk_user');
    }

    public function profile()
    {
        $user = Auth::user();
        return view('dashboard.user.profile-user', compact('user'));
    }

    public function updateProfile(Request $request)
    {
        $user = Auth::user();

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

        return redirect()->route('user.profile-user')->with('success', 'Profil berhasil diperbarui!');
    }
}
