<?php
namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Passport\HasApiTokens;

class Akun extends Authenticatable
{
    use HasApiTokens, Notifiable;

    protected $table = 'akun';

    protected $fillable = [
        'nama',
        'email',
        'password',
        'nomor_wa',
        'jenis_fasilitas',
        'nama_bank_sampah',
        'alamat',
        'kapanewon_id',
        'kelurahan_id',
        'padukuhan_id',
        'link_maps',
        'username',
        'role',
    ];

    protected $hidden = ['password','remember_token'];

    public function kapanewon()
    {
        return $this->belongsTo(Kapanewon::class, 'kapanewon_id');
    }

    public function kelurahan()
    {
        return $this->belongsTo(Kelurahan::class, 'kelurahan_id');
    }

    public function padukuhan()
    {
        return $this->belongsTo(Padukuhan::class, 'padukuhan_id');
    }

    public function dokumenSk()
    {
        return $this->hasOne(DokumenSK::class, 'user_id');
    }

    public function setRememberToken($value) {}
    public function getRememberToken() { return null; }
    public function getRememberTokenName() { return null; }
}
