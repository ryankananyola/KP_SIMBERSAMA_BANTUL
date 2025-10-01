@extends('layouts.layout_admin')

@section('content')
<div class="container-fluid p-4">
    <h1 class="h3 mb-4 fw-bold">Detail Laporan Periodik</h1>
            <table class="table table-sm table-bordered mt-2">
                <thead class="table-secondary">
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
    <div class="mt-3 text-end">
        <a href="{{ route('admin.data_periodik.exportSinglePdf', $laporan->id) }}" class="btn btn-danger" target="_blank">
            Export PDF
        </a>
        <a href="{{ route('admin.data_periodik') }}" class="btn btn-secondary">Kembali</a>
    </div>
</div>
@endsection

<style>
.table tbody td{
    text-align: center;
    vertical-align: middle;
  }
</style>