@extends('layouts.layout_admin')

@section('content')
<main class="max-w-4xl mx-auto p-4">
    {{-- ERROR ALERT --}}
    @if ($errors->any())
        <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-4">
            <ul class="list-disc pl-5">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    {{-- SUCCESS ALERT --}}
    @if (session('success'))
        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4">
            {{ session('success') }}
        </div>
    @endif

    {{-- FORM REGISTRASI --}}
    <form class="bg-white rounded-xl shadow p-4 space-y-6"
          method="POST" 
          action="{{ route('admin.akun.store') }}">
        @csrf

        <!-- DATA AKUN -->
        <div class="border rounded-lg p-4 mb-6">
            <div class="flex items-center mb-2">
                <span class="material-icons text-[#256d5a] mr-2">person_add</span>
                <span class="font-bold text-[#256d5a] text-lg">DATA AKUN</span>
            </div>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <div>
                    <label class="block text-sm font-semibold mb-1">Pilih Jenis Fasilitas</label>
                    <select class="w-full border rounded px-3 py-2" name="jenis_fasilitas">
                        <option>--Pilih jenis Fasilitas--</option>
                        <option>Bank Sampah</option>
                        <option>Shodaqoh Sampah</option>
                        <option>TPS3R</option>
                        <option>Lainnya</option>
                    </select>
                </div>
                <div>
                    <label class="block text-sm font-semibold mb-1">Nama Bank Sampah</label>
                    <input type="text" class="w-full border rounded px-3 py-2" name="nama_bank_sampah" placeholder="Cth: Bank Sampah UGM Jaya">
                </div>
                <div>
                    <label class="block text-sm font-semibold mb-1">Nama Pengelola</label>
                    <input type="text" class="w-full border rounded px-3 py-2" name="nama" placeholder="Cth: Saya Sendiri">
                </div>
                <div>
                    <label class="block text-sm font-semibold mb-1">Nomor Whatsapp</label>
                    <input type="text" class="w-full border rounded px-3 py-2" name="nomor_wa" placeholder="Cth: 081234567890">
                </div>
                <div>
                    <label class="block text-sm font-semibold mb-1">Email</label>
                    <input type="email" class="w-full border rounded px-3 py-2" name="email" placeholder="Cth: sayasendiri@gmail.com">
                </div>
            </div>
        </div>

        <!-- LOCATION -->
        <div>
            <div class="flex items-center mb-2">
                <span class="material-icons text-[#256d5a] mr-2">location_on</span>
                <span class="font-bold text-[#256d5a] text-lg">LOCATION</span>
            </div>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <div>
                    <label class="block text-sm font-semibold mb-1">Pilih Wilayah</label>
                    <select class="w-full border rounded px-3 py-2" name="wilayah">
                        <option>--Pilih Wilayah--</option>
                        <option>Ibukota Kabupaten</option>
                        <option>Non-Ibukota Kabupaten</option>
                    </select>
                </div>
                <div>
                    <label class="block text-sm font-semibold mb-1">Alamat Bank Sampah</label>
                    <input type="text" class="w-full border rounded px-3 py-2" name="alamat" placeholder="Cth: Jl. Wiyoro Kidul, Wirono">
                </div>
                <div>
                    <label class="block text-sm font-semibold mb-1">Kecamatan</label>
                    <select id="kecamatan" class="w-full border rounded px-3 py-2" name="kapanewon_id">
                        <option>--Pilih Kapanewon--</option>
                    </select>
                </div>
                <div>
                    <label class="block text-sm font-semibold mb-1">Kelurahan</label>
                    <select id="kelurahan" class="w-full border rounded px-3 py-2" name="kelurahan_id">
                        <option>--Pilih Kelurahan--</option>
                    </select>
                </div>
                <div>
                    <label class="block text-sm font-semibold mb-1">Padukuhan</label>
                    <select id="padukuhan" class="w-full border rounded px-3 py-2" name="padukuhan_id">
                        <option>--Pilih Padukuhan--</option>
                    </select>
                </div>
                <div>
                    <label class="block text-sm font-semibold mb-1">Link Google Maps</label>
                    <input type="text" class="w-full border rounded px-3 py-2" name="link_maps" placeholder="Cth: https://maps.app.goo.gl/xxx">
                </div>
            </div>
        </div>

        <!-- KEAMANAN LOGIN AKUN -->
        <div>
            <div class="flex items-center mb-2">
                <span class="material-icons text-[#256d5a] mr-2">vpn_key</span>
                <span class="font-bold text-[#256d5a] text-lg">KEAMANAN LOGIN AKUN</span>
            </div>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <div>
                    <label class="block text-sm font-semibold mb-1">Username</label>
                    <input type="text" class="w-full border rounded px-3 py-2" name="username" placeholder="Cth: sayasendiri12">
                </div>
                <div></div>
                <div>
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
                <div>
                    <label class="block text-sm font-semibold mb-1">Ulangi Password</label>
                    <div class="relative">
                        <input type="password" id="password_confirmation" class="w-full border rounded px-3 py-2 pr-10" name="password_confirmation" placeholder="Ulangi Password Anda..">
                        <span class="material-icons absolute right-3 top-1/2 transform -translate-y-1/2 cursor-pointer text-gray-400" id="toggle-confirm" onclick="togglePassword('password_confirmation', 'toggle-confirm')">visibility_off</span>
                    </div>
                    <div id="password-match-status" class="text-xs mt-1"></div>
                </div>
            </div>
        </div>

        <!-- SUBMIT BUTTON -->
        <div class="flex justify-center mt-8">
            <button type="submit" 
                class="w-full md:w-3/4 lg:w-1/2 bg-green-800 text-white font-bold py-3 rounded-lg shadow hover:bg-green-900 transition flex justify-center items-center gap-2">
                <span class="material-icons">person_add</span> Daftar
            </button>
        </div>
    </form>
</main>
<script>
const kecamatanSelect = document.getElementById('kecamatan');
const kelurahanSelect = document.getElementById('kelurahan');
const padukuhanSelect = document.getElementById('padukuhan');

fetch('/wilayah/kapanewon')
  .then(res => res.json())
  .then(data => {
    kecamatanSelect.innerHTML = '<option>--Pilih Kapanewon--</option>';
    data.forEach(item => {
      kecamatanSelect.innerHTML += `<option value="${item.id}">${item.nama}</option>`;
    });
  });

kecamatanSelect.addEventListener('change', function() {
  kelurahanSelect.innerHTML = '<option>--Pilih Kelurahan--</option>';
  padukuhanSelect.innerHTML = '<option>--Pilih Padukuhan--</option>';
  if (this.value) {
    fetch(`/wilayah/kelurahan/${this.value}`)
      .then(res => res.json())
      .then(data => {
        data.forEach(item => {
          kelurahanSelect.innerHTML += `<option value="${item.id}">${item.nama}</option>`;
        });
      });
  }
});

kelurahanSelect.addEventListener('change', function() {
  padukuhanSelect.innerHTML = '<option>--Pilih Padukuhan--</option>';
  if (this.value) {
    fetch(`/wilayah/padukuhan/${this.value}`)
      .then(res => res.json())
      .then(data => {
        data.forEach(item => {
          padukuhanSelect.innerHTML += `<option value="${item.id}">${item.nama}</option>`;
        });
      });
  }
});

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