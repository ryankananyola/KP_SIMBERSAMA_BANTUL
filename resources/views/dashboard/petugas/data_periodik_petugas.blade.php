@extends('layouts.layout_petugas')

@section('content')
<div class="container-fluid p-4">
    <h1 class="h3 mb-4 fw-bold text-center">Data Periodik</h1>

    {{-- Filter --}}
    <div class="card mb-3">
        <div class="card-body">
            <form action="{{ route('petugas.data_periodik') }}" method="GET" class="row g-3 align-items-end">
                <div class="col-md-4">
                    <label for="periode" class="form-label">Periode</label>
                    <select name="periode" id="periode" class="form-select">
                        <option value="">Semua Periode</option>
                        <option value="1" {{ request('periode') == '1' ? 'selected' : '' }}>Januari - Juni</option>
                        <option value="2" {{ request('periode') == '2' ? 'selected' : '' }}>Juli - Desember</option>
                    </select>
                </div>
                <div class="col-md-4">
                    <label for="tahun" class="form-label">Tahun</label>
                    <select name="tahun" id="tahun" class="form-select">
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
                <div class="col-md-4">
                    <button type="submit" class="btn btn-primary">Filter</button>
                    <a href="{{ route('petugas.data_periodik') }}" class="btn btn-secondary">Reset</a>
                </div>
            </form>
        </div>
    </div>

    {{-- Jika sudah pilih filter --}}
    @if(request()->hasAny(['periode', 'tahun']))
        {{-- Tabel Sudah Isi --}}
        <div class="card mb-4">
            <div class="card-header bg-success text-white fw-bold">
                User yang Sudah Isi Laporan
            </div>
            <div class="card-body">
                @if($laporan->isEmpty())
                    <div class="alert alert-warning text-center">
                        Tidak ada user yang sudah mengisi laporan pada periode ini.
                    </div>
                @else
                    <table class="table table-bordered align-middle">
                        <thead class="table-light">
                            <tr>
                                <th>No</th>
                                <th>Nama User</th>
                                <th>Periode</th>
                                <th>Tahun</th>
                                <th class="text-center">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($laporan as $item)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $item->user->nama ?? '-' }}</td>
                                    <td>{{ $item->periode == 1 ? 'Januari - Juni' : 'Juli - Desember' }}</td>
                                    <td>{{ $item->tahun }}</td>
                                    <td class="text-center">
                                        <a href="{{ route('petugas.data_periodik.show', $item->id) }}" class="btn btn-info btn-sm text-white">Detail</a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                @endif
            </div>
        </div>

        <div class="card">
            <div class="card-header bg-danger text-white fw-bold">
                User yang Belum Isi Laporan
            </div>
            <div class="card-body">
                @if($belumIsi->isEmpty())
                    <div class="alert alert-success text-center">
                        Semua user sudah mengisi laporan pada periode ini 🎉
                    </div>
                @else
                    <div class="table-responsive">
                        <table class="table table-bordered align-middle">
                            <thead class="table-light">
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
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $user->nama_bank_sampah ?? '-' }}</td>
                                        <td>{{ $user->nama ?? '-' }}</td>
                                        <td>{{ $user->email ?? '-' }}</td>
                                        <td>{{ $user->nomor_wa ?? '-' }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                @endif
            </div>
        </div>
    @else
        <div class="alert alert-info text-center">
            Silakan pilih filter periode dan/atau tahun untuk menampilkan data.
        </div>
    @endif
</div>
@endsection
