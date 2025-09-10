<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrasi Petugas - SIMBERSAMA</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
</head>
<body class="bg-white font-sans min-h-screen flex items-center justify-center">
    <div class="bg-[#256d5a] rounded-2xl p-10 shadow-lg w-full max-w-md">
        <h2 class="text-white text-2xl font-bold mb-2">Registrasi Petugas</h2>
        @if ($errors->any())
            <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-4">
                <ul class="list-disc pl-5">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        @if (session('success'))
            <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4">
                {{ session('success') }}
            </div>
        @endif
        <form method="POST" action="/register-petugas">
            @csrf
            <input type="text" name="username" placeholder="Username" class="w-full mb-4 px-4 py-3 rounded-lg bg-white text-[#256d5a] font-semibold placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-[#256d5a]">
            <div class="relative mb-4">
                <input type="password" name="password" id="password" placeholder="Password" class="w-full px-4 py-3 rounded-lg bg-white text-[#256d5a] font-semibold placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-[#256d5a]">
                <span class="material-icons absolute right-3 top-1/2 transform -translate-y-1/2 cursor-pointer text-gray-400" id="toggle-password" onclick="togglePassword('password', 'toggle-password')">visibility_off</span>
            </div>
            <button type="submit" class="w-full bg-white text-[#256d5a] font-bold py-3 rounded-lg mt-2 text-lg shadow hover:bg-gray-100 transition">Register Petugas</button>
        </form>
        <div class="flex justify-center mt-6">
            <a href="/" class="bg-gray-200 text-[#256d5a] font-bold px-6 py-2 rounded shadow hover:bg-gray-300 transition flex items-center gap-2">
                <span class="material-icons">arrow_back</span> Kembali ke Dashboard
            </a>
        </div>
    </div>
    <script>
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
    </script>
</body>
</html>
