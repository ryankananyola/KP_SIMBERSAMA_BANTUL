<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SIMBERSAMA - Bantul Bersama</title>
    <link href="https://fonts.googleapis.com/css2?family=Instrument+Sans:wght@400;600;700&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-[#f5f7f6] font-[Instrument Sans]">
    <header class="bg-[#256d5a] py-4 px-8 flex justify-between items-center shadow-md">
        <div class="text-white text-2xl font-bold tracking-wide">SIMBERSAMA</div>
        <a href="/login" class="bg-[#f7e94a] text-[#256d5a] font-bold px-6 py-2 rounded hover:bg-[#ffe066] transition">LOGIN</a>
    </header>

    <main class="max-w-5xl mx-auto mt-8 bg-[#fdfdfc] rounded-xl shadow-lg p-8">
        <div class="flex flex-col lg:flex-row items-center gap-10">
            <div class="flex-1">
                <h1 class="text-4xl font-extrabold mb-2 leading-tight">WEBSITE SIMBERSAMA</h1>
                <h2 class="text-2xl font-bold mb-4">(SISTEM INFORMASI PENGELOLAAN SAMPAH KAB. BANTUL)</h2>
                <p class="text-gray-700 mb-6">Dinas Lingkungan Hidup Kabupaten Bantul membuat aplikasi ini dengan harapan agar <span class="font-bold">BUMKal</span> dapat mengelola sampah tersebut dengan mudah. Sehingga dapat mensukseskan <span class="font-bold">Bantul Bersih Sampah 2025 (Bantul Bersama)</span></p>
                <div class="flex gap-4 mb-6">
                    <a href="#" class="bg-[#256d5a] text-black font-bold px-5 py-2 rounded flex items-center gap-2 shadow hover:bg-[#1e5647] transition">
                        <span class="material-icons">menu_book</span> BUKU PANDUAN
                    </a>
                    <a href="#" class="bg-[#256d5a] text-black font-bold px-5 py-2 rounded flex items-center gap-2 shadow hover:bg-[#1e5647] transition">
                        <span class="material-icons">play_circle</span> VIDEO PANDUAN
                    </a>
                </div>
            </div>
            <div class="flex-shrink-0">
                <img src="{{ asset('assets/images/LogoBantul.png') }}" alt="Logo Bantul"
                    class="h-64 w-auto mb-6 mx-auto">
            </div>
        </div>

        <hr class="my-8">
        <h2 class="text-2xl font-bold mb-4">FILE DOWNLOAD</h2>
        <div class="overflow-x-auto">
            <table class="w-full text-left rounded-lg overflow-hidden">
                <thead class="bg-[#256d5a] text-white">
                    <tr>
                        <th class="px-4 py-2">#</th>
                        <th class="px-4 py-2">Judul</th>
                        <th class="px-4 py-2">File</th>
                    </tr>
                </thead>
                <tbody class="bg-white">
                    <tr>
                        <td class="px-4 py-2">1</td>
                        <td class="px-4 py-2">Contoh File Panduan</td>
                        <td class="px-4 py-2"><a href="#" class="text-[#256d5a] underline font-bold">Download</a></td>
                    </tr>
                </tbody>
            </table>
        </div>

        <hr class="my-8">
        <h2 class="text-xl font-bold mb-2">Informasi Kontak</h2>
        <div class="flex flex-col lg:flex-row gap-4 items-start">
            <div class="flex-1">
                <p class="font-bold">Dinas Lingkungan Hidup Kabupaten Bantul</p>
                <p>Komplek Kantor Pemda Bantul, JL. Lkr. Timur JL. Manding Kidul, Area Sawah, Trirenggo, Kec. Bantul, Kabupaten Bantul, Daerah Istimewa Yogyakarta 55714</p>
            </div>
            <div class="flex-shrink-0">
                <iframe src="https://www.google.com/maps?q=Dinas+Lingkungan+Hidup+Kabupaten+Bantul&output=embed" width="250" height="150" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
            </div>
        </div>
    </main>

    <footer class="text-center text-xs text-gray-500 py-6">
        Copyright © 2025 - Present <span class="font-bold text-[#2d6a5e]">SIMBERSAMA</span> Allright Reserved.<br>
        Dibuat dengan <span class="font-bold">oleh #HellNah</span>
    </footer>

    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
</body>
</html>
