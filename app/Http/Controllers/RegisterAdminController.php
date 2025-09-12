<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Adminstaf;
use Illuminate\Support\Facades\Hash;

class RegisterAdminController extends Controller
{
    public function showForm()
    {
        return view('auth.register_admin');
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

        $admin = new Adminstaf();
        $admin->nama = $validated['nama'];
        $admin->username = $validated['username'];
        $admin->email = $validated['email'];
        $admin->password = Hash::make($validated['password']);
        $admin->no_hp = $validated['no_hp'] ?? null;
        $admin->alamat = $validated['alamat'] ?? null;
        $admin->role = 2; // ADMIN
        $admin->save();

        return redirect('/login')->with('success', 'Registrasi admin berhasil!');
    }
}
