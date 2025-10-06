@extends('layouts.layout_admin')

@section('content')
<head>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
</head>

<main class="max-w-5xl mx-auto p-4 font-[Instrument Sans]">
    <h1 class="h3 mb-4 fw-bold text-center">Registrasi Petugas</h1>

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

    <form action="{{ route('admin.petugas.store') }}" method="POST" 
          class="bg-white rounded-xl border-2 border-gray-300 shadow p-6 space-y-6">
        @csrf

        <!-- DATA AKUN -->
        <div class="border rounded-lg p-4">
            <div class="card-body">
                <h5 class="mb-3 fw-bold" style="color: #276561; padding-left: 25px; position: relative;">
                    <i class="bi bi-person-badge"></i> DATA AKUN
                    <span style="position: absolute; left: 0; top: 0; width: 6px; height: 100%; background-color: #276561; border-radius: 10px 0 0 10px;"></span>
                </h5>
            </div>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <div class="field-card">
                    <label class="block text-sm font-semibold mb-1">Nama Petugas</label>
                    <input type="text" name="nama" class="w-full border rounded px-3 py-2" placeholder="Cth: Amin Rais" value="{{ old('nama') }}">
                </div>
                <div class="field-card">
                    <label class="block text-sm font-semibold mb-1">Username</label>
                    <input type="text" name="username" class="w-full border rounded px-3 py-2" placeholder="Cth: amin123" value="{{ old('username') }}">
                </div>
                <div class="field-card">
                    <label class="block text-sm font-semibold mb-1">Email</label>
                    <input type="email" name="email" class="w-full border rounded px-3 py-2" placeholder="Cth: RudiHartanto@gmail.com" value="{{ old('email') }}">
                </div>
                <div class="field-card">
                    <label class="block text-sm font-semibold mb-1">Nomor WhatsApp</label>
                    <input type="text" name="no_hp" class="w-full border rounded px-3 py-2" placeholder="Cth: 085788689017" value="{{ old('no_hp') }}">
                </div>
                <div class="field-card col-span-2">
                    <label class="block text-sm font-semibold mb-1">Alamat Domisili</label>
                    <input type="text" name="alamat" class="w-full border rounded px-3 py-2" placeholder="Cth: Jl. Wijoyo Kusumo, Wirogo" value="{{ old('alamat') }}">
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
                <div>
                    <div class="field-card">
                    <label class="block text-sm font-semibold mb-1">Username</label>
                    <input type="text" class="w-full border rounded px-3 py-2" name="username" placeholder="Cth: sayasendiri12" value="{{ old('username') }}">
                    </div>
                </div>
                <div></div>
                <div>
                    <div class="field-card">
                    <label class="block text-sm font-semibold mb-1">Password</label>
                    <div class="relative">
                        <input type="password" id="password" class="w-full border rounded px-3 py-2 pr-10 mb-2" name="password" placeholder="Masukkan Password Anda..">
                        <span class="material-icons absolute right-3 top-1/2 transform -translate-y-1/2 cursor-pointer text-gray-400" id="toggle-password" onclick="togglePassword('password', 'toggle-password')">visibility_off</span>
                    </div>
                    <div class="bg-[#f7f7f7] rounded p-2 text-xs" id="password-rules">
                        <span class="text-blue-700 font-bold">&#9432; Ketentuan Password:</span><br>
                        <span id="rule-length" class="text-red-600"><span id="icon-length" style="color:#e3342f">&#10006;</span> Minimal 10 Karakter</span><br>
                        <span id="rule-lower" class="text-red-600"><span id="icon-lower" style="color:#e3342f">&#10006;</span> Kombinasi <span class="font-bold">huruf kecil</span></span><br>
                        <span id="rule-upper" class="text-red-600"><span id="icon-upper" style="color:#e3342f">&#10006;</span> Kombinasi <span class="font-bold">huruf besar</span></span><br>
                        <span id="rule-number" class="text-red-600"><span id="icon-number" style="color:#e3342f">&#10006;</span> Kombinasi <span class="font-bold">angka</span></span>
                    </div>
                    </div>
                </div>
                <div>
                    <div class="field-card">
                    <label class="block text-sm font-semibold mb-1">Ulangi Password</label>
                    <div class="relative">
                        <input type="password" id="password_confirmation" class="w-full border rounded px-3 py-2 pr-10" name="password_confirmation" placeholder="Ulangi Password Anda..">
                        <span class="material-icons absolute right-3 top-1/2 transform -translate-y-1/2 cursor-pointer text-gray-400" id="toggle-confirm" onclick="togglePassword('password_confirmation', 'toggle-confirm')">visibility_off</span>
                    </div>
                    <div id="password-match-status" class="text-xs mt-1"></div>
                    </div>
                </div>
            </div>
        </div>

        <!-- BUTTON -->
        <div class="flex justify-center mt-8">
            <button type="submit" class="w-full md:w-1/2 bg-green-800 text-white font-bold py-3 rounded-lg shadow hover:bg-green-900 transition">
                <i class="bi bi-person-check"></i> Daftarkan Petugas
            </button>
        </div>
    </form>
