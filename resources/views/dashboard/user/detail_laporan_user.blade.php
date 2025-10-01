@extends('layouts.layout_user')

@section('content')
<div class="container mt-4">
    <h4 class="mb-4">Detail Laporan Periodik</h4>

    <div class="card shadow-sm">
        <div class="card-body">
            <p><strong>Periode:</strong> 
                @if($laporan->periode == 1)
                    1 (Januari - Juni)
                @else
                    2 (Juli - Desember)
                @endif
                 {{ $laporan->tahun }}
            </p>
            <p><strong>Tanggal Pelaporan:</strong> {{ \Carbon\Carbon::parse($laporan->created_at)->translatedFormat('d F Y') }}</p>
            
            <h5 class="mt-4">Data Sampah</h5>

            <table class="table table-sm table-bordered mt-2">
                <thead class="table-secondary">
                    <tr>
                        <th>Sumber / Jenis</th>
                        <th>Organik (kg)</th>
                        <th>Anorganik (kg)</th>
                        <th>B3 (kg)</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <th>Rumah Tangga</th>
                        <td>{{ $laporan->organik_rumah_tangga }}</td>
                        <td>{{ $laporan->anorganik_rumah_tangga }}</td>
                        <td>{{ $laporan->b3_rumah_tangga }}</td>
                    </tr>
                    <tr>
                        <th>Pasar</th>
                        <td>{{ $laporan->organik_pasar }}</td>
                        <td>{{ $laporan->anorganik_pasar }}</td>
                        <td>{{ $laporan->b3_pasar }}</td>
                    </tr>
                    <tr>
                        <th>Kantor</th>
                        <td>{{ $laporan->organik_kantor }}</td>
                        <td>{{ $laporan->anorganik_kantor }}</td>
                        <td>{{ $laporan->b3_kantor }}</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>

    <div class="mt-3">
        <a href="{{ route('user.riwayat_laporan_user') }}" class="btn btn-secondary">
            Kembali
        </a>
    </div>
</div>
@endsection

<style>
    .table tbody td{
        text-align: center;
        vertical-align: middle;
      }
</style>