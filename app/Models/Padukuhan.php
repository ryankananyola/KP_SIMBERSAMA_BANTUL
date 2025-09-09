<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
class Padukuhan extends Model
{
    protected $table = 'padukuhan';
    protected $fillable = ['nama', 'kelurahan_id'];
    public function kelurahan()
    {
        return $this->belongsTo(Kelurahan::class);
    }
}
