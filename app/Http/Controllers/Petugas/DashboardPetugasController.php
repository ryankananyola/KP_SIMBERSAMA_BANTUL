<?php

namespace App\Http\Controllers\Petugas;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DashboardPetugasController extends Controller
{
    public function dashboard()
    {
        return view('dashboard.petugas.dashboard_petugas');
    }

    public function dataUmum()
    {
        return view('dashboard.petugas.data_umum_petugas');
    }
    
    public function dataPeriodik()
    {
        return view('dashboard.petugas.data_periodik_petugas');
    }

    public function akunDitangguhkan()
    {
        return view('dashboard.petugas.akun_ditangguhkan');
    }

    public function profile()
    {
        return view('dashboard.petugas.profile');
    }
}
