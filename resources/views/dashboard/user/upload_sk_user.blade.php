@extends('layouts.layout_user')

@section('content')
<div class="container py-4">
    <h4 class="fw-bold mb-4">SK, Organisasi & Bangunan</h4>

    @php
        $latestSK = \App\Models\DokumenSK::where('user_id', auth()->id())
                        ->latest()
                        ->first();
        $status = $latestSK->status ?? null;

        $sk_list = \App\Models\DokumenSK::where('user_id', auth()->id())
                    ->orderBy('created_at','desc')
                    ->get();
    @endphp

    @if($status === 'Pending')
        <div class="alert alert-warning"> <h6 class="fw-bold">Upload SK Sudah Dilakukan</h6>
            <p>Anda sudah mengupload SK dengan status <strong>{{ $status ?? '-' }}</strong>.
                Tunggu konfirmasi petugas sebelum upload lagi.</p>
        </div>
        <div class="card shadow-sm">
            <div class="card-body">
                <h5 class="fw-bold mb-3">Riwayat Upload SK</h5>
                @if($sk_list->isEmpty())
                    <p class="text-muted text-center">Belum ada data SK</p>
                @else
                    <div class="table-responsive">
                        <table class="table table-bordered align-middle">
                            <tbody>
                                @foreach ($sk_list as $index => $sk)
                                    @include('dashboard.user.partials.detail_sk', ['sk' => $sk])
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                @endif
            </div>
        </div>

    @elseif($status === 'Diterima')
        <div class="alert alert-info">
            <h6 class="fw-bold text-info">Dokumen SK Diterima</h6> 
            <p>Dokumen SK Anda telah diterima oleh petugas. Silakan menunggu jadwal survey lapangan sebelum akun aktif.</p> 
        </div>
        @include('dashboard.user.partials.ringkasan_sk', ['headerClass' => 'bg-info'])

        @elseif($status === 'Survey')
        <div class="alert alert-info">
            <h6 class="fw-bold text-info">Dokumen SK Diterima dan Jadwal Survey telah ditentukan</h6> 
            <p>Dokumen SK Anda telah diterima oleh petugas. Jadwal survey lapangan telah ditentukan, silahkan melihat di dashboard.</p> 
        </div>
        @include('dashboard.user.partials.ringkasan_sk', ['headerClass' => 'bg-info'])

       @elseif($status === 'Aktif')
        <div class="alert alert-success">
            <h6 class="fw-bold text-success">Akun Anda Aktif</h6> 
            <p>Selamat! Dokumen SK Anda telah diverifikasi, akun Anda sudah aktif, dan Anda dapat mulai menginput data periodik.</p> 
        </div>
        @include('dashboard.user.partials.ringkasan_sk', ['headerClass' => 'bg-success'])


    @elseif(in_array($status, ['Revisi', 'Perlu Perbaikan', 'Ditolak']) || !$latestSK)
        @if($latestSK && in_array($status, ['Revisi', 'Perlu Perbaikan', 'Ditolak']) && $latestSK->catatan_petugas)
            <div class="alert alert-warning">
                <h6 class="fw-bold">Catatan Petugas</h6>
                <p>{{ $latestSK->catatan_petugas }}</p>
            </div>
        @endif
        <form action="{{ $latestSK ? route('user.upload_sk.update', $latestSK->id) : route('user.upload_sk.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            @if($latestSK) @method('PUT') @endif

            <div class="row g-3">
                <div class="col-md-6">
                    <label class="form-label fw-semibold">SK<span class="text-danger">*</span></label>
                    <select name="sk" id="sk_select" class="form-select" required>
                        <option value="">-- Pilih 1 --</option>
                        @php
                            $sk_options = ['SK Pengadaan Bangunan','SK Pemanfaatan Aset','SK Penyerahan Aset','SK Penetapan Lokasi','SK Pemberian Tunjangan','SK Pembentukan Tim Kerja'];
                        @endphp
                        @foreach($sk_options as $option)
                            <option value="{{ $option }}" @if($latestSK && $latestSK->sk === $option) selected @endif>{{ $option }}</option>
                        @endforeach
                        <option value="Lainnya" @if($latestSK && !in_array($latestSK->sk, $sk_options)) selected @endif>Lainnya</option>
                    </select>
                    <input type="text" name="sk_lainnya" id="sk_lainnya" class="form-control mt-2 @if(!$latestSK || in_array($latestSK->sk ?? '', $sk_options)) d-none @endif" placeholder="Isi jenis SK lainnya" value="{{ $latestSK && !in_array($latestSK->sk, $sk_options) ? $latestSK->sk : '' }}">
                </div>

                <div class="col-md-6">
                    <label class="form-label fw-semibold">No. SK<span class="text-danger">*</span></label>
                    <input type="text" name="no_sk" class="form-control" value="{{ $latestSK->no_sk ?? '' }}" required>
                </div>

                <div class="col-md-6">
                    <label class="form-label fw-semibold">Di Perlukan Oleh<span class="text-danger">*</span></label>
                    @php
                        $diperlukan_options = ['Kepala Dinas','Pihak Pengelola','Departemen Teknik','Tim Pengadaan'];
                    @endphp
                    <select name="diperlukan_oleh" id="diperlukan_select" class="form-select" required>
                        <option value="">-- Pilih 1 --</option>
                        @foreach($diperlukan_options as $opt)
                            <option value="{{ $opt }}" @if($latestSK && $latestSK->diperlukan_oleh === $opt) selected @endif>{{ $opt }}</option>
                        @endforeach
                        <option value="Lainnya" @if($latestSK && !in_array($latestSK->diperlukan_oleh ?? '', $diperlukan_options)) selected @endif>Lainnya</option>
                    </select>
                    <input type="text" name="diperlukan_oleh_lainnya" id="diperlukan_lainnya" class="form-control mt-2 @if(!$latestSK || in_array($latestSK->diperlukan_oleh ?? '', $diperlukan_options)) d-none @endif" placeholder="Isi manual" value="{{ $latestSK && !in_array($latestSK->diperlukan_oleh ?? '', $diperlukan_options) ? $latestSK->diperlukan_oleh : '' }}">
                </div>

                <div class="col-md-6">
                    <label class="form-label fw-semibold">
                        Upload File SK<span class="text-danger">*</span>
                    </label>
                    <input type="file" name="file_sk" class="form-control" accept=".pdf" required>
                    <small class="text-muted">* Hanya diperbolehkan upload file berformat PDF</small>
                    
                    @if($latestSK && $latestSK->file_sk)
                        <br>
                        <small>File lama: 
                            <a href="{{ asset('storage/' . $latestSK->file_sk) }}" target="_blank">Lihat</a>
                        </small>
                    @endif
                </div>

                <div class="col-md-6">
                    <label class="form-label fw-semibold">Struktur Organisasi<span class="text-danger">*</span></label>
                    <input type="text" name="struktur_organisasi" class="form-control" value="{{ $latestSK->struktur_organisasi ?? '' }}">
                </div>

                <div class="col-md-6">
                    <label class="form-label fw-semibold">Kondisi Bangunan<span class="text-danger">*</span></label>
                    @php
                        $kondisi_options = ['Baru Dibangun','Renovasi','Perlu Perbaikan','Rusak Berat','Baik'];
                    @endphp
                    <select name="kondisi_bangunan" id="kondisi_select" class="form-select">
                        <option value="">-- Pilih 1 --</option>
                        @foreach($kondisi_options as $opt)
                            <option value="{{ $opt }}" @if($latestSK && $latestSK->kondisi_bangunan === $opt) selected @endif>{{ $opt }}</option>
                        @endforeach
                        <option value="Lainnya" @if($latestSK && !in_array($latestSK->kondisi_bangunan ?? '', $kondisi_options)) selected @endif>Lainnya</option>
                    </select>
                    <input type="text" name="kondisi_bangunan_lainnya" id="kondisi_lainnya" class="form-control mt-2 @if(!$latestSK || in_array($latestSK->kondisi_bangunan ?? '', $kondisi_options)) d-none @endif" placeholder="Isi manual" value="{{ $latestSK && !in_array($latestSK->kondisi_bangunan ?? '', $kondisi_options) ? $latestSK->kondisi_bangunan : '' }}">
                </div>

                <div class="col-md-6">
                    <label class="form-label fw-semibold">Dibangun Oleh<span class="text-danger">*</span></label>
                    @php $dibangun_options = ['Pemerintah Daerah','PT XYZ','Kontraktor XYZ']; @endphp
                    <select name="dibangun_oleh" id="dibangun_select" class="form-select">
                        <option value="">-- Pilih 1 --</option>
                        @foreach($dibangun_options as $opt)
                            <option value="{{ $opt }}" @if($latestSK && $latestSK->dibangun_oleh === $opt) selected @endif>{{ $opt }}</option>
                        @endforeach
                        <option value="Lainnya" @if($latestSK && !in_array($latestSK->dibangun_oleh ?? '', $dibangun_options)) selected @endif>Lainnya</option>
                    </select>
                    <input type="text" name="dibangun_oleh_lainnya" id="dibangun_lainnya" class="form-control mt-2 @if(!$latestSK || in_array($latestSK->dibangun_oleh ?? '', $dibangun_options)) d-none @endif" placeholder="Isi manual" value="{{ $latestSK && !in_array($latestSK->dibangun_oleh ?? '', $dibangun_options) ? $latestSK->dibangun_oleh : '' }}">
                </div>

                <div class="col-md-6">
                    <label class="form-label fw-semibold">Pihak yang Membangun<span class="text-danger">*</span></label>
                    @php $pihak_options = ['Pemerintah Kota/Kabupaten','Kontraktor','Pengelola Sumber Daya']; @endphp
                    <select name="pihak_membangun" id="pihak_select" class="form-select">
                        <option value="">-- Pilih 1 --</option>
                        @foreach($pihak_options as $opt)
                            <option value="{{ $opt }}" @if($latestSK && $latestSK->pihak_membangun === $opt) selected @endif>{{ $opt }}</option>
                        @endforeach
                        <option value="Lainnya" @if($latestSK && !in_array($latestSK->pihak_membangun ?? '', $pihak_options)) selected @endif>Lainnya</option>
                    </select>
                    <input type="text" name="pihak_membangun_lainnya" id="pihak_lainnya" class="form-control mt-2 @if(!$latestSK || in_array($latestSK->pihak_membangun ?? '', $pihak_options)) d-none @endif" placeholder="Isi manual" value="{{ $latestSK && !in_array($latestSK->pihak_membangun ?? '', $pihak_options) ? $latestSK->pihak_membangun : '' }}">
                </div>

                <div class="col-md-6">
                    <label class="form-label fw-semibold">Tahun Pembangunan<span class="text-danger">*</span></label>
                    <input type="number" name="tahun_pembangunan" min="1900" max="2100" class="form-control" value="{{ $latestSK->tahun_pembangunan ?? '' }}">
                </div>

                <div class="col-md-6">
                    <label class="form-label fw-semibold">Luas (m²)<span class="text-danger">*</span></label>
                    <input type="number" step="0.01" name="luas" class="form-control" value="{{ $latestSK->luas ?? '' }}">
                </div>

                <div class="col-md-6">
                    <label class="form-label fw-semibold">Biaya Pembangunan (Rp)<span class="text-danger">*</span></label>
                    <input type="number" step="0.01" name="biaya_pembangunan" class="form-control" value="{{ $latestSK->biaya_pembangunan ?? '' }}">
                </div>
            </div>

            <div class="mt-4 text-end">
                <button type="submit" class="btn btn-success px-4">{{ $latestSK ? 'Update' : 'Simpan' }}</button>
            </div>
        </form>

        <div class="card shadow-sm mt-4">
            <div class="card-body">
                <h5 class="fw-bold mb-3">Riwayat Upload SK</h5>
                @if($sk_list->isEmpty())
                    <p class="text-muted text-center">Belum ada data SK</p>
                @else
                    <div class="table-responsive">
                        <table class="table table-bordered align-middle">
                            <tbody>
                                @foreach ($sk_list as $index => $sk)
                                    @include('dashboard.user.partials.detail_sk', ['sk' => $sk])
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                @endif
            </div>
        </div>
    @else
        <div class="alert alert-warning"> <h6 class="fw-bold">Upload SK Sudah Dilakukan</h6>
            <p>Anda sudah mengupload SK dengan status <strong>{{ $status ?? '-' }}</strong>.
                Tunggu konfirmasi petugas sebelum upload lagi.</p>
        </div>
    @endif
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

        select.addEventListener('change', function() {
            if (this.value === 'Lainnya') {
                input.classList.remove('d-none');
            } else {
                input.classList.add('d-none');
                input.value = '';
            }
        });
    });
});
</script>
@endsection
