<tr>
    <td>
        {{ $sk->sk ?? '-' }}
        @if(!empty($sk->no_sk))
            ({{ $sk->no_sk }})
        @endif
    </td>
    <td>{{ $sk->diperlukan_oleh ?? '-' }}</td>
    <td>{{ $sk->penanggung_jawab ?? '-' }}</td>
    <td>{{ $sk->kondisi_bangunan ?? '-' }}</td>
    <td>{{ $sk->dibangun_oleh ?? '-' }}</td>
    <td>{{ $sk->pihak_membangun ?? '-' }}</td>
    <td>{{ $sk->tahun_pembangunan ?? '-' }}</td>
    <td>{{ $sk->luas ?? '-' }}</td>
    <td>Rp {{ number_format($sk->biaya_pembangunan ?? 0,0,',','.') }}</td>
    <td>
        @if($sk->file_sk)
            <button class="btn btn-sm btn-primary" data-bs-toggle="modal" data-bs-target="#modalFile{{ $sk->id }}">
                Lihat File
            </button>

            <div class="modal fade" id="modalFile{{ $sk->id }}" tabindex="-1" aria-hidden="true">
                <div class="modal-dialog modal-xl modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">File SK - {{ $sk->sk ?? 'Dokumen' }}</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body" style="height: 80vh;">
                            <iframe src="{{ asset('storage/' . $sk->file_sk) }}" width="100%" height="100%" style="border: none;"></iframe>
                        </div>
                    </div>
                </div>
            </div>
        @else
            <span class="text-muted">Belum ada</span>
        @endif
    </td>
</tr>
