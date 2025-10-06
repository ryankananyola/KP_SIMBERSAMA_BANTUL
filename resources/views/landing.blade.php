<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>SIMBERSAMA – Bantul Bersama</title>

  
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700;800&display=swap" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">

  <style>
    :root{
      --brand:#256d5a; 
      --brand-2:#1e5a4b;
      --paper:#f5f7f6;
    }
    body{ font-family: 'Inter', system-ui, -apple-system, Segoe UI, Roboto, 'Helvetica Neue', Arial; !important}
    
    .stat-card{
      border-radius: 18px;
      background:#fff;
      box-shadow: 0 8px 18px rgba(0,0,0,.08);
      border:1px solid rgba(0,0,0,.06);
    }
    
    .section-header-box {
  border: 2px solid #198754; /* hijau garis */
  border-radius: 14px;
  background-color: #fff; /* putih di dalam */
  display: flex;
  justify-content: space-between;
  align-items: center;
  padding: 0.6rem 1rem;
  font-weight: 700;
  color: #198754; /* teks hijau */
}
    
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
    
    .main-card{
      background:#fdfdfc;
      border-radius:18px;
      box-shadow: 0 10px 24px rgba(0,0,0,.08);
      border:1px solid rgba(0,0,0,.06);
    }
    
    .landing-page-wrapper {
      background-color: var(--brand);
      padding: 30px 15%;
      min-height: 100vh;
      display: flex;
      justify-content: center;
    }
    
    .content-wrapper {
      background-color: #fff;
      border-radius: 18px;
      padding: 30px;
      width: 100%;
      box-shadow: 0 10px 24px rgba(0,0,0,.08);
      max-width: 1200px;
      margin-top: 5px; 
    }

    .content-box-green {
  background-color: white;
  border: 2px solid green;
  border-radius: 0.75rem;
  overflow: hidden;
  box-shadow: 0 2px 6px rgba(0, 0, 0, 0.05);
}

  </style>
</head>

<body class="bg-[var(--paper)]">
  <div class="landing-page-wrapper">
    <div class="content-wrapper">
      <header class="bg-[var(--brand)] px-6 md:px-10 py-4">
        <div class="max-w-6xl mx-auto flex items-center justify-between">
          <div class="flex items-center gap-3">
            <img src="{{ asset('assets/images/LogoBantul.png') }}" alt="Lambang" class="h-9 w-9 object-contain"/>
            <span class="text-green-600 text-xl md:text-2xl font-extrabold tracking-wide">SIMBERSAMA</span>
          </div>

          <div class="flex items-center gap-3">
            <a href="/register" class="hidden sm:inline-block bg-white text-[var(--brand)] font-bold px-4 py-2 rounded-md hover:bg-yellow-300 hover:text-[var(--brand-2)] transition">Daftar</a>
            <a href="/login" class="bg-green-600 text-white font-bold px-4 md:px-6 py-2 rounded-md hover:bg-yellow-300 hover:text-[var(--brand-2)] transition">Masuk</a>
          </div>
        </div>
      </header>

      <main class="max-w-6xl mx-auto px-4 md:px-6">
        <section class="main-card p-6 md:p-9 mt-10">
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
                   class="inline-flex items-center gap-2 bg-green-600 hover:bg-green text-white font-bold px-6 py-2.5 rounded-lg shadow">
                  Mulai
                </a>
              </div>
            </div>

            <div class="w-full">
              <div class="w-full h-72 md:h-80 rounded-xl bg-white flex items-center justify-center">
                <img
                src="{{ asset('assets/images/Icon.png') }}"
                alt="Ilustrasi SIMBERSAMA"
                class="h-70 w-70 object-contain"
                >
              </div>
            </div>
          </div>

          <div class="grid grid-cols-1 sm:grid-cols-3 gap-5 mt-8">
            <div class="stat-card px-6 py-5 text-center">
              <div class="text-4xl font-extrabold text-gray-900">{{ $totalBankSampah }}</div>
              <div class="mt-1 text-gray-600">Bank Sampah</div>
            </div>

            <div class="stat-card px-6 py-5 text-center">
              <div class="text-3xl font-extrabold text-gray-900">
                {{ $jenisTerbanyak ?? '-' }}
              </div>
              <div class="mt-1 text-gray-600">Jenis Sampah Terbanyak</div>
            </div>

            <div class="stat-card px-6 py-5 text-center">
              <div class="text-4xl font-extrabold text-gray-900">
                {{ $formattedTotalSampah }}
              </div>
              <div class="mt-1 text-gray-600">Total Sampah</div>
            </div>
          </div>
          <div class="mt-10 flex justify-center">
            <div class="bg-white border-2 border-green-600 rounded-xl shadow-sm overflow-hidden w-3/4">
              <table class="min-w-full text-center border-collapse">
                <!-- Header -->
                <thead class="bg-white border-b-2 border-green-600">
                  <tr class="text-green-700 font-semibold">
                    <th class="py-3 px-4">Judul</th>
                    <th class="py-3 px-4">File</th>
                  </tr>
                </thead>
          
                <!-- Isi Tabel -->
                <tbody>
                  <tr class="border-b border-gray-200">
                    <td class="py-3 px-4 text-gray-800">Buku Panduan</td>
                    <td class="py-3 px-4">
                      <a href="https://drive.google.com/file/d/1Sbv44XKbyC887ux-60rLcW-8jiz8h_b8/view"
                         class="inline-block bg-green-600 text-white font-semibold py-2 px-4 rounded-md shadow-sm hover:bg-green-700 transition">
                        ⬇ Unduh
                      </a>
                    </td>
                  </tr>
                  <tr>
                    <td class="py-3 px-4 text-gray-800">Video Tutorial</td>
                    <td class="py-3 px-4">
                      <a href="#"
                         class="inline-block bg-green-600 text-white font-semibold py-2 px-4 rounded-md shadow-sm hover:bg-green-700 transition">
                        ⬇ Unduh
                      </a>
                    </td>
                  </tr>
                </tbody>
              </table>
            </div>
          </div>
          
          

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

        <footer class="text-center text-[11px] md:text-xs text-gray-500 py-8">
          Copyright © 2025
          <span class="font-bold text-[var(--brand)]">SIMBERSAMA</span> Allright Reserved.
          <br/>Dibuat dengan ❤️ oleh #UPNPLOPOR
        </footer>
      </main>
    </div>
  </div>
</body>
</html>