<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrasi - SIMBERSAMA</title>
    <link href="https://fonts.googleapis.com/css2?family=Instrument+Sans:wght@400;600;700&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-white font-[Instrument Sans] min-h-screen">
    <header class="bg-[#256d5a] py-4 px-8 flex items-center">
        <span class="text-white text-2xl font-bold tracking-wide">SIMBERSAMA</span>
    </header>
    <main class="max-w-4xl mx-auto p-4">
        <div class="flex flex-col lg:flex-row items-center gap-8 mb-6">
            <img src="/images/bantul-logo.png" alt="Logo Bantul" class="w-48 h-48 mb-4 lg:mb-0">
            <div>
                <h1 class="text-[#256d5a] text-xl font-bold mb-2">Selamat Datang di Portal Registrasi<br>Sistem Informasi Pengelolaan Sampah Kab. Bantul</h1>
                <p class="text-gray-700">Mohon isi form dibawah ini dengan lengkap & benar!</p>
            </div>
        </div>
        <form class="bg-white rounded-xl shadow p-4 space-y-8 overflow-y-auto max-h-[80vh]">
            <!-- DATA AKUN -->
            <div>
                <div class="flex items-center mb-2">
                    <span class="material-icons text-[#256d5a] mr-2">person_add</span>
                    <span class="font-bold text-[#256d5a] text-lg">DATA AKUN</span>
                </div>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <div>
                        <label class="block text-sm font-semibold mb-1">Pilih Jenis Fasilitas</label>
                        <select class="w-full border rounded px-3 py-2">
                            <option>--Pilih jenis Fasilitas--</option>
                            <option>Bank Sampah</option>
                            <option>Shodaqoh Sampah</option>
                            <option>TPS3R</option>
                            <option>Lainnya</option>
                        </select>
                    </div>
                    <div>
                        <label class="block text-sm font-semibold mb-1">Nama Bank Sampah</label>
                        <input type="text" class="w-full border rounded px-3 py-2" placeholder="Cth: Bank Sampah UGM Jaya">
                    </div>
                    <div>
                        <label class="block text-sm font-semibold mb-1">Nama Pimpinan</label>
                        <input type="text" class="w-full border rounded px-3 py-2" placeholder="Cth: Saya Sendiri">
                    </div>
                    <div>
                        <label class="block text-sm font-semibold mb-1">Nomor Whatsapp</label>
                        <input type="text" class="w-full border rounded px-3 py-2" placeholder="Cth: 081234567890">
                    </div>
                    <div>
                        <label class="block text-sm font-semibold mb-1">Email</label>
                        <input type="email" class="w-full border rounded px-3 py-2" placeholder="Cth: sayasendiri@gmail.com">
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
                        <select class="w-full border rounded px-3 py-2">
                            <option>--Pilih Wilayah--</option>
                            <option>Ibukota Kabupaten</option></option>
                            <option>Non-Ibukota Kabupaten</option>
                        </select>
                    </div>
                    <div>
                        <label class="block text-sm font-semibold mb-1">Alamat Bank Sampah</label>
                        <input type="text" class="w-full border rounded px-3 py-2" placeholder="Cth: J. Wiyoro Kidul, Wirono">
                    </div>
                    <div>
                        <label class="block text-sm font-semibold mb-1">Kecamatan</label>
                        <select id="kecamatan" class="w-full border rounded px-3 py-2">
                            <option>--Pilih Kecamatan--</option>
                        </select>
                    </div>
                    <div>
                        <label class="block text-sm font-semibold mb-1">Kelurahan</label>
                        <select id="kelurahan" class="w-full border rounded px-3 py-2">
                            <option>--Pilih Kelurahan--</option>
                        </select>
                    </div>
                    <div>
                        <label class="block text-sm font-semibold mb-1">Padukuhan</label>
                        <select id="padukuhan" class="w-full border rounded px-3 py-2">
                            <option>--Pilih Padukuhan--</option>
                        </select>
                    </div>
                    <div>
                        <label class="block text-sm font-semibold mb-1">Link Google Maps</label>
                        <input type="text" class="w-full border rounded px-3 py-2" placeholder="Cth: https://maps.app.goo.gl/xxx">
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
                        <input type="text" class="w-full border rounded px-3 py-2" placeholder="Cth: sayasendiri12">
                    </div>
                    <div></div>
                    <div>
                        <label class="block text-sm font-semibold mb-1">Password</label>
                        <div class="relative">
                            <input type="password" id="password" class="w-full border rounded px-3 py-2 pr-10 mb-2" placeholder="Masukkan Password Anda..">
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
                            <input type="password" id="password_confirmation" class="w-full border rounded px-3 py-2 pr-10" placeholder="Ulangi Password Anda..">
                            <span class="material-icons absolute right-3 top-1/2 transform -translate-y-1/2 cursor-pointer text-gray-400" id="toggle-confirm" onclick="togglePassword('password_confirmation', 'toggle-confirm')">visibility_off</span>
                        </div>
                        <div id="password-match-status" class="text-xs mt-1"></div>
                    </div>
                </div>
            </div>
            <!-- reCAPTCHA & Submit -->
            <div class="grid grid-cols-1 gap-4">
                <div class="bg-white rounded-lg border p-4 flex items-center justify-between">
                    <div class="flex items-center gap-2">
                        <input type="checkbox" class="w-5 h-5">
                        <span class="text-[#256d5a] font-semibold">I'm not a robot</span>
                    </div>
                    <img src="https://www.gstatic.com/recaptcha/api2/logo_48.png" alt="reCAPTCHA" class="w-10 h-10">
                </div>
                <button type="submit" class="w-full bg-[#256d5a] text-white font-bold py-3 rounded-lg mt-2 text-lg shadow hover:bg-[#1e5647] transition flex items-center justify-center gap-2">DAFTAR <span class="material-icons">login</span></button>
            </div>
            <div class="flex flex-col md:flex-row items-center justify-center mt-4 gap-2">
                <span class="text-gray-700">Sudah punya akun?</span>
                <a href="/login" class="bg-[#256d5a] text-black font-bold px-6 py-2 rounded shadow hover:bg-[#1e5647] transition flex items-center gap-2">
                    <span class="material-icons">login</span> Masuk
                </a>
            </div>
        </form>
    </main>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <script>
