<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
class Kelurahan extends Model
{
    protected $table = 'kelurahan';
    protected $fillable = ['nama', 'kapanewon_id'];
    public function kapanewon()
    {
        return $this->belongsTo(Kapanewon::class);
    }
    public function padukuhan()
    {
        return $this->hasMany(Padukuhan::class);
    }
}
