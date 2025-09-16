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
use App\Http\Controllers\LaporanPeriodikController;

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
    Route::prefix('dashboard_user')->name('user.')->group(function () {
        Route::get('/', [UserController::class, 'dashboard'])->name('dashboard');

        // Data Umum
        Route::get('/data-umum', [UserController::class, 'showDataUmum'])->name('data_umum');
        Route::put('/data-umum', [UserController::class, 'updateDataUmum'])->name('data_umum.update');

        Route::get('/data-periodik', [LaporanPeriodikController::class, 'create'])->name('data_periodik');
        Route::post('/data-periodik/store', [LaporanPeriodikController::class, 'store'])->name('data_periodik.store');

        Route::get('/riwayat-laporan', [LaporanPeriodikController::class, 'riwayat'])->name('riwayat_laporan_user');
        Route::get('/detail-laporan/{id}', [LaporanPeriodikController::class, 'detail'])->name('detail_laporan_user');

        Route::get('/upload-sk', [DokumenSKController::class, 'create'])->name('upload_sk');
        Route::post('/upload-sk', [DokumenSKController::class, 'store'])->name('upload_sk.store');

        Route::get('/profile', [UserController::class, 'profile'])->name('profile');
        Route::put('/profile', [UserController::class, 'updateProfile'])->name('update_profile');
    });
});

Route::post('/logout', function () {
    Auth::logout();
    request()->session()->invalidate();
    request()->session()->regenerateToken();

    return redirect('/login');
})->name('logout');
