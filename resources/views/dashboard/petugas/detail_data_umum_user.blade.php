@extends('layouts.layout_petugas')

@section('content')
<div class="container-fluid p-4">
    <h1 class="h3 mb-4 fw-bold text-center">Detail Data Umum</h1>
    <div class="card shadow-sm">
        <div class="card-body">
            <h5 class="mb-3 fw-bold text-primary">DATA AKUN</h5>
            <div class="row g-3">
                <div class="col-md-6">
                    <label class="form-label">Nama Pengelola</label>
                    <input type="text" class="form-control" value="{{ $akun->nama }}" readonly>
                </div>
                <div class="col-md-6">
                    <label class="form-label">Username</label>
                    <input type="text" class="form-control" value="{{ $akun->username }}" readonly>
                </div>
                <div class="col-md-6">
                    <label class="form-label">Email</label>
                    <input type="email" class="form-control" value="{{ $akun->email }}" readonly>
                </div>
                <div class="col-md-6">
                    <label class="form-label">Nomor WhatsApp</label>
                    <input type="text" class="form-control" value="{{ $akun->nomor_wa }}" readonly>
                </div>
                <div class="col-md-6">
                    <label class="form-label">Jenis Fasilitas</label>
                    <input type="text" class="form-control" value="{{ $akun->jenis_fasilitas }}" readonly>
                </div>
                <div class="col-md-6">
                    <label class="form-label">Nama Bank Sampah</label>
                    <input type="text" class="form-control" value="{{ $akun->nama_bank_sampah }}" readonly>
                </div>
            </div>

            <h5 class="mt-4 mb-3 fw-bold text-primary">LOKASI</h5>
            <div class="row g-3">
                <div class="col-md-12">
                    <label class="form-label">Alamat</label>
                    <input type="text" class="form-control" value="{{ $akun->alamat }}" readonly>
                </div>
                <div class="col-md-4">
                    <label class="form-label">Padukuhan</label>
                    <input type="text" class="form-control" value="{{ $akun->padukuhan->nama ?? '-' }}" readonly>
                </div>
                <div class="col-md-4">
                    <label class="form-label">Kelurahan</label>
                    <input type="text" class="form-control" value="{{ $akun->kelurahan->nama ?? '-' }}" readonly>
                </div>
                <div class="col-md-4">
                    <label class="form-label">Kapanewon</label>
                    <input type="text" class="form-control" value="{{ $akun->kapanewon->nama ?? '-' }}" readonly>
                </div>
            </div>

            <div class="mt-4 text-end">
                <a href="{{ route('petugas.data_umum') }}" class="btn btn-secondary">Kembali</a>
            </div>
        </div>
    </div>
</div>
@endsection
