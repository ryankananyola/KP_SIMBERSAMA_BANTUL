@extends('layouts.layout_user')

@section('content')
<div class="container py-4">

    @php
        $latestSK = \App\Models\DokumenSK::where('user_id', auth()->id())->latest()->first();
        $status = $latestSK->status ?? 'Belum Upload';

        $currentYear = date('Y');
        $currentPeriod = (date('n') <= 6) ? 1 : 2; 
        $laporanExist = \App\Models\LaporanPeriodik::where('user_id', auth()->id())
                            ->where('tahun', $currentYear) 
                            ->where('periode', $currentPeriod)
                            ->exists();
    @endphp

    @if($laporanExist)
        <div class="alert alert-info">
            Anda sudah menginput laporan periodik untuk periode dan tahun ini.
        </div>
    @else
        @if($status != 'Aktif')
            {{-- Alert SK belum aktif --}}
            <div class="card shadow-sm">
                <div class="card-body text-center">
                    <h5 class="fw-bold mb-3">Hallo, {{ auth()->user()->nama }}</h5>
                    <p class="text-muted">Selamat Datang di Sistem Informasi Pengolahan Sampah Kab. Bantul!</p>

                    @if($status == 'Belum Upload')
                        <div class="alert alert-danger d-flex justify-content-center align-items-center text-center">
                            <span class="material-icons mb-3 me-2 fs-5">warning</span>
                            <div>
                                <strong>Anda Belum Melengkapi SK, Organisasi dan Bangunan!</strong>
                                <hr class="my-2">
                                Silakan lengkapi data agar akun Anda <span class="fw-bold text-success">Terverifikasi</span> 
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
                    @elseif($status == 'Perlu Perbaikan')
                        <div class="alert alert-danger">
                            <h6 class="fw-bold">Dokumen SK Perlu Perbaikan</h6>
                            <p class="mb-0">Silakan update dokumen sesuai catatan dari petugas.</p>
                            <a href="{{ route('user.upload_sk.store') }}" class="btn btn-sm btn-outline-danger mt-2">Perbaiki SK</a>
                        </div>
                    @else
                        <div class="alert alert-info">
                            <h6 class="fw-bold">Dokumen Telah Diproses</h6>
                            <p class="mb-0">Status dokumen Anda: <strong>{{ $status }}</strong></p>
                            <small class="mb-0">Catatan: Harap menunggu hasil <strong>survey lapangan</strong> untuk input data periodik</small>
                        </div>
                    @endif
                </div>
            </div>
        @else
            {{-- Form Input Laporan --}}
            <div class="card shadow-sm">
                <div class="card-header bg-success text-white">
                    <h5 class="mb-0">Input Data Periodik</h5>
                </div>
                <div class="card-body">
                    <form action="{{ route('user.data_periodik.store') }}" method="POST">
                        @csrf
                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label for="periode" class="form-label">Periode<span class="text-danger">*</span></label>
                                <select name="periode" id="periode" class="form-select" required>
                                    <option value="">-- Pilih Periode --</option>
                                    <option value="1" {{ $currentPeriod == 1 ? 'selected' : '' }}>Januari - Juni</option>
                                    <option value="2" {{ $currentPeriod == 2 ? 'selected' : '' }}>Juli - Desember</option>
                                </select>
                            </div>
                            <div class="col-md-6">
                                <label for="tahun" class="form-label">Tahun<span class="text-danger">*</span></label>
                                <select name="tahun" id="tahun" class="form-select" required>
                                    <option value="">-- Pilih Tahun --</option>
                                    @for ($year = 2020; $year <= date('Y'); $year++)
                                        <option value="{{ $year }}" {{ $currentYear == $year ? 'selected' : '' }}>{{ $year }}</option>
                                    @endfor
                                </select>
                            </div>
                        </div>

                        @include('dashboard.user.partials.komposisi_sampah')

                        <div class="d-flex justify-content-end mt-4">
                            <button type="submit" class="btn btn-success">
                                <span class="material-icons align-middle">save</span>
                                <span class="align-middle">Simpan Laporan</span>
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        @endif
    @endif
</div>
@endsection
