@extends('layouts.layout_petugas')

@section('content')
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">

<div class="container-fluid p-4">
    <h1 class="h3 mb-4 fw-bold text-center">Daftar Akun Ditangguhkan</h1>
    <div class="card shadow">
        <div class="card-body">
            <div class="table-responsive">
            <table class="table table-bordered align-middle text-center">
                <thead class="table-light">
                    <tr>
                        <th>No</th>
                        <th>Username</th>
                        <th>Nama Bank Sampah</th>
                        <th>Aksi</th>
                        <th>Status</th>
                        <th>Survei</th>
                        <th>Hasil Survei</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($data as $index => $item)
                        <tr>
                            <td>{{ $index + 1 }}</td>
                            <td>{{ $item->user->username }}</td>
                            <td>{{ $item->user->nama_bank_sampah ?? '-' }}</td>
                                <td>
                                    <a href="{{ route('petugas.akun_ditangguhkan.show', $item->id) }}" 
                                    class="btn {{ in_array($item->status, ['Diterima','Survey','Aktif']) 
                                                    ? 'btn-secondary disabled' 
                                                    : 'btn-info text-white' }}">
                                        Cek Dokumen
                                    </a>
                                </td>
                            <td>
                                @if($item->status == 'Pending')
                                    <span class="btn btn-danger w-100">Menunggu Verifikasi Dokumen</span>
                                @elseif($item->status == 'Diterima')
                                    <span class="btn btn-warning w-100">Menunggu Survey</span>
                                @elseif($item->status == 'Aktif')
                                    <span class="btn btn-primary w-100">Akun Aktif</span>
                                @else
                                    <span class="btn btn-secondary w-100">{{ $item->status }}</span>
                                @endif
                            </td>
                            <td>
                                @if(is_null($item->survey_date))
                                    <span class="badge bg-secondary mb-2">Belum Dijadwalkan</span>
                                @elseif($item->status_survey == 'Menunggu')
                                    <span class="badge bg-warning mb-2">Menunggu Survey</span>
                                @elseif($item->status_survey == 'Layak')
                                    <span class="badge bg-success mb-2">Layak</span>
                                @elseif($item->status_survey == 'Perlu Perbaikan')
                                    <span class="badge bg-danger mb-2">Perlu Perbaikan</span>
                                @else
                                    <span class="badge bg-dark mb-2">{{ $item->status_survey ?? $item->status }}</span>
                                @endif

                                @php $isActive = $item->status === 'Aktif'; @endphp
                                <form action="{{ route('petugas.akun_ditangguhkan.setSurvey', $item->id) }}" method="POST">
                                    @csrf
                                    @method('PUT')
                                    <input type="text" name="survey_date" 
                                        class="form-control datetimepicker mb-2" 
                                        placeholder="Pilih Tanggal & Jam" 
                                        value="{{ $item->survey_date ?? '' }}"
                                        {{ $isActive ? 'disabled style=background-color:#e9ecef;' : 'required' }}>
                                    @if($isActive)
                                        <input type="hidden" name="survey_date" value="{{ $item->survey_date }}">
                                    @endif
                                    @php
                                        $hasSchedule = !is_null($item->survey_date); 
                                    @endphp
                                    <button type="submit" class="btn w-100" 
                                        style="background-color: {{ $isActive ? '#6c757d' : '#20b2aa' }}; color:white;" 
                                        {{ $isActive ? 'disabled' : '' }}>
                                        @if($isActive)
                                            Akun Aktif
                                        @elseif($hasSchedule)
                                            Revisi Jadwal
                                        @else
                                            Simpan Jadwal
                                        @endif
                                    </button>
                                </form>
                            </td>

                            <td>
                                <form action="{{ route('petugas.akun_ditangguhkan.setHasilSurvey', $item->id) }}" method="POST" class="hasil-survey-form">
                                    @csrf
                                    @method('PUT')

                                    <select name="survey_result" class="form-control mb-2 survey-result" data-id="{{ $item->id }}"
                                        {{ $isActive ? 'disabled style=background-color:#e9ecef;' : 'required' }}>
                                        <option value="">-- Pilih Hasil --</option>
                                        <option value="Layak" {{ $isActive && $item->survey_result == 'Layak' ? 'selected' : '' }}>Layak</option>
                                        <option value="Perlu Perbaikan" {{ $isActive && $item->survey_result == 'Perlu Perbaikan' ? 'selected' : '' }}>Perlu Perbaikan</option>
                                    </select>

                                    <input type="hidden" name="catatan_petugas" id="catatan-{{ $item->id }}">

                                    <button type="submit" class="btn w-100"
                                        style="background-color: {{ $isActive ? '#6c757d' : '#20b2aa' }}; color:white;"
                                        {{ $isActive ? 'disabled' : '' }}>
                                        {{ $isActive ? 'Akun Aktif' : 'Simpan Hasil' }}
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach

                    @if ($data->isEmpty())
                        <tr>
                            <td colspan="7" class="text-center text-muted">Tidak ada akun ditangguhkan</td>
                        </tr>
                    @endif
                </tbody>
            </table>
            <div class="d-flex justify-content-center mt-3">
                {{ $data->links('pagination::bootstrap-5') }}
            </div>

            <div class="modal fade" id="modalCatatan" tabindex="-1" aria-labelledby="modalCatatanLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                <div class="modal-header bg-warning">
                    <h5 class="modal-title" id="modalCatatanLabel">Catatan Petugas</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <textarea id="inputCatatan" class="form-control" rows="4" placeholder="Tuliskan catatan perbaikan..."></textarea>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                    <button type="button" class="btn btn-success" id="simpanCatatan">Simpan Catatan</button>
                </div>
                </div>
            </div>
            </div>

            </div>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
<script>
    flatpickr(".datetimepicker", {
        enableTime: true,
        dateFormat: "Y-m-d H:i", 
        time_24hr: true,
        minDate: "today"
    });
</script>
<script>
document.addEventListener('DOMContentLoaded', function () {
    let currentId = null;

    document.querySelectorAll('.survey-result').forEach(select => {
        select.addEventListener('change', function() {
            if (this.value === 'Perlu Perbaikan') {
                currentId = this.getAttribute('data-id');
                var modal = new bootstrap.Modal(document.getElementById('modalCatatan'));
                modal.show();
            }
        });
    });

    document.getElementById('simpanCatatan').addEventListener('click', function() {
        const catatan = document.getElementById('inputCatatan').value.trim();
        if (!catatan) {
            alert("Catatan harus diisi!");
            return;
        }
        document.getElementById('catatan-' + currentId).value = catatan;

        var modalEl = document.getElementById('modalCatatan');
        var modal = bootstrap.Modal.getInstance(modalEl);
        modal.hide();
    });
});
</script>


@endsection
