<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
class Kapanewon extends Model
{
    protected $table = 'kapanewon';
    protected $fillable = ['nama'];
    public function kelurahan()
    {
        return $this->hasMany(Kelurahan::class);
    }
}
