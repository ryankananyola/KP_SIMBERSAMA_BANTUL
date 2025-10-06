@extends('layouts.layout_user')

@section('content')
<div class="container py-4">
    <h4 class="fw-bold mb-4 text-center">SK, Organisasi & Bangunan</h4>

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
        <div class="card shadow-sm mt-4">
            <div class="card-body">
                <h5 class="fw-bold mb-3">Riwayat Upload SK</h5>
                @if($sk_list->isEmpty())
                    <p class="text-muted text-center">Belum ada data SK</p>
                @else
                    <div class="table-responsive">
                        <table class="table table-bordered align-middle">
                            <thead class="table-light">
                                <tr>
                                    <th>Jenis dan Nomor SK</th>
                                    <th>Diperlukan Oleh</th>
                                    <th>Penanggung Jawab</th>
                                    <th>Kondisi Bangunan</th>
                                    <th>Dibangun Oleh</th>
                                    <th>Pihak yang Membangun</th>
                                    <th>Tahun Pembangunan</th>
                                    <th>Luas (m²)</th>
                                    <th>Biaya Pembangunan</th>
                                    <th>File SK</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($sk_list as $sk)
                                    @include('dashboard.user.partials.sk_row', ['sk' => $sk])
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
                <div class="col-md-6 d-flex">
                    <div class="field-card w-100">
                        <label class="form-label fw-semibold">SK<span class="text-danger">*</span></label>
                        <select name="sk" id="sk_select" class="form-select" required>
                            <option value="">-- Pilih 1 --</option>
                            @php
                                $sk_options = ['Ada', 'Tidak Ada'];
                            @endphp
                            @foreach($sk_options as $option)
                                <option value="{{ $option }}" @if($latestSK && $latestSK->sk === $option) selected @endif>{{ $option }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="col-md-6 d-flex">
                    <div class="field-card w-100">
                        <label class="form-label fw-semibold">No. SK<span class="text-danger">*</span></label>
                        <input type="text" name="no_sk" class="form-control" value="{{ $latestSK->no_sk ?? '' }}" required>
                    </div>
                </div>

                <div class="col-md-6 d-flex">
                    <div class="field-card w-100">
                        <label class="form-label fw-semibold">Di Perlukan Oleh<span class="text-danger">*</span></label>
                        @php
                            $diperlukan_options = ['Lurah/Kepala Desa','Camat/Panewu','Kepala Dinas','Bupati'];
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
                </div>

                <div class="col-md-6 d-flex">
                    <div class="field-card w-100">
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
                </div>

                <div class="col-md-6">
                    <div class="field-card">
                        <label class="form-label fw-semibold">Penanggung Jawab<span class="text-danger">*</span></label>
                        <input type="text" name="penanggung_jawab" class="form-control" value="{{ $latestSK->penanggung_jawab ?? '' }}">
                    </div>
                </div>

                <div class="col-md-6 d-flex">
                    <div class="field-card w-100">
                        <label class="form-label fw-semibold">Kondisi Bangunan<span class="text-danger">*</span></label>
                        @php
                            $kondisi_options = ['Bangunan Permanen Sendiri','Bangun Semi Permanen','Gabung Dengan Rumah Warga','Kantor RT/RW','Poskamling', 'Gabung Dengan Perkantoran dan Sejenisnya', 'Lainnya'];
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
                </div>

                <div class="col-md-6 d-flex">
                    <div class="field-card w-100">
                        <label class="form-label fw-semibold">Dibangun Oleh<span class="text-danger">*</span></label>
                        @php $dibangun_options = ['Pemerintah Pusat','Pemerintah Provinsi','Pemerintah Kabupaten', 'Pemerintah Desa', 'Bantuan Donatur/LN', 'Swasta', 'Swadaya']; @endphp
                        <select name="dibangun_oleh" id="dibangun_select" class="form-select">
                            <option value="">-- Pilih 1 --</option>
                            @foreach($dibangun_options as $opt)
                                <option value="{{ $opt }}" @if($latestSK && $latestSK->dibangun_oleh === $opt) selected @endif>{{ $opt }}</option>
                            @endforeach
                            <option value="Lainnya" @if($latestSK && !in_array($latestSK->dibangun_oleh ?? '', $dibangun_options)) selected @endif>Lainnya</option>
                        </select>
                        <input type="text" name="dibangun_oleh_lainnya" id="dibangun_lainnya" class="form-control mt-2 @if(!$latestSK || in_array($latestSK->dibangun_oleh ?? '', $dibangun_options)) d-none @endif" placeholder="Isi manual" value="{{ $latestSK && !in_array($latestSK->dibangun_oleh ?? '', $dibangun_options) ? $latestSK->dibangun_oleh : '' }}">
                    </div>
                </div>

                <div class="col-md-6 d-flex">
                    <div class="field-card w-100">
                        <label class="form-label fw-semibold">Pihak yang Membangun<span class="text-danger">*</span></label>
                        <input type="text" name="pihak_membangun" class="form-control" 
                            placeholder="Isi pihak yang membangun"
                            value="{{ $latestSK->pihak_membangun ?? '' }}" required>
                    </div>
                </div>

                <div class="col-md-6 d-flex">
                    <div class="field-card w-100">
                        <label class="form-label fw-semibold">Tahun Pembangunan<span class="text-danger">*</span></label>
                        <input type="number" name="tahun_pembangunan" min="1900" max="2100" class="form-control" value="{{ $latestSK->tahun_pembangunan ?? '' }}">
                    </div>
                </div>

                <div class="col-md-6 d-flex">
                    <div class="field-card w-100">
                        <label class="form-label fw-semibold">Luas (m²)<span class="text-danger">*</span></label>
                        <input type="number" step="0.01" name="luas" class="form-control" value="{{ $latestSK->luas ?? '' }}">
                    </div>
                </div>

                <div class="col-md-6 d-flex">
                    <div class="field-card w-100">
                        <label class="form-label fw-semibold">Biaya Pembangunan (Rp)<span class="text-danger">*</span></label>
                        <input type="number" step="0.01" name="biaya_pembangunan" class="form-control" value="{{ $latestSK->biaya_pembangunan ?? '' }}">
                    </div>
                </div>
            </div>

            <div class="mt-4 text-end">
                <button type="submit" class="btn btn-success px-4">{{ $latestSK ? 'Update' : 'Simpan' }}</button>
            </div>
        </form>
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
        { selectId: 'dibangun_select', inputId: 'dibangun_lainnya' }
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

<style>
    .field-card {
      border: 1px solid #c9c9c9;
      border-radius: 10px;
      background: #fff;
      padding: 14px 18px;
      height: 100%; 
      display: flex;
      flex-direction: column;
      justify-content: space-between;
    }
    
    .field-card .form-label {
      font-weight: 600;
      font-size: 0.9rem;
      margin-bottom: 6px;
      color: #2c2c2c;
    }
    
    .field-card .form-control,
    .field-card .form-select {
      background-color: #f8f9fa;
      border: 1px solid #dee2e6;
      border-radius: 8px;
      padding: 10px 12px;
      color: #495057;
      min-height: 42px; 
    }
    
    .field-card .form-control:focus,
    .field-card .form-select:focus {
      border-color: #198754;
      box-shadow: 0 0 0 0.1rem rgba(25, 135, 84, 0.25);
    }
    
    .row.g-3 > [class*="col-"] {
      margin-bottom: 10px;
    }
    
    .btn-success {
      font-weight: 600;
      padding: 10px 24px;
      border-radius: 10px;
    }
    
    .card {
      border-radius: 15px;
      box-shadow: 0 8px 15px rgba(0, 0, 0, 0.08);
      background-color: #fff;
    }
    </style>
    