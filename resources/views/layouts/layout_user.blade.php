<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User - SIMBERSAMA</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    
    <style>
        body { 
            background: #f8f9fa; 
            transition: all 0.3s; 
            overflow-x: hidden;
        }
        .sidebar {
            background: #fff;
            min-height: 100vh;
            color: #000000;
            width: 16.5rem;
            transition: all 0.3s;
            position: fixed;
            top: 0;
            left: 0;
            z-index: 1000;
            box-shadow: 2px 0 8px rgba(0,0,0,0.1);
        }
        .sidebar.collapsed {
            margin-left: -16.5rem;
        }
        .content {
            margin-left: 16.5rem;
            transition: all 0.3s;
            width: calc(100% - 16.5rem);
            overflow-x: hidden;         
        }
        .content.expanded {
            margin-left: 0; 
            width: 100%;
        }
        .sidebar .nav-link, 
        .sidebar .nav-link:visited { 
            color: #000000; 
        }
        .sidebar .nav-link.active {
            background: #004d40;
            color: #fff !important;
            font-weight: bold;
        }
        .sidebar .nav-link:hover { 
            background: #e0f2f1; 
            color: #256d5a; 
        }
        .sidebar .menu-title {
            font-size: 0.95rem;
            font-weight: bold;
            margin-top: 1.5rem;
            margin-bottom: 0.5rem;
            color: #000000;
        }
        .sidebar .material-icons { 
            vertical-align: middle; 
            margin-right: 8px; 
        }
        .profile-icon {
            background: #fff;
            color: #256d5a;
            border-radius: 50%;
            padding: 6px;
            font-size: 28px;
        }
        
        #topbarToggle { 
            display: inline-block; 
            color: #ffffff;
            cursor: pointer;
        }

        @media (max-width: 768px) {
            .sidebar {
                margin-left: -16.5rem;
            }
            .sidebar.show {
                margin-left: 0;
            }
            .content {
                margin-left: 0;
                width: 100%;
            }
        }
    </style>
</head>
<body>
<div class="container-fluid">
    <div class="row">
        <nav id="sidebar" class="col-md-3 col-lg-2 d-md-block sidebar py-3 px-0">
            <div class="d-flex align-items-center mb-4 px-3">
                <img src="{{ asset('assets/images/LogoBantul.png') }}" alt="Logo Bantul" 
                     style="width:40px; height:40px; object-fit:contain;" class="me-2">
                <span class="fw-bold">SIMBERSAMA</span>
            </div>
            <ul class="nav flex-column px-2">
                <li class="nav-item mb-2">
                    <a class="nav-link {{ request()->is('dashboard_user') ? 'active' : '' }}" href="/dashboard_user">
                        <span class="material-icons">dashboard</span> Dashboard
                    </a>
                </li>

                <div class="menu-title">MENU UTAMA</div>
                <li class="nav-item mb-1">
                    <a class="nav-link {{ request()->routeIs('user.data_umum') ? 'active' : '' }}" 
                        href="{{ route('user.data_umum') }}">
                        <span class="material-icons">fact_check</span> Data Umum
                    </a>
                </li>
                <li class="nav-item mb-1">
                    <a class="nav-link {{ request()->routeIs('user.data_periodik') ? 'active' : '' }}" 
                        href="{{ route('user.data_periodik') }}">
                        <span class="material-icons">date_range</span> Data Periodik
                    </a>
                </li>
                <li class="nav-item mb-1">
                    <a class="nav-link {{ request()->routeIs('user.upload_sk') ? 'active' : '' }}" 
                        href="{{ route('user.upload_sk') }}">
                        <span class="material-icons">upload_file</span> Upload SK
                    </a>
                </li>
                <li class="nav-item mb-1">
                    <a class="nav-link {{ request()->routeIs('user.riwayat_laporan_user') ? 'active' : '' }}" 
                    href="{{ route('user.riwayat_laporan_user') }}">
                        <span class="material-icons">history</span> Riwayat Laporan
                    </a>
                </li>
                <li class="nav-item mt-4">
                    <button type="button" 
                            class="nav-link btn btn-link text-black w-100 text-start" 
                            data-bs-toggle="modal" data-bs-target="#logoutModal">
                        <span class="material-icons">logout</span> Logout
                    </button>
                </li>
            </ul>
        </nav>

        <main id="content" class="px-md-4 content">
            <div class="d-flex align-items-center py-3 mb-3 border-bottom px-3 sticky-top" style="min-height:56px; z-index: 1020; background-color:#004d40; color:white; box-shadow: 0 2px 4px rgba(0,0,0,0.1);">
                <span id="topbarToggle" class="material-icons me-3" onclick="toggleSidebar()">menu</span>
                <a href="{{ route('user.profile') }}" class="ms-auto" style="text-decoration:none; display:flex; align-items:center; justify-content:center; width:36px; height:36px; border-radius:50%; border:2px solid #256d5a; background:#fff; color:#256d5a;">
                    @if(Auth::user()->foto)
                        <img src="{{ asset('storage/' . Auth::user()->foto) }}"
                            alt="Foto Profil"
                            class="rounded-circle"
                            style="width:36px; height:36px; object-fit:cover;">
                    @else
                        <span class="material-icons" style="font-size:28px;">person</span>
                    @endif
                </a>
            </div>

            @yield('content')
        </main>

        <div class="modal fade" id="logoutModal" tabindex="-1" aria-labelledby="logoutModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
            <div class="modal-header bg-danger text-white">
                <h5 class="modal-title" id="logoutModalLabel">Konfirmasi Logout</h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                Apakah Anda yakin ingin keluar dari aplikasi?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                <form action="{{ route('logout') }}" method="POST" class="d-inline">
                    @csrf
                    <button type="submit" class="btn btn-danger">Ya, Logout</button>
                </form>
            </div>
            </div>
        </div>
        </div>
    </div>
</div>

<script>
    function toggleSidebar() {
        const sidebar = document.getElementById('sidebar');
        const content = document.getElementById('content');

        if (window.innerWidth <= 768) {
            sidebar.classList.toggle('show');
        } else {
            sidebar.classList.toggle('collapsed');
            content.classList.toggle('expanded');

            if (sidebar.classList.contains('collapsed')) {
                localStorage.setItem('sidebar', 'collapsed');
            } else {
                localStorage.setItem('sidebar', 'expanded');
            }
        }
    }

    document.addEventListener("DOMContentLoaded", function() {
        const sidebar = document.getElementById('sidebar');
        const content = document.getElementById('content');
        const state = localStorage.getItem('sidebar');

        if (window.innerWidth > 768 && state === 'collapsed') {
            sidebar.classList.add('collapsed');
            content.classList.add('expanded');
        }
    });
</script>

<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js"></script>

</body>
</html>
