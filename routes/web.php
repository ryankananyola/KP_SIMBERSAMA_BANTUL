<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\WilayahController;
use App\Http\Controllers\RegisterController;
use Illuminate\Http\Request;
use App\Models\Akun;
use Illuminate\Support\Facades\Hash;

Route::get('/', function () {
    return view('landing');
});

Route::get('/home', function () {
    return view('home');
});

Route::get('/login', function () {
    return view('auth/login');
});
Route::post('/login', function(Request $request) {
    $request->validate([
        'username' => 'required',
        'password' => 'required',
    ]);
    $akun = Akun::where('username', $request->username)->first();
    if (!$akun || !Hash::check($request->password, $akun->password)) {
        return back()->withErrors(['login' => 'Username atau password salah'])->withInput();
    }
    // Redirect sesuai role
    if ($akun->role == 2) {
        return redirect('/dashboard_admin')->with('success', 'Login admin berhasil!');
    } elseif ($akun->role == 1) {
        return redirect('/dashboard_petugas')->with('success', 'Login petugas berhasil!');
    } else {
        return redirect('/dashboard')->with('success', 'Login user berhasil!');
    }
});


Route::get('/register', function () {
    return view('auth/register');
});
Route::post('/register', [RegisterController::class, 'store']);

// Register Petugas
use App\Http\Controllers\RegisterPetugasController;
Route::get('/register-petugas', [RegisterPetugasController::class, 'showForm']);
Route::post('/register-petugas', [RegisterPetugasController::class, 'store']);

// Register Admin
use App\Http\Controllers\RegisterAdminController;
Route::get('/register-admin', [RegisterAdminController::class, 'showForm']);
Route::post('/register-admin', [RegisterAdminController::class, 'store']);

Route::get('/wilayah/kapanewon', [WilayahController::class, 'getKapanewon']);
Route::get('/wilayah/kelurahan/{kapanewon_id}', [WilayahController::class, 'getKelurahan']);
Route::get('/wilayah/padukuhan/{kelurahan_id}', [WilayahController::class, 'getPadukuhan']);

// Dashboard Admin
Route::get('/dashboard_admin', function () {
    return view('dashboard.admin.dashboard_admin');
});
Route::get('/dashboard_admin/data-umum', function () {
    return view('dashboard.admin.data_umum_admin');
});