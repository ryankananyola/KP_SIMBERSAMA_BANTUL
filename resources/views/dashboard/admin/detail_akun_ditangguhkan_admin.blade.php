@extends('layouts.layout_admin')

@section('content')
<div class="container-fluid p-4">
    <h1 class="h3 mb-4 fw-bold text-center">Detail Dokumen SK</h1>

    <div class="card shadow-sm">
        <div class="card-header bg-info text-white">
            <h5 class="mb-0">Informasi User</h5>
        </div>
        <div class="card-body">
            <p><strong>Username:</strong> {{ $sk->user->username }}</p>
            <p><strong>Nama Bank Sampah:</strong> {{ $sk->user->nama_bank_sampah ?? '-' }}</p>
            <p><strong>Status Akun:</strong> {{ $sk->status }}</p>
        </div>
    </div>

    <div class="card shadow-sm mt-4">
        <div class="card-header bg-primary text-white">
            <h5 class="mb-0">Detail Dokumen SK</h5>
        </div>
        <div class="card-body">
            <p><strong>Jenis SK:</strong> {{ $sk->sk ?? '-' }}</p>
            <p><strong>No SK:</strong> {{ $sk->no_sk ?? '-' }}</p>
            <p><strong>Diperlukan Oleh:</strong> {{ $sk->diperlukan_oleh ?? '-' }}</p>
            <p><strong>Struktur Organisasi:</strong> {{ $sk->struktur_organisasi ?? '-' }}</p>
            <p><strong>Kondisi Bangunan:</strong> {{ $sk->kondisi_bangunan ?? '-' }}</p>
            <p><strong>Dibangun Oleh:</strong> {{ $sk->dibangun_oleh ?? '-' }}</p>
            <p><strong>Pihak yang Membangun:</strong> {{ $sk->pihak_membangun ?? '-' }}</p>
            <p><strong>Tahun Pembangunan:</strong> {{ $sk->tahun_pembangunan ?? '-' }}</p>
            <p><strong>Luas:</strong> {{ $sk->luas ?? '-' }} m²</p>
            <p><strong>Biaya Pembangunan:</strong> Rp {{ number_format($sk->biaya_pembangunan ?? 0,0,',','.') }}</p>
            <hr>
            <p><strong>File SK:</strong></p>
            @if($sk->file_sk)
                @php $ext = pathinfo($sk->file_sk, PATHINFO_EXTENSION); @endphp
                @if(in_array(strtolower($ext), ['jpg','jpeg','png','gif']))
                    <img src="{{ asset('storage/' . $sk->file_sk) }}" alt="File SK" class="img-fluid rounded">
                @elseif(strtolower($ext) === 'pdf')
                    <iframe src="{{ asset('storage/' . $sk->file_sk) }}" frameborder="0" width="100%" height="600px"></iframe>
                @else
                    <a href="{{ asset('storage/' . $sk->file_sk) }}" target="_blank">Download File SK</a>
                @endif
            @else
                <p class="text-muted">Belum ada file SK diupload.</p>
            @endif
        </div>

         @if($sk->status === 'Pending')
            <form action="{{ route('petugas.akun_ditangguhkan.verify', $sk->id) }}" method="POST" class="d-flex gap-2">
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
