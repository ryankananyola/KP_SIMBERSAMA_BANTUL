<!DOCTYPE html>
<html lang="id">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Login - SIMBERSAMA</title>
	<link href="https://fonts.googleapis.com/css2?family=Instrument+Sans:wght@400;600;700&display=swap" rel="stylesheet">
	<link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
	<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
</head>
<body class="bg-white font-[Instrument Sans] min-h-screen flex items-center justify-center">
	<div class="flex flex-col lg:flex-row items-center justify-center w-full max-w-5xl mx-auto gap-8 p-4">
		<div class="flex flex-col items-center flex-1">
			<div class="mb-4">
				<span class="text-[#256d5a] text-2xl font-bold tracking-wide">SIMBERSAMA</span>
			</div>
			<img src="/images/bantul-logo.png" alt="Logo Bantul" class="w-64 h-64 mb-6">
			<h1 class="text-[#256d5a] text-2xl font-bold text-center leading-tight mb-2">WEBSITE SIMBERSAMA<br><span class="text-lg font-semibold">(SISTEM INFORMASI PENGELOLAAN SAMPAH KAB. BANTUL)</span></h1>
		</div>
		<div class="flex-1 bg-[#256d5a] rounded-2xl p-10 shadow-lg flex flex-col justify-center min-w-[350px] max-w-md">
			<h2 class="text-white text-2xl font-bold mb-2">Selamat Datang!</h2>
			<p class="text-white mb-6">Sudah punya akun? <span class="font-bold">Log in</span></p>
			
			@if ($errors->has('login'))
    <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-4">
        {{ $errors->first('login') }}
    </div>
@endif
@if (session('success'))
    <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4">
        {{ session('success') }}
    </div>
@endif
			<form method="POST" action="/login">
				@csrf
				<input type="text" name="username" placeholder="Username" class="w-full mb-4 px-4 py-3 rounded-lg bg-white text-[#256d5a] font-semibold placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-[#256d5a]">
				<div class="relative mb-4">
					<input type="password" name="password" id="password" placeholder="Password" class="w-full px-4 py-3 rounded-lg bg-white text-[#256d5a] font-semibold placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-[#256d5a]">
					<span class="material-icons absolute right-3 top-1/2 transform -translate-y-1/2 cursor-pointer text-gray-400" id="toggle-password" onclick="togglePassword('password', 'toggle-password')">visibility_off</span>
				</div>
				<button type="submit" class="w-full bg-white text-[#256d5a] font-bold py-3 rounded-lg mt-2 text-lg shadow hover:bg-gray-100 transition">Login</button>
			</form>
			<hr class="my-6 border-white">
			<div class="text-black text-center">
				Belum Punya Akun? <a href="/register" class="font-bold underline">Register</a>
			</div>
			<div class="text-black text-center mt-2 text-sm">
				Lupa Password ? <a href="/password/reset" class="font-bold underline">Reset Password</a>
			</div>
			<div class="flex justify-center mt-6">
				<a href="/" class="bg-gray-200 text-[#256d5a] font-bold px-6 py-2 rounded shadow hover:bg-gray-300 transition flex items-center gap-2">
					<span class="material-icons">arrow_back</span> Kembali ke Dashboard
				</a>
			</div>
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
