@extends('layouts.layout_petugas')

@section('content')
<div class="container-fluid p-4">
    <h1 class="h3 mb-4 fw-bold">Detail Laporan Periodik</h1>

    @php
        $totalOrganik = $laporan->organik_rumah_tangga + $laporan->organik_pasar + $laporan->organik_kantor;
        $totalAnorganik = $laporan->anorganik_rumah_tangga + $laporan->anorganik_pasar + $laporan->anorganik_kantor;
        $totalB3 = $laporan->b3_rumah_tangga + $laporan->b3_pasar + $laporan->b3_kantor;
        $grandTotal = $totalOrganik + $totalAnorganik + $totalB3;
    @endphp

    <div class="card shadow-lg border-0 rounded-3">
        <div class="card-body">
            <table class="table table-hover table-bordered align-middle text-center">
                <thead class="table-dark">
                    <tr>
                        <th>Sumber / Jenis</th>
                        <th>Organik (kg)</th>
                        <th>Anorganik (kg)</th>
                        <th>B3 (kg)</th>
                        <th class="bg-secondary text-white">Total (kg)</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <th>Rumah Tangga</th>
                        <td>{{ number_format($laporan->organik_rumah_tangga, 2) }}</td>
                        <td>{{ number_format($laporan->anorganik_rumah_tangga, 2) }}</td>
                        <td>{{ number_format($laporan->b3_rumah_tangga, 2) }}</td>
                        <td class="fw-bold bg-light">
                            {{ number_format($laporan->organik_rumah_tangga + $laporan->anorganik_rumah_tangga + $laporan->b3_rumah_tangga, 2) }}
                        </td>
                    </tr>
                    <tr>
                        <th>Pasar</th>
                        <td>{{ number_format($laporan->organik_pasar, 2) }}</td>
                        <td>{{ number_format($laporan->anorganik_pasar, 2) }}</td>
                        <td>{{ number_format($laporan->b3_pasar, 2) }}</td>
                        <td class="fw-bold bg-light">
                            {{ number_format($laporan->organik_pasar + $laporan->anorganik_pasar + $laporan->b3_pasar, 2) }}
                        </td>
                    </tr>
                    <tr>
                        <th>Kantor</th>
                        <td>{{ number_format($laporan->organik_kantor, 2) }}</td>
                        <td>{{ number_format($laporan->anorganik_kantor, 2) }}</td>
                        <td>{{ number_format($laporan->b3_kantor, 2) }}</td>
                        <td class="fw-bold bg-light">
                            {{ number_format($laporan->organik_kantor + $laporan->anorganik_kantor + $laporan->b3_kantor, 2) }}
                        </td>
                    </tr>
                </tbody>
                <tfoot>
                    <tr class="table-success fw-bold">
                        <td>Total per Jenis</td>
                        <td>{{ number_format($totalOrganik, 2) }}</td>
                        <td>{{ number_format($totalAnorganik, 2) }}</td>
                        <td>{{ number_format($totalB3, 2) }}</td>
                        <td>{{ number_format($grandTotal, 2) }}</td>
                    </tr>
                </tfoot>
            </table>
        </div>
    </div>

    <div class="mt-3 text-end">
        <a href="{{ route('petugas.data_periodik.exportSinglePdf', $laporan->id) }}" 
           class="btn btn-danger shadow-sm" target="_blank">
            <i class="bi bi-file-earmark-pdf"></i> Export PDF
        </a>
        <a href="{{ route('petugas.data_periodik') }}" class="btn btn-secondary shadow-sm">
            <i class="bi bi-arrow-left"></i> Kembali
        </a>
    </div>
</div>
@endsection

<style>
.table th {
    background-color: #f8f9fa;
}
.table tfoot td {
    font-size: 1rem;
}
</style>
