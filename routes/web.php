<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\Akun;

use App\Http\Controllers\WilayahController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\RegisterPetugasController;
use App\Http\Controllers\RegisterAdminController;

// Landing Page
Route::get('/', fn() => view('landing'));
Route::get('/home', fn() => view('home'));

// ================= LOGIN =================
Route::get('/login', fn() => view('auth.login'))->name('login');

Route::post('/login', function (Request $request) {
    $request->validate([
        'username' => 'required',
        'password' => 'required',
    ]);

    $akun = Akun::where('username', $request->username)->first();

    if (!$akun || !Hash::check($request->password, $akun->password)) {
        return back()->withErrors(['login' => 'Username atau password salah'])->withInput();
    }

    // Redirect sesuai role
    return match ($akun->role) {
        2 => redirect('/dashboard_admin')->with('success', 'Login admin berhasil!'),
        1 => redirect('/dashboard_petugas')->with('success', 'Login petugas berhasil!'),
        default => redirect('/dashboard')->with('success', 'Login user berhasil!'),
    };
});

// ================= REGISTER USER =================
Route::get('/register', fn() => view('auth.register'))->name('register.user.form');
Route::post('/register', [RegisterController::class, 'store'])->name('register.user.store');

// ================= REGISTER PETUGAS =================
Route::get('/register-petugas', [RegisterPetugasController::class, 'showForm'])->name('register.petugas.form');
Route::post('/register-petugas', [RegisterPetugasController::class, 'store'])->name('register.petugas.store');

// ================= REGISTER ADMIN =================
Route::get('/register-admin', [RegisterAdminController::class, 'showForm'])->name('register.admin.form');
Route::post('/register-admin', [RegisterAdminController::class, 'store'])->name('register.admin.store');

// ================= WILAYAH (API) =================
Route::get('/wilayah/kapanewon', [WilayahController::class, 'getKapanewon']);
Route::get('/wilayah/kelurahan/{kapanewon_id}', [WilayahController::class, 'getKelurahan']);
Route::get('/wilayah/padukuhan/{kelurahan_id}', [WilayahController::class, 'getPadukuhan']);

// ================= DASHBOARD =================
Route::get('/dashboard_admin', fn() => view('dashboard.admin.dashboard_admin'));
Route::get('/dashboard_admin/data-umum', fn() => view('dashboard.admin.data_umum_admin'));

