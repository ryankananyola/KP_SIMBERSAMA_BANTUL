<?php

return [

    'defaults' => [
        'guard' => env('AUTH_GUARD', 'akun'), 
        'passwords' => env('AUTH_PASSWORD_BROKER', 'akuns'),
    ],

    'guards' => [
        'akun' => [
            'driver' => 'session',
            'provider' => 'akuns',
        ],

        'adminstaf' => [ 
            'driver' => 'session',
            'provider' => 'adminstaf', 
        ],

        'api' => [
            'driver' => 'passport', 
            'provider' => 'akuns',
        ],
    ],

    'providers' => [
        'akuns' => [
            'driver' => 'eloquent',
            'model' => App\Models\Akun::class,
        ],

        'adminstaf' => [
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
        'adminstaf' => [ 
            'provider' => 'adminstaf',
            'table' => env('AUTH_PASSWORD_RESET_TOKEN_TABLE', 'password_reset_tokens'),
            'expire' => 60,
            'throttle' => 60,
        ],
    ],

    'password_timeout' => env('AUTH_PASSWORD_TIMEOUT', 10800),
];
