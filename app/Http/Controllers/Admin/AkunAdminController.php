<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Akun;
use Illuminate\Support\Facades\Hash;
use App\Models\Kapanewon;

class AkunAdminController extends Controller
{
   public function create()
    {
        $kapanewon = Kapanewon::all();  
        return view('dashboard.admin.registrasi_akun_baru', compact('kapanewon'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama' => 'required|string|max:255',
            'email' => 'required|email|unique:akun,email',
            'password' => 'required|string|min:10',
            'nomor_wa' => 'required|string|max:20',
            'kapanewon' => 'required|string|max:255',
            'kalurahan' => 'required|string|max:255',
            'padukuhan' => 'required|string|max:255',
        ]);

        Akun::create([
            'nama' => $validated['nama'],
            'email' => $validated['email'],
            'password' => Hash::make($validated['password']),
            'nomor_wa' => $validated['nomor_wa'],
            'kapanewon' => $validated['kapanewon'],
            'kalurahan' => $validated['kalurahan'],
            'padukuhan' => $validated['padukuhan'],
        ]);

        return redirect()->route('admin.dashboard')->with('success', 'Akun berhasil didaftarkan.');
    }
}
