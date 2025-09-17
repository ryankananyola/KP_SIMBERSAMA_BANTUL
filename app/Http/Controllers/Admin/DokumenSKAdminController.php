<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\DokumenSK;
use Illuminate\Http\Request;

class DokumenSKControllerAdmin extends Controller
{
    public function index()
    {
        $dokumens = DokumenSK::latest()->get();
        return view('admin.dokumen_sk.index', compact('dokumens'));
    }

    public function updateStatus(Request $request, $id)
    {
        $request->validate([
            'status' => 'required|in:Diterima,Revisi,Survey Selesai',
            'catatan_petugas' => 'nullable|string|max:1000',
            'survey_date' => 'nullable|date'
        ]);

        $dokumen = DokumenSK::findOrFail($id);
        $dokumen->status = $request->status;
        $dokumen->catatan_petugas = $request->catatan_petugas;
        $dokumen->survey_date = $request->survey_date;
        $dokumen->save();

        return redirect()->back()->with('success', 'Status dokumen berhasil diperbarui.');
    }
}
