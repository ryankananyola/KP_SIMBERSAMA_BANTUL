<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use Laravel\Passport\HasApiTokens;
class Akun extends Model
{
    use HasApiTokens;
    protected $table = 'akun';
    protected $fillable = [
        'nama', 'email', 'password', 'nomor_wa', 'jenis_fasilitas', 'nama_bank_sampah', 'alamat', 'kapanewon_id', 'kelurahan_id', 'padukuhan_id', 'username'
    ];
}
