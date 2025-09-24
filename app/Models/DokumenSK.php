<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DokumenSK extends Model
{
    use HasFactory;

    protected $table = 'documment_sk';

    protected $fillable = [
        'user_id',
        'sk',
        'no_sk',
        'diperlukan_oleh',
        'file_sk',
        'struktur_organisasi',
        'kondisi_bangunan',
        'dibangun_oleh',
        'pihak_membangun',
        'tahun_pembangunan',
        'luas',
        'biaya_pembangunan',
        'status',
        'survey_result',
        'survey_date', 
        'status_survey',
        'catatan_petugas',
    ];

    public function user()
    {
        return $this->belongsTo(Akun::class, 'user_id');
    }
}