</main>

<script>
    const passwordInput = document.getElementById('password');
    const passwordConfirm = document.getElementById('password_confirmation');
    const ruleLength = document.getElementById('rule-length');
    const ruleLower = document.getElementById('rule-lower');
    const ruleUpper = document.getElementById('rule-upper');
    const ruleNumber = document.getElementById('rule-number');
    const iconLength = document.getElementById('icon-length');
    const iconLower = document.getElementById('icon-lower');
    const iconUpper = document.getElementById('icon-upper');
    const iconNumber = document.getElementById('icon-number');
    const matchStatus = document.getElementById('password-match-status');
    
    function setIconColor(icon, valid) {
        if (valid) {
            icon.style.color = '#38c172'; 
        } else {
            icon.style.color = '#e3342f';
        }
    }
    function validatePassword(password) {
        const isLength = password.length >= 10;
        const isLower = /[a-z]/.test(password);
        const isUpper = /[A-Z]/.test(password);
        const isNumber = /[0-9]/.test(password);
    
        if (isLength) {
            ruleLength.classList.remove('text-red-600');
            ruleLength.classList.add('text-green-600');
            iconLength.innerHTML = '&#10004;';
            setIconColor(iconLength, true);
        } else {
            ruleLength.classList.add('text-red-600');
            ruleLength.classList.remove('text-green-600');
            iconLength.innerHTML = '&#10006;';
            setIconColor(iconLength, false);
        }
        if (isLower) {
            ruleLower.classList.remove('text-red-600');
            ruleLower.classList.add('text-green-600');
            iconLower.innerHTML = '&#10004;';
            setIconColor(iconLower, true);
        } else {
            ruleLower.classList.add('text-red-600');
            ruleLower.classList.remove('text-green-600');
            iconLower.innerHTML = '&#10006;';
            setIconColor(iconLower, false);
        }
        if (isUpper) {
            ruleUpper.classList.remove('text-red-600');
            ruleUpper.classList.add('text-green-600');
            iconUpper.innerHTML = '&#10004;';
            setIconColor(iconUpper, true);
        } else {
            ruleUpper.classList.add('text-red-600');
            ruleUpper.classList.remove('text-green-600');
            iconUpper.innerHTML = '&#10006;';
            setIconColor(iconUpper, false);
        }
        if (isNumber) {
            ruleNumber.classList.remove('text-red-600');
            ruleNumber.classList.add('text-green-600');
            iconNumber.innerHTML = '&#10004;';
            setIconColor(iconNumber, true);
        } else {
            ruleNumber.classList.add('text-red-600');
            ruleNumber.classList.remove('text-green-600');
            iconNumber.innerHTML = '&#10006;';
            setIconColor(iconNumber, false);
        }
    }
    function togglePassword(inputId, iconId) {
        const input = document.getElementById(inputId);
        const icon = document.getElementById(iconId);
        if (input.type === 'password') {
            input.type = 'text';
            icon.textContent = 'visibility';
        } else {
            input.type = 'password';
            icon.textContent = 'visibility_off';
        }
    }
    function checkPasswordMatch() {
        if (passwordConfirm.value.length === 0) {
            matchStatus.textContent = '';
            return;
        }
        if (passwordInput.value === passwordConfirm.value) {
            matchStatus.textContent = 'Password sudah sama';
            matchStatus.className = 'text-green-600 text-xs mt-1';
        } else {
            matchStatus.textContent = 'Password belum sama';
            matchStatus.className = 'text-red-600 text-xs mt-1';
        }
    }
    passwordInput.addEventListener('input', function() {
        validatePassword(this.value);
        checkPasswordMatch();
    });
    passwordConfirm.addEventListener('input', checkPasswordMatch);
    </script>

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
        border: 1px solid #000000; 
        padding: 10px; 
        margin: 0;
        margin-bottom: 10px;
        margin-top: 10px;
    }
</style>

@endsection
