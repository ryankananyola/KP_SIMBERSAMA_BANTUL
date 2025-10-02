<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lupa Password - SIMBERSAMA</title>
    <link href="https://fonts.googleapis.com/css2?family=Instrument+Sans:wght@400;600;700&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-white font-[Instrument Sans] min-h-screen flex items-center justify-center">
    <div class="bg-green-800 rounded-2xl p-10 shadow-lg w-full max-w-md">
        <h2 class="text-2xl font-bold text-white mb-2">Lupa Password?</h2>
        <p class="text-white mb-6">Masukkan email yang terdaftar, kami akan mengirimkan link reset password.</p>

        @if (session('status'))
            <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4">
                {{ session('status') }}
            </div>
        @endif

        <form method="POST" action="{{ route('password.email') }}">
            @csrf
            <input type="email" name="email" required autofocus placeholder="Alamat Email"
                class="w-full mb-4 px-4 py-3 rounded-lg bg-white text-[#256d5a] font-semibold placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-[#256d5a]">

            <div class="mb-4">
                {!! NoCaptcha::display() !!}
                @if ($errors->has('g-recaptcha-response'))
                    <span class="text-red-500 text-sm">
                        {{ $errors->first('g-recaptcha-response') }}
                    </span>
                @endif
            </div>

            <button type="submit"
                class="w-full bg-white text-green-800 font-bold py-3 rounded-lg text-lg shadow hover:bg-gray-100 transition">
                Kirim Link Reset
            </button>
        </form>

        <div class="text-center mt-6">
            <a href="/login" class="text-white underline font-semibold">Kembali ke Login</a>
        </div>
    </div>
</body>
{!! NoCaptcha::renderJs() !!}
</html>
