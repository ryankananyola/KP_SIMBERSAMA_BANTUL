<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Akun;
use App\Models\Adminstaf;

class DataUmumAdminController extends Controller
{
    public function index(Request $request)
    {
        $filter = $request->get('filter', 'petugas'); 

        if ($filter === 'user') {
            $data = Akun::where('role', 0)->get(); 
        } else {
            $data = Adminstaf::where('role', 1)->get(); 
        }

        return view('dashboard.admin.data_umum_admin', compact('data', 'filter'));
    }

    public function show($id, Request $request)
    {
        $filter = $request->get('filter', 'petugas');

        if ($filter === 'user') {
            $akun = Akun::with(['kapanewon','kelurahan','padukuhan'])->findOrFail($id);
            return view('dashboard.admin.detail_data_user', compact('akun'));
        } else {
            $petugas = Adminstaf::findOrFail($id);
            return view('dashboard.admin.detail_data_petugas', compact('petugas'));
        }
    }
}
