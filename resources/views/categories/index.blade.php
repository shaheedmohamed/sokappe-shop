@extends('layouts.app')

@section('title', 'الفئات - Sokappe Shop')

@push('styles')
<style>
    .page-header {
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        color: white;
        padding: 60px 0;
        margin-bottom: 50px;
    }
    
    .page-title {
        font-size: 2.5rem;
        font-weight: 700;
        margin-bottom: 15px;
    }
    
    .page-subtitle {
        font-size: 1.2rem;
        opacity: 0.9;
    }
    
    /* Category Filter Items */
    .category-filter-item {
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
        border: 2px solid transparent;
    }
    
    .category-filter-item:hover {
        transform: translateY(-3px);
        box-shadow: 0 8px 25px rgba(0,0,0,0.1);
        text-decoration: none;
        color: inherit;
        border-color: #667eea;
    }
    
    .category-filter-item.active {
        border-color: #667eea;
        background: linear-gradient(135deg, rgba(102, 126, 234, 0.1) 0%, rgba(118, 75, 162, 0.1) 100%);
    }
    
    .category-icon {
        font-size: 2.5rem;
        margin-bottom: 15px;
        color: #667eea;
    }
    
    .category-name {
        font-weight: 600;
        margin-bottom: 5px;
    }
    
    .category-count {
        font-size: 0.85rem;
        color: #666;
    }
    
    /* Filters Section */
    .filters-section {
        background: white;
        border-radius: 15px;
        padding: 25px;
        box-shadow: 0 5px 15px rgba(0,0,0,0.08);
    }
    
    /* Product Cards */
    .product-card {
        background: white;
        border-radius: 15px;
        overflow: hidden;
        box-shadow: 0 5px 15px rgba(0,0,0,0.08);
        transition: all 0.3s ease;
        border: 2px solid transparent;
        margin-bottom: 20px;
        position: relative;
    }
    
    .product-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 15px 35px rgba(0,0,0,0.15);
        border-color: #ff6b35;
    }
    
    .product-image {
        height: 200px;
        background: linear-gradient(135deg, #f8f9fa 0%, #e9ecef 100%);
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 3rem;
        color: #adb5bd;
        position: relative;
    }
    
    .product-badge {
        position: absolute;
        top: 10px;
        right: 10px;
        background: #ff6b35;
        color: white;
        padding: 5px 10px;
        border-radius: 15px;
        font-size: 0.8rem;
        font-weight: 600;
    }
    
    .product-info {
        padding: 20px;
    }
    
    .product-title {
        font-size: 1.1rem;
        font-weight: 600;
        color: #333;
        margin-bottom: 10px;
        line-height: 1.4;
        height: 2.8em;
        overflow: hidden;
    }
    
    .product-price {
        font-size: 1.3rem;
        font-weight: 700;
        color: #ff6b35;
        margin-bottom: 8px;
    }
    
    .product-old-price {
        font-size: 1rem;
        color: #999;
        text-decoration: line-through;
        margin-right: 10px;
    }
    
    .product-meta {
        display: flex;
        justify-content: space-between;
        align-items: center;
        font-size: 0.85rem;
        color: #666;
        margin-bottom: 15px;
    }
    
    .product-actions {
        display: flex;
        gap: 10px;
    }
    
    .btn-add-cart {
        background: #ff6b35;
        color: white;
        border: none;
        padding: 10px 15px;
        border-radius: 8px;
        font-weight: 600;
        font-size: 0.9rem;
        flex: 1;
        transition: all 0.3s ease;
    }
    
    .btn-add-cart:hover {
        background: #e55a2b;
        color: white;
        transform: translateY(-2px);
    }
    
    .btn-favorite {
        background: #f8f9fa;
        color: #666;
        border: 2px solid #e9ecef;
        padding: 10px 12px;
        border-radius: 8px;
        transition: all 0.3s ease;
    }
    
    .btn-favorite:hover,
    .btn-favorite.active {
        background: #ff6b35;
        color: white;
        border-color: #ff6b35;
    }
</style>
@endpush

@section('content')
    <!-- Page Header -->
    <section class="page-header">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-8">
                    <h1 class="page-title">تصفح الفئات</h1>
                    <p class="page-subtitle">اكتشف المنتجات حسب الفئة المطلوبة</p>
                </div>
                <div class="col-lg-4 text-center">
                    <i class="fas fa-th-large" style="font-size: 8rem; opacity: 0.3;"></i>
                </div>
            </div>
        </div>
    </section>

    <!-- Categories Grid -->
    <section class="container mb-5">
        <h2 class="section-title mb-4">تصفح حسب الفئة</h2>
        <div class="row g-3 mb-5">
            @forelse($categories as $category)
                <div class="col-lg-3 col-md-4 col-6">
                    <a href="javascript:void(0)" onclick="filterByCategory({{ $category->id }}, '{{ $category->name_ar ?? $category->name }}')" class="category-filter-item">
                        <div class="category-icon">
                            <i class="{{ $category->icon ?? 'fas fa-cube' }}"></i>
                        </div>
                        <h6 class="category-name">{{ $category->name_ar ?? $category->name }}</h6>
                        <span class="category-count">{{ rand(10, 100) }} منتج</span>
                    </a>
                </div>
            @empty
                <div class="col-12">
                    <div class="text-center py-5">
                        <i class="fas fa-box-open" style="font-size: 4rem; color: #ccc; margin-bottom: 20px;"></i>
                        <h3 class="text-muted">لا توجد فئات متاحة حالياً</h3>
                        <p class="text-muted">سيتم إضافة فئات جديدة قريباً</p>
                        <a href="{{ route('home') }}" class="btn btn-primary">العودة للرئيسية</a>
                    </div>
                </div>
            @endforelse
        </div>

        <!-- Search and Filter Section -->
        <div class="filters-section mb-4">
            <form method="GET" action="{{ route('categories.index') }}" id="filterForm">
                <div class="row g-3">
                    <div class="col-md-4">
                        <label class="form-label">البحث في المنتجات</label>
                        <input type="text" class="form-control" name="search" value="{{ request('search') }}" placeholder="ابحث عن منتج...">
                    </div>
                    <div class="col-md-3">
                        <label class="form-label">الفئة</label>
                        <select class="form-select" name="category_id" id="categoryFilter">
                            <option value="">جميع الفئات</option>
                            @foreach($categories as $category)
                                <option value="{{ $category->id }}" {{ request('category_id') == $category->id ? 'selected' : '' }}>
                                    {{ $category->name_ar ?? $category->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-2">
                        <label class="form-label">السعر من</label>
                        <input type="number" class="form-control" name="min_price" value="{{ request('min_price') }}" placeholder="0">
                    </div>
                    <div class="col-md-2">
                        <label class="form-label">السعر إلى</label>
                        <input type="number" class="form-control" name="max_price" value="{{ request('max_price') }}" placeholder="10000">
                    </div>
                    <div class="col-md-1">
                        <label class="form-label">&nbsp;</label>
                        <button type="submit" class="btn btn-primary w-100">
                            <i class="fas fa-search"></i>
                        </button>
                    </div>
                </div>
            </form>
        </div>

        <!-- Products Results -->
        <div class="products-section">
            <div class="d-flex justify-content-between align-items-center mb-4">
                <h3 class="results-title">نتائج البحث</h3>
                <div class="results-info">
                    <span class="text-muted">عرض {{ $products->count() }} من أصل {{ $products->total() }} منتج</span>
                </div>
            </div>

            <div class="row">
                @forelse($products as $product)
                <div class="col-lg-3 col-md-4 col-sm-6 mb-4">
                    <div class="product-card">
                        @if($product->is_featured)
                            <div class="product-badge">مميز</div>
                        @endif
                        
                        <div class="product-image">
                            <i class="fas fa-box"></i>
                        </div>
                        
                        <div class="product-info">
                            <h5 class="product-title">{{ $product->name_ar ?? $product->name }}</h5>
                            
                            <div class="product-price">
                                {{ number_format($product->price) }} جنيه
                                @if($product->sale_price && $product->sale_price > $product->price)
                                    <span class="product-old-price">{{ number_format($product->sale_price) }} جنيه</span>
                                @endif
                            </div>
                            
                            <div class="product-meta">
                                <div class="product-category">
                                    <i class="fas fa-tag"></i>
                                    {{ $product->category->name_ar ?? $product->category->name ?? 'غير محدد' }}
                                </div>
                                <div class="product-views">
                                    <i class="fas fa-eye"></i>
                                    {{ $product->views_count ?? 0 }}
                                </div>
                            </div>
                            
                            <div class="product-actions">
                                <button class="btn btn-add-cart" onclick="addToCart({{ $product->id }}, '{{ $product->name_ar ?? $product->name }}', {{ $product->price }})">
                                    <i class="fas fa-cart-plus"></i> أضف للسلة
                                </button>
                                <button class="btn btn-favorite" onclick="toggleFavorite(this)">
                                    <i class="far fa-heart"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
                @empty
                <div class="col-12">
                    <div class="empty-state text-center py-5">
                        <i class="fas fa-search" style="font-size: 4rem; color: #ddd; margin-bottom: 20px;"></i>
                        <h3 class="text-muted">لا توجد منتجات</h3>
                        <p class="text-muted">جرب تغيير معايير البحث</p>
                    </div>
                </div>
                @endforelse
            </div>

            <!-- Pagination -->
            @if($products->hasPages())
                <div class="d-flex justify-content-center mt-4">
                    {{ $products->appends(request()->query())->links() }}
                </div>
            @endif
        </div>
    </section>
@endsection

@push('scripts')
<script>
    let cart = [];
    
    function filterByCategory(categoryId, categoryName) {
        document.getElementById('categoryFilter').value = categoryId;
        document.querySelectorAll('.category-filter-item').forEach(item => {
            item.classList.remove('active');
        });
        event.target.closest('.category-filter-item').classList.add('active');
        document.getElementById('filterForm').submit();
    }
    
    function addToCart(productId, productName, productPrice) {
        console.log('تم إضافة المنتج للسلة:', productName);
        
        const button = event.target.closest('.btn-add-cart');
        const originalText = button.innerHTML;
        button.innerHTML = '<i class="fas fa-check"></i> تم الإضافة';
        button.style.background = '#28a745';
        
        setTimeout(() => {
            button.innerHTML = originalText;
            button.style.background = '#ff6b35';
        }, 1500);
    }
    
    function toggleFavorite(button) {
        button.classList.toggle('active');
        const icon = button.querySelector('i');
        
        if (button.classList.contains('active')) {
            icon.classList.remove('far');
            icon.classList.add('fas');
        } else {
            icon.classList.remove('fas');
            icon.classList.add('far');
        }
    }
</script>
@endpush
            font-weight: 700;
            margin-bottom: 15px;
        }
        
        .page-subtitle {
            font-size: 1.2rem;
            opacity: 0.9;
        }
        
        .category-card {
            background: white;
            border-radius: 15px;
            padding: 40px 30px;
            text-align: center;
            box-shadow: 0 5px 15px rgba(0,0,0,0.08);
            transition: all 0.3s ease;
            border: none;
            height: 100%;
            text-decoration: none;
            color: inherit;
        }
        
        .category-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 15px 35px rgba(0,0,0,0.15);
            text-decoration: none;
            color: inherit;
        }
        
        .category-icon {
            font-size: 4rem;
            margin-bottom: 25px;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }
        
        .category-title {
            font-size: 1.5rem;
            font-weight: 600;
            color: #333;
            margin-bottom: 15px;
        }
        
        .category-desc {
            color: #666;
            font-size: 1rem;
            margin-bottom: 20px;
        }
        
        .category-count {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            padding: 8px 20px;
            border-radius: 25px;
            font-size: 0.9rem;
            font-weight: 600;
            display: inline-block;
        }
        
        .breadcrumb {
            background: white;
            border-radius: 10px;
            padding: 15px 20px;
            margin-bottom: 30px;
        }
        
        .breadcrumb-item a {
            color: #667eea;
            text-decoration: none;
        }
        
        .breadcrumb-item.active {
            color: #333;
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
        
        /* Category Filter Items */
        .category-filter-item {
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
            border: 2px solid transparent;
        }
        
        .category-filter-item:hover {
            transform: translateY(-3px);
            box-shadow: 0 8px 25px rgba(0,0,0,0.1);
            text-decoration: none;
            color: inherit;
            border-color: #667eea;
        }
        
        .category-filter-item.active {
            border-color: #667eea;
            background: linear-gradient(135deg, rgba(102, 126, 234, 0.1) 0%, rgba(118, 75, 162, 0.1) 100%);
        }
        
        /* Filters Section */
        .filters-section {
            background: white;
            border-radius: 15px;
            padding: 25px;
            box-shadow: 0 5px 15px rgba(0,0,0,0.08);
        }
        
        /* Product Cards */
        .product-card {
            background: white;
            border-radius: 15px;
            overflow: hidden;
            box-shadow: 0 5px 15px rgba(0,0,0,0.08);
            transition: all 0.3s ease;
            border: 2px solid transparent;
            margin-bottom: 20px;
            position: relative;
        }
        
        .product-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 15px 35px rgba(0,0,0,0.15);
            border-color: #ff6b35;
        }
        
        .product-image {
            height: 200px;
            background: linear-gradient(135deg, #f8f9fa 0%, #e9ecef 100%);
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 3rem;
            color: #adb5bd;
            position: relative;
        }
        
        .product-badge {
            position: absolute;
            top: 10px;
            right: 10px;
            background: #ff6b35;
            color: white;
            padding: 5px 10px;
            border-radius: 15px;
            font-size: 0.8rem;
            font-weight: 600;
        }
        
        .product-info {
            padding: 20px;
        }
        
        .product-title {
            font-size: 1.1rem;
            font-weight: 600;
            color: #333;
            margin-bottom: 10px;
            line-height: 1.4;
            height: 2.8em;
            overflow: hidden;
        }
        
        .product-price {
            font-size: 1.3rem;
            font-weight: 700;
            color: #ff6b35;
            margin-bottom: 8px;
        }
        
        .product-old-price {
            font-size: 1rem;
            color: #999;
            text-decoration: line-through;
            margin-right: 10px;
        }
        
        .product-meta {
            display: flex;
            justify-content: space-between;
            align-items: center;
            font-size: 0.85rem;
            color: #666;
            margin-bottom: 15px;
        }
        
        .product-actions {
            display: flex;
            gap: 10px;
        }
        
        .btn-add-cart {
            background: #ff6b35;
            color: white;
            border: none;
            padding: 10px 15px;
            border-radius: 8px;
            font-weight: 600;
            font-size: 0.9rem;
            flex: 1;
            transition: all 0.3s ease;
        }
        
        .btn-add-cart:hover {
            background: #e55a2b;
            color: white;
            transform: translateY(-2px);
        }
        
        .btn-favorite {
            background: #f8f9fa;
            color: #666;
            border: 2px solid #e9ecef;
            padding: 10px 12px;
            border-radius: 8px;
            transition: all 0.3s ease;
        }
        
        .btn-favorite:hover,
        .btn-favorite.active {
            background: #ff6b35;
            color: white;
            border-color: #ff6b35;
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
    </style>
</head>
<body>
    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-dark">
        <div class="container">
            <a class="navbar-brand" href="{{ route('home') }}">
                <i class="fas fa-shopping-bag me-2"></i>
                Sokappe Shop
            </a>
            
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav me-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('home') }}">الرئيسية</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="{{ route('categories.index') }}">الفئات</a>
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

    <!-- Page Header -->
    <section class="page-header">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-8">
                    <h1 class="page-title">تصفح الفئات</h1>
                    <p class="page-subtitle">اكتشف جميع فئات المنتجات المتاحة في متجرنا</p>
                </div>
                <div class="col-lg-4 text-center">
                    <i class="fas fa-th-large" style="font-size: 8rem; opacity: 0.3;"></i>
                </div>
            </div>
        </div>
    </section>

    <!-- Breadcrumb -->
    <div class="container">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('home') }}">الرئيسية</a></li>
                <li class="breadcrumb-item active" aria-current="page">الفئات</li>
            </ol>
        </nav>
    </div>

    <!-- Categories Grid -->
    <section class="container mb-5">
        <h2 class="section-title mb-4">تصفح حسب الفئة</h2>
        <div class="row g-3 mb-5">
            @forelse($categories as $category)
                <div class="col-lg-3 col-md-4 col-6">
                    <a href="javascript:void(0)" onclick="filterByCategory({{ $category->id }}, '{{ $category->name_ar ?? $category->name }}')" class="category-filter-item">
                        <div class="category-icon">
                            <i class="{{ $category->icon ?? 'fas fa-cube' }}"></i>
                        </div>
                        <h6 class="category-name">{{ $category->name_ar ?? $category->name }}</h6>
                        <span class="category-count">{{ rand(10, 100) }} منتج</span>
                    </a>
                </div>
            @empty
                <div class="col-12">
                    <div class="text-center py-5">
                        <i class="fas fa-box-open" style="font-size: 4rem; color: #ccc; margin-bottom: 20px;"></i>
                        <h3 class="text-muted">لا توجد فئات متاحة حالياً</h3>
                        <p class="text-muted">سيتم إضافة فئات جديدة قريباً</p>
                        <a href="{{ route('home') }}" class="btn btn-primary">العودة للرئيسية</a>
                    </div>
                </div>
            @endforelse
        </div>

        <!-- Search and Filter Section -->
        <div class="filters-section mb-4">
            <form method="GET" action="{{ route('categories.index') }}" id="filterForm">
                <div class="row g-3">
                    <div class="col-md-4">
                        <label class="form-label">البحث في المنتجات</label>
                        <input type="text" class="form-control" name="search" value="{{ request('search') }}" placeholder="ابحث عن منتج...">
                    </div>
                    <div class="col-md-3">
                        <label class="form-label">الفئة</label>
                        <select class="form-select" name="category_id" id="categoryFilter">
                            <option value="">جميع الفئات</option>
                            @foreach($categories as $category)
                                <option value="{{ $category->id }}" {{ request('category_id') == $category->id ? 'selected' : '' }}>
                                    {{ $category->name_ar ?? $category->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-2">
                        <label class="form-label">السعر من</label>
                        <input type="number" class="form-control" name="min_price" value="{{ request('min_price') }}" placeholder="0">
                    </div>
                    <div class="col-md-2">
                        <label class="form-label">السعر إلى</label>
                        <input type="number" class="form-control" name="max_price" value="{{ request('max_price') }}" placeholder="10000">
                    </div>
                    <div class="col-md-1">
                        <label class="form-label">&nbsp;</label>
                        <button type="submit" class="btn btn-primary w-100">
                            <i class="fas fa-search"></i>
                        </button>
                    </div>
                </div>
            </form>
        </div>

        <!-- Products Results -->
        <div class="products-section">
            <div class="d-flex justify-content-between align-items-center mb-4">
                <h3 class="results-title">نتائج البحث</h3>
                <div class="results-info">
                    <span class="text-muted">عرض {{ $products->count() }} من أصل {{ $products->total() }} منتج</span>
                </div>
            </div>

            <div class="row">
                @forelse($products as $product)
                <div class="col-lg-3 col-md-4 col-sm-6 mb-4">
                    <div class="product-card">
                        @if($product->is_featured)
                            <div class="product-badge">مميز</div>
                        @endif
                        
                        <div class="product-image">
                            <i class="fas fa-box"></i>
                        </div>
                        
                        <div class="product-info">
                            <h5 class="product-title">{{ $product->name_ar ?? $product->name }}</h5>
                            
                            <div class="product-price">
                                {{ number_format($product->price) }} جنيه
                                @if($product->sale_price && $product->sale_price > $product->price)
                                    <span class="product-old-price">{{ number_format($product->sale_price) }} جنيه</span>
                                @endif
                            </div>
                            
                            <div class="product-meta">
                                <div class="product-category">
                                    <i class="fas fa-tag"></i>
                                    {{ $product->category->name_ar ?? $product->category->name ?? 'غير محدد' }}
                                </div>
                                <div class="product-views">
                                    <i class="fas fa-eye"></i>
                                    {{ $product->views_count ?? 0 }}
                                </div>
                            </div>
                            
                            <div class="product-actions">
                                <button class="btn btn-add-cart" onclick="addToCart({{ $product->id }}, '{{ $product->name_ar ?? $product->name }}', {{ $product->price }})">
                                    <i class="fas fa-cart-plus"></i> أضف للسلة
                                </button>
                                <button class="btn btn-favorite" onclick="toggleFavorite(this)">
                                    <i class="far fa-heart"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
                @empty
                <div class="col-12">
                    <div class="empty-state text-center py-5">
                        <i class="fas fa-search" style="font-size: 4rem; color: #ddd; margin-bottom: 20px;"></i>
                        <h3 class="text-muted">لا توجد منتجات</h3>
                        <p class="text-muted">جرب تغيير معايير البحث</p>
                    </div>
                </div>
                @endforelse
            </div>

            <!-- Pagination -->
            @if($products->hasPages())
                <div class="d-flex justify-content-center mt-4">
                    {{ $products->appends(request()->query())->links() }}
                </div>
            @endif
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
                        <li><a href="{{ route('home') }}">الرئيسية</a></li>
                        <li><a href="{{ route('categories.index') }}">الفئات</a></li>
                        <li><a href="{{ route('vendors.index') }}">المتاجر</a></li>
                        <li><a href="{{ route('offers.index') }}">العروض</a></li>
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
        let cart = [];
        
        function filterByCategory(categoryId, categoryName) {
            // Update the category filter dropdown
            document.getElementById('categoryFilter').value = categoryId;
            
            // Highlight the selected category
            document.querySelectorAll('.category-filter-item').forEach(item => {
                item.classList.remove('active');
            });
            event.target.closest('.category-filter-item').classList.add('active');
            
            // Submit the form to filter products
            document.getElementById('filterForm').submit();
        }
        
        function addToCart(productId, productName, productPrice) {
            const product = { name: productName, price: productPrice };
            
            // Check if product already in cart
            const existingItem = cart.find(item => item.id === productId);
            if (existingItem) {
                existingItem.quantity++;
            } else {
                cart.push({
                    id: productId,
                    name: product.name,
                    price: product.price,
                    quantity: 1
                });
            }
            
            // Show success message
            const button = event.target.closest('.btn-add-cart');
            const originalText = button.innerHTML;
            button.innerHTML = '<i class="fas fa-check"></i> تم الإضافة';
            button.style.background = '#28a745';
            
            setTimeout(() => {
                button.innerHTML = originalText;
                button.style.background = '#ff6b35';
            }, 1500);
            
            console.log('تم إضافة المنتج للسلة:', product);
        }
        
        function toggleFavorite(button) {
            button.classList.toggle('active');
            const icon = button.querySelector('i');
            
            if (button.classList.contains('active')) {
                icon.classList.remove('far');
                icon.classList.add('fas');
            } else {
                icon.classList.remove('fas');
                icon.classList.add('far');
            }
        }
        
        // Initialize page
        document.addEventListener('DOMContentLoaded', function() {
            // Highlight active category if any
            const selectedCategoryId = '{{ request("category_id") }}';
            if (selectedCategoryId) {
                document.querySelectorAll('.category-filter-item').forEach(item => {
                    const onclick = item.getAttribute('onclick');
                    if (onclick && onclick.includes(selectedCategoryId)) {
                        item.classList.add('active');
                    }
                });
            }
        });
    </script>
</body>
</html>
