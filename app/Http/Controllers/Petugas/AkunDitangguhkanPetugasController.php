<?php
namespace App\Http\Controllers\Petugas;

use App\Http\Controllers\Controller;
use App\Models\DokumenSK;
use Illuminate\Http\Request;

class AkunDitangguhkanPetugasController extends Controller
{
    public function index()
    {
        $data = DokumenSK::with('user')->paginate(5);
        return view('dashboard.petugas.akun_ditangguhkan', compact('data'));
    }

    public function show($id)
    {
        $sk = DokumenSK::with('user')->findOrFail($id);
        return view('dashboard.petugas.detail_akun_ditangguhkan', compact('sk'));
    }

    public function verify(Request $request, $id)
    {
        $request->validate([
            'action' => 'required|in:terima,revisi',
            'catatan_petugas' => 'nullable|string|max:500'
        ]);

        $sk = DokumenSK::findOrFail($id);

        if ($request->action === 'terima') {
            $sk->status = 'Diterima'; 
            $sk->catatan_petugas = null;
        } else {
            $sk->status = 'Revisi';
            $sk->catatan_petugas = $request->catatan_petugas; 
        }

        $sk->save();

        return redirect()->route('petugas.akun_ditangguhkan.index')
            ->with('success', 'Status dokumen berhasil diperbarui');
    }

   public function setSurvey(Request $request, $id)
    {
        $request->validate([
            'survey_date' => 'required|date'
        ]);

        $sk = DokumenSK::findOrFail($id);
        $sk->survey_date = $request->survey_date;
        $sk->status_survey = 'Menunggu';

        if ($sk->status === 'Diterima') {
            $sk->status = 'Survey';
        }

        $sk->save();

        return redirect()->back()->with('success', 'Tanggal survey berhasil diset & status berubah ke Survey');
    }


    public function setHasilSurvey(Request $request, $id)
    {
        $rules = [
            'survey_result' => 'required|in:Layak,Perlu Perbaikan',
        ];

        if ($request->survey_result === 'Perlu Perbaikan') {
            $rules['catatan_petugas'] = 'required|string|max:500';
        }

        $request->validate($rules);

        $sk = DokumenSK::with('user')->findOrFail($id);

        $sk->survey_result = $request->survey_result;

        if ($request->survey_result === 'Layak') {
            $sk->status_survey = 'Layak';
            $sk->status = 'Aktif'; 
            $sk->catatan_petugas = null;

            $akun = $sk->user;
            if ($akun) {
                $akun->update(['role' => 0]);
            }
        } else {
            $sk->status_survey = 'Perlu Perbaikan';
            $sk->catatan_petugas = $request->catatan_petugas;
        }

        $sk->save();

        return redirect()->back()->with('success', 'Hasil survey berhasil diset');
    }
}
