@extends('layouts.layout_admin')

@section('content')
<div class="container-fluid p-4">
    <h1 class="h3 mb-4 fw-bold text-center">Data Periodik</h1>

    <div class="card mb-3">
        <div class="card-body">
            <form action="{{ route('admin.data_periodik') }}" method="GET" class="row g-3 align-items-end">
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
                    <a href="{{ route('admin.data_periodik') }}" class="btn btn-secondary">Reset</a>
                </div>
            </form>
        </div>
    </div>

    @if(request()->hasAny(['periode', 'tahun']))
        <div class="card">
            <div class="card-body">
                @if($laporan->isEmpty())
                    <div class="alert alert-warning text-center">
                        Tidak ada laporan periodik sesuai filter.
                    </div>
                @else
                    <table class="table table-borderless align-middle">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama User</th>
                                <th>Bulan</th>
                                <th>Tahun</th>
                                <th class="text-center">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($laporan as $index => $item)
                                <tr>
                                    <td>{{ $index + 1 }}</td>
                                    <td>{{ $item->user->nama ?? '-' }}</td>
                                    <td>{{ $item->periode == 1 ? 'Januari - Juni' : 'Juli - Desember' }}</td>
                                    <td>{{ $item->tahun }}</td>
                                    <td class="text-center">
                                        <a href="{{ route('admin.data_periodik.show', $item->id) }}" class="btn btn-info btn-sm text-white">Detail</a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
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
