@extends('layouts.layout_admin')

@section('content')
<main class="max-w-6xl mx-auto p-4">
    <h1 class="text-2xl font-bold mb-6">Registrasi Akun Baru</h1>

    @if(session('success'))
        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4">
            {{ session('success') }}
        </div>
    @endif

    @if ($errors->any())
        <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-4">
            <ul class="list-disc pl-5 mb-0">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('admin.akun.store') }}" method="POST" class="bg-white rounded-xl shadow p-6 space-y-6">
        @csrf

        <!-- DATA AKUN -->
        <div class="border rounded-lg p-4">
            <h2 class="text-lg font-bold text-green-800 mb-4">DATA AKUN</h2>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <div>
                    <label class="block text-sm font-semibold mb-1">Nama Pengelola</label>
                    <input type="text" name="nama" class="w-full border rounded px-3 py-2" value="{{ old('nama') }}" required>
                </div>
                <div>
                    <label class="block text-sm font-semibold mb-1">Username</label>
                    <input type="text" name="username" class="w-full border rounded px-3 py-2" value="{{ old('username') }}" required>
                </div>
                <div>
                    <label class="block text-sm font-semibold mb-1">Email</label>
                    <input type="email" name="email" class="w-full border rounded px-3 py-2" value="{{ old('email') }}" required>
                </div>
                <div>
                    <label class="block text-sm font-semibold mb-1">Password</label>
                    <input type="password" name="password" id="password" class="w-full border rounded px-3 py-2" required minlength="10">
                </div>
                <div>
                    <label class="block text-sm font-semibold mb-1">Nomor WA</label>
                    <input type="text" name="nomor_wa" class="w-full border rounded px-3 py-2" value="{{ old('nomor_wa') }}" required>
                </div>
                <div>
                    <label class="block text-sm font-semibold mb-1">Jenis Fasilitas</label>
                    <select name="jenis_fasilitas" class="w-full border rounded px-3 py-2">
                        <option value="">-- Pilih Jenis Fasilitas --</option>
                        <option value="Bank Sampah" {{ old('jenis_fasilitas')=='Bank Sampah'?'selected':'' }}>Bank Sampah</option>
                        <option value="Shodaqoh Sampah" {{ old('jenis_fasilitas')=='Shodaqoh Sampah'?'selected':'' }}>Shodaqoh Sampah</option>
                        <option value="TPS3R" {{ old('jenis_fasilitas')=='TPS3R'?'selected':'' }}>TPS3R</option>
                        <option value="Lainnya" {{ old('jenis_fasilitas')=='Lainnya'?'selected':'' }}>Lainnya</option>
                    </select>
                </div>
                <div>
                    <label class="block text-sm font-semibold mb-1">Nama Bank Sampah</label>
                    <input type="text" name="nama_bank_sampah" class="w-full border rounded px-3 py-2" value="{{ old('nama_bank_sampah') }}">
                </div>
            </div>
        </div>

        <!-- LOCATION -->
        <div class="border rounded-lg p-4">
            <h2 class="text-lg font-bold text-green-800 mb-4">LOCATION</h2>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <div>
                    <label class="block text-sm font-semibold mb-1">Alamat Bank Sampah</label>
                    <input type="text" name="alamat" class="w-full border rounded px-3 py-2" value="{{ old('alamat') }}">
                </div>
                <div>
                    <label class="block text-sm font-semibold mb-1">Kapanewon</label>
                    <select name="kapanewon_id" id="kapanewon" class="w-full border rounded px-3 py-2" required>
                        <option value="">-- Pilih Kapanewon --</option>
                        @foreach($kapanewon as $k)
                            <option value="{{ $k->id }}" {{ old('kapanewon_id')==$k->id?'selected':'' }}>{{ $k->nama }}</option>
                        @endforeach
                    </select>
                </div>
                <div>
                    <label class="block text-sm font-semibold mb-1">Kelurahan</label>
                    <select name="kelurahan_id" id="kelurahan" class="w-full border rounded px-3 py-2" required>
                        <option value="">-- Pilih Kelurahan --</option>
                    </select>
                </div>
                <div>
                    <label class="block text-sm font-semibold mb-1">Padukuhan</label>
                    <select name="padukuhan_id" id="padukuhan" class="w-full border rounded px-3 py-2" required>
                        <option value="">-- Pilih Padukuhan --</option>
                    </select>
                </div>
                <div>
                    <label class="block text-sm font-semibold mb-1">Link Google Maps</label>
                    <input type="url" name="link_maps" class="w-full border rounded px-3 py-2" value="{{ old('link_maps') }}">
                </div>
            </div>
        </div>

        <button type="submit" class="bg-green-800 text-white font-bold py-2 px-6 rounded hover:bg-green-900">Daftarkan Akun</button>
    </form>
</main>

<script>
document.addEventListener("DOMContentLoaded", function() {
    const kapanewon = document.getElementById('kapanewon');
    const kelurahan = document.getElementById('kelurahan');
    const padukuhan = document.getElementById('padukuhan');

    kapanewon.addEventListener('change', function() {
        fetch(`/wilayah/kelurahan/${this.value}`)
            .then(res => res.json())
            .then(data => {
                kelurahan.innerHTML = '<option value="">-- Pilih Kelurahan --</option>';
                padukuhan.innerHTML = '<option value="">-- Pilih Padukuhan --</option>';
                data.forEach(item => {
                    kelurahan.innerHTML += `<option value="${item.id}">${item.nama}</option>`;
                });
            });
    });

    kelurahan.addEventListener('change', function() {
        padukuhan.innerHTML = '<option value="">-- Pilih Padukuhan --</option>';
        if (this.value) {
            fetch(`/wilayah/padukuhan/${this.value}`)
                .then(res => res.json())
                .then(data => {
                    data.forEach(item => {
                        padukuhan.innerHTML += `<option value="${item.id}">${item.nama}</option>`;
                    });
                });
        }
    });
});
</script>
@endsection
