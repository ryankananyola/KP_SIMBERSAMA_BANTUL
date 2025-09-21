@extends('layouts.layout_admin')
@section('content')
<div class="container-fluid p-4">
    <h1 class="h3 mb-4 fw-bold text-center">Data Umum</h1>
    <div class="card">
        <div class="card-body">
            <form method="GET" action="{{ route('admin.data_umum.index') }}" class="mb-3 text-end">
                <select name="filter" class="form-select d-inline w-auto" onchange="this.form.submit()">
                    <option value="petugas" {{ $filter === 'petugas' ? 'selected' : '' }}>Petugas</option>
                    <option value="user" {{ $filter === 'user' ? 'selected' : '' }}>User</option>
                </select>
            </form>

            <table class="table table-bordered align-middle">
                <thead class="table-light">
                    <tr>
                        <th style="width: 50px;">#</th>
                        <th>Nama {{ ucfirst($filter) }}</th>
                        <th style="width: 120px;">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($data as $index => $item)
                        <tr>
                            <td>{{ $index + 1 }}</td>
                            <td>{{ $item->nama }}</td>
                            <td>
                                <a href="{{ route('admin.data_umum.show', $item->id) }}?filter={{ $filter }}" class="btn btn-info text-white">
                                    Detail
                                </a>
                            </td>
                        </tr>
                    @endforeach
                    @if ($data->isEmpty())
                        <tr><td colspan="3" class="text-center">Tidak ada data</td></tr>
                    @endif
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