const wilayah = {
  'SEWON': {
    'TIMBULHARJO': ['Balong', 'Bibis', 'Dadapan', 'Dagan', 'Dobalan', 'Gabusan', 'Gatak', 'Kepek', 'Kowen I', 'Kowen II', 'Ngentak', 'Ngasem', 'Timbulharjo'],
    'PANGGUNGHARJO': ['Padukuhan 3', 'Padukuhan 4'],
    'PENDOWOHARJO': ['Padukuhan 3', 'Padukuhan 4'],
    'BANGUNHARJO': ['Padukuhan 3', 'Padukuhan 4'],
  },
  'Kecamatan B': {
    'Kelurahan Z': ['Padukuhan 5', 'Padukuhan 6']
  }
};

const kecamatanSelect = document.getElementById('kecamatan');
const kelurahanSelect = document.getElementById('kelurahan');
const padukuhanSelect = document.getElementById('padukuhan');

// Populate kecamatan
for (const kecamatan in wilayah) {
  const opt = document.createElement('option');
  opt.value = kecamatan;
  opt.textContent = kecamatan;
  kecamatanSelect.appendChild(opt);
}

kecamatanSelect.addEventListener('change', function() {
  kelurahanSelect.innerHTML = '<option>--Pilih Kelurahan--</option>';
  padukuhanSelect.innerHTML = '<option>--Pilih Padukuhan--</option>';
  const kelurahanList = wilayah[this.value] || {};
  for (const kelurahan in kelurahanList) {
    const opt = document.createElement('option');
    opt.value = kelurahan;
    opt.textContent = kelurahan;
    kelurahanSelect.appendChild(opt);
  }
});

kelurahanSelect.addEventListener('change', function() {
  padukuhanSelect.innerHTML = '<option>--Pilih Padukuhan--</option>';
  const kecamatan = kecamatanSelect.value;
  const kelurahan = this.value;
  const padukuhanList = (wilayah[kecamatan] && wilayah[kecamatan][kelurahan]) || [];
  padukuhanList.forEach(function(padukuhan) {
    const opt = document.createElement('option');
    opt.value = padukuhan;
    opt.textContent = padukuhan;
    padukuhanSelect.appendChild(opt);
  });
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
        icon.style.color = '#38c172'; // hijau
    } else {
        icon.style.color = '#e3342f'; // merah
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
</body>
</html>
