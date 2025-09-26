@extends('layouts.layout_user')

@section('content')
<div class="container-fluid p-4">
    <h1 class="h3 mb-4 fw-bold text-center">Data Umum</h1>
    <div class="text-center mb-4">
        <p class="fw-semibold fs-5">{{ $akun->nama }}</p>
    </div>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <div class="card shadow-sm border-0">
        <div class="card-body">
            <form action="{{ route('user.data_umum.update') }}" method="POST">
                @csrf
                @method('PUT')

                {{-- Data Akun --}}
                <h5 class="mb-3 fw-bold text-primary">DATA AKUN</h5>
                <div class="row g-3">
                    <div class="col-md-6">
                        <label class="form-label">Nama Pengelola</label>
                        <input type="text" class="form-control @error('nama') is-invalid @enderror" 
                            name="nama" value="{{ old('nama', $akun->nama) }}">
                        @error('nama') <div class="invalid-feedback">{{ $message }}</div> @enderror
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">Username</label>
                        <input type="text" class="form-control @error('username') is-invalid @enderror" 
                            name="username" value="{{ old('username', $akun->username) }}">
                        @error('username') <div class="invalid-feedback">{{ $message }}</div> @enderror
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">Email</label>
                        <input type="email" class="form-control @error('email') is-invalid @enderror" 
                            name="email" value="{{ old('email', $akun->email) }}">
                        @error('email') <div class="invalid-feedback">{{ $message }}</div> @enderror
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">Nomor WhatsApp</label>
                        <input type="text" class="form-control @error('nomor_wa') is-invalid @enderror" 
                            name="nomor_wa" value="{{ old('nomor_wa', $akun->nomor_wa) }}">
                        @error('nomor_wa') <div class="invalid-feedback">{{ $message }}</div> @enderror
                    </div>

                    {{-- Readonly --}}
                    <div class="col-md-6">
                        <label class="form-label">Jenis Fasilitas</label>
                        <input type="text" class="form-control bg-light text-muted border-0" 
                            value="{{ $akun->jenis_fasilitas }}" readonly>
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">Nama Bank Sampah</label>
                        <input type="text" class="form-control bg-light text-muted border-0" 
                            value="{{ $akun->nama_bank_sampah }}" readonly>
                    </div>
                </div>

                {{-- Lokasi --}}
                <h5 class="mt-4 mb-3 fw-bold text-primary">LOKASI</h5>
                <div class="row g-3">
                    <div class="col-md-12">
                        <label class="form-label">Alamat</label>
                        <input type="text" class="form-control bg-light text-muted border-0" 
                            value="{{ $akun->alamat }}" readonly>
                    </div>
                    <div class="col-md-4">
                        <label class="form-label">Padukuhan</label>
                        <input type="text" class="form-control bg-light text-muted border-0" 
                            value="{{ $akun->padukuhan->nama ?? '-' }}" readonly>
                    </div>
                    <div class="col-md-4">
                        <label class="form-label">Kelurahan</label>
                        <input type="text" class="form-control bg-light text-muted border-0" 
                            value="{{ $akun->kelurahan->nama ?? '-' }}" readonly>
                    </div>
                    <div class="col-md-4">
                        <label class="form-label">Kapanewon</label>
                        <input type="text" class="form-control bg-light text-muted border-0" 
                            value="{{ $akun->kapanewon->nama ?? '-' }}" readonly>
                    </div>
                <div class="col-md-4">
                    <label class="form-label">Link Google Maps</label>
                        @if (!empty($akun->link_maps))
                            <button type="button" 
                                class="d-flex align-items-center gap-2 p-2 rounded bg-light border text-primary text-decoration-none w-100"
                                data-bs-toggle="modal" data-bs-target="#mapsModal">
                                <i class="bi bi-geo-alt-fill"></i>
                                <span>Lihat di Google Maps</span>
                            </button>
                        @else
                            <input type="text" class="form-control bg-light text-muted border-0" value="-" readonly>
                        @endif
                </div>

                </div>

                <div class="mt-4 text-end">
                    <button type="submit" class="btn btn-success px-4">
                        <i class="bi bi-save"></i> Simpan Perubahan
                    </button>
                </div>
            </form>

            @if (!empty($akun->link_maps))
                <div class="modal fade" id="mapsModal" tabindex="-1" aria-labelledby="mapsModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-xl modal-dialog-centered">
                    <div class="modal-content">
                    <div class="modal-header bg-primary text-white">
                        <h5 class="modal-title" id="mapsModalLabel">Lokasi Google Maps</h5>
                        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body p-0">
                        <iframe src="{{ $akun->link_maps }}" 
                                width="100%" height="600" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
                    </div>
                    </div>
                </div>
                </div>
            @endif
            
        </div>
    </div>
</div>
@endsection
