@extends('layouts.layout_user')
<head>
    <!-- Tambahkan Bootstrap Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
</head>
@section('content')
<div class="container-fluid p-4">
    <h1 class="h3 mb-4 fw-bold text-center">Data Umum</h1>
    <div class="text-center mb-4">
        <p class="fw-semibold fs-5">{{ $akun->nama }}</p>
    </div>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <div class="card shadow-sm border-1">
        <div class="card-body">
            <form action="{{ route('user.data_umum.update') }}" method="POST">
                @csrf
                @method('PUT')

                {{-- Data Akun --}}
                <h5 class="mb-3 fw-bold" style="color: #276561; padding-left: 25px; position: relative;">
                    <i class="bi bi-person-circle"></i> DATA AKUN
                    <span style="position: absolute; left: 0; top: 0; width: 6px; height: 100%; background-color: #276561; border-radius: 10px 0 0 10px;"></span>
                </h5>
                <div class="row g-3">
                    <div class="col-md-6">
                        <div class="field-card-costum">
                        <label class="form-label">Nama Pengelola</label>
                        <input type="text" class="form-control @error('nama') is-invalid @enderror" 
                            name="nama" value="{{ old('nama', $akun->nama) }}">
                        @error('nama') <div class="invalid-feedback">{{ $message }}</div> @enderror
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="field-card-costum">
                        <label class="form-label">Username</label>
                        <input type="text" class="form-control @error('username') is-invalid @enderror" 
                            name="username" value="{{ old('username', $akun->username) }}">
                        @error('username') <div class="invalid-feedback">{{ $message }}</div> @enderror
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="field-card-costum">
                        <label class="form-label">Email</label>
                        <input type="email" class="form-control @error('email') is-invalid @enderror" 
                            name="email" value="{{ old('email', $akun->email) }}">
                        @error('email') <div class="invalid-feedback">{{ $message }}</div> @enderror
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="field-card-costum">
                        <label class="form-label">Nomor WhatsApp</label>
                        <input type="text" class="form-control @error('nomor_wa') is-invalid @enderror" 
                            name="nomor_wa" value="{{ old('nomor_wa', $akun->nomor_wa) }}">
                        @error('nomor_wa') <div class="invalid-feedback">{{ $message }}</div> @enderror
                        </div>
                    </div>

                    {{-- Readonly --}}
                    <div class="col-md-6">
                        <div class="field-card">
                        <label class="form-label">Jenis Fasilitas</label>
                        <input type="text" class="form-control bg-light text-muted border-0" 
                            value="{{ $akun->jenis_fasilitas }}" readonly>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="field-card">
                        <label class="form-label">Nama Bank Sampah</label>
                        <input type="text" class="form-control bg-light text-muted border-0" 
                            value="{{ $akun->nama_bank_sampah }}" readonly>
                        </div>
                    </div>
                </div>

                {{-- Lokasi --}}
                <h5 class="mt-4 mb-3 fw-bold" style="color: #276561; padding-left: 25px; position: relative;">
                    <i class="bi bi-geo-alt-fill"></i> LOKASI
                    <span style="position: absolute; left: 0; top: 0; width: 6px; height: 100%; background-color: #276561; border-radius: 10px 0 0 10px;"></span>
                </h5>
                <div class="row g-3">
                    <div class="col-md-6">
                        <div class="field-card">
                        <label class="form-label">Alamat</label>
                        <input type="text" class="form-control bg-light text-muted border-0" 
                            value="{{ $akun->alamat }}" readonly>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="field-card">
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
                    <div class="col-md-4">
                        <div class="field-card">
                        <label class="form-label">Padukuhan</label>
                        <input type="text" class="form-control bg-light text-muted border-0" 
                            value="{{ $akun->padukuhan->nama ?? '-' }}" readonly>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="field-card">
                        <label class="form-label">Kelurahan</label>
                        <input type="text" class="form-control bg-light text-muted border-0" 
                            value="{{ $akun->kelurahan->nama ?? '-' }}" readonly>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="field-card">
                        <label class="form-label">Kapanewon</label>
                        <input type="text" class="form-control bg-light text-muted border-0" 
                            value="{{ $akun->kapanewon->nama ?? '-' }}" readonly>
                        </div>
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

<style>

    .field-card{
      border: 1px solid #ada8a8;
      border-radius: 5px;           
      background: #fff;
      padding: 5px 14px;    
      padding-left: 15px;
    }

    .field-card .form-label{
  font-weight: 700;
  font-size: .875rem;
  margin-bottom: .35rem;
  color: #2c2c2c;
}
.field-card .form-control{
  background-color: #f8f9fa;
  border: 0;                    
  border-radius: 8px;
  padding: 15px 12px;
  color: #495057;
}

.field-card-costum{
      border: 1px solid #ada8a8;
      border-radius: 5px;           
      background: #fff;
      padding: 5px 14px;    
      padding-left: 15px;
    }

.field-card-costum .form-control{
  background-color: #ffffff;
  border: 1px solid #1fea9f;                    
  border-radius: 8px;
  padding: 15px 12px;
}

.card {
    border-radius: 20px;
    box-shadow: 0 10px 15px rgba(0, 0, 0, 0.1);
    margin-top: 20px;
    background-color: #fff;
}

.card-body h5 {
    font-weight: 600;
    font-size: 1.25rem;
    color: #276561;
    border-radius: 5px; 
    border-radius: 5px;
    border: 1px solid #000000; 
    padding: 10px; 
    margin: 0;
}


</style>