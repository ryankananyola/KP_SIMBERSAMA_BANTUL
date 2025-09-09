
<!DOCTYPE html>
<html lang="id">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Login - SIMBERSAMA</title>
	<link href="https://fonts.googleapis.com/css2?family=Instrument+Sans:wght@400;600;700&display=swap" rel="stylesheet">
	<link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
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
			<form>
				<input type="text" placeholder="Username" class="w-full mb-4 px-4 py-3 rounded-lg bg-white text-[#256d5a] font-semibold placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-[#256d5a]">
				<input type="password" placeholder="Password" class="w-full mb-4 px-4 py-3 rounded-lg bg-white text-[#256d5a] font-semibold placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-[#256d5a]">
				<div class="mb-4">
					<!-- Simulasi reCAPTCHA -->
					<div class="bg-white rounded-lg border p-4 flex items-center justify-between">
						<div class="flex items-center gap-2">
							<input type="checkbox" class="w-5 h-5">
							<span class="text-[#256d5a] font-semibold">I'm not a robot</span>
						</div>
						<img src="https://www.gstatic.com/recaptcha/api2/logo_48.png" alt="reCAPTCHA" class="w-10 h-10">
					</div>
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
		</div>
	</div>
</body>
</html>
