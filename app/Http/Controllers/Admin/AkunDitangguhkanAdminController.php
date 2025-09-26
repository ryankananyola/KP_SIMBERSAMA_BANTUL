<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\DokumenSK;
use Illuminate\Http\Request;

class AkunDitangguhkanAdminController extends Controller
{
    public function index()
    {
        $data = DokumenSK::with('user')->get();
        return view('dashboard.admin.akun_ditangguhkan_admin', compact('data'));
    }

    public function show($id)
    {
        $sk = DokumenSK::with('user')->findOrFail($id);
        return view('dashboard.admin.detail_akun_ditangguhkan_admin', compact('sk'));
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

        return redirect()->route('admin.akun_ditangguhkan_admin.index')
            ->with('success', 'Status dokumen berhasil diperbarui');
    }

    public function setSurvey(Request $request, $id)
    {
        $request->validate([
            'survey_date' => 'required|date'
        ]);

        $sk = DokumenSK::findOrFail($id);
        $sk->survey_date = $request->survey_date;
        $sk->status = 'Menunggu';

        if ($sk->status === 'Diterima') {
            $sk->status = 'Survey';
        }  

        $sk->save();

        return redirect()->back()->with('success', 'Tanggal survey berhasil diset & status berubah ke Survey');
    }

    public function setHasilSurvey(Request $request, $id)
    {
        $rules = [
            'survey_result' => 'required|in:Lauak,Perlu Perbaikan',
        ];

        if ($request->survey_result === 'Perlu Perbaikan') {
            $rules['catatan_petugas'] = 'required|string|max:500';
        }

        $request->validate($rules);

        $sk = DokumenSK::with('user')->findOrFail($id);

        $sk->status_survey = $request->survey_result;

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
