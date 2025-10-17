<!-- Enhanced Navigation Bar -->
<nav class="navbar navbar-expand-lg navbar-dark {{ request()->routeIs('home') ? '' : 'fixed-top' }}">
    <div class="container">
        <!-- Brand Logo -->
        <a class="navbar-brand d-flex align-items-center" href="{{ route('home') }}">
            <div class="brand-logo me-2">
                <i class="fas fa-shopping-bag"></i>
            </div>
            <div class="brand-text">
                <span class="brand-name">Sokappe</span>
                <small class="brand-tagline">Shop</small>
            </div>
        </a>
        
        <!-- Mobile Toggle Button -->
        <button class="navbar-toggler border-0" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        
        <div class="collapse navbar-collapse" id="navbarNav">
            <!-- Main Navigation Links -->
            <ul class="navbar-nav me-auto">
                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('home') ? 'active' : '' }}" href="{{ route('home') }}">
                        <i class="fas fa-home me-1"></i>
                        الرئيسية
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('categories.*') ? 'active' : '' }}" href="{{ route('categories.index') }}">
                        <i class="fas fa-th-large me-1"></i>
                        الفئات
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('products.index') ? 'active' : '' }}" href="{{ route('products.index') }}">
                        <i class="fas fa-box me-1"></i>
                        جميع المنتجات
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('products.create') ? 'active' : '' }}" href="{{ route('products.create') }}">
                        <i class="fas fa-plus-circle me-1"></i>
                        أضف منتج
                    </a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="servicesDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        <i class="fas fa-concierge-bell me-1"></i>
                        الخدمات
                    </a>
                    <ul class="dropdown-menu dropdown-menu-end">
                        <li><a class="dropdown-item" href="#"><i class="fas fa-shipping-fast me-2"></i>التوصيل السريع</a></li>
                        <li><a class="dropdown-item" href="#"><i class="fas fa-shield-alt me-2"></i>الضمان</a></li>
                        <li><a class="dropdown-item" href="#"><i class="fas fa-headset me-2"></i>الدعم الفني</a></li>
                        <li><hr class="dropdown-divider"></li>
                        <li><a class="dropdown-item" href="#"><i class="fas fa-question-circle me-2"></i>الأسئلة الشائعة</a></li>
                    </ul>
                </li>
            </ul>
            
            <!-- Search Bar -->
            <form class="d-flex search-form me-3" action="{{ route('search') }}" method="GET">
                <div class="search-container">
                    <input class="form-control search-input" type="search" name="q" placeholder="ابحث عن المنتجات..." value="{{ request('q') }}" aria-label="Search">
                    <button class="btn search-btn" type="submit">
                        <i class="fas fa-search"></i>
                    </button>
                </div>
            </form>
            
            <!-- Right Side Navigation -->
            <ul class="navbar-nav">
                <!-- Shopping Cart -->
                <li class="nav-item">
                    <a class="nav-link position-relative cart-link" href="#" onclick="toggleCart()">
                        <i class="fas fa-shopping-cart"></i>
                        <span class="cart-badge" id="cartBadge" style="display: none;">0</span>
                        <span class="d-none d-lg-inline ms-1">السلة</span>
                    </a>
                </li>
                
                <!-- Favorites -->
                <li class="nav-item">
                    <a class="nav-link position-relative" href="#" onclick="alert('قريباً!')">
                        <i class="fas fa-heart"></i>
                        <span class="d-none d-lg-inline ms-1">المفضلة</span>
                    </a>
                </li>
                
                <!-- User Account -->
                @auth
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle user-dropdown d-flex align-items-center" href="#" id="userDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            <div class="user-avatar me-2">
                                <i class="fas fa-user"></i>
                            </div>
                            <div class="user-info d-none d-lg-block">
                                <span class="user-name">{{ Auth::user()->name }}</span>
                                <small class="user-status">متصل</small>
                            </div>
                            <i class="fas fa-chevron-down ms-2"></i>
                        </a>
                        <ul class="dropdown-menu dropdown-menu-end user-dropdown-menu">
                            <li class="dropdown-header">
                                <div class="user-profile-header">
                                    <div class="user-avatar-large">
                                        <i class="fas fa-user"></i>
                                    </div>
                                    <div class="user-details">
                                        <strong>{{ Auth::user()->name }}</strong>
                                        <small class="text-muted">{{ Auth::user()->email }}</small>
                                    </div>
                                </div>
                            </li>
                            <li><hr class="dropdown-divider"></li>
                            <li>
                                <a class="dropdown-item" href="#">
                                    <i class="fas fa-user-circle me-2"></i>الملف الشخصي
                                </a>
                            </li>
                            <li>
                                <a class="dropdown-item" href="#">
                                    <i class="fas fa-shopping-bag me-2"></i>طلباتي
                                </a>
                            </li>
                            <li>
                                <a class="dropdown-item" href="#" onclick="alert('قريباً!')">
                                    <i class="fas fa-heart me-2"></i>المفضلة
                                </a>
                            </li>
                            <li>
                                <a class="dropdown-item" href="#">
                                    <i class="fas fa-cog me-2"></i>الإعدادات
                                </a>
                            </li>
                            <li><hr class="dropdown-divider"></li>
                            <li>
                                <form method="POST" action="{{ route('logout') }}" class="d-inline w-100">
                                    @csrf
                                    <button type="submit" class="dropdown-item text-danger">
                                        <i class="fas fa-sign-out-alt me-2"></i>تسجيل الخروج
                                    </button>
                                </form>
                            </li>
                        </ul>
                    </li>
                @else
                    <li class="nav-item">
                        <a class="nav-link login-btn" href="{{ route('login') }}">
                            <i class="fas fa-sign-in-alt me-1"></i>
                            تسجيل الدخول
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link register-btn" href="{{ route('register') }}">
                            <i class="fas fa-user-plus me-1"></i>
                            إنشاء حساب
                        </a>
                    </li>
                @endauth
            </ul>
        </div>
    </div>
