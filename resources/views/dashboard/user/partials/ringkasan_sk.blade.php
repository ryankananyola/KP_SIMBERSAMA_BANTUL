<div class="card shadow-sm mb-4">
    <div class="card-header {{ $headerClass ?? 'bg-primary' }} text-white">
        <h6 class="mb-0">Ringkasan Dokumen SK</h6>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered table-striped align-middle text-center">
                <thead class="table-light">
                    <tr>
                        <th>Jenis dan Nomor SK</th>
                        <th>Diperlukan Oleh</th>
                        <th>Penanggung Jawab</th>
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
                        <td>
                            {{ $latestSK->sk ?? '-' }} 
                            @if(!empty($latestSK->no_sk))
                                ({{ $latestSK->no_sk }})
                            @endif
                        </td>
                        <td>{{ $latestSK->diperlukan_oleh ?? '-' }}</td>
                        <td>{{ $latestSK->penanggung_jawab ?? '-' }}</td>
                        <td>{{ $latestSK->kondisi_bangunan ?? '-' }}</td>
                        <td>{{ $latestSK->dibangun_oleh ?? '-' }}</td>
                        <td>{{ $latestSK->pihak_membangun ?? '-' }}</td>
                        <td>{{ $latestSK->tahun_pembangunan ?? '-' }}</td>
                        <td>{{ $latestSK->luas ?? '-' }}</td>
                        <td>Rp {{ number_format($latestSK->biaya_pembangunan ?? 0,0,',','.') }}</td>
                        <td>
                             @if($latestSK->file_sk)
                                <button class="btn btn-sm btn-primary" data-bs-toggle="modal" data-bs-target="#modalFile{{ $latestSK->id }}">
                                    Lihat File
                                </button>

                                <div class="modal fade" id="modalFile{{ $latestSK->id }}" tabindex="-1" aria-hidden="true">
                                    <div class="modal-dialog modal-xl modal-dialog-centered">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title">File SK - {{ $latestSK->sk ?? 'Dokumen' }}</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body" style="height: 80vh;">
                                                <iframe src="{{ asset('storage/' . $latestSK->file_sk) }}" width="100%" height="100%" style="border: none;"></iframe>
                                            </div>
                                        </div>
                                    </div>
                                </div>
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
