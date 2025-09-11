<?php

return [

    'defaults' => [
        'guard' => env('AUTH_GUARD', 'akun'), // default login ke tabel akun
        'passwords' => env('AUTH_PASSWORD_BROKER', 'akuns'),
    ],

    'guards' => [
        // Guard untuk akun (user biasa)
        'akun' => [
            'driver' => 'session',
            'provider' => 'akuns',
        ],

        // Guard untuk admin/petugas
        'adminstaf' => [
            'driver' => 'session',
            'provider' => 'adminstafs',
        ],

        // Kalau ada API
        'api' => [
            'driver' => 'passport', // bisa sanctum juga tergantung setup
            'provider' => 'akuns',
        ],
    ],

    'providers' => [
        // Provider untuk akun
        'akuns' => [
            'driver' => 'eloquent',
            'model' => App\Models\Akun::class,
        ],

        // Provider untuk adminstaf
        'adminstafs' => [
            'driver' => 'eloquent',
            'model' => App\Models\Adminstaf::class,
        ],
    ],

    'passwords' => [
        'akuns' => [
            'provider' => 'akuns',
            'table' => env('AUTH_PASSWORD_RESET_TOKEN_TABLE', 'password_reset_tokens'),
            'expire' => 60,
            'throttle' => 60,
        ],
        'adminstafs' => [
            'provider' => 'adminstafs',
            'table' => env('AUTH_PASSWORD_RESET_TOKEN_TABLE', 'password_reset_tokens'),
            'expire' => 60,
            'throttle' => 60,
        ],
    ],

    'password_timeout' => env('AUTH_PASSWORD_TIMEOUT', 10800),
];
