<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Adminstaf;
use Illuminate\Support\Facades\Hash;

class RegisterPetugasController extends Controller
{
    public function showForm()
    {
        return view('auth.register_petugas');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama'      => 'required|string|max:255',
            'username'  => 'required|unique:adminstaf,username',
            'email'     => 'required|email|unique:adminstaf,email',
            'password'  => 'required|string|min:8|confirmed',
            'no_hp'     => 'nullable|string|max:20',
            'alamat'    => 'nullable|string',
        ]);

        $petugas = new Adminstaf();
        $petugas->nama = $validated['nama'];
        $petugas->username = $validated['username'];
        $petugas->email = $validated['email'];
        $petugas->password = Hash::make($validated['password']);
        $petugas->no_hp = $validated['no_hp'] ?? null;
        $petugas->alamat = $validated['alamat'] ?? null;
        $petugas->role = 1; // PETUGAS
        $petugas->save();

        return redirect('/login')->with('success', 'Registrasi petugas berhasil!');
    }
}
