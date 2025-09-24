@extends('layouts.layout_user')

@section('content')
<div class="container py-4">

    <div class="card shadow-sm">
        <div class="card-body text-center">
            <h5 class="fw-bold mb-3">Hallo, {{ auth()->user()->nama }}</h5>
            <p class="text-muted">Selamat Datang di Sistem Informasi Pengolahan Sampah Kab. Bantul!</p>

            @php
                use Carbon\Carbon;

                $latestSK = \App\Models\DokumenSK::where('user_id', auth()->id())->latest()->first();
                $status = $latestSK->status ?? 'Belum Upload';
                $surveyDate = $latestSK ? $latestSK->survey_date : null;
                $status_survey = $latestSK ? $latestSK->status_survey : null;
                $catatanPetugas = $latestSK ? $latestSK->catatan_petugas : null;
                $bankName = $latestSK && $latestSK->user && !empty($latestSK->user->nama_bank_sampah)
                ? $latestSK->user->nama_bank_sampah
                : (auth()->user()->nama_bank_sampah ?? 'Bank Sampah Anda');
            @endphp

            @if($status == 'Belum Upload')
                <div class="alert alert-danger d-flex justify-content-center align-items-center text-center">
                    <span class="material-icons mb-3 me-2 fs-5">warning</span>
                    <div>
                        <strong>Anda Belum Melengkapi SK, Organisasi dan Bangunan!</strong>
                        <hr class="my-2">
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
                    <p class="mb-0">Dokumen Anda telah diterima. Menunggu jadwal survei dari petugas.</p>
                </div>

            @elseif($status == 'Survey' && $status_survey != 'Perlu Perbaikan')
                <div class="alert alert-primary">
                    <h6 class="fw-bold">Informasi Survei</h6>
                    <p class="mb-0">Petugas telah menjadwalkan survei.</p>
                    @if($surveyDate)
                        <hr>
                        <p class="mb-0 fw-bold">
                            Jadwal Survei Anda: {{ Carbon::parse($surveyDate)->translatedFormat('d F Y, H:i') }}
                        </p>
                    @endif
                </div>
            @endif

            @if($status_survey == 'Perlu Perbaikan')
                <div class="alert alert-danger mt-3">
                    <h6 class="fw-bold text-danger">Hasil Survei: Perlu Perbaikan</h6>
                    <p>Petugas menyatakan hasil survei <strong>{{ $bankName }}</strong> perlu perbaikan. Silakan perbaiki sesuai catatan di bawah:</p>
                    @if($catatanPetugas)
                        <div class="alert alert-light border mt-2 text-start">
                            <strong>Catatan Petugas:</strong> <br>
                            {{ $catatanPetugas }}
                        </div>
                    @endif
                </div>
            @endif

            @if($status == 'Aktif')
                <div class="alert alert-info">
                    <h6 class="fw-bold">Survei Selesai</h6>
                    <p class="mb-0">Selamat, survei sudah selesai. Proses pendaftaran Anda berhasil dan akun anda Aktif 🎉</p>
                </div>
            @endif

        </div>
    </div>
</div>
@endsection
