<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Laporan Periodik</title>
    <style>
        body { font-family: DejaVu Sans, sans-serif; font-size: 12px; color:#333; }
        h2, h4 { text-align: center; margin: 0; padding: 4px 0; }
        .card { 
            border:1px solid #ccc; 
            padding:10px; 
            margin:10px 0; 
            background:#f9f9f9;
            border-radius: 6px;
        }
        .card p { margin:4px 0; }
        .card strong { display:inline-block; width:100px; }
        table { 
            width: 100%; 
            border-collapse: collapse; 
            margin-top: 15px; 
        }
        th, td { 
            border: 1px solid #555; 
            padding: 6px; 
            text-align: center; 
        }
        thead th { 
            background-color: #2f5597; 
            color: #fff; 
        }
        tfoot td { 
            font-weight: bold; 
            background: #eaf4e4; 
        }
        tbody tr:nth-child(even) { background: #f9f9f9; }
        tbody tr:hover { background: #f1f1f1; }
    </style>
</head>
<body>
    <h2>Laporan Periodik Bank Sampah</h2>
    <h4>
        Periode: 
        @if($periode == 1)
            Januari - Juni
        @elseif($periode == 2)
            Juli - Desember
        @else
            Semua Periode
        @endif
        | Tahun: {{ $tahun ?? 'Semua Tahun' }}
    </h4>

    <div class="card">
        <p><strong>Bank Sampah:</strong> {{ $laporan->user->nama_bank_sampah ?? '-' }}</p>
        <p><strong>Pengelola:</strong> {{ $laporan->user->nama ?? '-' }}</p>
        <p><strong>Alamat:</strong> {{ $laporan->user->alamat ?? '-' }}</p>
        <p><strong>Padukuhan:</strong> {{ $laporan->user->padukuhan->nama ?? '-' }}</p>
        <p><strong>Kelurahan:</strong> {{ $laporan->user->kelurahan->nama ?? '-' }}</p>
        <p><strong>Kapanewon:</strong> {{ $laporan->user->kapanewon->nama ?? '-' }}</p>
    </div>

    @php
        $rowTotalRumah = $laporan->organik_rumah_tangga + $laporan->anorganik_rumah_tangga + $laporan->b3_rumah_tangga;
        $rowTotalPasar = $laporan->organik_pasar + $laporan->anorganik_pasar + $laporan->b3_pasar;
        $rowTotalKantor = $laporan->organik_kantor + $laporan->anorganik_kantor + $laporan->b3_kantor;

        $totalOrganik = $laporan->organik_rumah_tangga + $laporan->organik_pasar + $laporan->organik_kantor;
        $totalAnorganik = $laporan->anorganik_rumah_tangga + $laporan->anorganik_pasar + $laporan->anorganik_kantor;
        $totalB3 = $laporan->b3_rumah_tangga + $laporan->b3_pasar + $laporan->b3_kantor;
        $grandTotal = $totalOrganik + $totalAnorganik + $totalB3;
    @endphp

    <table>
        <thead>
            <tr>
                <th>Sumber / Jenis</th>
                <th>Organik (kg)</th>
                <th>Anorganik (kg)</th>
                <th>B3 (kg)</th>
                <th>Total (kg)</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>Rumah Tangga</td>
                <td>{{ number_format($laporan->organik_rumah_tangga, 2) }}</td>
                <td>{{ number_format($laporan->anorganik_rumah_tangga, 2) }}</td>
                <td>{{ number_format($laporan->b3_rumah_tangga, 2) }}</td>
                <td><strong>{{ number_format($rowTotalRumah, 2) }}</strong></td>
            </tr>
            <tr>
                <td>Pasar</td>
                <td>{{ number_format($laporan->organik_pasar, 2) }}</td>
                <td>{{ number_format($laporan->anorganik_pasar, 2) }}</td>
                <td>{{ number_format($laporan->b3_pasar, 2) }}</td>
                <td><strong>{{ number_format($rowTotalPasar, 2) }}</strong></td>
            </tr>
            <tr>
                <td>Kantor</td>
                <td>{{ number_format($laporan->organik_kantor, 2) }}</td>
                <td>{{ number_format($laporan->anorganik_kantor, 2) }}</td>
                <td>{{ number_format($laporan->b3_kantor, 2) }}</td>
                <td><strong>{{ number_format($rowTotalKantor, 2) }}</strong></td>
            </tr>
        </tbody>
        <tfoot>
            <tr>
                <td>Total per Jenis</td>
                <td>{{ number_format($totalOrganik, 2) }}</td>
                <td>{{ number_format($totalAnorganik, 2) }}</td>
                <td>{{ number_format($totalB3, 2) }}</td>
                <td>{{ number_format($grandTotal, 2) }}</td>
            </tr>
        </tfoot>
    </table>
</body>
</html>
