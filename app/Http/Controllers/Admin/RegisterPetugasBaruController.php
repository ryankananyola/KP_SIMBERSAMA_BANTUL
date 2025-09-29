<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Adminstaf;
use Illuminate\Support\Facades\Hash;

class RegisterPetugasBaruController extends Controller
{
    public function showForm()
    {
        return view('dashboard.admin.registrasi_petugas_baru');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama'     => 'required|string|max:255',
            'username' => 'required|string|max:100|unique:adminstaf,username',
            'email'    => 'required|email|unique:adminstaf,email',
            'no_hp'    => 'required|string|max:20',
            'alamat'   => 'required|string|max:255',
            'password' => [
                'required',
                'confirmed',
                'min:10',
                'regex:/[a-z]/',      
                'regex:/[A-Z]/',     
                'regex:/[0-9]/',     
            ],
        ], [
            'password.regex' => 'Password harus mengandung huruf kecil, huruf besar, dan angka',
        ]);

        Adminstaf::create([
            'nama'     => $request->nama,
            'username' => $request->username,
            'email'    => $request->email,
            'no_hp'    => $request->no_hp,
            'alamat'   => $request->alamat,
            'password' => Hash::make($request->password),
            'role'     => 1, 
        ]);

        return redirect()->route('admin.petugas.create')->with('success', 'Petugas baru berhasil didaftarkan.');
    }
}
