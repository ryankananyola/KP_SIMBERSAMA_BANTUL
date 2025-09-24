<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

use App\Http\Controllers\WilayahController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\RegisterPetugasController;
use App\Http\Controllers\RegisterAdminController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\User\DashboardUserController;
use App\Http\Controllers\User\DokumenSKUserController;
use App\Http\Controllers\User\LaporanPeriodikController;
use App\Http\Controllers\Petugas\DashboardPetugasController;
use App\Http\Controllers\Petugas\DataUmumPetugasController;
use App\Http\Controllers\Petugas\DataPeriodikPetugasController;
use App\Http\Controllers\Petugas\AkunDitangguhkanPetugasController;
use App\Http\Controllers\Admin\DashboardAdminController;
use App\Http\Controllers\Admin\AkunAdminController;
use App\Http\Controllers\Admin\DataUmumAdminController;
use App\Http\Controllers\Admin\DataPeriodikAdminController;
use App\Http\Controllers\Admin\AkunDitangguhkanAdminController;

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


Route::middleware(['auth:akun'])->group(function () {
    Route::prefix('dashboard_user')->name('user.')->group(function () {
        Route::get('/', [DashboardUserController::class, 'dashboard'])->name('dashboard');

        Route::get('/data-umum', [DashboardUserController::class, 'showDataUmum'])->name('data_umum');
        Route::put('/data-umum', [DashboardUserController::class, 'updateDataUmum'])->name('data_umum.update');

        Route::get('/data-periodik', [LaporanPeriodikController::class, 'create'])->name('data_periodik');
        Route::post('/data-periodik/store', [LaporanPeriodikController::class, 'store'])->name('data_periodik.store');

        Route::get('/riwayat-laporan', [LaporanPeriodikController::class, 'riwayat'])->name('riwayat_laporan_user');
        Route::get('/detail-laporan/{id}', [LaporanPeriodikController::class, 'detail'])->name('detail_laporan_user');

        Route::get('/upload-sk', [DokumenSKUserController::class, 'create'])->name('upload_sk');
        Route::post('/upload-sk', [DokumenSKUserController::class, 'store'])->name('upload_sk.store');
        Route::put('/upload-sk/{id}', [DokumenSKUserController::class, 'update'])->name('upload_sk.update');

        Route::get('/profile-user', [DashboardUserController::class, 'profile'])->name('profile');
        Route::put('/profile-user', [DashboardUserController::class, 'updateProfile'])->name('update_profile');
    });
});

Route::middleware(['auth:adminstaf'])->group(function () {
    Route::prefix('dashboard_petugas')->name('petugas.')->group(function () {
        Route::get('/', [DashboardPetugasController::class, 'dashboard'])->name('dashboard');

        Route::get('/data-umum', [DataUmumPetugasController::class, 'index'])->name('data_umum');
        Route::get('/data-umum/{id}', [DataUmumPetugasController::class, 'show'])->name('data_umum.show');

        Route::get('/data-periodik/export-pdf', [DataPeriodikPetugasController::class, 'exportPdf']) ->name('data_periodik.exportPdf');
        Route::get('/data-periodik', [DataPeriodikPetugasController::class, 'index'])->name('data_periodik');
        Route::get('/data-periodik/{id}', [DataPeriodikPetugasController::class, 'show'])->name('data_periodik.show');
        Route::get('/data-periodik/{id}/export-pdf', [\App\Http\Controllers\Petugas\DataPeriodikPetugasController::class, 'exportSinglePdf'])->name('data_periodik.exportSinglePdf');

        Route::get('/akun-ditangguhkan', [AkunDitangguhkanPetugasController::class, 'index'])->name('akun_ditangguhkan.index');
        Route::get('/akun-ditangguhkan/{id}', [AkunDitangguhkanPetugasController::class, 'show'])->name('akun_ditangguhkan.show');
        Route::put('/akun-ditangguhkan/{id}/verify', [AkunDitangguhkanPetugasController::class, 'verify'])->name('akun_ditangguhkan.verify');
        Route::put('/akun-ditangguhkan/{id}/status', [AkunDitangguhkanPetugasController::class, 'updateStatus'])->name('akun_ditangguhkan.updateStatus');
        Route::put('/akun-ditangguhkan/{id}/survey', [AkunDitangguhkanPetugasController::class, 'setSurvey'])->name('akun_ditangguhkan.setSurvey');
        Route::put('/akun-ditangguhkan/{id}/hasil-survey', [AkunDitangguhkanPetugasController::class, 'setHasilSurvey'])->name('akun_ditangguhkan.setHasilSurvey');

        Route::get('/profile-petugas', [DashboardPetugasController::class, 'profile'])->name('profile');
        Route::put('/profile-petugas', [DashboardPetugasController::class, 'updateProfile'])->name('profile.update');
    });
});

Route::middleware(['auth:adminstaf'])->group(function () {
    Route::prefix('dashboard_admin')->name('admin.')->group(function () {
        Route::get('/', [DashboardAdminController::class, 'dashboard'])->name('dashboard');

        Route::get('/data-umum', [App\Http\Controllers\Admin\DataUmumAdminController::class, 'index'])->name('data_umum.index');
        Route::get('/data-umum/{id}', [App\Http\Controllers\Admin\DataUmumAdminController::class, 'show'])->name('data_umum.show');

        Route::get('/data-periodik/export-pdf', [DataPeriodikAdminController::class, 'exportPdf']) ->name('data_periodik.exportPdf');
        Route::get('/data-periodik', [App\Http\Controllers\Admin\DataPeriodikAdminController::class, 'index'])->name('data_periodik');
        Route::get('/data-periodik/{id}', [App\Http\Controllers\Admin\DataPeriodikAdminController::class, 'show'])->name('data_periodik.show'); 
        Route::get('/data-periodik/{id}/export-pdf', [\App\Http\Controllers\Admin\DataPeriodikAdminController::class, 'exportSinglePdf'])->name('data_periodik.exportSinglePdf');

        Route::get('/akun-ditangguhkan', [AkunDitangguhkanAdminController::class, 'index'])->name('akun_ditangguhkan_admin.index');
        Route::get('/akun-ditangguhkan/{id}', [AkunDitangguhkanAdminController::class, 'show'])->name('akun_ditangguhkan_admin.show');
        Route::put('/akun-ditangguhkan/{id}/verify', [AkunDitangguhkanAdminController::class, 'verify'])->name('akun_ditangguhkan_admin.verify');
        Route::put('/akun-ditangguhkan/{id}/status', [AkunDitangguhkanAdminController::class, 'updateStatus'])->name('akun_ditangguhkan_admin.updateStatus');
        Route::put('/akun-ditangguhkan/{id}/survey', [AkunDitangguhkanAdminController::class, 'setSurvey'])->name('akun_ditangguhkan_admin.setSurvey');
        Route::put('/akun-ditangguhkan/{id}/hasil-survey', [AkunDitangguhkanAdminController::class, 'setHasilSurvey'])->name('akun_ditangguhkan_admin.setHasilSurvey');

        Route::get('/akun/create', [App\Http\Controllers\Admin\AkunAdminController::class, 'create'])->name('akun.create');
        Route::post('/akun/store', [App\Http\Controllers\Admin\AkunAdminController::class, 'store'])->name('akun.store');   
    });
});

Route::post('/logout', function () {
    Auth::logout();
    request()->session()->invalidate();
    request()->session()->regenerateToken();

    return redirect('/login');
})->name('logout');
