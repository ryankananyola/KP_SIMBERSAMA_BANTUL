@extends('layouts.layout_petugas')

@section('content')
<div class="container-fluid p-4">
    <h1 class="h3 mb-4 fw-bold text-center">Data Periodik</h1>
    <div class="card">
        <div class="card-body">
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
                            <td>
                                @if($item->periode == 1)
                                    (Januari - Juni)
                                @else
                                    (Juli - Desember)
                                @endif
                            </td>
                            <td>{{ $item->tahun }}</td>
                            <td class="text-center">
                                <a href="{{ route('petugas.data_periodik_petugas.show', $item->id) }}" class="btn btn-info btn-sm text-white">Detail</a>
                            </td>
                        </tr>
                    @endforeach
                    @if($laporan->isEmpty())
                        <tr><td colspan="5" class="text-center">Belum ada laporan periodik</td></tr>
                    @endif
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