</nav>

<!-- Enhanced Navbar Styles -->
<style>
    /* Navbar Base Styles */
    .navbar {
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        box-shadow: 0 4px 20px rgba(0,0,0,0.1);
        backdrop-filter: blur(10px);
        padding: 0.8rem 0;
        transition: all 0.3s ease;
        z-index: 1050;
    }

    .navbar.scrolled {
        padding: 0.5rem 0;
        box-shadow: 0 2px 15px rgba(0,0,0,0.15);
    }

    /* Brand Styles */
    .navbar-brand {
        font-weight: 700;
        color: white !important;
        transition: all 0.3s ease;
        padding: 0.5rem 0;
    }

    .navbar-brand:hover {
        transform: scale(1.05);
    }

    .brand-logo {
        width: 45px;
        height: 45px;
        background: rgba(255,255,255,0.2);
        border-radius: 12px;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 1.2rem;
        transition: all 0.3s ease;
    }

    .brand-logo:hover {
        background: rgba(255,255,255,0.3);
        transform: rotate(5deg);
    }

    .brand-name {
        font-size: 1.5rem;
        font-weight: 700;
        display: block;
        line-height: 1;
    }

    .brand-tagline {
        font-size: 0.8rem;
        opacity: 0.8;
        display: block;
        line-height: 1;
    }

    /* Navigation Links */
    .nav-link {
        color: rgba(255,255,255,0.9) !important;
        font-weight: 500;
        padding: 0.7rem 1rem !important;
        border-radius: 8px;
        transition: all 0.3s ease;
        position: relative;
        margin: 0 0.2rem;
    }

    .nav-link:hover {
        color: white !important;
        background: rgba(255,255,255,0.1);
        transform: translateY(-2px);
    }

    .nav-link.active {
        color: white !important;
        background: rgba(255,255,255,0.2);
        box-shadow: 0 2px 10px rgba(0,0,0,0.1);
    }

    .nav-link.active::after {
        content: '';
        position: absolute;
        bottom: 0;
        left: 50%;
        transform: translateX(-50%);
        width: 30px;
        height: 3px;
        background: #ffd700;
        border-radius: 2px;
    }

    /* Search Bar */
    .search-form {
        min-width: 300px;
    }

    .search-container {
        position: relative;
        width: 100%;
    }

    .search-input {
        background: rgba(255,255,255,0.15);
        border: 2px solid rgba(255,255,255,0.2);
        color: white;
        border-radius: 25px;
        padding: 0.6rem 3rem 0.6rem 1.2rem;
        transition: all 0.3s ease;
    }

    .search-input::placeholder {
        color: rgba(255,255,255,0.7);
    }

    .search-input:focus {
        background: rgba(255,255,255,0.25);
        border-color: rgba(255,255,255,0.4);
        box-shadow: 0 0 0 0.2rem rgba(255,255,255,0.25);
        color: white;
    }

    .search-btn {
        position: absolute;
        right: 5px;
        top: 50%;
        transform: translateY(-50%);
        background: rgba(255,255,255,0.2);
        border: none;
        color: white;
        width: 35px;
        height: 35px;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        transition: all 0.3s ease;
    }

    .search-btn:hover {
        background: rgba(255,255,255,0.3);
        transform: translateY(-50%) scale(1.1);
    }

    /* Cart Badge */
    .cart-badge {
        position: absolute;
        top: -5px;
        right: -5px;
        background: #ff4757;
        color: white;
        border-radius: 50%;
        width: 20px;
        height: 20px;
        font-size: 0.7rem;
        display: flex;
        align-items: center;
        justify-content: center;
        font-weight: 600;
        animation: pulse 2s infinite;
    }

    @keyframes pulse {
        0% { transform: scale(1); }
        50% { transform: scale(1.1); }
        100% { transform: scale(1); }
    }

    /* User Dropdown */
    .user-dropdown {
        background: rgba(255,255,255,0.1);
        border-radius: 25px;
        padding: 0.5rem 1rem !important;
        transition: all 0.3s ease;
    }

    .user-dropdown:hover {
        background: rgba(255,255,255,0.2);
    }

    .user-avatar {
        width: 35px;
        height: 35px;
        background: rgba(255,255,255,0.2);
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 1rem;
    }

    .user-avatar-large {
        width: 50px;
        height: 50px;
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        color: white;
        font-size: 1.3rem;
    }

    .user-name {
        font-size: 0.9rem;
        font-weight: 600;
        display: block;
        line-height: 1.2;
    }

    .user-status {
        font-size: 0.7rem;
        opacity: 0.8;
        display: block;
        line-height: 1;
    }

    /* Dropdown Menus */
    .dropdown-menu {
        background: white;
        border: none;
        border-radius: 15px;
        box-shadow: 0 10px 30px rgba(0,0,0,0.15);
        padding: 0;
        margin-top: 10px;
        min-width: 250px;
    }

    .user-dropdown-menu {
        min-width: 280px;
    }

    .dropdown-header {
        padding: 1.5rem;
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        color: white;
        border-radius: 15px 15px 0 0;
    }

    .user-profile-header {
        display: flex;
        align-items: center;
        gap: 15px;
    }

    .dropdown-item {
        padding: 0.8rem 1.5rem;
        font-size: 0.9rem;
        transition: all 0.3s ease;
        border: none;
        background: none;
        width: 100%;
        text-align: right;
    }

    .dropdown-item:hover {
        background: #f8f9fa;
        padding-right: 2rem;
        color: #667eea;
    }

    .dropdown-item i {
        width: 20px;
        text-align: center;
        color: #667eea;
    }

    /* Login/Register Buttons */
    .login-btn {
        background: rgba(255,255,255,0.1);
        border-radius: 20px;
        margin-left: 0.5rem;
    }

    .register-btn {
        background: #ffd700;
        color: #333 !important;
        border-radius: 20px;
        font-weight: 600;
    }

    .register-btn:hover {
        background: #ffed4e;
        color: #333 !important;
        transform: translateY(-2px);
    }

    /* Mobile Responsive */
    @media (max-width: 991px) {
        .search-form {
            min-width: 100%;
            margin: 1rem 0;
        }
        
        .navbar-nav {
            text-align: center;
        }
        
        .nav-link {
            margin: 0.2rem 0;
        }
        
        .user-info {
            display: none !important;
        }
    }

    /* Navbar Toggle */
    .navbar-toggler {
        padding: 0.5rem;
        border-radius: 8px;
        transition: all 0.3s ease;
    }

    .navbar-toggler:hover {
        background: rgba(255,255,255,0.1);
    }

    .navbar-toggler:focus {
        box-shadow: 0 0 0 0.2rem rgba(255,255,255,0.25);
    }

    /* Body padding for fixed navbar - only for non-home pages */
    body.non-home-page {
        padding-top: 80px;
    }
</style>

<!-- Navbar JavaScript -->
<script>
    // Navbar scroll effect
    window.addEventListener('scroll', function() {
        const navbar = document.querySelector('.navbar');
        if (window.scrollY > 50) {
            navbar.classList.add('scrolled');
        } else {
            navbar.classList.remove('scrolled');
        }
    });

    // Cart functionality placeholder
    function toggleCart() {
        // Add cart toggle functionality here
        console.log('Cart toggled');
    }

    // Update cart badge
    function updateCartBadge(count) {
        const badge = document.getElementById('cartBadge');
        if (count > 0) {
            badge.textContent = count;
            badge.style.display = 'flex';
        } else {
            badge.style.display = 'none';
        }
    }

    // Initialize cart badge (example)
    // updateCartBadge(0);
</script>
