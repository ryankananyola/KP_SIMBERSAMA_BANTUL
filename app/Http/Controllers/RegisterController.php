<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Akun;
use Illuminate\Support\Facades\Hash;
class RegisterController extends Controller
{
    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama' => 'required|string|max:255',
            'email' => 'required|email|unique:akun,email',
            'password' => 'required|string|min:10',
            'nomor_wa' => 'required|string',
            'jenis_fasilitas' => 'nullable|string',
            'nama_bank_sampah' => 'nullable|string',
            'alamat' => 'nullable|string',
            'kapanewon_id' => 'required|exists:kapanewon,id',
            'kelurahan_id' => 'required|exists:kelurahan,id',
            'padukuhan_id' => 'required|exists:padukuhan,id',
            'username' => 'required|unique:akun,username',
            'g-recaptcha-response' => 'required|captcha',
        ]);
        $validated['password'] = Hash::make($validated['password']);
        Akun::create($validated);
        return redirect('/login')->with('success', 'Registrasi berhasil!');
    }
}
