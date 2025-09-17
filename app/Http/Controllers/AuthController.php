<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use App\Models\Akun;
use App\Models\Adminstaf;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        $request->validate([
            'username' => 'required',
            'password' => 'required',
            'g-recaptcha-response' => 'required|captcha',
        ]);
        $akun = Akun::where('username', $request->username)->first();

        if (!$akun) {
            $akun = Adminstaf::where('username', $request->username)->first();
        }

        if (!$akun || !Hash::check($request->password, $akun->password)) {
            return back()->withErrors(['login' => 'Username atau password salah'])->withInput();
        }

        Auth::login($akun);

        return match ($akun->role) {
            2 => redirect('/dashboard_admin')->with('success', 'Login admin berhasil!'),
            1 => redirect('/dashboard_petugas')->with('success', 'Login petugas berhasil!'),
            default => redirect('/dashboard_user')->with('success', 'Login user berhasil!'),
        };
    }

    public function logout(Request $request)
    {
        return redirect('/login')->with('success', 'Logout berhasil!');
    }
}
