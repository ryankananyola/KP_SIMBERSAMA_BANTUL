@extends('layouts.layout_admin')

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
                                <a href="{{ route('admin.akun_ditangguhkan_admin.show', $item->id) }}" 
                                   class="btn btn-info text-white">
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
                                @php $isActive = $item->status === 'Aktif'; @endphp
                                <form action="{{ route('admin.akun_ditangguhkan_admin.setSurvey', $item->id) }}" method="POST">
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
                                    <button type="submit" class="btn w-100" 
                                        style="background-color: {{ $isActive ? '#6c757d' : '#20b2aa' }}; color:white;" 
                                        {{ $isActive ? 'disabled' : '' }}>
                                        {{ $isActive ? 'Akun Aktif' : 'Simpan Jadwal' }}
                                    </button>
                                </form>
                            </td>
                            <td>
                                <form action="{{ route('admin.akun_ditangguhkan_admin.setHasilSurvey', $item->id) }}" method="POST">
                                    @csrf
                                    @method('PUT')
                                    <select name="survey_result" class="form-control mb-2" 
                                        {{ $isActive ? 'disabled style=background-color:#e9ecef;' : 'required' }}>
                                        <option value="">-- Pilih Hasil --</option>
                                        <option value="Layak" {{ $isActive ? 'selected' : '' }}>Layak</option>
                                        <option value="Perlu Perbaikan" {{ $isActive ? 'disabled' : '' }}>Perlu Perbaikan</option>
                                    </select>
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

@endsection
