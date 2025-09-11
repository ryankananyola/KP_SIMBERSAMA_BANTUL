@extends('layouts.layout_admin')
@section('content')
<div class="container-fluid p-4">
    <h1 class="h3 mb-4 fw-bold text-center">Data Umum</h1>
    <div class="card">
        <div class="card-body">
            <div class="d-flex justify-content-between align-items-center mb-3">
                <div></div>
                <div>
                    <select class="form-select">
                        <option>User</option>
                        <option>Petugas</option>
                    </select>
                </div>
            </div>
            <table class="table table-bordered align-middle">
                <thead class="table-light">
                    <tr>
                        <th style="width: 50px;">#</th>
                        <th>Nama Bank Sampah</th>
                        <th style="width: 120px;">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>1</td>
                        <td>Udin</td>
                        <td><a href="#" class="btn btn-info text-white">Detail</a></td>
                    </tr>
                    <tr>
                        <td>2</td>
                        <td>Dunia Mas</td>
                        <td><a href="#" class="btn btn-info text-white">Detail</a></td>
                    </tr>
                    <tr>
                        <td>3</td>
                        <td>Puan</td>
                        <td><a href="#" class="btn btn-info text-white">Detail</a></td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
