@extends('layouts.layout_user')

@section('content')
<div class="container mt-4">
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
                        <input type="number" name="tahun" id="tahun" class="form-control" 
                               placeholder="Contoh: 2025" required>
                    </div>
                </div>

                <h6 class="mt-4">Komposisi Sampah Organik</h6>
                <div class="row mb-3">
                    <div class="col-md-4">
                        <label class="form-label">Rumah Tangga (Kg)</label>
                        <input type="number" step="0.01" name="organik_rumah_tangga" class="form-control">
                    </div>
                    <div class="col-md-4">
                        <label class="form-label">Pasar (Kg)</label>
                        <input type="number" step="0.01" name="organik_pasar" class="form-control">
                    </div>
                    <div class="col-md-4">
                        <label class="form-label">Perkantoran (Kg)</label>
                        <input type="number" step="0.01" name="organik_kantor" class="form-control">
                    </div>
                </div>

                <h6 class="mt-4">Komposisi Sampah Anorganik</h6>
                <div class="row mb-3">
                    <div class="col-md-4">
                        <label class="form-label">Rumah Tangga (Kg)</label>
                        <input type="number" step="0.01" name="anorganik_rumah_tangga" class="form-control">
                    </div>
                    <div class="col-md-4">
                        <label class="form-label">Pasar (Kg)</label>
                        <input type="number" step="0.01" name="anorganik_pasar" class="form-control">
                    </div>
                    <div class="col-md-4">
                        <label class="form-label">Perkantoran (Kg)</label>
                        <input type="number" step="0.01" name="anorganik_kantor" class="form-control">
                    </div>
                </div>

                <h6 class="mt-4">Komposisi Sampah B3</h6>
                <div class="row mb-3">
                    <div class="col-md-4">
                        <label class="form-label">Rumah Tangga (Kg)</label>
                        <input type="number" step="0.01" name="b3_rumah_tangga" class="form-control">
                    </div>
                    <div class="col-md-4">
                        <label class="form-label">Pasar (Kg)</label>
                        <input type="number" step="0.01" name="b3_pasar" class="form-control">
                    </div>
                    <div class="col-md-4">
                        <label class="form-label">Perkantoran (Kg)</label>
                        <input type="number" step="0.01" name="b3_kantor" class="form-control">
                    </div>
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
</div>
@endsection
