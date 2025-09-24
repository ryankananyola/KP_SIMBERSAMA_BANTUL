@extends('layouts.layout_admin')
@section('content')
<div class="container-fluid p-4">
    <h1 class="h3 mb-4 fw-bold text-center">Data Umum - {{ $petugas->username }}</h1>
    <div class="card">
        <div class="card-body">
            <h5 class="mb-3 fw-bold text-primary">DATA PETUGAS</h5>
            <div class="row mb-2">
                <div class="col-md-6">
                    <label>Nama Petugas</label>
                    <input type="text" class="form-control bg-light text-muted border-0" value="{{ $petugas->nama }}" readonly>
                </div>
                <div class="col-md-6">
                    <label>Username</label>
                    <input type="text" class="form-control bg-light text-muted border-0" value="{{ $petugas->username }}" readonly>
                </div>
                <div class="col-md-6 mt-2">
                    <label>Email</label>
                    <input type="text" class="form-control bg-light text-muted border-0" value="{{ $petugas->email }}" readonly>
                </div>
                <div class="col-md-6 mt-2">
                    <label>Nomor WhatsApp</label>
                    <input type="text" class="form-control bg-light text-muted border-0" value="{{ $petugas->no_hp }}" readonly>
                </div>
                <div class="col-md-6 mt-2">
                    <label>Alamat</label>
                    <input type="text" class="form-control bg-light text-muted border-0" value="{{ $petugas->alamat }}" readonly>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
