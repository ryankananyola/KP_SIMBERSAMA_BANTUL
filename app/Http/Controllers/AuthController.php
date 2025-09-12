<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\Akun;
use App\Models\Adminstaf;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        $request->validate([
            'username' => 'required',
            'password' => 'required',
        ]);

        // Cek dulu di tabel akun
        $akun = Akun::where('username', $request->username)->first();

        // Kalau tidak ada di tabel akun, cek di tabel adminstaf
        if (!$akun) {
            $akun = Adminstaf::where('username', $request->username)->first();
        }

        // Kalau tetap tidak ada
        if (!$akun || !Hash::check($request->password, $akun->password)) {
            return back()->withErrors(['login' => 'Username atau password salah'])->withInput();
        }

        // Redirect sesuai role
        return match ($akun->role) {
            2 => redirect('/dashboard_admin')->with('success', 'Login admin berhasil!'),
            1 => redirect('/dashboard_petugas')->with('success', 'Login petugas berhasil!'),
            default => redirect('/dashboard')->with('success', 'Login user berhasil!'),
        };
    }

    public function logout(Request $request)
    {
        // Hapus sesi atau token autentikasi di sini
        // Contoh: Auth::logout();

        return redirect('/login')->with('success', 'Logout berhasil!');
    }
}
