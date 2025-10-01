@extends('layouts.layout_admin')

@section('content')
<main class="max-w-3xl mx-auto p-6">
    <h1 class="text-center text-xl font-bold mb-6">Input Petugas</h2>
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

    <form action="{{ route('admin.petugas.store') }}" method="POST">
        @csrf
        <div class="border rounded mb-6">
            <div class="bg-gray-100 p-3 font-semibold flex items-center">
                <i class="fa fa-user-plus mr-2"></i> DATA AKUN
            </div>
            <div class="grid grid-cols-2 gap-4 p-4">
                <div>
                    <label class="block text-sm font-semibold mb-1">Nama Petugas</label>
                    <input type="text" name="nama" class="w-full border rounded p-2" placeholder="Cth: Amin Rais" value="{{ old('nama') }}">
                    @error('nama') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                </div>
                <div>
                    <label class="block text-sm font-semibold mb-1">Username</label>
                    <input type="text" name="username" class="w-full border rounded p-2" placeholder="Cth: amin123" value="{{ old('username') }}">
                    @error('username') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                </div>
                <div>
                    <label class="block text-sm font-semibold mb-1">Email</label>
                    <input type="email" name="email" class="w-full border rounded p-2" placeholder="Cth: RudiHartanto@gmail.com" value="{{ old('email') }}">
                    @error('email') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                </div>
                <div>
                    <label class="block text-sm font-semibold mb-1">Nomor WhatsApp</label>
                    <input type="text" name="no_hp" class="w-full border rounded p-2" placeholder="Cth: 085788689017" value="{{ old('no_hp') }}">
                    @error('no_hp') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                </div>
                <div class="col-span-2">
                    <label class="block text-sm font-semibold mb-1">Alamat Domisili</label>
                    <input type="text" name="alamat" class="w-full border rounded p-2" placeholder="Cth: Jl. Wijoyo Kusumo, Wirogo" value="{{ old('alamat') }}">
                    @error('alamat') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                </div>
            </div>
        </div>

        {{-- KEAMANAN LOGIN --}}
        <div class="border rounded mb-6">
            <div class="bg-gray-100 p-3 font-semibold flex items-center">
                <i class="fa fa-lock mr-2"></i> KEAMANAN LOGIN AKUN
            </div>
            <div class="grid grid-cols-2 gap-4 p-4">
                <div>
                    <label class="block text-sm font-semibold mb-1">Password</label>
                    <input type="password" name="password" id="password" class="w-full border rounded p-2" placeholder="Masukkan Password Anda..">
                    @error('password') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                    
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
                <div>
                    <label class="block text-sm font-semibold mb-1">Ulangi Password</label>
                    <input type="password" name="password_confirmation" class="w-full border rounded p-2" placeholder="Ulangi Password Anda..">
                </div>
            </div>
        </div>

        <button type="submit" class="w-full bg-green-700 text-white p-3 rounded">DAFTAR</button>
    </form>
</main>

<script>
    const password = document.getElementById("password");
    password.addEventListener("input", function() {
        document.getElementById("min-char").style.color = password.value.length >= 10 ? "green" : "red";
        document.getElementById("lowercase").style.color = /[a-z]/.test(password.value) ? "green" : "red";
        document.getElementById("uppercase").style.color = /[A-Z]/.test(password.value) ? "green" : "red";
        document.getElementById("number").style.color = /[0-9]/.test(password.value) ? "green" : "red";
    });
</script>
@endsection
