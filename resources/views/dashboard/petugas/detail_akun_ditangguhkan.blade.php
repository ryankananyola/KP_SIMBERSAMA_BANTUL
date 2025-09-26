@extends('layouts.layout_petugas')

@section('content')
<div class="container-fluid p-4">
    <h1 class="h3 mb-4 fw-bold text-center">Detail Dokumen SK</h1>

    <div class="card shadow-sm">
        <div class="card-header bg-info text-white">
            <h5 class="mb-0">Informasi User</h5>
        </div>
        <div class="card-body">
            <table class="table table-bordered table-striped mb-0">
                <tr>
                    <th width="30%">Username</th>
                    <td>{{ $sk->user->username }}</td>
                </tr>
                <tr>
                    <th>Nama Bank Sampah</th>
                    <td>{{ $sk->user->nama_bank_sampah ?? '-' }}</td>
                </tr>
                <tr>
                    <th>Status Akun</th>
                    <td>{{ $sk->status }}</td>
                </tr>
            </table>
        </div>
    </div>

    <div class="card shadow-sm mt-4">
    <div class="card-header bg-primary text-white">
        <h5 class="mb-0">Detail Dokumen SK</h5>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered table-striped align-middle text-center">
                <thead class="table-primary">
                    <tr>
                        <th>Jenis dan Nomor SK</th>
                        <th>Diperlukan Oleh</th>
                        <th>Struktur Organisasi</th>
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
                    <tr>
                        <td>
                            {{ $sk->sk ?? '-' }} 
                            @if(!empty($sk->no_sk))
                                ({{ $sk->no_sk }})
                            @endif
                        </td>
                        <td>{{ $sk->diperlukan_oleh ?? '-' }}</td>
                        <td>{{ $sk->struktur_organisasi ?? '-' }}</td>
                        <td>{{ $sk->kondisi_bangunan ?? '-' }}</td>
                        <td>{{ $sk->dibangun_oleh ?? '-' }}</td>
                        <td>{{ $sk->pihak_membangun ?? '-' }}</td>
                        <td>{{ $sk->tahun_pembangunan ?? '-' }}</td>
                        <td>{{ $sk->luas ?? '-' }}</td>
                        <td>Rp {{ number_format($sk->biaya_pembangunan ?? 0,0,',','.') }}</td>
                        <td>
                            @if($sk->file_sk)
                                @php $ext = pathinfo($sk->file_sk, PATHINFO_EXTENSION); @endphp
                                @if(in_array(strtolower($ext), ['jpg','jpeg','png','gif']))
                                    <img src="{{ asset('storage/' . $sk->file_sk) }}" 
                                        alt="File SK" 
                                        class="img-fluid rounded" style="max-height:120px">
                                @elseif(strtolower($ext) === 'pdf')
                                    <button type="button" class="btn btn-sm btn-primary" data-bs-toggle="modal" data-bs-target="#pdfModal">
                                        Lihat File
                                    </button>
                                @else
                                    <a href="{{ asset('storage/' . $sk->file_sk) }}" target="_blank" class="btn btn-sm btn-primary">
                                        Download File
                                    </a>
                                @endif
                            @else
                                <span class="text-muted">Belum ada</span>
                            @endif
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>


        @if($sk->status === 'Pending')
            <form action="{{ route('petugas.akun_ditangguhkan.verify', $sk->id) }}" method="POST" class="d-flex gap-2 p-3">
                @csrf
                @method('PUT')
                <button type="submit" name="action" value="terima" class="btn btn-success">
                    Terima Dokumen
                </button>

                <button type="button" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#revisiModal">
                    Revisi
                </button>
            </form>
        @endif
    </div>

    <div class="mt-3 text-end">
        <a href="{{ route('petugas.akun_ditangguhkan.index') }}" class="btn btn-secondary">Kembali</a>
    </div>
</div>

<div class="modal fade" id="pdfModal" tabindex="-1" aria-labelledby="pdfModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-xl"> 
    <div class="modal-content">
      <div class="modal-header bg-primary text-white">
        <h5 class="modal-title" id="pdfModalLabel">Pratinjau Dokumen SK (PDF)</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Tutup"></button>
      </div>
      <div class="modal-body">
        <iframe src="{{ asset('storage/' . $sk->file_sk) }}" width="100%" height="600px" style="border:none;"></iframe>
      </div>
    </div>
  </div>
</div>

<div class="modal fade" id="revisiModal" tabindex="-1" aria-labelledby="revisiModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <form action="{{ route('petugas.akun_ditangguhkan.verify', $sk->id) }}" method="POST">
        @csrf
        @method('PUT')
        <input type="hidden" name="action" value="revisi">
        <div class="modal-content">
          <div class="modal-header bg-warning text-dark">
            <h5 class="modal-title" id="revisiModalLabel">Catatan Revisi</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Tutup"></button>
          </div>
          <div class="modal-body">
            <div class="mb-3">
                <label for="catatan_petugas" class="form-label">Masukkan Catatan</label>
                <textarea name="catatan_petugas" id="catatan_petugas" class="form-control" rows="4" required></textarea>
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
            <button type="submit" class="btn btn-warning">Kirim Revisi</button>
          </div>
        </div>
    </form>
  </div>
</div>
@endsection
