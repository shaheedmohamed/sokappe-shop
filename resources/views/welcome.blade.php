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
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown">
                                <i class="fas fa-user"></i> {{ Auth::user()->name }}
                            </a>
                            <ul class="dropdown-menu">
                                @if(Auth::user()->isVendor())
                                    <li><a class="dropdown-item" href="{{ route('vendor.profile') }}">ملف المتجر</a></li>
                                @endif
                                <li><a class="dropdown-item" href="{{ route('products.favorites') }}">المفضلة</a></li>
                                <li><hr class="dropdown-divider"></li>
                                <li>
                                    <form method="POST" action="{{ route('logout') }}" class="d-inline">
                                        @csrf
                                        <button type="submit" class="dropdown-item">تسجيل الخروج</button>
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
                <a href="{{ route('category.show', $category->slug) }}" class="text-decoration-none">
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