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
            'link_maps' => 'nullable|string',
            'username' => 'required|unique:akun,username',
        ]);

        $validated['password'] = Hash::make($validated['password']);

        $latitude = null;
        $longitude = null;

        if(!empty($validated['link_maps'])) {
            $resolvedUrl = $this->resolveShortUrl($validated['link_maps']);

            $coords = $this->extractLatLng($resolvedUrl);

            if($coords){
                $latitude = $coords['lat'];
                $longitude = $coords['lng'];
            }

            $validated['link_maps'] = $resolvedUrl;
        } elseif (!empty($validated['alamat'])) {
            $geocodeUrl = "https://maps.googleapis.com/maps/api/geocode/json?address="
                        . urlencode($validated['alamat'])
                        . "&key=" . config('services.google_maps.api_key');

            $response = json_decode(file_get_contents($geocodeUrl), true);

            if(isset($response['results'][0])) {
                $location = $response['results'][0]['geometry']['location'];
                $latitude = $location['lat'];
                $longitude = $location['lng'];
            }
        }

        $validated['latitude'] = $latitude;
        $validated['longitude'] = $longitude;

        Akun::create($validated);

        return redirect('/login')->with('success', 'Registrasi berhasil!');
    }

    public function showMap($id)
    {
        $akun = Akun::findOrFail($id);
        return view('petugas.detail_data', compact('akun'));
    }

    private function resolveShortUrl($url)
    {
        if(preg_match('/goo\.gl|maps\.app\.goo\.gl/', $url)){
            $headers = get_headers($url, 1);
            if(isset($headers['Location'])){
                $url = is_array($headers['Location']) ? end($headers['Location']) : $headers['Location'];
            }
        }
        return $url;
    }

    private function extractLatLng($url)
    {
        if(preg_match('/@([-0-9.]+),([-0-9.]+)/', $url, $matches)){
            return ['lat' => $matches[1], 'lng' => $matches[2]];
        }
        return null;
    }
}
