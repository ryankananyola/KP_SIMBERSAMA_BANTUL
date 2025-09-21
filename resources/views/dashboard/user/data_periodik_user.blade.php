@extends('layouts.layout_user')

@section('content')
<div class="container py-4">

    @php
        $latestSK = \App\Models\DokumenSK::where('user_id', auth()->id())->latest()->first();
        $status = $latestSK->status ?? 'Belum Upload';
    @endphp

    {{-- Jika SK belum upload atau belum diverifikasi --}}
    @if($status != 'Aktif')
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
                        <small class="mb-0">Catatan: Harap menunggu hasil <strong> survey lapangan </strong> untuk dapat melakukan input data periodik</small>
                    </div>
                @endif
            </div>
        </div>

    @else
        <div class="card shadow-sm">
            <div class="card-header bg-success text-white">
                <h5 class="mb-0">Input Data Periodik</h5>
            </div>
            <div class="card-body">
                <form action="{{ route('user.data_periodik.store') }}" method="POST">
                    @csrf
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label for="periode" class="form-label">Periode</label>
                            <select name="periode" id="periode" class="form-select" required>
                                <option value="">-- Pilih Periode --</option>
                                <option value="1">Januari - Juni</option>
                                <option value="2">Juli - Desember</option>
                            </select>
                        </div>
                       <div class="col-md-6">
                            <label for="tahun" class="form-label">Tahun</label>
                            <select name="tahun" id="tahun" class="form-select" required>
                                <option value="">-- Pilih Tahun --</option>
                                @for ($year = 2020; $year <= date('Y'); $year++)
                                    <option value="{{ $year }}">{{ $year }}</option>
                                @endfor
                            </select>
                        </div>
                    </div>

                    <h6 class="mt-4">Komposisi Sampah Organik</h6>
                    <div class="row mb-3">
                        <div class="col-md-4"><label class="form-label">Rumah Tangga (Kg)</label><input type="number" step="0.01" name="organik_rumah_tangga" class="form-control"></div>
                        <div class="col-md-4"><label class="form-label">Pasar (Kg)</label><input type="number" step="0.01" name="organik_pasar" class="form-control"></div>
                        <div class="col-md-4"><label class="form-label">Perkantoran (Kg)</label><input type="number" step="0.01" name="organik_kantor" class="form-control"></div>
                    </div>

                    <h6 class="mt-4">Komposisi Sampah Anorganik</h6>
                    <div class="row mb-3">
                        <div class="col-md-4"><label class="form-label">Rumah Tangga (Kg)</label><input type="number" step="0.01" name="anorganik_rumah_tangga" class="form-control"></div>
                        <div class="col-md-4"><label class="form-label">Pasar (Kg)</label><input type="number" step="0.01" name="anorganik_pasar" class="form-control"></div>
                        <div class="col-md-4"><label class="form-label">Perkantoran (Kg)</label><input type="number" step="0.01" name="anorganik_kantor" class="form-control"></div>
                    </div>

                    <h6 class="mt-4">Komposisi Sampah B3</h6>
                    <div class="row mb-3">
                        <div class="col-md-4"><label class="form-label">Rumah Tangga (Kg)</label><input type="number" step="0.01" name="b3_rumah_tangga" class="form-control"></div>
                        <div class="col-md-4"><label class="form-label">Pasar (Kg)</label><input type="number" step="0.01" name="b3_pasar" class="form-control"></div>
                        <div class="col-md-4"><label class="form-label">Perkantoran (Kg)</label><input type="number" step="0.01" name="b3_kantor" class="form-control"></div>
                    </div>

                    <div class="d-flex justify-content-end">
                        <button type="submit" class="btn btn-success">
                            <span class="material-icons align-middle">save</span>
                            <span class="align-middle">Simpan Laporan</span>
                        </button>
                    </div>
                </form>
            </div>
        </div>
    @endif
</div>
@endsection
