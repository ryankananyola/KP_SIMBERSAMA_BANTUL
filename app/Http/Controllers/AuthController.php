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

    if ($akun instanceof \App\Models\Adminstaf) {
    Auth::guard('adminstaf')->login($akun);
    } else {
        Auth::guard('akun')->login($akun);
    }



    return match ((int)$akun->role) {
        2 => redirect('/dashboard_admin')->with('success', 'Login admin berhasil!'),
        1 => redirect('/dashboard_petugas')->with('success', 'Login petugas berhasil!'),
        default => redirect('/dashboard_user')->with('success', 'Login user berhasil!'),
    };
}

    public function logout(Request $request)
    {
        Auth::logout(); 
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/login')->with('success', 'Logout berhasil!');
    }
}
