@extends('layouts.layout_petugas')
<head>
    <!-- Tambahkan Bootstrap Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
</head>

@section('content')
<div class="container-fluid p-4">
    <h1 class="h3 mb-4 fw-bold text-center">Detail Data Umum</h1>
    <div class="card shadow-sm">
        <div class="card-body">
            <!-- Data Akun -->
            <h5 class="mb-3 fw-bold" style="color: #276561; padding-left: 25px; position: relative;">
                <i class="bi bi-person-circle"></i> DATA AKUN
                <span style="position: absolute; left: 0; top: 0; width: 6px; height: 100%; background-color: #276561; border-radius: 10px 0 0 10px;"></span>
            </h5>            
            <div class="row g-3">
                <div class="col-md-6">
                    <div class="field-card">
                    <div class="field-card">
                    <label class="form-label">Nama Pengelola</label>
                    <input type="text" class="form-control bg-light text-muted border-0" value="{{ $akun->nama }}" readonly>
                    </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="field-card">
                    <div class="field-card">
                    <label class="form-label">Username</label>
                    <input type="text" class="form-control bg-light text-muted border-0" value="{{ $akun->username }}" readonly>
                    </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="field-card">
                    <div class="field-card">
                    <label class="form-label">Email</label>
                    <input type="text" class="form-control bg-light text-muted border-0" value="{{ $akun->email }}" readonly>
                    </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="field-card">
                    <div class="field-card">
                    <label class="form-label">Nomor WhatsApp</label>
                    <input type="text" class="form-control bg-light text-muted border-0" value="{{ $akun->nomor_wa }}" readonly>
                    </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="field-card">
                    <div class="field-card">
                    <label class="form-label">Jenis Fasilitas</label>
                    <input type="text" class="form-control bg-light text-muted border-0" value="{{ $akun->jenis_fasilitas }}" readonly>
                    </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="field-card">
                    <div class="field-card">
                    <label class="form-label">Nama Bank Sampah</label>
                    <input type="text" class="form-control bg-light text-muted border-0" value="{{ $akun->nama_bank_sampah }}" readonly>
                    </div>
                    </div>
                </div>
            </div>

            <!-- Lokasi -->
            <h5 class="mt-4 mb-3 fw-bold" style="color: #276561; padding-left: 25px; position: relative;">
                <i class="bi bi-geo-alt-fill"></i> LOCATION
                <span style="position: absolute; left: 0; top: 0; width: 6px; height: 100%; background-color: #276561; border-radius: 10px 0 0 10px;"></span>
            </h5>
            <div class="row g-3">
                <div class="col-md-6">
                    <div class="field-card">
                <div class="col-md-6">
                    <div class="field-card">
                    <label class="form-label">Alamat</label>
                    <input type="text" class="form-control bg-light text-muted border-0" value="{{ $akun->alamat }}" readonly>
                    </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="field-card">
                <div class="col-md-6">
                    <div class="field-card">
                    <label class="form-label">Link Google Maps</label>
                    @if (!empty($akun->link_maps))
                        <a href="{{ $akun->link_maps }}" target="_blank" class="d-flex align-items-center gap-2 p-2 rounded bg-light border text-primary text-decoration-none">
                            <i class="bi bi-geo-alt-fill"></i>
                            <span>Lihat di Google Maps</span>
                        </a>
                    @else
                        <input type="text" class="form-control bg-light text-muted border-0" value="-" readonly>
                    @endif
                </div>
                </div>
                <div class="col-md-4">
                    <div class="field-card">
                    <label class="form-label">Padukuhan</label>
                    <input type="text" class="form-control bg-light text-muted border-0" value="{{ $akun->padukuhan->nama ?? '-' }}" readonly>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="field-card">
                    <label class="form-label">Kelurahan</label>
                    <input type="text" class="form-control bg-light text-muted border-0" value="{{ $akun->kelurahan->nama ?? '-' }}" readonly>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="field-card">
                    <label class="form-label">Kapanewon</label>
                    <input type="text" class="form-control bg-light text-muted border-0" value="{{ $akun->kapanewon->nama ?? '-' }}" readonly>
                    </div>
                </div>
               
                </div>
                </div>
                <div class="col-md-4">
                    <div class="field-card">
                    <label class="form-label">Padukuhan</label>
                    <input type="text" class="form-control bg-light text-muted border-0" value="{{ $akun->padukuhan->nama ?? '-' }}" readonly>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="field-card">
                    <label class="form-label">Kelurahan</label>
                    <input type="text" class="form-control bg-light text-muted border-0" value="{{ $akun->kelurahan->nama ?? '-' }}" readonly>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="field-card">
                    <label class="form-label">Kapanewon</label>
                    <input type="text" class="form-control bg-light text-muted border-0" value="{{ $akun->kapanewon->nama ?? '-' }}" readonly>
                    </div>
                </div>
               
            </div>

            <!-- Tombol Kembali -->
            <div class="mt-4 text-end">
                <a href="{{ route('petugas.data_umum') }}" class="btn btn-secondary">Kembali</a>
            </div>
        </div>
    </div>
</div>

@endsection

<style>

.field-card{
  border: 1px solid #6e6e6e;
  border-radius: 5px;           
  background: #fff;
  padding: 0px 14px;    
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
  padding: 10px 12px;
  color: #495057;
}


.field-card{
  border: 1px solid #6e6e6e;
  border-radius: 5px;           
  background: #fff;
  padding: 0px 14px;    
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
  padding: 10px 12px;
  color: #495057;
}

.card {
    border-radius: 20px;
    box-shadow: 0 10px 15px rgba(0, 0, 0, 0.1);
    margin-top: 20px;
    background-color: #fff;
}

.form-control {
    border-radius: 10px;
    padding: 12px 15px;
    background-color: #f8f9fa;
    color: #495057;
    border: 1px solid #ddd;
    margin-bottom: 10px;
}

.card-body h5 {
    font-weight: 600;
    font-size: 1.25rem;
    color: #276561;
    border-radius: 5px; 
    border-radius: 5px; 
    border-radius: 5px;
    border: 1px solid #000000; 
    padding: 10px; 
    margin: 0;
}

.table {
    width: 100%;
    margin-top: 20px;
}

.table th, .table td {
    padding: 12px;
    text-align: left;
    vertical-align: middle;
}

.table th {
    background-color: #f1f1f1;
    color: #333;
}

.table td {
    background-color: #ffffff;
}

.d-flex {
    display: flex;
    gap: 15px;
    align-items: center;
}

.bg-light {
    background-color: #f8f9fa !important;
}

.text-primary {
    color: #007bff !important;
    text-decoration: none;
}

.text-decoration-none {
    text-decoration: none;
}

.text-muted {
    color: #6c757d !important;
}

.text-end {
    text-align: right;
}

.btn {
    font-size: 1rem;
    padding: 0.6rem 1.5rem;
    border-radius: 5px;
}

.btn-primary {
    background-color: #007bff;
    border-color: #007bff;
}

.btn-secondary {
    background-color: #6c757d;
    border-color: #6c757d;
}

@media (max-width: 768px) {
    .row.g-3 {
        flex-direction: column;
    }

    .col-md-4, .col-md-6 {
        width: 100% !important;
        margin-bottom: 15px;
    }
}
</style>


