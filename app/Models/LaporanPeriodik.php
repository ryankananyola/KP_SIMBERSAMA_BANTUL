<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LaporanPeriodik extends Model
{
    use HasFactory;

    protected $table = 'laporan_periodik';

    protected $fillable = [
        'user_id',
        'periode',
        'tahun',
        'organik_rumah_tangga',
        'organik_pasar',
        'organik_kantor',
        'anorganik_rumah_tangga',
        'anorganik_pasar',
        'anorganik_kantor',
        'b3_rumah_tangga',
        'b3_pasar',
        'b3_kantor',
    ];

    public function user()
    {
        return $this->belongsTo(Akun::class, 'user_id');
    }
}
