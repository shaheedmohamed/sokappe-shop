<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sokappe Shop - السوق الإلكتروني الأول في مصر</title>
    <meta name="description" content="تسوق من أفضل المتاجر في مصر - منتجات متنوعة وأسعار مميزة">
    
    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@300;400;600;700&display=swap" rel="stylesheet">
    
    <!-- Bootstrap RTL -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.rtl.min.css" rel="stylesheet">
    
    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
    
    <!-- Custom CSS -->
    <style>
        * {
            font-family: 'Cairo', sans-serif;
        }
        
        body {
            background-color: #f8f9fa;
            direction: rtl;
        }
        
        .navbar {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
        }
        
        .navbar-brand {
            font-weight: 700;
            font-size: 1.8rem;
            color: white !important;
        }
        
        .hero-section {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            padding: 80px 0;
            margin-bottom: 50px;
        }
        
        .hero-title {
            font-size: 3rem;
            font-weight: 700;
            margin-bottom: 20px;
        }
        
        .hero-subtitle {
            font-size: 1.3rem;
            margin-bottom: 30px;
            opacity: 0.9;
        }
        
        .search-box {
            background: white;
            border-radius: 50px;
            padding: 5px;
            box-shadow: 0 5px 20px rgba(0,0,0,0.1);
        }
        
        .search-input {
            border: none;
            padding: 15px 25px;
            font-size: 1.1rem;
            border-radius: 50px;
        }
        
        .search-btn {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            border: none;
            padding: 15px 30px;
            border-radius: 50px;
            color: white;
            font-weight: 600;
        }
        
        .category-card {
            background: white;
            border-radius: 15px;
            padding: 30px 20px;
            text-align: center;
            box-shadow: 0 5px 15px rgba(0,0,0,0.08);
            transition: all 0.3s ease;
            border: none;
            height: 100%;
        }
        
        .category-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 25px rgba(0,0,0,0.15);
        }
        
        .category-icon {
            font-size: 3rem;
            margin-bottom: 20px;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }
        
        .category-title {
            font-size: 1.3rem;
            font-weight: 600;
            color: #333;
            margin-bottom: 10px;
        }
        
        .category-desc {
            color: #666;
            font-size: 0.95rem;
        }
        
        .product-card {
            background: white;
            border-radius: 15px;
            overflow: hidden;
            box-shadow: 0 5px 15px rgba(0,0,0,0.08);
            transition: all 0.3s ease;
            border: none;
        }
        
        .product-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 25px rgba(0,0,0,0.15);
        }
        
        .product-image {
            height: 200px;
            background: linear-gradient(45deg, #f0f0f0, #e0e0e0);
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 4rem;
            color: #ccc;
        }
        
        .product-info {
            padding: 20px;
        }
        
        .product-title {
            font-weight: 600;
            color: #333;
            margin-bottom: 10px;
        }
        
        .product-price {
            font-size: 1.3rem;
            font-weight: 700;
            color: #667eea;
        }
        
        .section-title {
            font-size: 2.5rem;
            font-weight: 700;
            text-align: center;
            margin-bottom: 50px;
            color: #333;
        }
        
        .stats-section {
            background: white;
            padding: 60px 0;
            margin: 50px 0;
        }
        
        .stat-item {
            text-align: center;
            padding: 20px;
        }
        
        .stat-number {
            font-size: 3rem;
            font-weight: 700;
            color: #667eea;
            margin-bottom: 10px;
        }
        
        .stat-label {
            font-size: 1.1rem;
            color: #666;
        }
        
        .footer {
            background: #333;
            color: white;
            padding: 50px 0 20px;
            margin-top: 80px;
        }
        
        .footer h5 {
            color: #667eea;
            margin-bottom: 20px;
        }
        
        .footer a {
            color: #ccc;
            text-decoration: none;
            transition: color 0.3s ease;
        }
        
        .footer a:hover {
            color: #667eea;
        }
        
        /* New Sections Styles */
        .vendor-card {
            background: white;
            border-radius: 15px;
            padding: 25px;
            box-shadow: 0 5px 15px rgba(0,0,0,0.08);
            transition: all 0.3s ease;
            height: 100%;
        }
        
        .vendor-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 15px 35px rgba(0,0,0,0.15);
        }
        
        .vendor-header {
            display: flex;
            align-items: center;
            margin-bottom: 15px;
        }
        
        .vendor-avatar {
            width: 60px;
            height: 60px;
            border-radius: 50%;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-size: 1.5rem;
            margin-left: 15px;
        }
        
        .vendor-name {
            font-size: 1.2rem;
            font-weight: 600;
            margin-bottom: 5px;
        }
        
        .vendor-rating .stars {
            color: #ffc107;
            margin-bottom: 5px;
        }
        
        .vendor-stats {
            display: flex;
            justify-content: space-between;
            margin-top: 20px;
        }
        
        .vendor-stats .stat {
            text-align: center;
        }
        
        .vendor-stats .number {
            display: block;
            font-size: 1.5rem;
            font-weight: 700;
            color: #667eea;
        }
        
        .vendor-stats .label {
            font-size: 0.9rem;
            color: #666;
        }
        
        .offers-banner {
            background: linear-gradient(135deg, #ff6b6b 0%, #ee5a24 100%);
            border-radius: 20px;
            padding: 50px 40px;
            color: white;
            margin: 30px 0;
        }
        
        .offers-title {
            font-size: 2.2rem;
            font-weight: 700;
            margin-bottom: 15px;
        }
        
        .offers-subtitle {
            font-size: 1.2rem;
            margin-bottom: 25px;
            opacity: 0.9;
        }
        
        .offer-badge {
            width: 150px;
            height: 150px;
            border-radius: 50%;
            background: rgba(255,255,255,0.2);
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            margin: 0 auto;
            border: 3px solid rgba(255,255,255,0.3);
        }
        
        .offer-badge .discount {
            font-size: 2.5rem;
            font-weight: 700;
        }
        
        .categories-showcase {
            margin: 30px 0;
        }
        
        .category-showcase-item {
            display: block;
            background: white;
            border-radius: 10px;
            padding: 20px;
            text-align: center;
            text-decoration: none;
            color: inherit;
            box-shadow: 0 3px 10px rgba(0,0,0,0.05);
            transition: all 0.3s ease;
            height: 100%;
        }
        
        .category-showcase-item:hover {
            transform: translateY(-3px);
            box-shadow: 0 8px 25px rgba(0,0,0,0.1);
            text-decoration: none;
            color: inherit;
        }
        
        .category-image {
            font-size: 2.5rem;
            color: #667eea;
            margin-bottom: 15px;
        }
        
        .category-name {
            font-weight: 600;
            margin-bottom: 5px;
        }
        
        .category-count {
            font-size: 0.9rem;
            color: #666;
        }
        
        .popular-searches {
            margin: 30px 0;
        }
        
        .search-tags {
            display: flex;
            flex-wrap: wrap;
            gap: 10px;
        }
        
        .search-tag {
            background: #f8f9fa;
            color: #333;
            padding: 8px 16px;
            border-radius: 20px;
            text-decoration: none;
            font-size: 0.9rem;
            transition: all 0.3s ease;
            border: 1px solid #e9ecef;
        }
        
        .search-tag:hover {
            background: #667eea;
            color: white;
            text-decoration: none;
            transform: translateY(-2px);
        }
        
        .how-it-works-item {
            text-align: center;
            padding: 30px 20px;
            position: relative;
        }
        
        .step-number {
            position: absolute;
            top: 10px;
            right: 10px;
            width: 30px;
            height: 30px;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: 700;
            font-size: 0.9rem;
        }
        
        .step-icon {
            font-size: 3rem;
            color: #667eea;
            margin-bottom: 20px;
        }
        
        .step-title {
            font-weight: 600;
            margin-bottom: 15px;
        }
        
        .step-desc {
            color: #666;
            line-height: 1.6;
        }
        
        .app-promotion {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            border-radius: 20px;
            padding: 50px 40px;
            color: white;
            margin: 30px 0;
        }
        
        .app-title {
            font-size: 2.2rem;
            font-weight: 700;
            margin-bottom: 15px;
        }
        
        .app-subtitle {
            font-size: 1.2rem;
            margin-bottom: 25px;
            opacity: 0.9;
        }
        
        .app-features {
            list-style: none;
            padding: 0;
            margin-bottom: 30px;
        }
        
        .app-features li {
            padding: 8px 0;
            font-size: 1.1rem;
        }
        
        .app-features i {
            color: #4CAF50;
            margin-left: 10px;
        }
        
        .app-buttons {
            display: flex;
            gap: 15px;
        }
        
        .app-button img {
            height: 50px;
            border-radius: 8px;
        }
        
        .phone-mockup {
            font-size: 8rem;
            opacity: 0.3;
        }
        
        .newsletter-section {
            background: #f8f9fa;
            border-radius: 15px;
            padding: 40px;
            margin: 30px 0;
        }
        
        .newsletter-title {
            font-weight: 600;
            margin-bottom: 10px;
        }
        
        .newsletter-subtitle {
            color: #666;
            margin-bottom: 0;
        }
        
        .newsletter-form .form-control {
            border-radius: 25px 0 0 25px;
            border: 2px solid #e9ecef;
            padding: 12px 20px;
        }
        
        .newsletter-form .btn {
            border-radius: 0 25px 25px 0;
            padding: 12px 25px;
        }
        
        /* Interactive Product Slider */
        .product-slider-container {
            position: relative;
            overflow: hidden;
            margin: 30px 0;
        }
        
        .product-slider {
            display: flex;
            transition: transform 0.5s ease;
            gap: 20px;
        }
        
        .slider-item {
            min-width: 250px;
            flex-shrink: 0;
        }
        
        .slider-btn {
            position: absolute;
            top: 50%;
            transform: translateY(-50%);
            background: rgba(102, 126, 234, 0.9);
            color: white;
            border: none;
            width: 50px;
            height: 50px;
            border-radius: 50%;
            font-size: 1.2rem;
            cursor: pointer;
            z-index: 10;
            transition: all 0.3s ease;
        }
        
        .slider-btn:hover {
            background: #667eea;
            transform: translateY(-50%) scale(1.1);
        }
        
        .slider-btn.prev {
            right: 10px;
        }
        
        .slider-btn.next {
            left: 10px;
        }
        
        /* Category Tabs */
        .category-tabs {
            background: white;
            border-radius: 15px;
            padding: 30px;
            box-shadow: 0 5px 15px rgba(0,0,0,0.08);
        }
        
        .tab-buttons {
            display: flex;
            gap: 10px;
            margin-bottom: 30px;
            flex-wrap: wrap;
        }
        
        .tab-btn {
            background: #f8f9fa;
            border: 2px solid #e9ecef;
            color: #666;
            padding: 12px 25px;
            border-radius: 25px;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s ease;
        }
        
        .tab-btn.active,
        .tab-btn:hover {
            background: #667eea;
            border-color: #667eea;
            color: white;
        }
        
        .tab-pane {
            display: none;
        }
        
        .tab-pane.active {
            display: block;
        }
        
        .category-item {
            background: #f8f9fa;
            border-radius: 10px;
            padding: 25px;
            text-align: center;
            cursor: pointer;
            transition: all 0.3s ease;
            border: 2px solid transparent;
        }
        
        .category-item:hover {
            background: white;
            border-color: #667eea;
            transform: translateY(-5px);
            box-shadow: 0 10px 25px rgba(0,0,0,0.1);
        }
        
        .category-item i {
            font-size: 2.5rem;
            color: #667eea;
            margin-bottom: 15px;
        }
        
        .category-item h6 {
            font-weight: 600;
            margin-bottom: 10px;
        }
        
        .category-item span {
            color: #666;
            font-size: 0.9rem;
        }
        
        /* Live Statistics */
        .live-stats {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            border-radius: 20px;
            padding: 50px 30px;
            color: white;
        }
        
        .stat-counter {
            padding: 20px;
        }
        
        .stat-counter i {
            font-size: 3rem;
            margin-bottom: 20px;
            opacity: 0.8;
        }
        
        .counter {
            font-size: 3rem;
            font-weight: 700;
            margin-bottom: 10px;
        }
        
        .stat-counter p {
            font-size: 1.1rem;
            margin: 0;
            opacity: 0.9;
        }
        
        /* User Dropdown Styles */
        .user-dropdown {
            display: flex;
            align-items: center;
            gap: 10px;
            padding: 8px 15px !important;
            border-radius: 25px;
            transition: all 0.3s ease;
        }
        
        .user-dropdown:hover {
            background: rgba(255,255,255,0.1);
        }
        
        .user-avatar {
            width: 35px;
            height: 35px;
            border-radius: 50%;
            background: rgba(255,255,255,0.2);
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1rem;
        }
        
        .user-name {
            font-weight: 600;
            max-width: 120px;
            overflow: hidden;
            text-overflow: ellipsis;
            white-space: nowrap;
        }
        
        .user-dropdown-menu {
            min-width: 280px;
            border-radius: 15px;
            border: none;
            box-shadow: 0 10px 30px rgba(0,0,0,0.15);
            padding: 0;
            margin-top: 10px;
        }
        
        .user-info {
            display: flex;
            align-items: center;
            gap: 15px;
            padding: 20px;
        }
        
        .user-avatar-large {
            width: 50px;
            height: 50px;
            border-radius: 50%;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-size: 1.5rem;
        }
        
        .user-details strong {
            display: block;
            font-size: 1.1rem;
            margin-bottom: 2px;
        }
        
        .user-details small {
            font-size: 0.85rem;
        }
        
        .dropdown-item {
            padding: 12px 20px;
            font-size: 0.95rem;
            transition: all 0.3s ease;
        }
        
        .dropdown-item:hover {
            background: #f8f9fa;
            padding-right: 25px;
        }
        
        .dropdown-item i {
            width: 20px;
            text-align: center;
        }
        
        .btn-primary {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            border: none;
            padding: 12px 30px;
            border-radius: 25px;
            font-weight: 600;
        }
        
        .btn-outline-primary {
            border: 2px solid #667eea;
            color: #667eea;
            padding: 12px 30px;
            border-radius: 25px;
            font-weight: 600;
        }
        
        .btn-outline-primary:hover {
            background: #667eea;
            border-color: #667eea;
        }
    </style>
</head>
<body>
    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-dark">
        <div class="container">
            <a class="navbar-brand" href="/">
                <i class="fas fa-shopping-bag me-2"></i>
                Sokappe
            </a>
            
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav me-auto">
                    <li class="nav-item">
                        <a class="nav-link active" href="/">الرئيسية</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('categories.index') }}">الفئات</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('products.index') }}">جميع الإعلانات</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('products.create') }}">أضف إعلان</a>
                    </li>
                </ul>
                
                <ul class="navbar-nav">
                    @auth
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle user-dropdown" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown">
                                <div class="user-avatar">
                                    <i class="fas fa-user"></i>
                                </div>
                                <span class="user-name">{{ Auth::user()->name }}</span>
                                <i class="fas fa-chevron-down ms-1"></i>
                            </a>
                            <ul class="dropdown-menu user-dropdown-menu">
                                <li class="dropdown-header">
                                    <div class="user-info">
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
                                @if(Auth::user()->isVendor())
                                    <li>
                                        <a class="dropdown-item" href="{{ route('vendor.profile') }}">
                                            <i class="fas fa-store me-2"></i>ملف المتجر
                                        </a>
                                    </li>
                                    <li>
                                        <a class="dropdown-item" href="{{ route('vendor.edit-profile') }}">
                                            <i class="fas fa-edit me-2"></i>تعديل البيانات
                                        </a>
                                    </li>
                                @endif
                                <li>
                                    <a class="dropdown-item" href="{{ route('products.favorites') }}">
                                        <i class="fas fa-heart me-2"></i>المفضلة
                                    </a>
                                </li>
                                <li>
                                    <a class="dropdown-item" href="#">
                                        <i class="fas fa-shopping-bag me-2"></i>طلباتي
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
                            <a class="nav-link" href="{{ route('login') }}">تسجيل الدخول</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('register') }}">إنشاء حساب</a>
                        </li>
                    @endauth
                </ul>
            </div>
        </div>
    </nav>

    <!-- Hero Section -->
    <section class="hero-section">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6">
                    <h1 class="hero-title">مرحباً بك في Sokappe Shop</h1>
                    <p class="hero-subtitle">السوق الإلكتروني الأول في مصر - تسوق من أفضل المتاجر واحصل على أفضل الأسعار</p>
                    
                    <form action="{{ route('search') }}" method="GET" class="search-box d-flex mb-4">
                        <input type="text" name="q" class="form-control search-input flex-grow-1" placeholder="ابحث عن المنتجات..." value="{{ request('q') }}">
                        <button type="submit" class="btn search-btn">
                            <i class="fas fa-search"></i>
                        </button>
                    </form>
                    
                    <div class="d-flex gap-3">
                        <a href="{{ route('categories.index') }}" class="btn btn-light btn-lg">تصفح الفئات</a>
                        <a href="{{ route('products.create') }}" class="btn btn-outline-light btn-lg">أضف إعلانك</a>
                    </div>
                </div>
                <div class="col-lg-6 text-center">
                    <i class="fas fa-shopping-bag" style="font-size: 15rem; opacity: 0.3;"></i>
                </div>
            </div>
        </div>
    </section>

    <!-- Categories Section -->
    <section class="container mb-5">
        <h2 class="section-title">تصفح حسب الفئة</h2>
        <div class="row g-4">
            @foreach($categories as $category)
            <div class="col-lg-3 col-md-6">
                <a href="{{ route('categories.index', ['category_id' => $category->id]) }}" class="text-decoration-none">
                    <div class="category-card">
                        <div class="category-icon">
                            <i class="{{ $category->icon }}"></i>
                        </div>
                        <h4 class="category-title">{{ $category->name_ar }}</h4>
                        <p class="category-desc">{{ $category->description_ar }}</p>
                    </div>
                </a>
            </div>
            @endforeach
        </div>
        
        @if($categories->count() > 8)
        <div class="text-center mt-4">
            <a href="{{ route('categories.index') }}" class="btn btn-outline-primary">
                <i class="fas fa-th-large me-2"></i>
                شاهد جميع الفئات
            </a>
        </div>
        @endif
    </section>

    <!-- Featured Products -->
    @if($featuredProducts->count() > 0)
    <section class="container mb-5">
        <h2 class="section-title">المنتجات المميزة</h2>
        <div class="row g-4">
            @foreach($featuredProducts as $product)
            <div class="col-lg-3 col-md-6">
                <a href="{{ route('product.show', $product->slug) }}" class="text-decoration-none">
                    <div class="product-card">
                        <div class="product-image">
                            @if($product->primaryImage)
                                <img src="{{ $product->primaryImage->url }}" alt="{{ $product->title_ar }}" class="img-fluid">
                            @else
                                <i class="{{ $product->category->icon ?? 'fas fa-box' }}"></i>
                            @endif
                        </div>
                        <div class="product-info">
                            <h5 class="product-title">{{ $product->title_ar }}</h5>
                            <div class="product-price">
                                {{ number_format($product->price) }} {{ $product->currency }}
                                @if($product->is_negotiable)
                                    <small class="text-muted">قابل للتفاوض</small>
                                @endif
                            </div>
                            <small class="text-muted">
                                <i class="fas fa-map-marker-alt"></i>
                                {{ $product->location_governorate }}
                            </small>
                        </div>
                    </div>
                </a>
            </div>
            @endforeach
        </div>
    </section>
    @endif

    <!-- Latest Products -->
    @if($latestProducts->count() > 0)
    <section class="container mb-5">
        <h2 class="section-title">أحدث الإعلانات</h2>
        <div class="row g-4">
            @foreach($latestProducts as $product)
            <div class="col-lg-3 col-md-6">
                <a href="{{ route('product.show', $product->slug) }}" class="text-decoration-none">
                    <div class="product-card">
                        <div class="product-image">
                            @if($product->primaryImage)
                                <img src="{{ $product->primaryImage->url }}" alt="{{ $product->title_ar }}" class="img-fluid">
                            @else
                                <i class="{{ $product->category->icon ?? 'fas fa-box' }}"></i>
                            @endif
                        </div>
                        <div class="product-info">
                            <h5 class="product-title">{{ $product->title_ar }}</h5>
                            <div class="product-price">
                                {{ number_format($product->price) }} {{ $product->currency }}
                                @if($product->is_negotiable)
                                    <small class="text-muted">قابل للتفاوض</small>
                                @endif
                            </div>
                            <small class="text-muted">
                                <i class="fas fa-map-marker-alt"></i>
                                {{ $product->location_governorate }}
                                <span class="float-end">
                                    <i class="fas fa-eye"></i>
                                    {{ $product->views_count }}
                                </span>
                            </small>
                        </div>
                    </div>
                </a>
            </div>
            @endforeach
        </div>
        
        <div class="text-center mt-4">
            <a href="{{ route('products.index') }}" class="btn btn-outline-primary">
                <i class="fas fa-th me-2"></i>
                شاهد جميع الإعلانات
            </a>
        </div>
    </section>
    @endif

    <!-- Top Vendors Section -->
    <section class="container mb-5">
        <h2 class="section-title">أفضل المتاجر</h2>
        <div class="row g-4">
            @for($i = 1; $i <= 6; $i++)
            <div class="col-lg-4 col-md-6">
                <div class="vendor-card">
                    <div class="vendor-header">
                        <div class="vendor-avatar">
                            <i class="fas fa-store"></i>
                        </div>
                        <div class="vendor-info">
                            <h5 class="vendor-name">متجر الإلكترونيات الحديثة</h5>
                            <div class="vendor-rating">
                                <div class="stars">
                                    @for($j = 1; $j <= 5; $j++)
                                        <i class="fas fa-star"></i>
                                    @endfor
                                </div>
                                <span>(127 تقييم)</span>
                            </div>
                        </div>
                    </div>
                    <p class="vendor-desc">متجر متخصص في بيع أحدث الأجهزة الإلكترونية والهواتف الذكية</p>
                    <div class="vendor-stats">
                        <div class="stat">
                            <span class="number">45</span>
                            <span class="label">منتج</span>
                        </div>
                        <div class="stat">
                            <span class="number">4.8</span>
                            <span class="label">تقييم</span>
                        </div>
                        <div class="stat">
                            <span class="number">2</span>
                            <span class="label">سنوات</span>
                        </div>
                    </div>
                </div>
            </div>
            @endfor
        </div>
        
        <div class="text-center mt-4">
            <a href="/vendors" class="btn btn-outline-primary">
                <i class="fas fa-store me-2"></i>
                شاهد جميع المتاجر
            </a>
        </div>
    </section>

    <!-- Special Offers Section -->
    <section class="container mb-5">
        <div class="offers-banner">
            <div class="row align-items-center">
                <div class="col-lg-6">
                    <h2 class="offers-title">عروض خاصة لفترة محدودة</h2>
                    <p class="offers-subtitle">خصومات تصل إلى 50% على مختارات من أفضل المنتجات</p>
                    <a href="/offers" class="btn btn-warning btn-lg">
                        <i class="fas fa-fire me-2"></i>
                        اكتشف العروض
                    </a>
                </div>
                <div class="col-lg-6 text-center">
                    <div class="offer-badge">
                        <span class="discount">50%</span>
                        <span class="text">خصم</span>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Categories Showcase -->
    <section class="container mb-5">
        <h2 class="section-title">تسوق حسب الفئة</h2>
        <div class="categories-showcase">
            <div class="row g-3">
                @foreach($categories->take(8) as $category)
                <div class="col-lg-3 col-md-4 col-6">
                    <a href="{{ route('category.show', $category->slug) }}" class="category-showcase-item">
                        <div class="category-image">
                            <i class="{{ $category->icon }}"></i>
                        </div>
                        <h6 class="category-name">{{ $category->name_ar }}</h6>
                        <span class="category-count">{{ rand(10, 100) }} منتج</span>
                    </a>
                </div>
                @endforeach
            </div>
        </div>
    </section>

    <!-- Popular Searches -->
    <section class="container mb-5">
        <h2 class="section-title">البحث الشائع</h2>
        <div class="popular-searches">
            <div class="search-tags">
                <a href="/search?q=آيفون" class="search-tag">آيفون</a>
                <a href="/search?q=سامسونج" class="search-tag">سامسونج</a>
                <a href="/search?q=لابتوب" class="search-tag">لابتوب</a>
                <a href="/search?q=سيارة" class="search-tag">سيارة</a>
                <a href="/search?q=شقة" class="search-tag">شقة للإيجار</a>
                <a href="/search?q=وظيفة" class="search-tag">وظائف</a>
                <a href="/search?q=أثاث" class="search-tag">أثاث منزلي</a>
                <a href="/search?q=ملابس" class="search-tag">ملابس</a>
                <a href="/search?q=كتب" class="search-tag">كتب</a>
                <a href="/search?q=رياضة" class="search-tag">معدات رياضية</a>
            </div>
        </div>
    </section>

    <!-- How It Works -->
    <section class="container mb-5">
        <h2 class="section-title">كيف يعمل Sokappe؟</h2>
        <div class="row g-4">
            <div class="col-lg-3 col-md-6">
                <div class="how-it-works-item">
                    <div class="step-number">1</div>
                    <div class="step-icon">
                        <i class="fas fa-user-plus"></i>
                    </div>
                    <h5 class="step-title">أنشئ حسابك</h5>
                    <p class="step-desc">سجل مجاناً واختر نوع حسابك كعميل أو تاجر</p>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <div class="how-it-works-item">
                    <div class="step-number">2</div>
                    <div class="step-icon">
                        <i class="fas fa-search"></i>
                    </div>
                    <h5 class="step-title">ابحث واستكشف</h5>
                    <p class="step-desc">تصفح آلاف المنتجات والخدمات من متاجر موثوقة</p>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <div class="how-it-works-item">
                    <div class="step-number">3</div>
                    <div class="step-icon">
                        <i class="fas fa-comments"></i>
                    </div>
                    <h5 class="step-title">تواصل مباشرة</h5>
                    <p class="step-desc">تحدث مع البائع مباشرة وتفاوض على الأسعار</p>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <div class="how-it-works-item">
                    <div class="step-number">4</div>
                    <div class="step-icon">
                        <i class="fas fa-handshake"></i>
                    </div>
                    <h5 class="step-title">أتمم الصفقة</h5>
                    <p class="step-desc">اتفق على التفاصيل واستلم منتجك بأمان</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Mobile App Promotion -->
    <section class="container mb-5">
        <div class="app-promotion">
            <div class="row align-items-center">
                <div class="col-lg-6">
                    <h2 class="app-title">حمل تطبيق Sokappe</h2>
                    <p class="app-subtitle">تسوق بسهولة أكبر من هاتفك المحمول</p>
                    <ul class="app-features">
                        <li><i class="fas fa-check"></i> تصفح سريع ومريح</li>
                        <li><i class="fas fa-check"></i> إشعارات فورية للعروض</li>
                        <li><i class="fas fa-check"></i> دردشة مباشرة مع البائعين</li>
                        <li><i class="fas fa-check"></i> متابعة طلباتك بسهولة</li>
                    </ul>
                    <div class="app-buttons">
                        <a href="#" class="app-button">
                            <img src="https://via.placeholder.com/150x50/000000/FFFFFF?text=App+Store" alt="App Store">
                        </a>
                        <a href="#" class="app-button">
                            <img src="https://via.placeholder.com/150x50/000000/FFFFFF?text=Google+Play" alt="Google Play">
                        </a>
                    </div>
                </div>
                <div class="col-lg-6 text-center">
                    <div class="phone-mockup">
                        <i class="fas fa-mobile-alt"></i>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Interactive Product Slider -->
    <section class="container mb-5">
        <h2 class="section-title">منتجات مختارة لك</h2>
        <div class="product-slider-container">
            <div class="product-slider" id="productSlider">
                @for($i = 1; $i <= 20; $i++)
                <div class="slider-item">
                    <div class="product-card">
                        <div class="product-image">
                            <i class="fas fa-{{ $i <= 5 ? 'mobile-alt' : ($i <= 10 ? 'laptop' : ($i <= 15 ? 'car' : 'home')) }}"></i>
                        </div>
                        <div class="product-info">
                            <h5 class="product-title">منتج رقم {{ $i }}</h5>
                            <div class="product-price">{{ rand(100, 5000) }} جنيه</div>
                            <button class="btn btn-add-cart btn-sm" onclick="addToCart({{ $i }})">
                                <i class="fas fa-cart-plus"></i> أضف للسلة
                            </button>
                        </div>
                    </div>
                </div>
                @endfor
            </div>
            <button class="slider-btn prev" onclick="slideProducts('prev')">
                <i class="fas fa-chevron-right"></i>
            </button>
            <button class="slider-btn next" onclick="slideProducts('next')">
                <i class="fas fa-chevron-left"></i>
            </button>
        </div>
    </section>

    <!-- Interactive Categories Tabs -->
    <section class="container mb-5">
        <h2 class="section-title">استكشف الفئات</h2>
        <div class="category-tabs">
            <div class="tab-buttons">
                <button class="tab-btn active" onclick="showCategoryTab('electronics')">الإلكترونيات</button>
                <button class="tab-btn" onclick="showCategoryTab('services')">الخدمات</button>
                <button class="tab-btn" onclick="showCategoryTab('vehicles')">المركبات</button>
                <button class="tab-btn" onclick="showCategoryTab('real-estate')">العقارات</button>
            </div>
            
            <div class="tab-content">
                <div class="tab-pane active" id="electronics">
                    <div class="row g-4">
                        <div class="col-md-3">
                            <div class="category-item" onclick="goToCategory('electronics')">
                                <i class="fas fa-mobile-alt"></i>
                                <h6>هواتف ذكية</h6>
                                <span>{{ rand(50, 200) }} منتج</span>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="category-item" onclick="goToCategory('electronics')">
                                <i class="fas fa-laptop"></i>
                                <h6>أجهزة كمبيوتر</h6>
                                <span>{{ rand(30, 150) }} منتج</span>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="category-item" onclick="goToCategory('electronics')">
                                <i class="fas fa-tv"></i>
                                <h6>أجهزة منزلية</h6>
                                <span>{{ rand(40, 180) }} منتج</span>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="category-item" onclick="goToCategory('electronics')">
                                <i class="fas fa-camera"></i>
                                <h6>كاميرات</h6>
                                <span>{{ rand(20, 100) }} منتج</span>
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="tab-pane" id="services">
                    <div class="row g-4">
                        <div class="col-md-3">
                            <div class="category-item" onclick="goToCategory('services')">
                                <i class="fas fa-graduation-cap"></i>
                                <h6>تدريس وتدريب</h6>
                                <span>{{ rand(25, 120) }} خدمة</span>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="category-item" onclick="goToCategory('services')">
                                <i class="fas fa-wrench"></i>
                                <h6>صيانة وإصلاح</h6>
                                <span>{{ rand(35, 140) }} خدمة</span>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="category-item" onclick="goToCategory('services')">
                                <i class="fas fa-paint-brush"></i>
                                <h6>تصميم وإبداع</h6>
                                <span>{{ rand(15, 80) }} خدمة</span>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="category-item" onclick="goToCategory('services')">
                                <i class="fas fa-cut"></i>
                                <h6>تجميل وعناية</h6>
                                <span>{{ rand(20, 90) }} خدمة</span>
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="tab-pane" id="vehicles">
                    <div class="row g-4">
                        <div class="col-md-3">
                            <div class="category-item" onclick="goToCategory('vehicles')">
                                <i class="fas fa-car"></i>
                                <h6>سيارات</h6>
                                <span>{{ rand(100, 300) }} سيارة</span>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="category-item" onclick="goToCategory('vehicles')">
                                <i class="fas fa-motorcycle"></i>
                                <h6>دراجات نارية</h6>
                                <span>{{ rand(30, 120) }} دراجة</span>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="category-item" onclick="goToCategory('vehicles')">
                                <i class="fas fa-truck"></i>
                                <h6>شاحنات</h6>
                                <span>{{ rand(20, 80) }} شاحنة</span>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="category-item" onclick="goToCategory('vehicles')">
                                <i class="fas fa-bicycle"></i>
                                <h6>دراجات هوائية</h6>
                                <span>{{ rand(15, 60) }} دراجة</span>
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="tab-pane" id="real-estate">
                    <div class="row g-4">
                        <div class="col-md-3">
                            <div class="category-item" onclick="goToCategory('real-estate')">
                                <i class="fas fa-home"></i>
                                <h6>شقق للبيع</h6>
                                <span>{{ rand(200, 500) }} شقة</span>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="category-item" onclick="goToCategory('real-estate')">
                                <i class="fas fa-building"></i>
                                <h6>شقق للإيجار</h6>
                                <span>{{ rand(150, 400) }} شقة</span>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="category-item" onclick="goToCategory('real-estate')">
                                <i class="fas fa-store"></i>
                                <h6>محلات تجارية</h6>
                                <span>{{ rand(50, 200) }} محل</span>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="category-item" onclick="goToCategory('real-estate')">
                                <i class="fas fa-warehouse"></i>
                                <h6>مخازن ومكاتب</h6>
                                <span>{{ rand(30, 150) }} مكان</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Live Statistics Counter -->
    <section class="container mb-5">
        <div class="live-stats">
            <div class="row text-center">
                <div class="col-lg-3 col-md-6">
                    <div class="stat-counter">
                        <i class="fas fa-users"></i>
                        <div class="counter" data-target="{{ $stats['total_users'] }}">0</div>
                        <p>مستخدم نشط</p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="stat-counter">
                        <i class="fas fa-box"></i>
                        <div class="counter" data-target="{{ $stats['total_products'] }}">0</div>
                        <p>منتج متاح</p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="stat-counter">
                        <i class="fas fa-store"></i>
                        <div class="counter" data-target="150">0</div>
                        <p>متجر موثق</p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="stat-counter">
                        <i class="fas fa-handshake"></i>
                        <div class="counter" data-target="5000">0</div>
                        <p>صفقة ناجحة</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Newsletter -->
    <section class="container mb-5">
        <div class="newsletter-section">
            <div class="row align-items-center">
                <div class="col-lg-6">
                    <h3 class="newsletter-title">اشترك في النشرة الإخبارية</h3>
                    <p class="newsletter-subtitle">احصل على أحدث العروض والمنتجات الجديدة</p>
                </div>
                <div class="col-lg-6">
                    <form class="newsletter-form">
                        <div class="input-group">
                            <input type="email" class="form-control" placeholder="أدخل بريدك الإلكتروني">
                            <button class="btn btn-primary" type="submit">اشتراك</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>

    <!-- Stats Section -->
    <section class="stats-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-6">
                    <div class="stat-item">
                        <div class="stat-number">{{ number_format($stats['total_products']) }}+</div>
                        <div class="stat-label">إعلان متاح</div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="stat-item">
                        <div class="stat-number">{{ number_format($stats['total_users']) }}+</div>
                        <div class="stat-label">مستخدم مسجل</div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="stat-item">
                        <div class="stat-number">{{ number_format($stats['total_categories']) }}</div>
                        <div class="stat-label">فئة متنوعة</div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="stat-item">
                        <div class="stat-number">{{ number_format($stats['total_views']) }}+</div>
                        <div class="stat-label">مشاهدة يومية</div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="footer">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-md-6 mb-4">
                    <h5>Sokappe Shop</h5>
                    <p>السوق الإلكتروني الأول في مصر. نوفر لك أفضل المنتجات من أفضل المتاجر بأفضل الأسعار.</p>
                    <div class="d-flex gap-3">
                        <a href="#"><i class="fab fa-facebook-f"></i></a>
                        <a href="#"><i class="fab fa-twitter"></i></a>
                        <a href="#"><i class="fab fa-instagram"></i></a>
                        <a href="#"><i class="fab fa-linkedin-in"></i></a>
                    </div>
                </div>
                <div class="col-lg-2 col-md-6 mb-4">
                    <h5>روابط سريعة</h5>
                    <ul class="list-unstyled">
                        <li><a href="/">الرئيسية</a></li>
                        <li><a href="/categories">الفئات</a></li>
                        <li><a href="/vendors">المتاجر</a></li>
                        <li><a href="/offers">العروض</a></li>
                    </ul>
                </div>
                <div class="col-lg-3 col-md-6 mb-4">
                    <h5>خدمة العملاء</h5>
                    <ul class="list-unstyled">
                        <li><a href="/contact">اتصل بنا</a></li>
                        <li><a href="/support">الدعم الفني</a></li>
                        <li><a href="/returns">سياسة الإرجاع</a></li>
                        <li><a href="/shipping">الشحن والتوصيل</a></li>
                    </ul>
                </div>
                <div class="col-lg-3 col-md-6 mb-4">
                    <h5>معلومات التواصل</h5>
                    <ul class="list-unstyled">
                        <li><i class="fas fa-phone me-2"></i> 01000000000</li>
                        <li><i class="fas fa-envelope me-2"></i> info@sokappe.com</li>
                        <li><i class="fas fa-map-marker-alt me-2"></i> القاهرة، مصر</li>
                    </ul>
                </div>
            </div>
            <hr class="my-4">
            <div class="row align-items-center">
                <div class="col-md-6">
                    <p class="mb-0">&copy; 2024 Sokappe Shop. جميع الحقوق محفوظة.</p>
                </div>
                <div class="col-md-6 text-end">
                    <a href="/privacy" class="me-3">سياسة الخصوصية</a>
                    <a href="/terms">الشروط والأحكام</a>
                </div>
            </div>
        </div>
    </footer>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    
    <script>
        let currentSlide = 0;
        const slideWidth = 270; // 250px + 20px gap
        
        // Product Slider Functions
        function slideProducts(direction) {
            const slider = document.getElementById('productSlider');
            const maxSlides = 20 - 4; // Show 4 items at once
            
            if (direction === 'next' && currentSlide < maxSlides) {
                currentSlide++;
            } else if (direction === 'prev' && currentSlide > 0) {
                currentSlide--;
            }
            
            slider.style.transform = `translateX(${currentSlide * slideWidth}px)`;
        }
        
        // Category Tabs Functions
        function showCategoryTab(tabId) {
            // Hide all tab panes
            document.querySelectorAll('.tab-pane').forEach(pane => {
                pane.classList.remove('active');
            });
            
            // Remove active class from all buttons
            document.querySelectorAll('.tab-btn').forEach(btn => {
                btn.classList.remove('active');
            });
            
            // Show selected tab
            document.getElementById(tabId).classList.add('active');
            
            // Add active class to clicked button
            event.target.classList.add('active');
        }
        
        function goToCategory(category) {
            window.location.href = '/categories';
        }
        
        // Counter Animation
        function animateCounters() {
            const counters = document.querySelectorAll('.counter');
            
            counters.forEach(counter => {
                const target = parseInt(counter.getAttribute('data-target'));
                const increment = target / 100;
                let current = 0;
                
                const timer = setInterval(() => {
                    current += increment;
                    if (current >= target) {
                        counter.textContent = target.toLocaleString();
                        clearInterval(timer);
                    } else {
                        counter.textContent = Math.floor(current).toLocaleString();
                    }
                }, 20);
            });
        }
        
        // Intersection Observer for Counter Animation
        const observerOptions = {
            threshold: 0.5
        };
        
        const observer = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    animateCounters();
                    observer.unobserve(entry.target);
                }
            });
        }, observerOptions);
        
        // Initialize when page loads
        document.addEventListener('DOMContentLoaded', function() {
            // Observe the stats section
            const statsSection = document.querySelector('.live-stats');
            if (statsSection) {
                observer.observe(statsSection);
            }
            
            // Auto-slide products every 5 seconds
            setInterval(() => {
                slideProducts('next');
                if (currentSlide >= 16) { // Reset to beginning
                    currentSlide = -1;
                }
            }, 5000);
        });
        
        // Add to cart function (placeholder)
        function addToCart(productId) {
            console.log('Added product', productId, 'to cart');
            
            // Show success message
            const button = event.target;
            const originalText = button.innerHTML;
            button.innerHTML = '<i class="fas fa-check"></i> تم الإضافة';
            button.style.background = '#28a745';
            
            setTimeout(() => {
                button.innerHTML = originalText;
                button.style.background = '';
            }, 2000);
        }
    </script>
    
    <!-- Custom JS -->
    <script>
        // Add smooth scrolling
        document.querySelectorAll('a[href^="#"]').forEach(anchor => {
            anchor.addEventListener('click', function (e) {
                e.preventDefault();
                document.querySelector(this.getAttribute('href')).scrollIntoView({
                    behavior: 'smooth'
                });
            });
        });
        
        // Add animation on scroll
        const observerOptions = {
            threshold: 0.1,
            rootMargin: '0px 0px -50px 0px'
        };
        
        const observer = new IntersectionObserver(function(entries) {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    entry.target.style.opacity = '1';
                    entry.target.style.transform = 'translateY(0)';
                }
            });
        }, observerOptions);
        
        // Observe all cards
        document.querySelectorAll('.category-card, .product-card').forEach(card => {
            card.style.opacity = '0';
            card.style.transform = 'translateY(20px)';
            card.style.transition = 'all 0.6s ease';
            observer.observe(card);
        });
    </script>
</body>
</html>