@extends('layouts.layout_admin')

@section('content')
<div class="container-fluid p-4">
    <h1 class="h3 mb-4 fw-bold text-center text-dark">Data Periodik Bank Sampah</h1>

    <div class="card shadow-sm border-0 mb-4">
        <div class="card-body">
            <form action="{{ route('admin.data_periodik') }}" method="GET" class="row g-3 align-items-end">
                <div class="col-md-4">
                    <label for="periode" class="form-label fw-semibold">Periode</label>
                    <select name="periode" id="periode" class="form-select border-success">
                        <option value="">Semua Periode</option>
                        <option value="1" {{ request('periode') == '1' ? 'selected' : '' }}>Januari - Juni</option>
                        <option value="2" {{ request('periode') == '2' ? 'selected' : '' }}>Juli - Desember</option>
                    </select>
                </div>
                <div class="col-md-4">
                    <label for="tahun" class="form-label fw-semibold">Tahun</label>
                    <select name="tahun" id="tahun" class="form-select border-success">
                        <option value="">Semua Tahun</option>
                        @php
                            $currentYear = date('Y');
                            $startYear = 2020; 
                        @endphp
                        @for($year = $startYear; $year <= $currentYear; $year++)
                            <option value="{{ $year }}" {{ request('tahun') == $year ? 'selected' : '' }}>
                                {{ $year }}
                            </option>
                        @endfor
                    </select>
                </div>
                <div class="col-md-4 text-end">
                    <button type="submit" class="btn btn-success me-2 px-4 shadow-sm">
                        <i class="bi bi-funnel"></i> Filter
                    </button>
                    <a href="{{ route('admin.data_periodik') }}" class="btn btn-outline-secondary px-4 shadow-sm">
                        <i class="bi bi-arrow-counterclockwise"></i> Reset
                    </a>
                </div>
            </form>
        </div>
    </div>

    <div class="mb-3 text-end">
        <a href="{{ route('admin.data_periodik.exportPdf', request()->only(['periode', 'tahun'])) }}" 
           class="btn btn-danger px-4 shadow-sm">
           <i class="bi bi-file-earmark-pdf-fill"></i> Export PDF
        </a>
    </div>

    @if($laporan->count() || $belumIsi->count())
        <div class="card shadow-sm border-0 mb-4">
            <div class="card-header bg-success text-white fw-bold">
                Bank Sampah yang Sudah Isi Laporan
            </div>
            <div class="card-body">
                @if($laporan->isEmpty())
                    <div class="alert alert-warning text-center mb-0">
                        Tidak ada bank sampah yang sudah mengisi laporan pada periode ini.
                    </div>
                @else
                    <div class="table-responsive">
                        <table class="table table-hover align-middle">
                            <thead class="table-light text-center">
                                <tr>
                                    <th>No</th>
                                    <th>Nama Bank Sampah</th>
                                    <th>Periode</th>
                                    <th>Tahun</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($laporan as $item)
                                    <tr>
                                        <td class="text-center">{{ $loop->iteration }}</td>
                                        <td>{{ $item->user->nama_bank_sampah ?? '-' }}</td>
                                        <td class="text-center">
                                            <span class="badge bg-success bg-opacity-75">
                                                {{ $item->periode == 1 ? 'Januari - Juni' : 'Juli - Desember' }}
                                            </span>
                                        </td>
                                        <td class="text-center">{{ $item->tahun }}</td>
                                        <td class="text-center">
                                            <a href="{{ route('admin.data_periodik.show', $item->id) }}" 
                                               class="btn btn-info btn-sm text-white shadow-sm">
                                                <i class="bi bi-eye-fill"></i> Detail
                                            </a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="d-flex justify-content-end mt-3">
                        {{ $laporan->appends(request()->query())->links('pagination::bootstrap-5') }}
                    </div>
                @endif
            </div>
        </div>

        <div class="card shadow-sm border-0">
            <div class="card-header bg-danger text-white fw-bold">
                Bank Sampah yang Belum Isi Laporan
            </div>
            <div class="card-body">
                @if($belumIsi->isEmpty())
                    <div class="alert alert-success text-center mb-0">
                        Semua Bank Sampah sudah mengisi laporan pada periode ini 🎉
                    </div>
                @else
                    <div class="table-responsive">
                        <table class="table table-hover align-middle">
                            <thead class="table-light text-center">
                                <tr>
                                    <th>No</th>
                                    <th>Nama Bank Sampah</th>
                                    <th>Nama Pengelola</th>
                                    <th>Email</th>
                                    <th>No WhatsApp</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($belumIsi as $user)
                                    <tr>
                                        <td class="text-center">{{ $loop->iteration }}</td>
                                        <td>{{ $user->nama_bank_sampah ?? '-' }}</td>
                                        <td>{{ $user->nama ?? '-' }}</td>
                                        <td>{{ $user->email ?? '-' }}</td>
                                        <td>{{ $user->nomor_wa ?? '-' }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <div class="d-flex justify-content-end mt-3">
                            {{ $belumIsi->appends(request()->query())->links('pagination::bootstrap-5') }}
                        </div>
                    </div>
                @endif
            </div>
        </div>
    @else
        <div class="alert alert-info text-center shadow-sm">
            <i class="bi bi-info-circle"></i> Silakan pilih filter periode dan/atau tahun untuk menampilkan data.
        </div>
    @endif
</div>
@endsection
