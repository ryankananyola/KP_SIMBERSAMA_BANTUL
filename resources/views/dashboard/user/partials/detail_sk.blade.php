<div class="modal fade" id="detailModal-{{ $sk->id }}" tabindex="-1" aria-labelledby="detailModalLabel-{{ $sk->id }}" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header bg-primary text-white">
                <h5 class="modal-title" id="detailModalLabel-{{ $sk->id }}">Detail SK</h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <table class="table table-bordered">
                    <tr>
                        <th>Jenis SK</th>
                        <td>{{ $sk->sk }}</td>
                    </tr>
                    <tr>
                        <th>No. SK</th>
                        <td>{{ $sk->no_sk }}</td>
                    </tr>
                    <tr>
                        <th>Diperlukan Oleh</th>
                        <td>{{ $sk->diperlukan_oleh }}</td>
                    </tr>
                    <tr>
                        <th>Kondisi Bangunan</th>
                        <td>{{ $sk->kondisi_bangunan }}</td>
                    </tr>
                    <tr>
                        <th>Tahun Pembangunan</th>
                        <td>{{ $sk->tahun_pembangunan }}</td>
                    </tr>
                    <tr>
                        <th>Luas (m²)</th>
                        <td>{{ $sk->luas }}</td>
                    </tr>
                    <tr>
                        <th>Biaya Pembangunan</th>
                        <td>{{ number_format($sk->biaya_pembangunan, 0, ',', '.') }}</td>
                    </tr>
                    <tr>
                        <th>File SK</th>
                        <td>
                            @if($sk->file_sk)
                                <a href="{{ asset('storage/' . $sk->file_sk) }}" target="_blank" class="btn btn-sm btn-primary">Lihat File</a>
                            @else
                                <span class="text-muted">Tidak ada file</span>
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <th>Status</th>
                        <td>{{ $sk->status ?? '-' }}</td>
                    </tr>
                </table>
            </div>
        </div>
    </div>
</div>
