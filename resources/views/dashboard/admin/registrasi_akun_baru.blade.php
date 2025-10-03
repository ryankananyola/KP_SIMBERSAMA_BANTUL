<
@extends('layouts.layout_admin')

@section('content')
<head>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
</head>
<main class="max-w-5xl mx-auto p-4 font-[Instrument Sans]">
    <h1 class="h3 mb-4 fw-bold text-center">Registrasi Baru</h1>
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

    <form action="{{ route('admin.akun.store') }}" method="POST" 
          class="bg-white rounded-xl border-2 border-gray-300 shadow p-6 space-y-6">
        @csrf

        <!-- DATA AKUN -->
        <div class="border rounded-lg p-4">
            <div class="card-body">
                <h5 class="mb-3 fw-bold" style="color: #276561; padding-left: 25px; position: relative;">
                    <i class="bi bi-person-circle"></i> DATA AKUN
                    <span style="position: absolute; left: 0; top: 0; width: 6px; height: 100%; background-color: #276561; border-radius: 10px 0 0 10px;"></span>
                </h5>
                </div>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <div class="field-card">
                    <label class="block text-sm font-semibold mb-1">Pilih Jenis Fasilitas</label>
                    <select name="jenis_fasilitas" class="w-full border rounded px-3 py-2">
                        <option value="">-- Pilih Jenis Fasilitas --</option>
                        <option value="Bank Sampah">Bank Sampah</option>
                        <option value="Shodaqoh Sampah">Shodaqoh Sampah</option>
                        <option value="TPS3R">TPS3R</option>
                        <option value="Lainnya">Lainnya</option>
                    </select>
                </div>
                <div class="field-card">
                    <label class="block text-sm font-semibold mb-1">Nama Bank Sampah</label>
                    <input type="text" name="nama_bank_sampah" class="w-full border rounded px-3 py-2" placeholder="Cth: Bank Sampah UGM Jaya">
                </div>
                <div class="field-card">
                    <label class="block text-sm font-semibold mb-1">Nama Pengelola</label>
                    <input type="text" name="nama" class="w-full border rounded px-3 py-2" placeholder="Cth: Saya Sendiri">
                </div>
                <div class="field-card">
                    <label class="block text-sm font-semibold mb-1">Nomor Whatsapp</label>
                    <input type="text" name="nomor_wa" class="w-full border rounded px-3 py-2" placeholder="Cth: 081234567890">
                </div>
                <div class="field-card">
                    <label class="block text-sm font-semibold mb-1">Email</label>
                    <input type="email" name="email" class="w-full border rounded px-3 py-2" placeholder="Cth: email@gmail.com">
                </div>
            </div>
        </div>

        <!-- LOCATION -->
        <div class="border rounded-lg p-4">
            <div class="card-body">
                <h5 class="mt-4 mb-3 fw-bold" style="color: #276561; padding-left: 25px; position: relative;">
                    <i class="bi bi-geo-alt-fill"></i> LOKASI
                    <span style="position: absolute; left: 0; top: 0; width: 6px; height: 100%; background-color: #276561; border-radius: 10px 0 0 10px;"></span>
                </h5>
                </div>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <div class="field-card">
                    <label class="block text-sm font-semibold mb-1">Alamat Bank Sampah</label>
                    <input type="text" name="alamat" class="w-full border rounded px-3 py-2" placeholder="Cth: Jl. Wiyoro Kidul">
                </div>
                <div class="field-card">
                    <label class="block text-sm font-semibold mb-1">Kapanewon</label>
                    <select name="kapanewon_id" id="kapanewon" class="w-full border rounded px-3 py-2">
                        <option value="">-- Pilih Kapanewon --</option>
                        @foreach($kapanewon as $k)
                            <option value="{{ $k->id }}">{{ $k->nama }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="field-card">
                    <label class="block text-sm font-semibold mb-1">Kelurahan</label>
                    <select name="kelurahan_id" id="kelurahan" class="w-full border rounded px-3 py-2">
                        <option value="">-- Pilih Kelurahan --</option>
                    </select>
                </div>
                <div class="field-card">
                    <label class="block text-sm font-semibold mb-1">Padukuhan</label>
                    <select name="padukuhan_id" id="padukuhan" class="w-full border rounded px-3 py-2">
                        <option value="">-- Pilih Padukuhan --</option>
                    </select>
                </div>
                <div class="field-card">
                    <label class="block text-sm font-semibold mb-1">Link Google Maps</label>
                    <input type="url" name="link_maps" class="w-full border rounded px-3 py-2" placeholder="https://maps.app.goo.gl/xxx">
                </div>
            </div>
        </div>

        <!-- KEAMANAN LOGIN -->
        <div class="border rounded-lg p-4">
            <div class="card-body">
                <h5 class="mt-4 mb-3 fw-bold" style="color: #276561; padding-left: 25px; position: relative;">
                    <i class="bi bi-lock"></i> KEAMANAN LOGIN AKUN
                    <span style="position: absolute; left: 0; top: 0; width: 6px; height: 100%; background-color: #276561; border-radius: 10px 0 0 10px;"></span>
                </h5>
            </div>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <div class="field-card">
                    <label class="block text-sm font-semibold mb-1">Password</label>
                    <input type="password" name="password" id="password" class="w-full border rounded px-3 py-2" placeholder="Masukkan Password Anda..">
                    <div class="mt-2 text-sm">
                        <b>Ketentuan Password:</b>
                        <ul class="list-disc pl-5 text-red-600">
                            <li id="min-char">Minimal 10 Karakter</li>
                            <li id="lowercase">Kombinasi huruf kecil</li>
                            <li id="uppercase">Kombinasi huruf besar</li>
                            <li id="number">Kombinasi angka</li>
                        </ul>
                    </div>
                </div>
                <div class="field-card">
                    <label class="block text-sm font-semibold mb-1">Ulangi Password</label>
                    <input type="password" name="password_confirmation" class="w-full border rounded px-3 py-2" placeholder="Ulangi Password Anda..">
                </div>
            </div>
        </div>

        <div class="flex justify-center mt-8">
            <button type="submit" class="w-full md:w-1/2 bg-green-800 text-white font-bold py-3 rounded-lg shadow hover:bg-green-900 transition">
                <i class="bi bi-person-plus"></i> Daftarkan Akun
            </button>
        </div>
    </form>
</main>

<style>
    .field-card {
        border: 1px solid #838383;
        border-radius: 5px;
        background: #fff;
        padding: 8px 12px;
    }
    .card-body h5 {
    font-weight: 600;
    font-size: 1.25rem;
    color: #276561;
    border-radius: 5px; 
    border-radius: 5px;
    border: 1px solid #000000; 
    padding: 10px; 
    margin: 0;
    margin-bottom: 10px;
    margin-top: 10px;
}
</style>
@endsection
