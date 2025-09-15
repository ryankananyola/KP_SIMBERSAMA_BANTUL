@extends('layouts.layout_user')

@section('content')
<div class="container mx-auto px-4 py-6">
    <form action="{{ route('user.upload_sk.store') }}" method="POST" enctype="multipart/form-data" class="space-y-6">
        @csrf

        <div>
            <div class="flex items-center mb-2">
                <span class="font-bold text-[#256d5a] text-lg">UPLOAD DOKUMEN SK</span>
            </div>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">

                <div>
                    <label class="block text-sm font-semibold mb-1">Jenis SK</label>
                    <select name="sk" id="sk_select" class="w-full border rounded px-3 py-2" required>
                        <option value="">-- Pilih Jenis SK --</option>
                        <option>SK Pengadaan Bangunan</option>
                        <option>SK Pemanfaatan Aset</option>
                        <option>SK Penyerahan Aset</option>
                        <option>SK Penetapan Lokasi</option>
                        <option>SK Pemberian Tunjangan</option>
                        <option>SK Pembentukan Tim Kerja</option>
                        <option value="Lainnya">Lainnya</option>
                    </select>
                    <input type="text" name="sk_lainnya" id="sk_lainnya" class="w-full border rounded px-3 py-2 mt-2 hidden" placeholder="Isi jenis SK lainnya">
                </div>

                <div>
                    <label class="block text-sm font-semibold mb-1">No. SK</label>
                    <input type="text" name="no_sk" class="w-full border rounded px-3 py-2" required>
                </div>

                <div>
                    <label class="block text-sm font-semibold mb-1">Diperlukan Oleh</label>
                    <select name="diperlukan_oleh" id="diperlukan_select" class="w-full border rounded px-3 py-2" required>
                        <option value="">-- Pilih --</option>
                        <option>Kepala Dinas</option>
                        <option>Pihak Pengelola</option>
                        <option>Departemen Teknik</option>
                        <option>Tim Pengadaan</option>
                        <option value="Lainnya">Lainnya</option>
                    </select>
                    <input type="text" name="diperlukan_oleh_lainnya" id="diperlukan_lainnya" class="w-full border rounded px-3 py-2 mt-2 hidden" placeholder="Isi manual">
                </div>

                <div>
                    <label class="block text-sm font-semibold mb-1">Upload File SK</label>
                    <input type="file" name="file_dokumen" class="w-full border rounded px-3 py-2" required>
                </div>

                <div>
                    <label class="block text-sm font-semibold mb-1">Struktur Organisasi</label>
                    <input type="text" name="struktur_organisasi" class="w-full border rounded px-3 py-2">
                </div>

                <div>
                    <label class="block text-sm font-semibold mb-1">Kondisi Bangunan</label>
                    <select name="kondisi_bangunan" id="kondisi_select" class="w-full border rounded px-3 py-2">
                        <option value="">-- Pilih --</option>
                        <option>Baru Dibangun</option>
                        <option>Renovasi</option>
                        <option>Perlu Perbaikan</option>
                        <option>Rusak Berat</option>
                        <option>Baik</option>
                        <option value="Lainnya">Lainnya</option>
                    </select>
                    <input type="text" name="kondisi_bangunan_lainnya" id="kondisi_lainnya" class="w-full border rounded px-3 py-2 mt-2 hidden" placeholder="Isi manual">
                </div>

                <div>
                    <label class="block text-sm font-semibold mb-1">Dibangun Oleh</label>
                    <select name="dibangun_oleh" id="dibangun_select" class="w-full border rounded px-3 py-2">
                        <option value="">-- Pilih --</option>
                        <option>Pemerintah Daerah</option>
                        <option>PT XYZ</option>
                        <option>Kontraktor XYZ</option>
                        <option value="Lainnya">Lainnya</option>
                    </select>
                    <input type="text" name="dibangun_oleh_lainnya" id="dibangun_lainnya" class="w-full border rounded px-3 py-2 mt-2 hidden" placeholder="Isi manual">
                </div>

                <div>
                    <label class="block text-sm font-semibold mb-1">Pihak yang Membangun</label>
                    <select name="pihak_yang_membangun" id="pihak_select" class="w-full border rounded px-3 py-2">
                        <option value="">-- Pilih --</option>
                        <option>Pemerintah Kota/Kabupaten</option>
                        <option>Kontraktor</option>
                        <option>Pengelola Sumber Daya</option>
                        <option value="Lainnya">Lainnya</option>
                    </select>
                    <input type="text" name="pihak_yang_membangun_lainnya" id="pihak_lainnya" class="w-full border rounded px-3 py-2 mt-2 hidden" placeholder="Isi manual">
                </div>

                <div>
                    <label class="block text-sm font-semibold mb-1">Tahun Pembangunan</label>
                    <input type="number" name="tahun_pembangunan" min="1900" max="2100" class="w-full border rounded px-3 py-2">
                </div>

                <div>
                    <label class="block text-sm font-semibold mb-1">Luas (m²)</label>
                    <input type="number" step="0.01" name="luas" class="w-full border rounded px-3 py-2">
                </div>

                <div>
                    <label class="block text-sm font-semibold mb-1">Biaya Pembangunan (Rp)</label>
                    <input type="number" step="0.01" name="biaya_pembangunan" class="w-full border rounded px-3 py-2">
                </div>
            </div>
        </div>

        <div class="text-right">
            <button type="submit" class="bg-[#256d5a] text-black px-6 py-2 rounded shadow hover:bg-[#1e5546]">
                Simpan
            </button>
        </div>
    </form>
</div>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const dropdowns = [
        { selectId: 'sk_select', inputId: 'sk_lainnya' },
        { selectId: 'diperlukan_select', inputId: 'diperlukan_lainnya' },
        { selectId: 'kondisi_select', inputId: 'kondisi_lainnya' },
        { selectId: 'dibangun_select', inputId: 'dibangun_lainnya' },
        { selectId: 'pihak_select', inputId: 'pihak_lainnya' }
    ];

    dropdowns.forEach(item => {
        const select = document.getElementById(item.selectId);
        const input = document.getElementById(item.inputId);

        input.classList.add('hidden');
        input.value = '';

        select.addEventListener('change', function() {
            if (this.value === 'Lainnya') {
                input.classList.remove('hidden');
            } else {
                input.classList.add('hidden');
                input.value = '';
            }
        });
    });
});
</script>

@endsection
