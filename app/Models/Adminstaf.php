<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Adminstaf extends Authenticatable
{
    use Notifiable;

    protected $table = 'adminstaf'; 
    protected $fillable = [
        'nama',
        'username',
        'password',
        'email',
        'no_hp',
        'alamat',
        'role'
    ];
    protected $hidden = ['password'];
}
