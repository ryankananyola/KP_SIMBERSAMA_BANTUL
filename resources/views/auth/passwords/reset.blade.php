<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reset Password - SIMBERSAMA</title>
    <link href="https://fonts.googleapis.com/css2?family=Instrument+Sans:wght@400;600;700&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
</head>
<body class="bg-white font-[Instrument Sans] min-h-screen flex items-center justify-center">
    <div class="bg-green-800 rounded-2xl p-10 shadow-lg w-full max-w-md">
        <h2 class="text-2xl font-bold text-white mb-4">Buat Password Baru</h2>

        <form method="POST" action="{{ route('password.update') }}">
            @csrf
            <input type="hidden" name="token" value="{{ $token }}">
            
            <input type="email" name="email" value="{{ old('email') }}" required placeholder="Email"
                class="w-full mb-4 px-4 py-3 rounded-lg bg-white text-[#256d5a] font-semibold placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-[#256d5a]">

            <!-- Password Baru -->
            <div class="relative mb-4">
                <input type="password" name="password" id="password" required placeholder="Password Baru"
                    class="w-full px-4 py-3 rounded-lg bg-white text-[#256d5a] font-semibold placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-[#256d5a]">
                <span class="material-icons absolute right-3 top-1/2 transform -translate-y-1/2 cursor-pointer text-gray-400"
                      onclick="togglePassword('password', this)">visibility_off</span>
            </div>

            <!-- Konfirmasi Password -->
            <div class="relative mb-4">
                <input type="password" name="password_confirmation" id="password_confirmation" required placeholder="Konfirmasi Password"
                    class="w-full px-4 py-3 rounded-lg bg-white text-[#256d5a] font-semibold placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-[#256d5a]">
                <span class="material-icons absolute right-3 top-1/2 transform -translate-y-1/2 cursor-pointer text-gray-400"
                      onclick="togglePassword('password_confirmation', this)">visibility_off</span>
            </div>

            <button type="submit"
                class="w-full bg-white text-green-800 font-bold py-3 rounded-lg text-lg shadow hover:bg-gray-100 transition">
                Reset Password
            </button>
        </form>

        <div class="text-center mt-6">
            <a href="/login" class="text-white underline font-semibold">Kembali ke Login</a>
        </div>
    </div>

    <script>
        function togglePassword(inputId, icon) {
            const input = document.getElementById(inputId);
            if (input.type === "password") {
                input.type = "text";
                icon.textContent = "visibility";
            } else {
                input.type = "password";
                icon.textContent = "visibility_off";
            }
        }
    </script>
</body>
</html>
