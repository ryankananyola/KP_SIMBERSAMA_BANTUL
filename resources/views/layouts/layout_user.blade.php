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
        }
        .sidebar {
            background: #256d5a;
            min-height: 100vh;
            color: #fff;
            width: 16.5rem;
            transition: all 0.3s;
        }
        .sidebar.collapsed {
            margin-left: -16.5rem;
        }
        .content {
            margin-left: 16.5rem;
            transition: all 0.3s;
            max-width: 100%;    
            overflow-x: hidden;
        }
        .content.expanded {
            margin-left: 0; 
        }
        .sidebar .nav-link, 
        .sidebar .nav-link:visited { 
            color: #fff; 
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
            color: #b2dfdb;
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
        .toggle-btn {
            cursor: pointer;
            color: #fff;
        }
        #topbarToggle { 
            display: none; 
        }
        .sidebar.collapsed ~ .content #topbarToggle {
            display: inline-block;
        }
    </style>
</head>
<body>
<div class="container-fluid">
    <div class="row">
        <nav id="sidebar" class="col-md-3 col-lg-2 d-md-block sidebar py-3 px-0 position-fixed">
            <div class="d-flex align-items-center mb-4 px-3">
                <span class="material-icons toggle-btn me-2" onclick="toggleSidebar()">menu</span>
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
                    <a class="nav-link {{ request()->is('riwayat-laporan') ? 'active' : '' }}" href="/riwayat-laporan">
                        <span class="material-icons">history</span> Riwayat Laporan
                    </a>
                </li>

                <li class="nav-item mt-4">
                    <form action="{{ route('logout') }}" method="POST" class="d-inline">
                        @csrf
                        <button type="submit" class="nav-link btn btn-link text-white w-100 text-start"
                                onclick="return confirm('Yakin ingin logout?')">
                            <span class="material-icons">logout</span> Logout
                        </button>
                    </form>
                </li>
            </ul>
        </nav>

        <main id="content" class="px-md-4 content">
            <div class="d-flex align-items-center py-3 mb-3 border-bottom bg-white px-3" style="min-height:56px;">
                <span id="topbarToggle" class="material-icons toggle-btn me-3" onclick="toggleSidebar()" style="color:#256d5a;">
                    menu
                </span>
                <span class="profile-icon material-icons ms-auto">account_circle</span>
            </div>

            @yield('content')
        </main>
    </div>
</div>

<script>
    function toggleSidebar() {
        document.getElementById('sidebar').classList.toggle('collapsed');
        document.getElementById('content').classList.toggle('expanded');
    }
</script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/ZjvgyolUkIqf3L4N1zU2j3zUksdQRVvoxMfooAo8n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>

</body>
</html>
