@extends('layouts.layout_admin')
<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
</head>
@section('content')
<div class="container-fluid p-4">
    <h1 class="h3 mb-4 fw-bold text-center">Data Umum - {{ $petugas->username }}</h1>
    <div class="card">
        <div class="card-body">
            <h5 class="mb-3 fw-bold" style="color: #276561; padding-left: 25px; position: relative;">
                <i class="bi bi-person-circle"></i> DATA AKUN
                <span style="position: absolute; left: 0; top: 0; width: 6px; height: 100%; background-color: #276561; border-radius: 10px 0 0 10px;"></span>
            </h5>             
            <div class="row mb-2">
                <div class="col-md-6">
                    <div class="field-card">
                    <label>Nama Petugas</label>
                    <input type="text" class="form-control bg-light text-muted border-0" value="{{ $petugas->nama }}" readonly>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="field-card">
                    <label>Username</label>
                    <input type="text" class="form-control bg-light text-muted border-0" value="{{ $petugas->username }}" readonly>
                    </div>
                </div>
                <div class="col-md-6 mt-2">
                    <div class="field-card">
                    <label>Email</label>
                    <input type="text" class="form-control bg-light text-muted border-0" value="{{ $petugas->email }}" readonly>
                    </div>
                </div>
                <div class="col-md-6 mt-2">
                    <div class="field-card">
                    <label>Nomor WhatsApp</label>
                    <input type="text" class="form-control bg-light text-muted border-0" value="{{ $petugas->no_hp }}" readonly>
                    </div>
                </div>
                <div class="col-md-6 mt-2">
                    <div class="field-card">
                    <label>Alamat</label>
                    <input type="text" class="form-control bg-light text-muted border-0" value="{{ $petugas->alamat }}" readonly>
                    </div>
                </div>
            </div>
            <!-- Tombol Kembali -->
            <div class="mt-4 text-end">
                <a href="{{ route('admin.data_umum.index') }}" class="btn btn-secondary">Kembali</a>
            </div>
        </div>
    </div>
</div>
@endsection

<style>
.card {
    border-radius: 20px;
    box-shadow: 0 10px 15px rgba(0, 0, 0, 0.1);
    margin-top: 20px;
    background-color: #fff;
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