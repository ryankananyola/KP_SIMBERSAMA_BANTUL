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
            'link_maps' => 'nullable|url',
            'username' => 'required|unique:akun,username',
        ]);

        $validated['password'] = Hash::make($validated['password']);

        if (!empty($validated['link_maps'])) {
            $link = $validated['link_maps'];

            if (strpos($link, 'maps.app.goo.gl') !== false) {
                $link = $this->resolveShortUrl($link);
            }

            if (strpos($link, '/maps/embed') !== false) {
                $validated['link_maps'] = $link;
            }
            elseif (strpos($link, 'google.com/maps') !== false) {
                $validated['link_maps'] = $link . (str_contains($link, '?') ? '&' : '?') . 'output=embed';
            }
        }

        Akun::create($validated);

        return redirect('/login')->with('success', 'Registrasi berhasil!');
    }

    private function resolveShortUrl($url)
    {
        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_HEADER, true);    
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, false); 
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $response = curl_exec($ch);

        $redirectUrl = null;

        if (preg_match('/Location:\s*(.*)\s/i', $response, $matches)) {
            $redirectUrl = trim($matches[1]);
        }

        curl_close($ch);

        return $redirectUrl ?? $url;
    }
}
