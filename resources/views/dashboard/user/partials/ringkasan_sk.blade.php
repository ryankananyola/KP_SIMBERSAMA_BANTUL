<div class="card shadow-sm mb-4">
    <div class="card-header {{ $headerClass }} text-white">
        <h6 class="mb-0">Ringkasan Dokumen SK</h6>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered table-striped align-middle text-center">
                <thead class="table-light">
                    <tr>
                        <th>Jenis SK</th>
                        <th>No. SK</th>
                        <th>Diperlukan Oleh</th>
                        <th>Status</th>
                        <th>Struktur Organisasi</th>
                        <th>Kondisi Bangunan</th>
                        <th>Dibangun Oleh</th>
                        <th>Pihak yang Membangun</th>
                        <th>Tahun Pembangunan</th>
                        <th>Luas (m²)</th>
                        <th>Biaya Pembangunan</th>
                        <th>File SK</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>{{ $latestSK->sk ?? '-' }}</td>
                        <td>{{ $latestSK->no_sk ?? '-' }}</td>
                        <td>{{ $latestSK->diperlukan_oleh ?? '-' }}</td>
                        <td>{{ $latestSK->status ?? '-' }}</td>
                        <td>{{ $latestSK->struktur_organisasi ?? '-' }}</td>
                        <td>{{ $latestSK->kondisi_bangunan ?? '-' }}</td>
                        <td>{{ $latestSK->dibangun_oleh ?? '-' }}</td>
                        <td>{{ $latestSK->pihak_membangun ?? '-' }}</td>
                        <td>{{ $latestSK->tahun_pembangunan ?? '-' }}</td>
                        <td>{{ $latestSK->luas ?? '-' }}</td>
                        <td>Rp {{ number_format($latestSK->biaya_pembangunan ?? 0,0,',','.') }}</td>
                        <td>
                            @php $ext = pathinfo($latestSK->file_sk, PATHINFO_EXTENSION); @endphp
                            @if($latestSK->file_sk)
                                @if(in_array(strtolower($ext), ['jpg','jpeg','png','gif']))
                                    <img src="{{ asset('storage/' . $latestSK->file_sk) }}" 
                                         alt="File SK" 
                                         class="img-fluid rounded" style="max-height:120px">
                                @elseif(strtolower($ext) === 'pdf')
                                    <a href="{{ asset('storage/' . $latestSK->file_sk) }}" 
                                       target="_blank" 
                                       class="btn btn-sm btn-primary">
                                       Lihat PDF
                                    </a>
                                @else
                                    <a href="{{ asset('storage/' . $latestSK->file_sk) }}" 
                                       target="_blank" 
                                       class="btn btn-sm btn-primary">
                                       Download File
                                    </a>
                                @endif
                            @else
                                <span class="text-muted">Belum ada</span>
                            @endif
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>
