@extends('layouts.layout_petugas')

@section('content')
<div class="container-fluid p-4">
    <h1 class="h3 mb-4 fw-bold text-center">Data Umum User</h1>
    <div class="card">
        <div class="card-body">
            <table class="table table-hover align-middle">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Nama Bank Sampah</th>
                        <th class="text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($data as $index => $item)
                        <tr class="border rounded shadow-sm mb-2">
                            <td>{{ $index + 1 }}</td>
                            <td>{{ $item->nama_bank_sampah }}</td>
                            <td class="text-center">
                                <a href="{{ route('petugas.data_umum.show', $item->id) }}" 
                                    class="btn btn-primary btn-sm text-white w-50">
                                    Detail
                                </a>
                            </td>
                        </tr>
                    @endforeach
                    @if ($data->isEmpty())
                        <tr>
                            <td colspan="3" class="text-center">Tidak ada data user</td>
                        </tr>
                    @endif
                </tbody>
            </table>
            <div class="d-flex justify-content-center mt-3">
                {{ $data->links('pagination::bootstrap-5') }}
            </div>
        </div>
    </div>
</div>
@endsection
