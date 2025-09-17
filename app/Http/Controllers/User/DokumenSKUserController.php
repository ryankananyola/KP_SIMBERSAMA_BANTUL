<?php

namespace App\Http\Controllers\User;

use App\Models\DokumenSK;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;

class DokumenSKUserController extends Controller
{
    public function create()
    {
        return view('dashboard.user.upload_sk_user');
    }

    public function store(Request $request)
    {
        $request->validate([
            'sk' => 'required|string|max:255',
            'no_sk' => 'required|string|max:255',
            'diperlukan_oleh' => 'required|string|max:255',
            'file_sk' => 'required|mimes:pdf,doc,docx,jpg,png|max:4096',
            'struktur_organisasi' => 'nullable|string|max:255',
            'kondisi_bangunan' => 'nullable|string|max:255',
            'dibangun_oleh' => 'nullable|string|max:255',
            'pihak_membangun' => 'nullable|string|max:255',
            'tahun_pembangunan' => 'nullable|digits:4|integer',
            'luas' => 'nullable|numeric',
            'biaya_pembangunan' => 'nullable|numeric',
        ]);

        if ($request->sk === 'Lainnya') {
            $request->validate(['sk_lainnya' => 'required|string|max:255']);
        }
        if ($request->diperlukan_oleh === 'Lainnya') {
            $request->validate(['diperlukan_oleh_lainnya' => 'required|string|max:255']);
        }
        if ($request->kondisi_bangunan === 'Lainnya') {
            $request->validate(['kondisi_bangunan_lainnya' => 'required|string|max:255']);
        }
        if ($request->dibangun_oleh === 'Lainnya') {
            $request->validate(['dibangun_oleh_lainnya' => 'required|string|max:255']);
        }
        if ($request->pihak_membangun === 'Lainnya') {
            $request->validate(['pihak_yang_membangun_lainnya' => 'required|string|max:255']);
        }

        $path = $request->file('file_sk')->store('dokumen_sk', 'public');

        $sk = $request->sk === 'Lainnya' ? $request->sk_lainnya : $request->sk;
        $diperlukan_oleh = $request->diperlukan_oleh === 'Lainnya' ? $request->diperlukan_oleh_lainnya : $request->diperlukan_oleh;
        $kondisi_bangunan = $request->kondisi_bangunan === 'Lainnya' ? $request->kondisi_bangunan_lainnya : $request->kondisi_bangunan;
        $dibangun_oleh = $request->dibangun_oleh === 'Lainnya' ? $request->dibangun_oleh_lainnya : $request->dibangun_oleh;
        $pihak_membangun = $request->pihak_membangun === 'Lainnya' ? $request->pihak_membangun_lainnya : $request->pihak_membangun;

        DokumenSK::create([
            'user_id' => Auth::id(),
            'sk' => $sk,
            'no_sk' => $request->no_sk,
            'diperlukan_oleh' => $diperlukan_oleh,
            'file_sk' => $path,
            'struktur_organisasi' => $request->struktur_organisasi,
            'kondisi_bangunan' => $kondisi_bangunan,
            'dibangun_oleh' => $dibangun_oleh,
            'pihak_membangun' => $pihak_membangun,
            'tahun_pembangunan' => $request->tahun_pembangunan,
            'luas' => $request->luas,
            'biaya_pembangunan' => $request->biaya_pembangunan,
            'status' => 'Pending',
        ]);

        return redirect()->back()->with('success', 'Dokumen SK berhasil diupload!');
    }

    public function update(Request $request, $id)
    {
        $dokumen = DokumenSK::where('id', $id)
                            ->where('user_id', Auth::id())
                            ->firstOrFail();

        $request->validate([
            'sk' => 'required|string|max:255',
            'no_sk' => 'required|string|max:255',
            'diperlukan_oleh' => 'required|string|max:255',
            'file_sk' => 'nullable|mimes:pdf,doc,docx,jpg,png|max:4096',
            'struktur_organisasi' => 'nullable|string|max:255',
            'kondisi_bangunan' => 'nullable|string|max:255',
            'dibangun_oleh' => 'nullable|string|max:255',
            'pihak_membangun' => 'nullable|string|max:255',
            'tahun_pembangunan' => 'nullable|digits:4|integer',
            'luas' => 'nullable|numeric',
            'biaya_pembangunan' => 'nullable|numeric',
        ]);

        if ($request->file('file_sk')) {
            $path = $request->file('file_sk')->store('dokumen_sk', 'public');
            $dokumen->file_sk = $path;
        }

        $dokumen->sk = $request->sk === 'Lainnya' ? $request->sk_lainnya : $request->sk;
        $dokumen->no_sk = $request->no_sk;
        $dokumen->diperlukan_oleh = $request->diperlukan_oleh === 'Lainnya' ? $request->diperlukan_oleh_lainnya : $request->diperlukan_oleh;
        $dokumen->struktur_organisasi = $request->struktur_organisasi;
        $dokumen->kondisi_bangunan = $request->kondisi_bangunan === 'Lainnya' ? $request->kondisi_bangunan_lainnya : $request->kondisi_bangunan;
        $dokumen->dibangun_oleh = $request->dibangun_oleh === 'Lainnya' ? $request->dibangun_oleh_lainnya : $request->dibangun_oleh;
        $dokumen->pihak_membangun = $request->pihak_membangun === 'Lainnya' ? $request->pihak_yang_membangun_lainnya : $request->pihak_membangun;
        $dokumen->tahun_pembangunan = $request->tahun_pembangunan;
        $dokumen->luas = $request->luas;
        $dokumen->biaya_pembangunan = $request->biaya_pembangunan;

        $dokumen->status = 'Pending';
        $dokumen->catatan_petugas = null;

        $dokumen->save();

        return redirect()->back()->with('success', 'Dokumen SK berhasil diperbarui! Dokumen sedang menunggu verifikasi ulang.');
    }

}
