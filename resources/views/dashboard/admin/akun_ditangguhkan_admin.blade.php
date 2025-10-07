@extends('layouts.layout_admin')

@section('content')
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">

<div class="container-fluid p-4">
    <h1 class="h3 mb-4 fw-bold text-center">Daftar Akun Ditangguhkan</h1>
    <div class="card shadow">
        <div class="card-body">
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
                        @php $isActive = $item->status === 'Aktif'; @endphp
                        <tr>
                            <td>
                                <div class="d-flex flex-column gap-2">
                                    {{ $index + 1 }}
                                </div>
                            </td>

                            <td>
                                <div class="d-flex flex-column gap-2">
                                    <span class="fw-semibold">{{ $item->user->username }}</span>
                                </div>
                            </td>

                            <td>
                                <div class="d-flex flex-column gap-2">
                                    {{ $item->user->nama_bank_sampah ?? '-' }}
                                </div>
                            </td>

                            <td>
                                <div class="d-flex flex-column gap-2">
                                    <a href="{{ route('admin.akun_ditangguhkan_admin.show', $item->id) }}" 
                                        class="btn {{ in_array($item->status, ['Diterima','Survey','Aktif']) 
                                            ? 'btn-secondary disabled' 
                                            : 'btn-info text-white' }}">
                                        Cek Dokumen
                                    </a>
                                </div>
                            </td>

                            <td>
                                <div class="d-flex flex-column gap-2">
                                    @if($item->status == 'Pending')
                                        <span class="badge rounded-pill px-3 py-2 bg-danger-subtle text-danger fw-semibold">
                                            <i class="bi bi-hourglass-split me-1"></i> Menunggu Verifikasi Dokumen
                                        </span>
                                    @elseif($item->status == 'Diterima')
                                        <span class="badge rounded-pill px-3 py-2 bg-warning-subtle text-warning fw-semibold">
                                            <i class="bi bi-clipboard-check me-1"></i> Menunggu Survey
                                        </span>
                                    @elseif($item->status == 'Aktif')
                                        <span class="badge rounded-pill px-3 py-2 bg-primary-subtle text-primary fw-semibold">
                                            <i class="bi bi-person-check me-1"></i> Akun Aktif
                                        </span>
                                    @else
                                        <span class="badge rounded-pill px-3 py-2 bg-secondary-subtle text-secondary fw-semibold">
                                            <i class="bi bi-question-circle me-1"></i> {{ $item->status }}
                                        </span>
                                    @endif
                                </div>
                            </td>

                            <td>
                                <div class="d-flex flex-column gap-2">
                                    @if(is_null($item->survey_date))
                                        <span class="badge rounded-pill bg-secondary-subtle text-secondary fw-semibold">
                                            <i class="bi bi-calendar-x me-1"></i> Belum Dijadwalkan
                                        </span>
                                    @elseif($item->status_survey == 'Menunggu')
                                        <span class="badge rounded-pill bg-warning-subtle text-warning fw-semibold">
                                            <i class="bi bi-clock-history me-1"></i> Menunggu Survey
                                        </span>
                                    @elseif($item->status_survey == 'Layak')
                                        <span class="badge rounded-pill bg-success-subtle text-success fw-semibold">
                                            <i class="bi bi-check-circle me-1"></i> Selesai
                                        </span>
                                    @elseif($item->status_survey == 'Perlu Perbaikan')
                                        <span class="badge rounded-pill bg-danger-subtle text-danger fw-semibold">
                                            <i class="bi bi-tools me-1"></i> Perlu Perbaikan
                                        </span>
                                    @else
                                        <span class="badge rounded-pill bg-dark-subtle text-dark fw-semibold">
                                            <i class="bi bi-question-circle me-1"></i> {{ $item->status_survey ?? $item->status }}
                                        </span>
                                    @endif

                                    <form action="{{ route('admin.akun_ditangguhkan_admin.setSurvey', $item->id) }}" method="POST" class="d-flex flex-column gap-2">
                                        @csrf
                                        @method('PUT')
                                        <input type="text" name="survey_date" 
                                            class="form-control datetimepicker"
                                            placeholder="Pilih Tanggal & Jam" 
                                            value="{{ $item->survey_date ?? '' }}"
                                            {{ $isActive ? 'disabled style=background-color:#e9ecef;' : 'required' }}>

                                        @if($isActive)
                                            <input type="hidden" name="survey_date" value="{{ $item->survey_date }}">
                                        @endif

                                        <button type="submit" class="btn w-100"
                                            style="background-color: {{ $isActive ? '#6c757d' : '#20b2aa' }}; color:white;"
                                            {{ $isActive ? 'disabled' : '' }}>
                                            @if($isActive)
                                                <i class="bi bi-person-check me-1"></i> Akun Aktif
                                            @elseif($item->status == 'Diterima' && empty($item->survey_date))
                                                <i class="bi bi-calendar-plus me-1"></i> Simpan Jadwal
                                            @elseif($item->status == 'Survey' && !empty($item->survey_date))
                                                <i class="bi bi-calendar2-event me-1"></i> Revisi Jadwal
                                            @else
                                                <i class="bi bi-calendar-plus me-1"></i> Simpan Jadwal
                                            @endif
                                        </button>

                                    </form>
                                </div>
                            </td>

                            @php $isActive = $item->status === 'Aktif'; @endphp

                            <td>
                                <form action="{{ route('admin.akun_ditangguhkan_admin.setHasilSurvey', $item->id) }}" method="POST" class="hasil-survey-form">
                                    @csrf
                                    @method('PUT')

                                    <select name="survey_result" 
                                        class="form-control mb-2 survey-result" 
                                        data-id="{{ $item->id }}"
                                        {{ $isActive ? 'disabled style=background-color:#e9ecef;' : 'required' }}>
                                        <option value="">-- Pilih Hasil --</option>
                                        <option value="Layak" {{ $item->survey_result == 'Layak' ? 'selected' : '' }}>Layak</option>
                                        <option value="Perlu Perbaikan" {{ $item->survey_result == 'Perlu Perbaikan' ? 'selected' : '' }}>Perlu Perbaikan</option>
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
            <div class="table-responsive">
            <div class="d-flex justify-content-center mt-3">
                {{ $data->links('pagination::bootstrap-5') }}
            </div>
            <div class="modal fade" id="modalCatatan" tabindex="-1" aria-labelledby="modalCatatanLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                <div class="modal-header bg-warning">
                    <h5 class="modal-title" id="modalCatatanLabel">Catatan Admin</h5>
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
<style>
    .btn {
        border-radius: 12px;
        transition: all 0.3s ease-in-out;
    }

    .btn:hover {
        transform: translateY(-2px);
        box-shadow: 0 6px 16px rgba(0,0,0,0.15);
    }

    .btn-success {
        background: linear-gradient(45deg, #28a745, #20c997);
        border: none;
    }

    .btn-primary {
        background: linear-gradient(45deg, #007bff, #00b4d8);
        border: none;
    }

    .btn-info {
        background: linear-gradient(45deg, #17a2b8, #20c997);
        border: none;
    }

    .btn-secondary {
        background: #6c757d;
        border: none;
        opacity: 0.8;
    }

    .btn i {
        font-size: 1rem;
    }
</style>

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
