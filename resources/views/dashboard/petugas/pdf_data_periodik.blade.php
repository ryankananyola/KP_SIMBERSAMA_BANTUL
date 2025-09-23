<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Laporan Periodik</title>
    <style>
        body { font-family: DejaVu Sans, sans-serif; font-size: 12px; }
        h2, h4 { text-align: center; margin: 0; padding: 4px 0; }
        table { width: 100%; border-collapse: collapse; margin-top: 15px; }
        th, td { border: 1px solid #000; padding: 6px; text-align: center; }
        th { background-color: #f2f2f2; }
        .mb-3 { margin-bottom: 15px; }
        .page-break { page-break-after: always; }

        /* Gaya untuk card biodata */
        .card {
            border: 1px solid #ccc;
            border-radius: 6px;
            padding: 10px 15px;
            background: #fafafa;
            margin: 10px 0 15px 0;
        }
        .card p {
            margin: 4px 0;
            font-size: 12px;
        }
        .card strong {
            display: inline-block;
            width: 90px;
        }
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
        <div class="mb-3">
            <h4 style="text-align:left">#{{ $index + 1 }} - {{ $item->user->nama_bank_sampah ?? '-' }}</h4>

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
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>Rumah Tangga</td>
                        <td>{{ $item->organik_rumah_tangga }}</td>
                        <td>{{ $item->anorganik_rumah_tangga }}</td>
                        <td>{{ $item->b3_rumah_tangga }}</td>
                    </tr>
                    <tr>
                        <td>Pasar</td>
                        <td>{{ $item->organik_pasar }}</td>
                        <td>{{ $item->anorganik_pasar }}</td>
                        <td>{{ $item->b3_pasar }}</td>
                    </tr>
                    <tr>
                        <td>Kantor</td>
                        <td>{{ $item->organik_kantor }}</td>
                        <td>{{ $item->anorganik_kantor }}</td>
                        <td>{{ $item->b3_kantor }}</td>
                    </tr>
                </tbody>
            </table>
        </div>

        {{-- Tambahkan page break jika bukan laporan terakhir --}}
        @if(!$loop->last)
            <div class="page-break"></div>
        @endif
    @endforeach
</body>
</html>
