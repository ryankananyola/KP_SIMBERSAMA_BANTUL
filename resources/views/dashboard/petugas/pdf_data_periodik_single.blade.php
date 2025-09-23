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
        .card { border:1px solid #ccc; padding:10px; margin-bottom:10px; background:#fafafa; }
        .card p { margin:4px 0; }
        .card strong { display:inline-block; width:90px; }
    </style>
</head>
<body>
    <h2>Laporan Periodik Bank Sampah</h2>

    <div class="card">
        <p><strong>Bank Sampah:</strong> {{ $laporan->user->nama_bank_sampah ?? '-' }}</p>
        <p><strong>Pengelola:</strong> {{ $laporan->user->nama ?? '-' }}</p>
        <p><strong>Alamat:</strong> {{ $laporan->user->alamat ?? '-' }}</p>
        <p><strong>Padukuhan:</strong> {{ $laporan->user->padukuhan->nama ?? '-' }}</p>
        <p><strong>Kelurahan:</strong> {{ $laporan->user->kelurahan->nama ?? '-' }}</p>
        <p><strong>Kapanewon:</strong> {{ $laporan->user->kapanewon->nama ?? '-' }}</p>
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
                <td>{{ $laporan->organik_rumah_tangga }}</td>
                <td>{{ $laporan->anorganik_rumah_tangga }}</td>
                <td>{{ $laporan->b3_rumah_tangga }}</td>
            </tr>
            <tr>
                <td>Pasar</td>
                <td>{{ $laporan->organik_pasar }}</td>
                <td>{{ $laporan->anorganik_pasar }}</td>
                <td>{{ $laporan->b3_pasar }}</td>
            </tr>
            <tr>
                <td>Kantor</td>
                <td>{{ $laporan->organik_kantor }}</td>
                <td>{{ $laporan->anorganik_kantor }}</td>
                <td>{{ $laporan->b3_kantor }}</td>
            </tr>
        </tbody>
    </table>
</body>
</html>
