<?php

namespace App\Http\Controllers\Petugas;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Akun;

class DataUmumPetugasController extends Controller
{
    public function index()
    {
        $data = Akun::where('role', 0)->get();

        return view('dashboard.petugas.data_umum_petugas', compact('data'));
    }

    public function show($id)
    {
        $akun = Akun::with(['kapanewon','kelurahan','padukuhan'])->findOrFail($id);

        return view('dashboard.petugas.detail_data_umum_user', compact('akun'));
    }
}
