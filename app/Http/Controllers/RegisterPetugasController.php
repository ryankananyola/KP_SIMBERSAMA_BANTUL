<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Akun;
use Illuminate\Support\Facades\Hash;
class RegisterPetugasController extends Controller
{
    public function showForm()
    {
        return view('auth/register_petugas');
    }
    public function store(Request $request)
    {
        $validated = $request->validate([
            'username' => 'required|unique:akun,username',
            'password' => 'required|string|min:8',
        ]);
        $akun = new Akun();
        $akun->username = $validated['username'];
        $akun->password = Hash::make($validated['password']);
        $akun->role = 1; // Petugas
        $akun->save();
        return redirect('/login')->with('success', 'Registrasi petugas berhasil!');
    }
}
