<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

use App\Http\Controllers\WilayahController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\RegisterPetugasController;
use App\Http\Controllers\RegisterAdminController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DataUmumAdminController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\DokumenSKController;

Route::get('/', fn() => view('landing'));
Route::get('/home', fn() => view('home'));

Route::get('/login', fn() => view('auth.login'))->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login.process');

Route::get('/register', fn() => view('auth.register'))->name('register.user');
Route::post('/register', [RegisterController::class, 'store'])->name('register.user');

Route::get('/register-petugas', [RegisterPetugasController::class, 'showForm'])->name('register.petugas.form');
Route::post('/register-petugas', [RegisterPetugasController::class, 'store'])->name('register.petugas.store');

Route::get('/register-admin', [RegisterAdminController::class, 'showForm'])->name('register.admin.form');
Route::post('/register-admin', [RegisterAdminController::class, 'store'])->name('register.admin.store');

Route::get('/wilayah/kapanewon', [WilayahController::class, 'getKapanewon']);
Route::get('/wilayah/kelurahan/{kapanewon_id}', [WilayahController::class, 'getKelurahan']);
Route::get('/wilayah/padukuhan/{kelurahan_id}', [WilayahController::class, 'getPadukuhan']);

Route::get('/dashboard_admin', fn() => view('dashboard.admin.dashboard_admin'));
Route::get('/dashboard_admin/data-umum', fn() => view('dashboard.admin.data_umum_admin'));
Route::get('/dashboard_admin/data-umum', [DataUmumAdminController::class, 'index'])->name('data.umum.index');
Route::get('/dashboard_admin/data-umum/{id}', [DataUmumAdminController::class, 'show'])->name('data.umum.show');

Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard_user', [UserController::class, 'dashboard'])->name('user.dashboard_user');
    Route::get('/data-umum', [UserController::class, 'dataUmum'])->name('user.data_umum');
    Route::get('/data-periodik', [UserController::class, 'dataPeriodik'])->name('user.data_periodik');
    Route::get('/upload-sk', [DokumenSKController::class, 'create'])->name('user.upload_sk');
    Route::post('/upload-sk', [DokumenSKController::class, 'store'])->name('user.upload_sk.store');
});

Route::post('/logout', function () {
    Auth::logout();
    request()->session()->invalidate();
    request()->session()->regenerateToken();

    return redirect('/login');
})->name('logout');
