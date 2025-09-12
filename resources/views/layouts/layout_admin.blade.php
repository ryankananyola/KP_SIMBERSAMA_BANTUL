<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin - SIMBERSAMA</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <style>
        body { background: #f8f9fa; }
        .sidebar {
            background: #21706c;
            min-height: 100vh;
            color: #fff;
        }
        .sidebar .nav-link, .sidebar .nav-link:visited {
            color: #fff;
        }
        .sidebar .nav-link.active {
            background: #004d40; /* warna hijau tua */
            color: #fff !important;
            font-weight: bold;
        }
        .sidebar .nav-link:hover {
            background: #e0f2f1;
            color: #21706c;
        }
        .sidebar .menu-title {
            font-size: 0.95rem;
            font-weight: bold;
            margin-top: 1.5rem;
            margin-bottom: 0.5rem;
            color: #b2dfdb;
        }
        .sidebar .material-icons {
            vertical-align: middle;
            margin-right: 8px;
        }
        .profile-icon {
            background: #fff;
            color: #21706c;
            border-radius: 50%;
            padding: 6px;
            font-size: 28px;
        }
    </style>
</head>
<body>
<div class="container-fluid">
    <div class="row">
        <nav class="col-md-3 col-lg-2 d-md-block sidebar py-3 px-0 position-fixed">
            <div class="d-flex align-items-center mb-4 px-3">
                <img src="/images/bantul-logo.png" alt="Logo" style="width:40px;height:40px;">
                <span class="ms-2 fw-bold">SIMBERSAMA</span>
            </div>
            <ul class="nav flex-column px-2">
                <li class="nav-item mb-2">
                    <a class="nav-link {{ request()->is('dashboard_admin') ? 'active' : '' }}" href="/dashboard_admin">
                        <span class="material-icons">dashboard</span> Dashboard
                    </a>
                </li>
                <div class="menu-title">MENU UTAMA</div>
                <li class="nav-item mb-1">
                    <a class="nav-link {{ request()->is('dashboard_admin/data-umum') ? 'active' : '' }}" href="/dashboard_admin/data-umum">
                        <span class="material-icons">fact_check</span> Data Umum
                    </a>
                </li>
                <li class="nav-item mb-1">
                    <a class="nav-link {{ request()->is('dashboard_admin/data-periodik') ? 'active' : '' }}" href="/dashboard_admin/data-periodik">
                        <span class="material-icons">date_range</span> Data Periodik
                    </a>
                </li>
                <div class="menu-title">MANAJEMEN AKUN</div>
                <li class="nav-item mb-1">
                    <a class="nav-link {{ request()->is('dashboard_admin/registrasi-baru') ? 'active' : '' }}" href="/dashboard_admin/registrasi-baru">
                        <span class="material-icons">person_add</span> Registrasi Baru
                    </a>
                </li>
                <li class="nav-item mb-1">
                    <a class="nav-link {{ request()->is('dashboard_admin/registrasi-petugas') ? 'active' : '' }}" href="/dashboard_admin/registrasi-petugas">
                        <span class="material-icons">group_add</span> Registrasi Petugas
                    </a>
                </li>
                <li class="nav-item mb-1">
                    <a class="nav-link {{ request()->is('dashboard_admin/akun-nonaktif') ? 'active' : '' }}" href="/dashboard_admin/akun-nonaktif">
                        <span class="material-icons">person_off</span> Akun Nonaktif
                    </a>
                </li>
                <div class="menu-title">SISTEM & PENGATURAN</div>
                <li class="nav-item mb-1">
                    <a class="nav-link {{ request()->is('dashboard_admin/data-admin') ? 'active' : '' }}" href="/dashboard_admin/data-admin">
                        <span class="material-icons">admin_panel_settings</span> Data Admin
                    </a>
                </li>
                <li class="nav-item mb-1">
                    <a class="nav-link {{ request()->is('dashboard_admin/pengaturan-website') ? 'active' : '' }}" href="/dashboard_admin/pengaturan-website">
                        <span class="material-icons">settings</span> Pengaturan Website
                    </a>
                </li>
                <li class="nav-item mt-4">
                    <a class="nav-link" href="/" onclick="return confirm('Yakin ingin logout?')">
                        <span class="material-icons">logout</span> Logout
                    </a>
                </li>
            </ul>
        </nav>
        <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4" style="margin-left:16.5rem;">
            <div class="d-flex justify-content-end align-items-center py-3 mb-3 border-bottom bg-white" style="min-height:56px;">
                <span class="profile-icon material-icons">account_circle</span>
            </div>
            @yield('content')
        </main>
    </div>
</div>
</body>
</html>
