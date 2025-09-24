@extends('layouts.layout_admin')
@section('content')
<div class="container-fluid p-4">
    <h1 class="h3 mb-4 fw-bold text-center">Detail Data Bank Sampah - {{ $akun->nama_bank_sampah }}</h1>

    <div class="card shadow-sm">
        <div class="card-body">
            <h5 class="mb-3 fw-bold text-primary">DATA BANK SAMPAH</h5>
            <div class="row g-3">
                <div class="col-md-6">
                    <label class="form-label">Nama Pengelola</label>
                    <input type="text" class="form-control bg-light text-muted border-0" value="{{ $akun->nama }}" readonly>
                </div>
                <div class="col-md-6">
                    <label class="form-label">Username</label>
                    <input type="text" class="form-control bg-light text-muted border-0" value="{{ $akun->username }}" readonly>
                </div>
                <div class="col-md-6">
                    <label class="form-label">Email</label>
                    <input type="text" class="form-control bg-light text-muted border-0" value="{{ $akun->email }}" readonly>
                </div>
                <div class="col-md-6">
                    <label class="form-label">Nomor WhatsApp</label>
                    <input type="text" class="form-control bg-light text-muted border-0" value="{{ $akun->nomor_wa }}" readonly>
                </div>
                <div class="col-md-6">
                    <label class="form-label">Jenis Fasilitas</label>
                    <input type="text" class="form-control bg-light text-muted border-0" value="{{ $akun->jenis_fasilitas }}" readonly>
                </div>
                <div class="col-md-6">
                    <label class="form-label">Nama Bank Sampah</label>
                    <input type="text" class="form-control bg-light text-muted border-0" value="{{ $akun->nama_bank_sampah }}" readonly>
                </div>
            </div>

            <h5 class="mt-4 mb-3 fw-bold text-primary">LOKASI</h5>
            <div class="row g-3">
                <div class="col-md-12">
                    <label class="form-label">Alamat</label>
                    <input type="text" class="form-control bg-light text-muted border-0" value="{{ $akun->alamat }}" readonly>
                </div>
                <div class="col-md-4">
                    <label class="form-label">Padukuhan</label>
                    <input type="text" class="form-control bg-light text-muted border-0" value="{{ $akun->padukuhan->nama ?? '-' }}" readonly>
                </div>
                <div class="col-md-4">
                    <label class="form-label">Kelurahan</label>
                    <input type="text" class="form-control bg-light text-muted border-0" value="{{ $akun->kelurahan->nama ?? '-' }}" readonly>
                </div>
                 <div class="col-md-4">
                    <label class="form-label">Kapanewon</label>
                    <input type="text" class="form-control bg-light text-muted border-0" value="{{ $akun->kapanewon->nama ?? '-' }}" readonly>
                </div>
                <div class="col-md-4">
                    <label class="form-label">Link Google Maps</label>
                        @if (!empty($akun->link_maps))
                            <a href="{{ $akun->link_maps }}" target="_blank" 
                            class="d-flex align-items-center gap-2 p-2 rounded bg-light border text-primary text-decoration-none">
                                <i class="bi bi-geo-alt-fill"></i>
                                <span>Lihat di Google Maps</span>
                            </a>
                        @else
                            <input type="text" class="form-control bg-light text-muted border-0" 
                                value="-" readonly>
                        @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
