@extends('layouts.layout_user')

@section('content')
<div class="container py-4">
    <h4 class="fw-bold mb-4">SK, Organisasi & Bangunan</h4>

    {{-- FORM UPLOAD --}}
    <form action="{{ route('user.upload_sk.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="row g-3">
            {{-- Jenis SK --}}
            <div class="col-md-6">
                <label class="form-label fw-semibold">SK <span class="text-danger">*</span></label>
                <select name="sk" id="sk_select" class="form-select" required>
                    <option value="">-- Pilih 1 --</option>
                    <option>SK Pengadaan Bangunan</option>
                    <option>SK Pemanfaatan Aset</option>
                    <option>SK Penyerahan Aset</option>
                    <option>SK Penetapan Lokasi</option>
                    <option>SK Pemberian Tunjangan</option>
                    <option>SK Pembentukan Tim Kerja</option>
                    <option value="Lainnya">Lainnya</option>
                </select>
                <input type="text" name="sk_lainnya" id="sk_lainnya" class="form-control mt-2 d-none" placeholder="Isi jenis SK lainnya">
            </div>

            {{-- No. SK --}}
            <div class="col-md-6">
                <label class="form-label fw-semibold">No. SK <span class="text-danger">*</span></label>
                <input type="text" name="no_sk" class="form-control" required>
            </div>

            {{-- Diperlukan Oleh --}}
            <div class="col-md-6">
                <label class="form-label fw-semibold">Di Perlukan Oleh <span class="text-danger">*</span></label>
                <select name="diperlukan_oleh" id="diperlukan_select" class="form-select" required>
                    <option value="">-- Pilih 1 --</option>
                    <option>Kepala Dinas</option>
                    <option>Pihak Pengelola</option>
                    <option>Departemen Teknik</option>
                    <option>Tim Pengadaan</option>
                    <option value="Lainnya">Lainnya</option>
                </select>
                <input type="text" name="diperlukan_oleh_lainnya" id="diperlukan_lainnya" class="form-control mt-2 d-none" placeholder="Isi manual">
            </div>

            {{-- Upload File --}}
            <div class="col-md-6">
                <label class="form-label fw-semibold">Upload File SK <span class="text-danger">*</span></label>
                <input type="file" name="file_sk" class="form-control" required>
            </div>

            {{-- Struktur Organisasi --}}
            <div class="col-md-6">
                <label class="form-label fw-semibold">Struktur Organisasi</label>
                <input type="text" name="struktur_organisasi" class="form-control">
            </div>

            {{-- Kondisi Bangunan --}}
            <div class="col-md-6">
                <label class="form-label fw-semibold">Kondisi Bangunan</label>
                <select name="kondisi_bangunan" id="kondisi_select" class="form-select">
                    <option value="">-- Pilih 1 --</option>
                    <option>Baru Dibangun</option>
                    <option>Renovasi</option>
                    <option>Perlu Perbaikan</option>
                    <option>Rusak Berat</option>
                    <option>Baik</option>
                    <option value="Lainnya">Lainnya</option>
                </select>
                <input type="text" name="kondisi_bangunan_lainnya" id="kondisi_lainnya" class="form-control mt-2 d-none" placeholder="Isi manual">
            </div>

            {{-- Dibangun Oleh --}}
            <div class="col-md-6">
                <label class="form-label fw-semibold">Dibangun Oleh</label>
                <select name="dibangun_oleh" id="dibangun_select" class="form-select">
                    <option value="">-- Pilih 1 --</option>
                    <option>Pemerintah Daerah</option>
                    <option>PT XYZ</option>
                    <option>Kontraktor XYZ</option>
                    <option value="Lainnya">Lainnya</option>
                </select>
                <input type="text" name="dibangun_oleh_lainnya" id="dibangun_lainnya" class="form-control mt-2 d-none" placeholder="Isi manual">
            </div>

            {{-- Pihak yang Membangun --}}
            <div class="col-md-6">
                <label class="form-label fw-semibold">Pihak yang Membangun</label>
                <select name="pihak_membangun" id="pihak_select" class="form-select">
                    <option value="">-- Pilih 1 --</option>
                    <option>Pemerintah Kota/Kabupaten</option>
                    <option>Kontraktor</option>
                    <option>Pengelola Sumber Daya</option>
                    <option value="Lainnya">Lainnya</option>
                </select>
                <input type="text" name="pihak_membangun_lainnya" id="pihak_lainnya" class="form-control mt-2 d-none" placeholder="Isi manual">
            </div>

            {{-- Tahun Pembangunan --}}
            <div class="col-md-6">
                <label class="form-label fw-semibold">Tahun Pembangunan</label>
                <input type="number" name="tahun_pembangunan" min="1900" max="2100" class="form-control">
            </div>

            {{-- Luas --}}
            <div class="col-md-6">
                <label class="form-label fw-semibold">Luas (m²)</label>
                <input type="number" step="0.01" name="luas" class="form-control">
            </div>

            {{-- Biaya --}}
            <div class="col-md-6">
                <label class="form-label fw-semibold">Biaya Pembangunan (Rp)</label>
                <input type="number" step="0.01" name="biaya_pembangunan" class="form-control">
            </div>
        </div>

        <div class="mt-4 text-end">
            <button type="submit" class="btn btn-success px-4">Simpan</button>
        </div>
    </form>

    {{-- RIWAYAT UPLOAD --}}
    <div class="card shadow-sm mt-5">
        <div class="card-body">
            <h5 class="fw-bold mb-3">Riwayat Upload SK</h5>

            @php
                $sk_list = \App\Models\DokumenSK::where('user_id', auth()->id())
                            ->orderBy('created_at','desc')
                            ->get();
            @endphp

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
                                    <button class="btn btn-sm btn-info" data-bs-toggle="modal" data-bs-target="#detailModal-{{ $sk->id }}">
                                        Detail
                                    </button>
                                </td>
                            </tr>

                            {{-- Modal Detail --}}
                            <div class="modal fade" id="detailModal-{{ $sk->id }}" tabindex="-1" aria-hidden="true">
                              <div class="modal-dialog modal-lg">
                                <div class="modal-content">
                                  <div class="modal-header bg-success text-white">
                                    <h5 class="modal-title">Detail Dokumen SK</h5>
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
                                    <p><strong>Biaya Pembangunan:</strong> Rp {{ number_format($sk->biaya_pembangunan ?? 0, 0, ',', '.') }}</p>
                                    <hr>
                                    <p><strong>File SK:</strong></p>
                                    @php
                                        $ext = pathinfo($sk->file_sk, PATHINFO_EXTENSION);
                                    @endphp
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
                        </tbody>
                    </table>
                </div>
            @endif
        </div>
    </div>
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
