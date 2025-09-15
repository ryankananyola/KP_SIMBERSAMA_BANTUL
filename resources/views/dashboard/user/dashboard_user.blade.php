@extends('layouts.layout_user')

@section('content')
<div class="container-fluid">
    <div class="row">
        {{-- Konten Utama --}}
        <div class="col-md-9 col-lg-10 p-5">
            <h4 class="fw-bold">Hallo, {{ Auth::user()->nama }}</h4>
            <p class="text-muted">Selamat Datang di Sistem Informasi Pengolahan Sampah Kab. Bantul!</p>
            <hr>

            <div class="row text-center">
                <div class="col-md-4 mb-3">
                    <a href="{{ route('user.data_umum') }}" class="btn btn-lg btn-success w-100 py-4 shadow-sm">
                        <i class="bi bi-file-earmark-text fs-3"></i><br>
                        Data Umum
                    </a>
                </div>
                <div class="col-md-4 mb-3">
                    <a href="{{ route('user.data_periodik') }}" class="btn btn-lg btn-success w-100 py-4 shadow-sm">
                        <i class="bi bi-file-earmark fs-3"></i><br>
                        Data Periodik
                    </a>
                </div>
                <div class="col-md-4 mb-3">
                    <a href="{{ route('user.upload_sk') }}" class="btn btn-lg btn-success w-100 py-4 shadow-sm">
                        <i class="bi bi-award fs-3"></i><br>
                        SK, Organisasi & Bangunan
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
