<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'لوحة التحكم') - Sokappe Admin</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    
    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    
    <!-- Bootstrap RTL -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.rtl.min.css" rel="stylesheet">
    
    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
    
    <!-- Chart.js -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    
    <style>
        * {
            font-family: 'Cairo', sans-serif;
        }
        
        body {
            background: #f8f9fa;
            direction: rtl;
            font-size: 14px;
        }
        
        /* Sidebar */
        .sidebar {
            position: fixed;
            top: 0;
            right: 0;
            height: 100vh;
            width: 280px;
            background: linear-gradient(180deg, #667eea 0%, #764ba2 100%);
            box-shadow: -2px 0 10px rgba(0,0,0,0.1);
            z-index: 1000;
            overflow-y: auto;
        }
        
        .sidebar-header {
            padding: 2rem 1.5rem;
            text-align: center;
            border-bottom: 1px solid rgba(255,255,255,0.1);
        }
        
        .sidebar-logo {
            color: white;
            font-size: 1.8rem;
            font-weight: 800;
            text-decoration: none;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 10px;
        }
        
        .sidebar-logo:hover {
            color: #ffd700;
        }
        
        .sidebar-nav {
            padding: 1rem 0;
        }
        
        .nav-item {
            margin: 0.2rem 1rem;
        }
        
        .nav-link {
            color: rgba(255,255,255,0.8);
            padding: 1rem 1.5rem;
            border-radius: 10px;
            transition: all 0.3s ease;
            display: flex;
            align-items: center;
            gap: 12px;
            font-weight: 500;
            text-decoration: none;
        }
        
        .nav-link:hover {
            background: rgba(255,255,255,0.1);
            color: white;
            transform: translateX(-5px);
        }
        
        .nav-link.active {
            background: rgba(255,255,255,0.2);
            color: white;
            box-shadow: 0 4px 15px rgba(0,0,0,0.1);
        }
        
        .nav-icon {
            width: 20px;
            text-align: center;
            font-size: 1.1rem;
        }
        
        /* Main Content */
        .main-content {
            margin-right: 280px;
            min-height: 100vh;
            background: #f8f9fa;
        }
        
        /* Admin Top Navbar */
        .admin-top-navbar {
            background: white;
            border-bottom: 1px solid #e9ecef;
            padding: 1rem 0;
            box-shadow: 0 2px 4px rgba(0,0,0,0.04);
            position: sticky;
            top: 0;
            z-index: 1020;
        }
        
        .page-header-section {
            flex: 1;
        }
        
        .page-icon {
            width: 50px;
            height: 50px;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            border-radius: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-size: 1.2rem;
        }
        
        .page-main-title {
            font-size: 1.5rem;
            font-weight: 700;
            color: #2c3e50;
            margin: 0;
        }
        
        .page-subtitle {
            font-size: 0.875rem;
            color: #6c757d;
            margin: 0;
        }
        
        .admin-user-info {
            background: #f8f9fa;
            border-radius: 25px;
            padding: 8px 15px;
            border: 1px solid #e9ecef;
        }
        
        .admin-avatar {
            width: 35px;
            height: 35px;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-weight: 600;
            font-size: 0.9rem;
        }
        
        .admin-user-name {
            font-weight: 600;
            color: #2c3e50;
            font-size: 0.9rem;
            line-height: 1.2;
        }
        
        .admin-user-role {
            font-size: 0.75rem;
            color: #6c757d;
            line-height: 1;
        }
        
        .content-area {
            padding: 2rem;
        }
        
        .top-navbar {
            background: white;
            padding: 1rem 2rem;
            box-shadow: 0 2px 10px rgba(0,0,0,0.05);
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        
        .page-title {
            font-size: 1.5rem;
            font-weight: 700;
            color: #333;
            margin: 0;
        }
        
        .admin-info {
            display: flex;
            align-items: center;
            gap: 15px;
        }
        
        .admin-avatar {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-weight: 600;
        }
        
        .content-area {
            padding: 2rem;
        }
        
        /* Cards */
        .stat-card {
            background: white;
            border-radius: 15px;
            padding: 2rem;
            box-shadow: 0 5px 15px rgba(0,0,0,0.08);
            transition: all 0.3s ease;
            border: none;
            position: relative;
            overflow: hidden;
        }
        
        .stat-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 15px 35px rgba(0,0,0,0.15);
        }
        
        .stat-card::before {
            content: '';
            position: absolute;
            top: 0;
            right: 0;
            width: 100%;
            height: 4px;
            background: linear-gradient(90deg, #667eea 0%, #764ba2 100%);
        }
        
        .stat-number {
            font-size: 2.5rem;
            font-weight: 800;
            color: #333;
            margin-bottom: 0.5rem;
        }
        
        .stat-label {
            color: #666;
            font-weight: 500;
            margin-bottom: 1rem;
        }
        
        .stat-icon {
            position: absolute;
            top: 2rem;
            left: 2rem;
            font-size: 2.5rem;
            color: #667eea;
            opacity: 0.3;
        }
        
        /* Tables */
        .table-card {
            background: white;
            border-radius: 15px;
            box-shadow: 0 5px 15px rgba(0,0,0,0.08);
            overflow: hidden;
        }
        
        .table-header {
            background: linear-gradient(90deg, #667eea 0%, #764ba2 100%);
            color: white;
            padding: 1.5rem 2rem;
            font-weight: 600;
            font-size: 1.1rem;
        }
        
        .table {
            margin: 0;
        }
        
        .table th {
            background: #f8f9fa;
            border: none;
            padding: 1rem;
            font-weight: 600;
            color: #333;
        }
        
        .table td {
            padding: 1rem;
            border-color: #f0f0f0;
            vertical-align: middle;
        }
        
        .table tbody tr:hover {
            background: #f8f9fa;
        }
        
        /* Buttons */
        .btn-primary {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            border: none;
            border-radius: 10px;
            padding: 0.75rem 1.5rem;
            font-weight: 600;
            transition: all 0.3s ease;
        }
        
        .btn-primary:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 25px rgba(102, 126, 234, 0.3);
        }
        
        /* Status badges */
        .badge {
            padding: 0.5rem 1rem;
            border-radius: 20px;
            font-weight: 500;
        }
        
        .badge-success {
            background: #d4edda;
            color: #155724;
        }
        
        .badge-warning {
            background: #fff3cd;
            color: #856404;
        }
        
        .badge-danger {
            background: #f8d7da;
            color: #721c24;
        }
        
        /* Pagination Styling */
        .pagination {
            justify-content: center;
            margin: 20px 0;
        }
        
        .pagination .page-link {
            color: #667eea;
            border: 1px solid #dee2e6;
            padding: 8px 12px;
            margin: 0 2px;
            border-radius: 8px;
            font-weight: 500;
            transition: all 0.3s ease;
        }
        
        .pagination .page-link:hover {
            color: white;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            border-color: #667eea;
            transform: translateY(-1px);
        }
        
        .pagination .page-item.active .page-link {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            border-color: #667eea;
            color: white;
        }
        
        .pagination .page-item.disabled .page-link {
            color: #6c757d;
            background-color: #f8f9fa;
            border-color: #dee2e6;
        }
        
        .pagination .page-link i {
            font-size: 0.9rem;
        }

        /* Custom pagination arrows */
        .pagination .page-item:first-child .page-link {
            border-radius: 8px;
        }
        
        .pagination .page-item:last-child .page-link {
            border-radius: 8px;
        }
        
        /* Responsive */
        @media (max-width: 768px) {
            .sidebar {
                transform: translateX(100%);
                transition: transform 0.3s ease;
            }
            
            .sidebar.show {
                transform: translateX(0);
            }
            
            .main-content {
                margin-right: 0;
            }
            
            .content-area {
                padding: 1rem;
            }
        }
    </style>
    
    @stack('styles')
</head>
<body>
    <!-- Sidebar -->
    <div class="sidebar">
        <div class="sidebar-header">
            <a href="{{ route('admin.dashboard') }}" class="sidebar-logo">
                <i class="fas fa-crown"></i>
                Sokappe Admin
            </a>
        </div>
        
        <nav class="sidebar-nav">
            <div class="nav-item">
                <a href="{{ route('admin.dashboard') }}" class="nav-link {{ request()->routeIs('admin.dashboard') ? 'active' : '' }}">
                    <i class="fas fa-tachometer-alt nav-icon"></i>
                    لوحة التحكم
                </a>
            </div>
            
            <div class="nav-item">
                <a href="{{ route('admin.users') }}" class="nav-link {{ request()->routeIs('admin.users') ? 'active' : '' }}">
                    <i class="fas fa-users nav-icon"></i>
                    إدارة المستخدمين
                </a>
            </div>
            
            <div class="nav-item">
                <a href="{{ route('admin.store-approvals') }}" class="nav-link {{ request()->routeIs('admin.store-approvals') && !request()->routeIs('admin.store-approvals.rejected') ? 'active' : '' }}">
                    <i class="fas fa-clipboard-check nav-icon"></i>
                    طلبات المتاجر
                    @php
                        $pendingCount = \App\Models\User::whereNotNull('store_name')->where('store_status', 'pending')->count();
                    @endphp
                    @if($pendingCount > 0)
                        <span class="badge bg-warning ms-2">{{ $pendingCount }}</span>
                    @endif
                </a>
            </div>
            
            <div class="nav-item">
                <a href="{{ route('admin.vendors') }}" class="nav-link {{ request()->routeIs('admin.vendors') && !request()->routeIs('admin.vendors.rejected') ? 'active' : '' }}">
                    <i class="fas fa-store nav-icon"></i>
                    إدارة المتاجر
                </a>
            </div>
            
            <div class="nav-item">
                <a href="{{ route('admin.vendors.rejected') }}" class="nav-link {{ request()->routeIs('admin.vendors.rejected') ? 'active' : '' }}">
                    <i class="fas fa-times-circle nav-icon"></i>
                    المتاجر المرفوضة
                    @php
                        $rejectedCount = \App\Models\User::whereNotNull('store_name')->where('store_status', 'rejected')->count();
                    @endphp
                    @if($rejectedCount > 0)
                        <span class="badge bg-danger ms-2">{{ $rejectedCount }}</span>
                    @endif
                </a>
            </div>
            
            <div class="nav-item">
                <a href="{{ route('admin.products') }}" class="nav-link {{ request()->routeIs('admin.products') ? 'active' : '' }}">
                    <i class="fas fa-box nav-icon"></i>
                    إدارة المنتجات
                </a>
            </div>
            
            <div class="nav-item">
                <a href="{{ route('admin.categories') }}" class="nav-link {{ request()->routeIs('admin.categories') ? 'active' : '' }}">
                    <i class="fas fa-tags nav-icon"></i>
                    إدارة فئات المنتجات
                </a>
            </div>
            
            <div class="nav-item">
                <a href="{{ route('admin.logs') }}" class="nav-link {{ request()->routeIs('admin.logs') ? 'active' : '' }}">
                    <i class="fas fa-history nav-icon"></i>
                    سجل الأنشطة
                </a>
            </div>
            
            <div class="nav-item">
                <a href="{{ route('admin.settings') }}" class="nav-link {{ request()->routeIs('admin.settings') ? 'active' : '' }}">
                    <i class="fas fa-cog nav-icon"></i>
                    الإعدادات
                </a>
            </div>
            
            <hr style="border-color: rgba(255,255,255,0.1); margin: 1rem;">
            
            <div class="nav-item">
                <a href="{{ route('home') }}" class="nav-link" target="_blank">
                    <i class="fas fa-external-link-alt nav-icon"></i>
                    عرض الموقع
                </a>
            </div>
            
            <div class="nav-item">
                <form method="POST" action="{{ route('logout') }}" class="d-inline w-100">
                    @csrf
                    <button type="submit" class="nav-link w-100 text-start border-0 bg-transparent">
                        <i class="fas fa-sign-out-alt nav-icon"></i>
                        تسجيل الخروج
                    </button>
                </form>
            </div>
        </nav>
    </div>
    
    <!-- Main Content -->
    <div class="main-content">
        <!-- Top Navigation Bar -->
        <nav class="admin-top-navbar">
            <div class="container-fluid">
                <div class="d-flex justify-content-between align-items-center">
                    <!-- Page Title Section -->
                    <div class="page-header-section">
                        <div class="d-flex align-items-center">
                            <div class="page-icon me-3">
                                @yield('page-icon', '<i class="fas fa-tachometer-alt"></i>')
                            </div>
                            <div>
                                <h1 class="page-main-title mb-0">@yield('page-title', 'لوحة التحكم')</h1>
                                <small class="page-subtitle text-muted">@yield('page-subtitle', 'إدارة النظام')</small>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Right Section -->
                    <div class="admin-header-right d-flex align-items-center">
                        <!-- Visit Website Button -->
                        <div class="me-3">
                            <a href="{{ route('home') }}" class="btn btn-outline-primary btn-sm" target="_blank" title="زيارة الموقع">
                                <i class="fas fa-external-link-alt me-1"></i>
                                زيارة الموقع
                            </a>
                        </div>
                        
                        <!-- Admin User Info -->
                        <div class="admin-user-info d-flex align-items-center">
                            <div class="admin-avatar me-2">
                                {{ substr(auth()->user()->name, 0, 1) }}
                            </div>
                            <div class="admin-user-details">
                                <div class="admin-user-name">{{ auth()->user()->name }}</div>
                                <small class="admin-user-role text-muted">مدير النظام</small>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </nav>
        
        <!-- Content Area -->
        <div class="content-area">
            @yield('content')
                </div>
            </div>
        </div>
        
        <!-- Bootstrap JS -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
        
        @stack('scripts')
    </body>
    </html>
</html>
