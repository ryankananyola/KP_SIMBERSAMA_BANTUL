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

            <table class="table table-hover align-middle">
                <thead>
                    <tr>
                        <th style="width: 50px;">No</th>
                        @if($filter === 'petugas')
                            <th>Username</th>
                        @else
                            <th>Nama Bank Sampah</th>
                        @endif
                        <th class="text-center" style="width: 150px;">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($data as $index => $item)
                        <tr class="border rounded shadow-sm mb-2">
                            <td>{{ $index + 1 }}</td>

                            @if($filter === 'petugas')
                                <td>{{ $item->username }}</td>
                            @else
                                <td>{{ $item->nama_bank_sampah }}</td>
                            @endif

                            <td class="text-center">
                                <a href="{{ route('admin.data_umum.show', $item->id) }}?filter={{ $filter }}" 
                                    class="btn btn-primary btn-sm text-white w-100">
                                    Detail
                                </a>
                            </td>
                        </tr>
                    @endforeach

                    @if ($data->isEmpty())
                        <tr>
                            <td colspan="3" class="text-center">Tidak ada data</td>
                        </tr>
                    @endif
                </tbody>
            </table>

            <div class="d-flex justify-content-center mt-3">
                {{ $data->appends(['filter' => $filter])->links('pagination::bootstrap-5') }}
            </div>
        </div>
    </div>
</div>
@endsection
