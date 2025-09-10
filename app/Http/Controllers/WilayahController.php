<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Kapanewon;
use App\Models\Kelurahan;
use App\Models\Padukuhan;
class WilayahController extends Controller
{
    public function getKapanewon()
    {
        return response()->json(Kapanewon::all());
    }
    public function getKelurahan($kapanewon_id)
    {
        return response()->json(Kelurahan::where('kapanewon_id', $kapanewon_id)->get());
    }
    public function getPadukuhan($kelurahan_id)
    {
        return response()->json(Padukuhan::where('kelurahan_id', $kelurahan_id)->get());
    }
}
