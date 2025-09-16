@extends('layouts.layout_user')

@section('content')
<div class="container mt-4">
    <h4 class="mb-4">Riwayat Laporan Periodik</h4>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <div class="table-responsive">
        <table class="table table-bordered table-striped align-middle">
            <thead class="table-success">
                <tr>
                    <th class="text-center" style="width: 60px;">No</th>
                    <th class="text-center">Tanggal Pelaporan</th>
                    <th class="text-center">Periode</th>
                    <th class="text-center" style="width: 120px;">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse($laporan as $index => $item)
                    <tr>
                        <td class="text-center">{{ $index + 1 }}</td>
                        <td>{{ \Carbon\Carbon::parse($item->created_at)->translatedFormat('d F Y') }}</td>
                        <td>Periode {{ $item->periode }} - {{ $item->tahun }}</td>
                        <td class="text-center">
                            <a href="{{ route('user.detail_laporan_user', $item->id) }}" class="btn btn-sm btn-primary">
                                Detail
                            </a>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="4" class="text-center">Belum ada laporan periodik</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection
