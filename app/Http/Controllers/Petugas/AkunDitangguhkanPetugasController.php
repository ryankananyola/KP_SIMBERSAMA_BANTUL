<?php
namespace App\Http\Controllers\Petugas;

use App\Http\Controllers\Controller;
use App\Models\DokumenSK;
use Illuminate\Http\Request;

class AkunDitangguhkanPetugasController extends Controller
{
    public function index()
    {
        $data = DokumenSK::with('user')->get();

        return view('dashboard.petugas.akun_ditangguhkan', compact('data'));
    }

    public function show($id)
    {
        $sk = DokumenSK::with('user')->findOrFail($id);

        return view('dashboard.petugas.detail_akun_ditangguhkan', compact('sk'));
    }

    public function updateStatus(Request $request, $id)
    {
        $sk = DokumenSK::findOrFail($id);
        $sk->status = $request->status;
        $sk->save();

        return redirect()->back()->with('success', 'Status berhasil diperbarui');
    }

    public function setSurvey(Request $request, $id)
    {
        $request->validate([
            'survey_date' => 'required|date'
        ]);

        $sk = DokumenSK::findOrFail($id);
        $sk->survey_date = $request->survey_date;
        $sk->status = 'Survey';
        $sk->save();

        return redirect()->back()->with('success', 'Tanggal survey berhasil diset');
    }

    public function setHasilSurvey(Request $request, $id)
    {
        $request->validate([
            'survey_result' => 'required|in:Layak,Perlu Perbaikan'
        ]);

        $sk = DokumenSK::with('user')->findOrFail($id);
        $sk->survey_result = $request->survey_result;

        if ($request->survey_result == 'Layak') {
            $sk->status = 'Aktif';

            $akun = $sk->user;
            if ($akun) {
                $akun->update(['role' => 0]);
            }
        } else {
            $sk->status = 'Dokumen Ditolak';
        }

        $sk->save();

        return redirect()->back()->with('success', 'Hasil survey berhasil diset');
    }
}
