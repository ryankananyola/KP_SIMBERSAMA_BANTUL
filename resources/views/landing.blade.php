<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>SIMBERSAMA – Bantul Bersama</title>

  <!-- Fonts & Tailwind -->
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700;800&display=swap" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">

  <style>
    :root{
      --brand:#256d5a; /* hijau brand */
      --brand-2:#1e5a4b;
      --paper:#f5f7f6;
    }
    body{ font-family: 'Inter', system-ui, -apple-system, Segoe UI, Roboto, 'Helvetica Neue', Arial; }
    /* kartu “statistic” */
    .stat-card{
      border-radius: 18px;
      background:#fff;
      box-shadow: 0 8px 18px rgba(0,0,0,.08);
      border:1px solid rgba(0,0,0,.06);
    }
    /* judul section tabel */
    .section-chip{
      background: var(--brand);
      color:#fff;
      border-radius:14px;
      padding:.6rem 1rem;
      font-weight:700;
      display:inline-flex;
      align-items:center;
      gap:.5rem;
    }
    /* tombol kecil Unduh */
    .btn-download{
      background:#eaf7f1;
      color:var(--brand);
      font-weight:700;
      padding:.35rem .75rem;
      border-radius:.6rem;
      display:inline-flex;
      align-items:center;
      gap:.4rem;
      border:1px solid rgba(37,109,90,.15);
    }
    .btn-download:hover{ background:#dcf1e7 }
    /* kartu konten utama */
    .main-card{
      background:#fdfdfc;
      border-radius:18px;
      box-shadow: 0 10px 24px rgba(0,0,0,.08);
      border:1px solid rgba(0,0,0,.06);
    }
  </style>
</head>

<body class="bg-[var(--paper)]">
  <!-- Header -->
  <header class="bg-[var(--brand)] px-6 md:px-10 py-4">
    <div class="max-w-6xl mx-auto flex items-center justify-between">
      <div class="flex items-center gap-3">
        <img src="{{ asset('assets/images/LogoBantul.png') }}" alt="Lambang" class="h-9 w-9 object-contain"/>
        <span class="text-green-600 text-xl md:text-2xl font-extrabold tracking-wide">SIMBERSAMA</span>

      </div>

      <div class="flex items-center gap-3">
        <a href="/register" class="hidden sm:inline-block bg-white text-[var(--brand)] font-bold px-4 py-2 rounded-md hover:bg-yellow-300 hover:text-[var(--brand-2)] transition">Daftar</a>
        <a href="/login" class="bg-white text-[var(--brand)] font-bold px-4 md:px-6 py-2 rounded-md hover:bg-yellow-300 hover:text-[var(--brand-2)] transition">Masuk</a>
      </div>
    </div>
  </header>

  <!-- Main Card -->
  <main class="max-w-6xl mx-auto px-4 md:px-6 -mt-3">
    <section class="main-card p-6 md:p-9 mt-10">
      <!-- Hero -->
      <div class="grid grid-cols-1 lg:grid-cols-2 gap-8 md:gap-12 items-center">
        <div>
          <h1 class="text-3xl md:text-4xl font-extrabold leading-tight text-gray-900">
            SISTEM INFORMASI<br/>
            PENGELOLAAN SAMPAH<br/>
            KAB.BANTUL
          </h1>

          <p class="text-gray-700 mt-4 md:mt-5 max-w-xl">
            Dinas Lingkungan Hidup Kabupaten Bantul membuat Aplikasi ini dengan harapan agar
            <span class="font-bold">BUMKal</span> dapat mengelola Sampah tersebut dengan mudah.
            Sehingga dapat mensukseskan <span class="font-bold">Bantul Bersih Sampah 2025 (Bantul Bersama)</span>
          </p>

          <div class="mt-6">
            <a href="/login"
               class="inline-flex items-center gap-2 bg-[var(--brand)] hover:bg-[var(--brand-2)] text-white font-bold px-6 py-2.5 rounded-lg shadow">
              Mulai
            </a>
          </div>
        </div>

        <!-- Space untuk ilustrasi (gambar/komponen apa pun) -->
        <div class="w-full">
          <!-- Ganti div ini dengan <img ...> atau ilustrasi lain saat siap -->
          <div class="w-full h-72 md:h-80 rounded-xl bg-white flex items-center justify-center">
            <img
            src="{{ asset('assets/images/Icon.png') }}"
            alt="Ilustrasi SIMBERSAMA"
            >
          </div>
        </div>
      </div>

      <!-- Statistic Cards -->
      <div class="grid grid-cols-1 sm:grid-cols-3 gap-5 mt-8">
        <!-- Card 1 -->
        <div class="stat-card px-6 py-5 text-center">
          <div class="text-4xl font-extrabold text-gray-900">155</div>
          <div class="mt-1 text-gray-600">Bank Sampah</div>
        </div>

        <!-- Card 2 -->
        <div class="stat-card px-6 py-5 text-center">
          <div class="text-3xl font-extrabold text-gray-900">Organik</div>
          <div class="mt-1 text-gray-600">Jenis Sampah Terbanyak</div>
        </div>

        <!-- Card 3 -->
        <div class="stat-card px-6 py-5 text-center">
          <div class="text-4xl font-extrabold text-gray-900">120 ton</div>
          <div class="mt-1 text-gray-600">Total Sampah</div>
        </div>
      </div>

      <!-- Download List -->
      <div class="mt-10">
        <div class="flex items-center justify-between mb-3">
          <div class="section-chip">Judul</div>
          <div class="section-chip">File</div>
        </div>

        <div class="bg-white rounded-xl overflow-hidden border border-gray-200">
          <!-- Row -->
          <div class="grid grid-cols-12 items-center px-4 py-3 border-b border-gray-100">
            <div class="col-span-10 text-gray-800">Buku Panduan</div>
            <div class="col-span-2 flex justify-end">
              <a href="#" class="btn-download">
                <span>⬇</span> Unduh
              </a>
            </div>
          </div>

          <div class="grid grid-cols-12 items-center px-4 py-3 border-b border-gray-100">
            <div class="col-span-10 text-gray-800">Template Surat Pembangunan Bumi</div>
            <div class="col-span-2 flex justify-end">
              <a href="#" class="btn-download">
                <span>⬇</span> Unduh
              </a>
            </div>
          </div>
          </div>

          <!-- contoh item lain -->
          <div class="grid grid-cols-12 items-center px-4 py-3">
            <div class="col-span-10 text-gray-800">Video Tutorial</div>
            <div class="col-span-2 flex justify-end">
              <a href="#" class="btn-download">
                <span>⬇</span> Unduh
              </a>
            </div>
          </div>
        </div>
      </div>

      <!-- Info Kontak + Map -->
      <div class="mt-8">
        <div class="bg-white rounded-xl border border-gray-200 shadow-sm p-4 sm:p-5">
          <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
            <div>
              <div class="font-bold text-gray-800 mb-1">Informasi Kontak</div>
              <div class="font-bold text-gray-900">
                Dinas Lingkungan Hidup Kabupaten Bantul
              </div>
              <p class="text-gray-700 mt-1">
                Komplek Kantor Pemda Bantul, JL. Lkr. Timur JL. Manding Kidul, Area Sawah,
                Trirenggo, Kec. Bantul, Kabupaten Bantul, Daerah Istimewa Yogyakarta 55714
              </p>
            </div>
            <div>
              <div class="rounded-lg overflow-hidden border border-gray-200">
                <iframe
                  src="https://www.google.com/maps?q=Dinas+Lingkungan+Hidup+Kabupaten+Bantul&output=embed"
                  width="100%" height="220" style="border:0;" allowfullscreen="" loading="lazy">
                </iframe>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>

    <!-- Footer -->
    <footer class="text-center text-[11px] md:text-xs text-gray-500 py-8">
      Copyright © 2021 - 2025
      <span class="font-bold text-[var(--brand)]">SIMBERSAMA</span> Allright Reserved.
      <br/>Dibuat dengan ❤️ oleh #UPNPLOPOR
    </footer>
  </main>
</body>
</html>
