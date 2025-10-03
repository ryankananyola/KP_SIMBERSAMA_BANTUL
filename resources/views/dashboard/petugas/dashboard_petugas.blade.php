@extends('layouts.layout_petugas')

@section('content')
<div class="container-fluid p-4">
    <h1 class="h3 mb-4 fw-bold">Dashboard Petugas</h1>

    <div class="card shadow-sm">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h5 class="mb-0">Rekapitulasi Komposisi Sampah</h5>
            <a href="{{ route('petugas.data_periodik') }}" class="btn btn-sm btn-primary">
                <i class="bi bi-file-earmark-bar-graph"></i> Recap
            </a>
        </div>
        <div class="card-body">
            <div class="row g-3">
                <div class="col-12 col-md-6">
                    <div class="card shadow-sm h-100">
                        <div class="card-header">
                            <h6 class="mb-0">Komposisi Berdasarkan Jenis Sampah</h6>
                        </div>
                        <div class="card-body">
                            <div style="position: relative; height:300px; width:100%;">
                                <canvas id="jenisSampahChart"></canvas>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-12 col-md-6">
                    <div class="card shadow-sm h-100">
                        <div class="card-header">
                            <h6 class="mb-0">Komposisi Berdasarkan Sumber Sampah</h6>
                        </div>
                        <div class="card-body">
                            <div style="position: relative; height:300px; width:100%;">
                                <canvas id="sumberSampahChart"></canvas>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script src="https://cdn.jsdelivr.net/npm/chartjs-plugin-datalabels@2"></script>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">

<script>
    var laporanData = @json($laporan);
    console.log("Laporan Data:", laporanData);

    function getPercentage(value, allData) {
        let total = allData.reduce((a, b) => a + b, 0);
        return ((value / total) * 100).toFixed(1) + "%";
    }

    var jenisData = [
        (+laporanData.organik_rumah_tangga) + (+laporanData.organik_pasar) + (+laporanData.organik_kantor),
        (+laporanData.anorganik_rumah_tangga) + (+laporanData.anorganik_pasar) + (+laporanData.anorganik_kantor),
        (+laporanData.b3_rumah_tangga) + (+laporanData.b3_pasar) + (+laporanData.b3_kantor)
    ];

    new Chart(document.getElementById('jenisSampahChart').getContext('2d'), {
        type: 'pie',
        data: {
            labels: ['Organik', 'Anorganik', 'B3'],
            datasets: [{
                data: jenisData,
                backgroundColor: ['#4CAF50', '#FFC107', '#E91E63']
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            plugins: {
                legend: { position: 'bottom' },
                datalabels: {
                    color: '#fff',
                    font: { weight: 'bold' },
                    formatter: (value, ctx) => {
                        let allData = ctx.chart.data.datasets[0].data;
                        return getPercentage(value, allData);
                    }
                }
            }
        },
        plugins: [ChartDataLabels]
    });

    var sumberData = [
        (+laporanData.organik_rumah_tangga) + (+laporanData.anorganik_rumah_tangga) + (+laporanData.b3_rumah_tangga),
        (+laporanData.organik_pasar) + (+laporanData.anorganik_pasar) + (+laporanData.b3_pasar),
        (+laporanData.organik_kantor) + (+laporanData.anorganik_kantor) + (+laporanData.b3_kantor)
    ];

    new Chart(document.getElementById('sumberSampahChart').getContext('2d'), {
        type: 'pie',
        data: {
            labels: ['Rumah Tangga', 'Pasar', 'Kantor'],
            datasets: [{
                data: sumberData,
                backgroundColor: ['#FF5733', '#33FF57', '#3357FF']
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            plugins: {
                legend: { position: 'bottom' },
                datalabels: {
                    color: '#fff',
                    font: { weight: 'bold' },
                    formatter: (value, ctx) => {
                        let allData = ctx.chart.data.datasets[0].data;
                        return getPercentage(value, allData);
                    }
                }
            }
        },
        plugins: [ChartDataLabels]
    });
</script>

<style>
    canvas {
        width: 100% !important;
        height: auto !important;
    }
</style>
@endsection
