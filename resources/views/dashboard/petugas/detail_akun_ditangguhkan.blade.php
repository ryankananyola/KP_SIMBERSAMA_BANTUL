@extends('layouts.layout_petugas')

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
    </div>

    <div class="mt-3 text-end">
        <a href="{{ route('petugas.akun_ditangguhkan.index') }}" class="btn btn-secondary">Kembali</a>
    </div>
</div>
@endsection
