@extends('layouts.layout_user')

@section('content')
<div class="container py-4">

    @php
        $latestSK = \App\Models\DokumenSK::where('user_id', auth()->id())->latest()->first();
        $status = $latestSK->status ?? 'Belum Upload';
    @endphp

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
                            <label for="periode" class="form-label">Periode<span class="text-danger">*</span></label>
                            <select name="periode" id="periode" class="form-select" required>
                                <option value="">-- Pilih Periode --</option>
                                <option value="1">Januari - Juni</option>
                                <option value="2">Juli - Desember</option>
                            </select>
                        </div>
                       <div class="col-md-6">
                            <label for="tahun" class="form-label">Tahun<span class="text-danger">*</span></label>
                            <select name="tahun" id="tahun" class="form-select" required>
                                <option value="">-- Pilih Tahun --</option>
                                @for ($year = 2020; $year <= date('Y'); $year++)
                                    <option value="{{ $year }}">{{ $year }}</option>
                                @endfor
                            </select>
                        </div>
                    </div>

                   <h6 class="mt-4">Komposisi Sampah Jenis Organik Berdasarkan Jenis Sumber Sampah</h6>
                    <div class="row">
                        <div class="col-md-4">
                            <div class="card shadow-sm h-100">
                                <div class="card-body text-center">
                                    <img src="{{ asset('assets/images/sampah/organik_rumah_tangga.jpg') }}" 
                                    alt="Organik Rumah Tangga" 
                                    class="img-fluid mb-3" style="max-height:150px; object-fit:contain;">

                                    <h6 class="fw-bold">Sampah Organik : Rumah Tangga</h6>
                                    <label class="form-label">Quantity (Kg)</label>
                                    <input type="number" step="0.01" name="organik_rumah_tangga" class="form-control">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="card shadow-sm h-100">
                                <div class="card-body text-center">
                                    <img src="{{ asset('assets/images/sampah/organik_pasar.jpg') }}" 
                                    alt="Organik Pasar" 
                                    class="img-fluid mb-3" style="max-height:150px; object-fit:contain;">

                                    <h6 class="fw-bold">Sampah Organik : Pasar</h6>
                                    <label class="form-label">Quantity (Kg)</label>
                                    <input type="number" step="0.01" name="organik_pasar" class="form-control">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="card shadow-sm h-100">
                                <div class="card-body text-center">
                                    <img src="{{ asset('assets/images/sampah/organik_kantor.jpg') }}" 
                                    alt="Organik Kantor" 
                                    class="img-fluid mb-3" style="max-height:150px; object-fit:contain;">

                                    <h6 class="fw-bold">Sampah Organik : Kantor</h6>
                                    <label class="form-label">Quantity (Kg)</label>
                                    <input type="number" step="0.01" name="organik_kantor" class="form-control">
                                </div>
                            </div>
                        </div>
                    </div>

                    <h6 class="mt-4">Komposisi Sampah Jenis Anorganik Berdasarkan Jenis Sumber Sampah</h6>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="card shadow-sm h-100">
                                    <div class="card-body text-center">
                                        <img src="{{ asset('assets/images/sampah/anorganik_rumah_tangga.jpg') }}" 
                                        alt="Anorganik Rumah Tangga" 
                                        class="img-fluid mb-3" style="max-height:150px; object-fit:contain;">

                                        <h6 class="fw-bold">Sampah Anorganik : Rumah Tangga</h6>
                                        <label class="form-label">Quantity (Kg)</label>
                                        <input type="number" step="0.01" name="anorganik_rumah_tangga" class="form-control">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="card shadow-sm h-100">
                                    <div class="card-body text-center">
                                        <img src="{{ asset('assets/images/sampah/anorganik_pasar.jpg') }}" 
                                        alt="Anorganik Pasar" 
                                        class="img-fluid mb-3" style="max-height:150px; object-fit:contain;">

                                        <h6 class="fw-bold">Sampah Anorganik : Pasar</h6>
                                        <label class="form-label">Quantity (Kg)</label>
                                        <input type="number" step="0.01" name="anorganik_pasar" class="form-control">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="card shadow-sm h-100">
                                    <div class="card-body text-center">
                                        <img src="{{ asset('assets/images/sampah/anorganik_kantor.jpg') }}" 
                                        alt="Anorganik Kantor" 
                                        class="img-fluid mb-3" style="max-height:150px; object-fit:contain;">

                                        <h6 class="fw-bold">Sampah Anorganik : Kantor</h6>
                                        <label class="form-label">Quantity (Kg)</label>
                                        <input type="number" step="0.01" name="anorganik_kantor" class="form-control">
                                    </div>
                                </div>
                            </div>
                        </div>
                    
                    <h6 class="mt-4">Komposisi Sampah Jenis B3 Berdasarkan Jenis Sumber Sampah</h6>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="card shadow-sm h-100">
                                    <div class="card-body text-center">
                                        <img src="{{ asset('assets/images/sampah/b3_rumah_tangga.jpg') }}" 
                                        alt="B3 Rumah Tangga" 
                                        class="img-fluid mb-3" style="max-height:150px; object-fit:contain;">

                                        <h6 class="fw-bold">Sampah B3 : Rumah Tangga</h6>
                                        <label class="form-label">Quantity (Kg)</label>
                                        <input type="number" step="0.01" name="b3_rumah_tangga" class="form-control">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="card shadow-sm h-100">
                                    <div class="card-body text-center">
                                        <img src="{{ asset('assets/images/sampah/b3_pasar.jpg') }}" 
                                        alt="B3 Pasar" 
                                        class="img-fluid mb-3" style="max-height:150px; object-fit:contain;">

                                        <h6 class="fw-bold">Sampah B3 : Pasar</h6>
                                        <label class="form-label">Quantity (Kg)</label>
                                        <input type="number" step="0.01" name="b3_pasar" class="form-control">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="card shadow-sm h-100">
                                    <div class="card-body text-center">
                                        <img src="{{ asset('assets/images/sampah/b3_kantor.jpg') }}" 
                                        alt="B3 Kantor" 
                                        class="img-fluid mb-3" style="max-height:150px; object-fit:contain;">

                                        <h6 class="fw-bold">Sampah B3 : Kantor</h6>
                                        <label class="form-label">Quantity (Kg)</label>
                                        <input type="number" step="0.01" name="b3_kantor" class="form-control">
                                    </div>
                                </div>
                            </div>
                        </div>

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
</div>
@endsection
