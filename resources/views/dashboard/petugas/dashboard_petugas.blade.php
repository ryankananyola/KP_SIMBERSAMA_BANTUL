@extends('layouts.layout_petugas')

@section('content')
<div class="container-fluid p-4">
    <h1 class="h3 mb-4 fw-bold">Dashboard Petugas</h1>
    <div class="alert alert-info">Selamat datang di Dashboard Petugas SIMBERSAMA.</div>

    <!-- Menambahkan Grafik di sini -->
    <div class="row">
        <div class="col-md-6">
            <canvas id="jenisSampahChart"></canvas>
        </div>
        <div class="col-md-6">
            <canvas id="sumberSampahChart"></canvas>
        </div>
    </div>
</div>

<script>
// Ambil data dari controller
var laporanData = @json($laporan);

// Debugging: Pastikan data diterima dengan benar
console.log(laporanData);

// Data untuk grafik jenis sampah
var jenisSampahData = {
    labels: ['Rumah Tangga', 'Pasar', 'Kantor'],
    datasets: [
        {
            label: 'Organik',
            data: [
                laporanData.reduce((sum, item) => sum + item.organik_rumah_tangga, 0),
                laporanData.reduce((sum, item) => sum + item.organik_pasar, 0),
                laporanData.reduce((sum, item) => sum + item.organik_kantor, 0)
            ],
            backgroundColor: ['#FF5733', '#33FF57', '#FFFC33']
        },
        {
            label: 'Anorganik',
            data: [
                laporanData.reduce((sum, item) => sum + item.anorganik_rumah_tangga, 0),
                laporanData.reduce((sum, item) => sum + item.anorganik_pasar, 0),
                laporanData.reduce((sum, item) => sum + item.anorganik_kantor, 0)
            ],
            backgroundColor: ['#4CAF50', '#FFEB3B', '#FF9800']
        },
        {
            label: 'B3',
            data: [
                laporanData.reduce((sum, item) => sum + item.b3_rumah_tangga, 0),
                laporanData.reduce((sum, item) => sum + item.b3_pasar, 0),
                laporanData.reduce((sum, item) => sum + item.b3_kantor, 0)
            ],
            backgroundColor: ['#EC4899', '#14B8A6', '#8B5CF6']
        }
    ]
};

// Inisialisasi Grafik Jenis Sampah (Pie Chart)
var ctx1 = document.getElementById('jenisSampahChart').getContext('2d');
new Chart(ctx1, {
    type: 'pie',
    data: jenisSampahData,
    options: {
        responsive: true
    }
});

// Data untuk grafik sumber sampah
var sumberSampahData = {
    labels: ['Rumah Tangga', 'Pasar', 'Kantor'],
    datasets: [{
        label: 'Total Sampah',
        data: [
            laporanData.reduce((sum, item) => sum + item.organik_rumah_tangga + item.anorganik_rumah_tangga + item.b3_rumah_tangga, 0),
            laporanData.reduce((sum, item) => sum + item.organik_pasar + item.anorganik_pasar + item.b3_pasar, 0),
            laporanData.reduce((sum, item) => sum + item.organik_kantor + item.anorganik_kantor + item.b3_kantor, 0)
        ],
        backgroundColor: ['#FF5733', '#33FF57', '#FFFC33']
    }]
};

// Inisialisasi Grafik Sumber Sampah (Pie Chart)
var ctx2 = document.getElementById('sumberSampahChart').getContext('2d');
new Chart(ctx2, {
    type: 'pie',
    data: sumberSampahData,
    options: {
        responsive: true
    }
});
</script>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

@endsection
