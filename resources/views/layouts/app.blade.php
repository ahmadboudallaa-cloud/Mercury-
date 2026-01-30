<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Manager</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css" rel="stylesheet">
    <style>
        :root {
            --primary-red: #dc2626;
            --dark-bg: #000000;
            --light-bg: #ffffff;
            --text-dark: #111827;
            --text-light: #ffffff;
            --border-color: #e5e7eb;
            --sidebar-width: 280px;
        }
        
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        
        body {
            background-color: var(--light-bg);
            font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, sans-serif;
            color: var(--text-dark);
            line-height: 1.5;
            overflow-x: hidden;
        }
        
        
        .sidebar {
            position: fixed;
            top: 0;
            left: 0;
            height: 100vh;
            width: var(--sidebar-width);
            background-color: var(--dark-bg);
            color: var(--text-light);
            padding: 0;
            z-index: 1000;
            box-shadow: 5px 0 15px rgba(0, 0, 0, 0.1);
            display: flex;
            flex-direction: column;
        }
        
        .sidebar-header {
            padding: 30px;
            background-color: rgba(255, 255, 255, 0.05);
            border-bottom: 1px solid rgba(255, 255, 255, 0.1);
        }
        
        .logo {
            display: flex;
            align-items: center;
            gap: 15px;
            text-decoration: none;
            color: var(--text-light);
        }
        
        .logo-icon {
            width: 40px;
            height: 40px;
            background-color: var(--primary-red);
            border-radius: 8px;
            display: flex;
            align-items: center;
            justify-content: center;
        }
        
        .logo-icon i {
            font-size: 20px;
        }
        
        .logo-text h1 {
            font-size: 24px;
            font-weight: 700;
            margin: 0;
            color: var(--text-light);
        }
        
        .logo-text p {
            font-size: 12px;
            opacity: 0.7;
            margin: 5px 0 0 0;
            color: rgba(255, 255, 255, 0.7);
        }
        
        .sidebar-menu {
            padding: 30px 0;
            flex: 1;
        }
        
        .menu-section {
            margin-bottom: 30px;
        }
        
        .menu-title {
            font-size: 11px;
            text-transform: uppercase;
            letter-spacing: 1px;
            color: rgba(255, 255, 255, 0.5);
            font-weight: 600;
            margin-bottom: 15px;
            padding: 0 30px;
        }
        
        .nav-item {
            margin-bottom: 5px;
        }
        
        .nav-link {
            display: flex;
            align-items: center;
            gap: 15px;
            color: rgba(255, 255, 255, 0.8);
            padding: 15px 30px;
            text-decoration: none;
            transition: all 0.3s ease;
            font-size: 15px;
            font-weight: 500;
            border-left: 3px solid transparent;
        }
        
        .nav-link:hover {
            background-color: rgba(255, 255, 255, 0.05);
            color: var(--text-light);
            border-left-color: var(--primary-red);
        }
        
        .nav-link.active {
            background-color: rgba(255, 255, 255, 0.08);
            color: var(--text-light);
            border-left-color: var(--primary-red);
        }
        
        .nav-link i {
            font-size: 18px;
            width: 24px;
            text-align: center;
        }
        
        .main-content {
            margin-left: var(--sidebar-width);
            min-height: 100vh;
            background-color: #f9fafb;
        }
        
        .content-header {
            background-color: var(--light-bg);
            padding: 25px 40px;
            border-bottom: 1px solid var(--border-color);
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.05);
        }
        
        .page-title {
            font-size: 28px;
            font-weight: 700;
            color: var(--text-dark);
            margin: 0;
        }
        
        .page-subtitle {
            color: #6b7280;
            font-size: 15px;
            margin: 8px 0 0 0;
        }
        
        .main-container {
            padding: 40px;
        }
        
        .card {
            border: none;
            border-radius: 12px;
            background-color: var(--light-bg);
            box-shadow: 0 1px 3px rgba(0, 0, 0, 0.1);
            margin-bottom: 24px;
            border: 1px solid var(--border-color);
        }
        
        .card-header {
            background-color: var(--light-bg);
            border-bottom: 1px solid var(--border-color);
            padding: 20px 30px;
            border-radius: 12px 12px 0 0 !important;
        }
        
        .card-title {
            font-size: 18px;
            font-weight: 600;
            color: var(--text-dark);
            margin: 0;
            display: flex;
            align-items: center;
            gap: 12px;
        }
        
        .card-body {
            padding: 30px;
        }
        
        .btn-primary {
            background-color: var(--primary-red);
            border: none;
            padding: 10px 24px;
            border-radius: 8px;
            font-weight: 600;
            font-size: 14px;
            transition: all 0.3s;
            color: white;
        }
        
        .btn-primary:hover {
            background-color: #b91c1c;
            transform: translateY(-1px);
            box-shadow: 0 4px 12px rgba(220, 38, 38, 0.2);
            color: white;
        }
        
        .btn-outline-primary {
            border: 2px solid var(--primary-red);
            color: var(--primary-red);
            background-color: transparent;
            padding: 8px 20px;
            border-radius: 8px;
            font-weight: 500;
            transition: all 0.3s;
        }
        
        .btn-outline-primary:hover {
            background-color: var(--primary-red);
            color: white;
        }
        
        .btn-outline-danger {
            border: 2px solid #dc2626;
            color: #dc2626;
            background-color: transparent;
        }
        
        .btn-outline-danger:hover {
            background-color: #dc2626;
            color: white;
        }
        
        .table {
            margin-bottom: 0;
            color: var(--text-dark);
        }
        
        .table thead th {
            background-color: #f9fafb;
            border-bottom: 2px solid var(--border-color);
            color: #374151;
            font-weight: 600;
            font-size: 13px;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            padding: 16px;
            white-space: nowrap;
        }
        
        .table tbody td {
            padding: 16px;
            vertical-align: middle;
            border-color: var(--border-color);
        }
        
        .table-hover tbody tr:hover {
            background-color: #f9fafb;
        }
        
        .avatar {
            width: 40px;
            height: 40px;
            background-color: var(--primary-red);
            border-radius: 8px;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-weight: 600;
            font-size: 16px;
        }
        
        .badge {
            padding: 6px 12px;
            border-radius: 20px;
            font-weight: 500;
            font-size: 12px;
            letter-spacing: 0.3px;
        }
        
        .badge-primary {
            background-color: var(--primary-red);
            color: white;
        }
        
        .badge-secondary {
            background-color: #e5e7eb;
            color: #4b5563;
        }
        
        .form-control, .form-select {
            border: 2px solid var(--border-color);
            border-radius: 8px;
            padding: 10px 16px;
            font-size: 15px;
            transition: all 0.3s;
            background-color: var(--light-bg);
            color: var(--text-dark);
        }
        
        .form-control:focus, .form-select:focus {
            border-color: var(--primary-red);
            box-shadow: 0 0 0 3px rgba(220, 38, 38, 0.1);
            outline: none;
        }
        
        .form-label {
            font-weight: 600;
            color: var(--text-dark);
            margin-bottom: 8px;
            font-size: 14px;
            display: block;
        }
        
        .alert {
            border: none;
            border-radius: 8px;
            padding: 16px 20px;
            margin-bottom: 20px;
        }
        
        .alert-success {
            background-color: #10b981;
            color: white;
        }
        
        .alert-danger {
            background-color: var(--primary-red);
            color: white;
        }
        
        @media (max-width: 992px) {
            .sidebar {
                width: 260px;
            }
            
            .main-content {
                margin-left: 260px;
            }
            
            .main-container {
                padding: 30px;
            }
        }
        
        @media (max-width: 768px) {
            .sidebar {
                transform: translateX(-100%);
                transition: transform 0.3s ease;
            }
            
            .sidebar.active {
                transform: translateX(0);
            }
            
            .main-content {
                margin-left: 0;
            }
            
            .main-container {
                padding: 20px;
            }
            
            .content-header {
                padding: 20px;
            }
            
            .mobile-menu-btn {
                display: block;
                position: fixed;
                top: 20px;
                left: 20px;
                z-index: 999;
                background-color: var(--primary-red);
                color: white;
                border: none;
                width: 45px;
                height: 45px;
                border-radius: 8px;
                display: flex;
                align-items: center;
                justify-content: center;
                font-size: 20px;
            }
        }
        
        .fade-in {
            animation: fadeIn 0.3s ease;
        }
        
        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateY(10px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }
        
        .is-invalid {
            border-color: var(--primary-red) !important;
        }
        
        .invalid-feedback {
            color: var(--primary-red);
            font-size: 13px;
            margin-top: 5px;
        }
        
        [data-bs-toggle="tooltip"] {
            cursor: pointer;
        }
    </style>
