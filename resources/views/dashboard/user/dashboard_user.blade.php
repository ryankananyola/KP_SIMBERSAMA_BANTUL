@extends('layouts.layout_user')

@section('content')
<div class="container py-4">

    <div class="card shadow-sm">
        <div class="card-body text-center">
            <h5 class="fw-bold mb-3">Hallo, {{ auth()->user()->name }}</h5>
            <p class="text-muted">Selamat Datang di Sistem Informasi Pengolahan Sampah Kab. Bantul!</p>

            @php
                $latestSK = \App\Models\DokumenSK::where('user_id', auth()->id())->latest()->first();
                $status = $latestSK->status ?? 'Belum Upload';
            @endphp

            @if($status == 'Belum Upload')
                <div class="alert alert-danger d-flex align-items-center">
                    <span class="material-icons me-2">warning</span>
                    <div>
                        <strong>Anda Belum Melengkapi SK, Organisasi dan Bangunan!</strong>
                        <hr>
                        Silakan lengkapi data tersebut agar akun Anda <span class="fw-bold text-success">Terverifikasi</span> 
                        dan bisa melakukan <span class="fw-bold">Input Data Periodik</span>.
                        <br><br>
                        <a href="{{ route('user.upload_sk.store') }}" class="btn btn-sm btn-danger">Upload SK Sekarang</a>
                    </div>
                </div>

            @elseif($status == 'Pending')
                <div class="alert alert-warning">
                    <h6 class="fw-bold text-warning">Menunggu Verifikasi Dokumen</h6>
                    <p class="mb-0">Mohon tunggu, dokumen Anda sedang diverifikasi oleh petugas.</p>
                </div>

            @elseif($status == 'Revisi' || $status == 'Perlu Perbaikan')
                <div class="alert alert-danger">
                    <h6 class="fw-bold">Dokumen SK Perlu Perbaikan</h6>
                    <p class="mb-0">Silakan update dokumen sesuai catatan dari petugas.</p>
                    <a href="{{ route('user.upload_sk.store') }}" class="btn btn-sm btn-outline-danger mt-2">Perbaiki SK</a>
                </div>

            @elseif($status == 'Diterima')
                <div class="alert alert-success">
                    <h6 class="fw-bold">SK Diterima</h6>
                    <p class="mb-0">Dokumen Anda telah diterima. Menunggu jadwal survey dari petugas.</p>
                </div>

            @elseif($status == 'Survey Selesai')
                <div class="alert alert-info">
                    <h6 class="fw-bold">Survey Selesai</h6>
                    <p class="mb-0">Selamat, survey sudah selesai. Proses pendaftaran Anda berhasil 🎉</p>
                </div>
            @endif
        </div>
    </div>
</div>
@endsection
