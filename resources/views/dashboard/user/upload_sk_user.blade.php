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
                            <thead class="table-light">
                                <tr>
                                    <th>No</th>
                                    <th>Jenis SK</th>
                                    <th>Tanggal Upload</th>
                                    <th>Status</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($sk_list as $index => $sk)
                                <tr>
                                    <td>{{ $index + 1 }}</td>
                                    <td>{{ $sk->sk }}</td>
                                    <td>{{ $sk->created_at->format('d-m-Y H:i') }}</td>
                                    <td>{{ $sk->status ?? '-' }}</td>
                                    <td>
                                        <button class="btn btn-sm btn-info" data-bs-toggle="modal" data-bs-target="#detailModal-{{ $sk->id }}">Detail</button>
                                    </td>
                                </tr>
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
        <div class="card shadow-sm">
            <div class="card-header bg-info text-white">
                <h6 class="mb-0">Ringkasan Dokumen SK</h6>
            </div>
            <div class="card-body">
                <p><strong>Jenis SK:</strong> {{ $latestSK->sk }}</p>
                <p><strong>No SK:</strong> {{ $latestSK->no_sk }}</p>
                <p><strong>Status:</strong> {{ $latestSK->status }}</p>
                <p><strong>Struktur Organisasi:</strong> {{ $latestSK->struktur_organisasi ?? '-' }}</p>
                <p><strong>Kondisi Bangunan:</strong> {{ $latestSK->kondisi_bangunan ?? '-' }}</p>
                <p><strong>Dibangun Oleh:</strong> {{ $latestSK->dibangun_oleh ?? '-' }}</p>
                <p><strong>Pihak yang Membangun:</strong> {{ $latestSK->pihak_membangun ?? '-' }}</p>
                <p><strong>Tahun Pembangunan:</strong> {{ $latestSK->tahun_pembangunan ?? '-' }}</p>
                <p><strong>Luas:</strong> {{ $latestSK->luas ?? '-' }} m²</p>
                <p><strong>Biaya Pembangunan:</strong> Rp {{ number_format($latestSK->biaya_pembangunan ?? 0,0,',','.') }}</p>
            </div>
        </div>

       @elseif($status === 'Aktif')
        <div class="alert alert-success">
            <h6 class="fw-bold text-success">Akun Anda Aktif</h6> 
            <p>Selamat! Dokumen SK Anda telah diverifikasi, akun Anda sudah aktif, dan Anda dapat mulai menginput data periodik.</p> 
        </div>

        <div class="card shadow-sm mb-4">
            <div class="card-header bg-success text-white">
                <h6 class="mb-0">Ringkasan Dokumen SK</h6>
            </div>
            <div class="card-body">
                <p><strong>Jenis SK:</strong> {{ $latestSK->sk }}</p>
                <p><strong>No SK:</strong> {{ $latestSK->no_sk }}</p>
                <p><strong>Status:</strong> {{ $latestSK->status }}</p>
                <p><strong>Struktur Organisasi:</strong> {{ $latestSK->struktur_organisasi ?? '-' }}</p>
                <p><strong>Kondisi Bangunan:</strong> {{ $latestSK->kondisi_bangunan ?? '-' }}</p>
                <p><strong>Dibangun Oleh:</strong> {{ $latestSK->dibangun_oleh ?? '-' }}</p>
                <p><strong>Pihak yang Membangun:</strong> {{ $latestSK->pihak_membangun ?? '-' }}</p>
                <p><strong>Tahun Pembangunan:</strong> {{ $latestSK->tahun_pembangunan ?? '-' }}</p>
                <p><strong>Luas:</strong> {{ $latestSK->luas ?? '-' }} m²</p>
                <p><strong>Biaya Pembangunan:</strong> Rp {{ number_format($latestSK->biaya_pembangunan ?? 0,0,',','.') }}</p>
                <hr>
                <p><strong>File SK:</strong></p>
                @php $ext = pathinfo($latestSK->file_sk, PATHINFO_EXTENSION); @endphp
                @if(in_array(strtolower($ext), ['jpg','jpeg','png','gif']))
                    <img src="{{ asset('storage/' . $latestSK->file_sk) }}" alt="File SK" class="img-fluid rounded">
                @else
                    <iframe src="{{ asset('storage/' . $latestSK->file_sk) }}" frameborder="0" width="100%" height="400px"></iframe>
                @endif
            </div>
        </div>


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
                    <label class="form-label fw-semibold">SK <span class="text-danger">*</span></label>
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
                    <label class="form-label fw-semibold">No. SK <span class="text-danger">*</span></label>
                    <input type="text" name="no_sk" class="form-control" value="{{ $latestSK->no_sk ?? '' }}" required>
                </div>

                <div class="col-md-6">
                    <label class="form-label fw-semibold">Di Perlukan Oleh <span class="text-danger">*</span></label>
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
                    <label class="form-label fw-semibold">Upload File SK <span class="text-danger">*</span></label>
                    <input type="file" name="file_sk" class="form-control">
                    @if($latestSK && $latestSK->file_sk)
                        <small>File lama: <a href="{{ asset('storage/' . $latestSK->file_sk) }}" target="_blank">Lihat</a></small>
                    @endif
                </div>

                <div class="col-md-6">
                    <label class="form-label fw-semibold">Struktur Organisasi</label>
                    <input type="text" name="struktur_organisasi" class="form-control" value="{{ $latestSK->struktur_organisasi ?? '' }}">
                </div>

                <div class="col-md-6">
                    <label class="form-label fw-semibold">Kondisi Bangunan</label>
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
                    <label class="form-label fw-semibold">Dibangun Oleh</label>
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
                    <label class="form-label fw-semibold">Pihak yang Membangun</label>
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
                    <label class="form-label fw-semibold">Tahun Pembangunan</label>
                    <input type="number" name="tahun_pembangunan" min="1900" max="2100" class="form-control" value="{{ $latestSK->tahun_pembangunan ?? '' }}">
                </div>

                <div class="col-md-6">
                    <label class="form-label fw-semibold">Luas (m²)</label>
                    <input type="number" step="0.01" name="luas" class="form-control" value="{{ $latestSK->luas ?? '' }}">
                </div>

                <div class="col-md-6">
                    <label class="form-label fw-semibold">Biaya Pembangunan (Rp)</label>
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
                            <thead class="table-light">
                                <tr>
                                    <th>No</th>
                                    <th>Jenis SK</th>
                                    <th>Tanggal Upload</th>
                                    <th>Status</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($sk_list as $index => $sk)
                                <tr>
                                    <td>{{ $index + 1 }}</td>
                                    <td>{{ $sk->sk }}</td>
                                    <td>{{ $sk->created_at->format('d-m-Y H:i') }}</td>
                                    <td>{{ $sk->status ?? '-' }}</td>
                                    <td>
                                        <button class="btn btn-sm btn-info" data-bs-toggle="modal" data-bs-target="#detailModal-{{ $sk->id }}">Detail</button>
                                    </td>
                                </tr>
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

    @foreach($sk_list as $sk)
    <div class="modal fade" id="detailModal-{{ $sk->id }}" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header bg-success text-white">
                    <h5 class="modal-title">Detail Dokumen SK</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p><strong>Jenis SK:</strong> {{ $sk->sk }}</p>
                    <p><strong>No. SK:</strong> {{ $sk->no_sk }}</p>
                    <p><strong>Diperlukan Oleh:</strong> {{ $sk->diperlukan_oleh }}</p>
                    <p><strong>Status:</strong> {{ $sk->status ?? '-' }}</p>
                    <p><strong>Struktur Organisasi:</strong> {{ $sk->struktur_organisasi ?? '-' }}</p>
                    <p><strong>Kondisi Bangunan:</strong> {{ $sk->kondisi_bangunan ?? '-' }}</p>
                    <p><strong>Dibangun Oleh:</strong> {{ $sk->dibangun_oleh ?? '-' }}</p>
                    <p><strong>Pihak yang Membangun:</strong> {{ $sk->pihak_membangun ?? '-' }}</p>
                    <p><strong>Tahun Pembangunan:</strong> {{ $sk->tahun_pembangunan ?? '-' }}</p>
                    <p><strong>Luas:</strong> {{ $sk->luas ?? '-' }} m²</p>
                    <p><strong>Biaya Pembangunan:</strong> Rp {{ number_format($sk->biaya_pembangunan ?? 0,0,',','.') }}</p>
                    <hr>
                    <p><strong>File SK:</strong></p>
                    @php $ext = pathinfo($sk->file_sk, PATHINFO_EXTENSION); @endphp
                    @if(in_array(strtolower($ext), ['jpg','jpeg','png','gif']))
                        <img src="{{ asset('storage/' . $sk->file_sk) }}" alt="File SK" class="img-fluid rounded">
                    @else
                        <iframe src="{{ asset('storage/' . $sk->file_sk) }}" frameborder="0" width="100%" height="400px"></iframe>
                    @endif
                </div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                </div>
            </div>
        </div>
    </div>
    @endforeach
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
