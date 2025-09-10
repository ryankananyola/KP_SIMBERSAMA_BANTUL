<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Hash;
use App\Models\Akun;
use Laravel\Passport\TokenRepository;
use Laravel\Passport\RefreshTokenRepository;

Route::post('/login', function(Request $request) {
    $request->validate([
        'username' => 'required',
        'password' => 'required',
    ]);
    $akun = Akun::where('username', $request->username)->first();
    if (!$akun || !Hash::check($request->password, $akun->password)) {
        return response()->json(['error' => 'Unauthorized'], 401);
    }
    $http = new \GuzzleHttp\Client;
    $response = $http->post(url('/oauth/token'), [
        'form_params' => [
            'grant_type' => 'password',
            'client_id' => env('PASSPORT_PASSWORD_CLIENT_ID'),
            'client_secret' => env('PASSPORT_PASSWORD_CLIENT_SECRET'),
            'username' => $request->username,
            'password' => $request->password,
            'scope' => '',
        ],
    ]);
    return json_decode((string) $response->getBody(), true);
});

Route::post('/refresh', function(Request $request) {
    $request->validate([
        'refresh_token' => 'required',
    ]);
    $http = new \GuzzleHttp\Client;
    $response = $http->post(url('/oauth/token'), [
        'form_params' => [
            'grant_type' => 'refresh_token',
            'refresh_token' => $request->refresh_token,
            'client_id' => env('PASSPORT_PASSWORD_CLIENT_ID'),
            'client_secret' => env('PASSPORT_PASSWORD_CLIENT_SECRET'),
            'scope' => '',
        ],
    ]);
    return json_decode((string) $response->getBody(), true);
});