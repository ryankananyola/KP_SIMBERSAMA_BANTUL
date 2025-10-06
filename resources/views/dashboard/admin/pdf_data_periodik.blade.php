<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Laporan Periodik</title>
    <style>
        body { font-family: DejaVu Sans, sans-serif; font-size: 12px; color: #333; }
        h2, h4 { text-align: center; margin: 0; padding: 4px 0; }

        .mb-3 { margin-bottom: 20px; }
        .page-break { page-break-after: always; }

        .card {
            border: 1px solid #ccc;
            border-radius: 6px;
            padding: 10px 15px;
            background: #fafafa;
            margin: 10px 0 15px 0;
        }
        .card p { margin: 3px 0; font-size: 12px; }
        .card strong { display: inline-block; width: 100px; }

        table { width: 100%; border-collapse: collapse; margin-top: 12px; }
        th, td { border: 1px solid #555; padding: 6px; text-align: center; }
        thead th { background-color: #2f5597; color: #fff; font-weight: bold; }
        tbody tr:nth-child(even) { background: #f9f9f9; }
        tfoot td { font-weight: bold; background: #eaf4e4; }
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

    @foreach($laporan as $index => $item)
        @php
            $rowTotalRumah = $item->organik_rumah_tangga + $item->anorganik_rumah_tangga + $item->b3_rumah_tangga;
            $rowTotalPasar = $item->organik_pasar + $item->anorganik_pasar + $item->b3_pasar;
            $rowTotalKantor = $item->organik_kantor + $item->anorganik_kantor + $item->b3_kantor;

            $totalOrganik = $item->organik_rumah_tangga + $item->organik_pasar + $item->organik_kantor;
            $totalAnorganik = $item->anorganik_rumah_tangga + $item->anorganik_pasar + $item->anorganik_kantor;
            $totalB3 = $item->b3_rumah_tangga + $item->b3_pasar + $item->b3_kantor;
            $grandTotal = $totalOrganik + $totalAnorganik + $totalB3;
        @endphp

        <div class="mb-3">
            <h4 style="text-align:left; margin-bottom:6px;">#{{ $index + 1 }} - {{ $item->user->nama_bank_sampah ?? '-' }}</h4>

            <div class="card">
                <p><strong>Pengelola</strong>: {{ $item->user->nama ?? '-' }}</p>
                <p><strong>Alamat</strong>: {{ $item->user->alamat ?? '-' }}</p>
                <p><strong>Padukuhan</strong>: {{ $item->user->padukuhan->nama ?? '-' }}</p>
                <p><strong>Kelurahan</strong>: {{ $item->user->kelurahan->nama ?? '-' }}</p>
                <p><strong>Kapanewon</strong>: {{ $item->user->kapanewon->nama ?? '-' }}</p>
            </div>

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
                        <td>{{ number_format($item->organik_rumah_tangga, 2) }}</td>
                        <td>{{ number_format($item->anorganik_rumah_tangga, 2) }}</td>
                        <td>{{ number_format($item->b3_rumah_tangga, 2) }}</td>
                        <td><strong>{{ number_format($rowTotalRumah, 2) }}</strong></td>
                    </tr>
                    <tr>
                        <td>Pasar</td>
                        <td>{{ number_format($item->organik_pasar, 2) }}</td>
                        <td>{{ number_format($item->anorganik_pasar, 2) }}</td>
                        <td>{{ number_format($item->b3_pasar, 2) }}</td>
                        <td><strong>{{ number_format($rowTotalPasar, 2) }}</strong></td>
                    </tr>
                    <tr>
                        <td>Kantor</td>
                        <td>{{ number_format($item->organik_kantor, 2) }}</td>
                        <td>{{ number_format($item->anorganik_kantor, 2) }}</td>
                        <td>{{ number_format($item->b3_kantor, 2) }}</td>
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
        </div>

        @if(!$loop->last)
            <div class="page-break"></div>
        @endif
    @endforeach
</body>
</html>
