@extends('layouts.layout_petugas')

@section('content')
<div class="container-fluid p-4">
    <h1 class="h3 mb-4 fw-bold text-center">Data Umum User</h1>
    <div class="card">
        <div class="card-body">
            <!-- Tabel Data Bank Sampah -->
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
                                <!-- Tombol Detail -->
                                <a href="{{ route('petugas.data_umum.show', $item->id) }}" 
                                    class="btn btn-primary btn-sm text-white">
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
        </div>
    </div>
</div>
@endsection
