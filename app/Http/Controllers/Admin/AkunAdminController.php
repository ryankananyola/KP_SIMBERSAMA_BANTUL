<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Akun;
use Illuminate\Support\Facades\Hash;

class AkunAdminController extends Controller
{
    public function create()
    {
        $kapanewon = \App\Models\Kapanewon::all();
        return view('dashboard.admin.registrasi_akun_baru', compact('kapanewon'));
    }


    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama' => 'required|string|max:255',
            'email' => 'required|email|unique:akun,email',
            'password' => 'required|string|min:10',
            'username' => 'required|unique:akun,username',
            'nomor_wa' => 'required|string',
            'jenis_fasilitas' => 'nullable|string',
            'nama_bank_sampah' => 'nullable|string',
            'alamat' => 'nullable|string',
            'kapanewon_id' => 'required|exists:kapanewon,id',
            'kelurahan_id' => 'required|exists:kelurahan,id',
            'padukuhan_id' => 'required|exists:padukuhan,id',
            'link_maps' => 'nullable|url',
        ]);

        $validated['password'] = Hash::make($validated['password']);

        Akun::create($validated);

        return redirect()->route('admin.akun.create')->with('success', 'Akun berhasil dibuat!');
    }
}

