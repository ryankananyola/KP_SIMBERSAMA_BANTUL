<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Akun;
use Illuminate\Support\Facades\Hash;
class RegisterAdminController extends Controller
{
    public function showForm()
    {
        return view('register_admin');
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
        $akun->role = 2; // Admin
        $akun->save();
        return redirect('/login')->with('success', 'Registrasi admin berhasil!');
    }
}