</head>
<body>
    <button class="mobile-menu-btn d-none">
        <i class="bi bi-list"></i>
    </button>

    <div class="sidebar">
        <div class="sidebar-header">
            <a href="{{ route('contacts.index') }}" class="logo">
                <div class="logo-icon">
                    <i class="bi bi-person-lines-fill"></i>
                </div>
                <div class="logo-text">
                    <h1>Contact Manager</h1>
                    <p>Gestion de contacts</p>
                </div>
            </a>
        </div>
        
        <div class="sidebar-menu">
            <div class="menu-section">
                <div class="menu-title">Navigation</div>
                <ul class="nav flex-column">
                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('contacts.index') ? 'active' : '' }}" 
                           href="{{ route('contacts.index') }}">
                            <i class="bi bi-people"></i>
                            <span>Contacts</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('groups.*') ? 'active' : '' }}" 
                           href="{{ route('groups.index') }}">
                            <i class="bi bi-collection"></i>
                            <span>Groupes</span>
                        </a>
                    </li>
                </ul>
            </div>
            
            <div class="menu-section">
                <div class="menu-title">Actions</div>
                <ul class="nav flex-column">
                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('groups.create') ? 'active' : '' }}" 
                           href="{{ route('groups.create') }}">
                            <i class="bi bi-folder-plus"></i>
                            <span>Nouveau Groupe</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('contacts.create') ? 'active' : '' }}" 
                           href="{{ route('contacts.create') }}">
                            <i class="bi bi-person-plus"></i>
                            <span>Nouveau Contact</span>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </div>

    <div class="main-content">
        <div class="content-header">
            <div>
                <h1 class="page-title">
                    @yield('page-title', 'Contacts')
                </h1>
                <p class="page-subtitle">
                    @yield('page-subtitle', 'Gérez vos contacts et groupes')
                </p>
            </div>
        </div>

        <div class="main-container">
            @if(session('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <i class="bi bi-check-circle-fill me-2"></i>
                    {{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" style="filter: brightness(0) invert(1);"></button>
                </div>
            @endif

            @if(session('error'))
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <i class="bi bi-exclamation-triangle-fill me-2"></i>
                    {{ session('error') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" style="filter: brightness(0) invert(1);"></button>
                </div>
            @endif

            <div class="fade-in">
                @yield('content')
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const mobileMenuBtn = document.querySelector('.mobile-menu-btn');
            const sidebar = document.querySelector('.sidebar');
            
            if (window.innerWidth <= 768) {
                mobileMenuBtn.classList.remove('d-none');
                
                mobileMenuBtn.addEventListener('click', function() {
                    sidebar.classList.toggle('active');
                });
                
                document.addEventListener('click', function(event) {
                    if (window.innerWidth <= 768 && 
                        !sidebar.contains(event.target) && 
                        !mobileMenuBtn.contains(event.target)) {
                        sidebar.classList.remove('active');
                    }
                });
            }
            
            setTimeout(function() {
                const alerts = document.querySelectorAll('.alert');
                alerts.forEach(function(alert) {
                    const bsAlert = new bootstrap.Alert(alert);
                    bsAlert.close();
                });
            }, 5000);
            
            window.confirmDelete = function(event) {
                if (!confirm('Êtes-vous sûr de vouloir supprimer ? Cette action est irréversible.')) {
                    event.preventDefault();
                    return false;
                }
                return true;
            };
            
            var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'));
            var tooltipList = tooltipTriggerList.map(function (tooltipTriggerEl) {
                return new bootstrap.Tooltip(tooltipTriggerEl);
            });
        });
    </script>
</body>
</html>