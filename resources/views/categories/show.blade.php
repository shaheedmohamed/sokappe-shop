<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $category->name_ar ?? $category->name }} - Sokappe Shop</title>
    <meta name="description" content="{{ $category->description_ar ?? $category->description }}">
    
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
        
        .page-header {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            padding: 40px 0;
            margin-bottom: 30px;
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
        
        .filters-sidebar {
            background: white;
            border-radius: 15px;
            padding: 25px;
            box-shadow: 0 5px 15px rgba(0,0,0,0.08);
            margin-bottom: 30px;
        }
        
        .filter-title {
            font-size: 1.2rem;
            font-weight: 600;
            margin-bottom: 20px;
            color: #333;
        }
        
        .subcategory-item {
            display: block;
            padding: 10px 15px;
            margin-bottom: 8px;
            background: #f8f9fa;
            border-radius: 8px;
            text-decoration: none;
            color: #333;
            transition: all 0.3s ease;
        }
        
        .subcategory-item:hover {
            background: #667eea;
            color: white;
            text-decoration: none;
        }
        
        .products-header {
            background: white;
            border-radius: 15px;
            padding: 20px;
            margin-bottom: 30px;
            box-shadow: 0 5px 15px rgba(0,0,0,0.08);
        }
        
        .sort-select {
            border: 2px solid #e9ecef;
            border-radius: 8px;
            padding: 8px 15px;
        }
        
        .product-card {
            background: white;
            border-radius: 15px;
            overflow: hidden;
            box-shadow: 0 5px 15px rgba(0,0,0,0.08);
            transition: all 0.3s ease;
            border: none;
            margin-bottom: 30px;
        }
        
        .product-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 25px rgba(0,0,0,0.15);
        }
        
        .product-image {
            height: 250px;
            background: linear-gradient(45deg, #f0f0f0, #e0e0e0);
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 4rem;
            color: #ccc;
            position: relative;
        }
        
        .product-badge {
            position: absolute;
            top: 10px;
            right: 10px;
            background: #dc3545;
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
            font-weight: 600;
            color: #333;
            margin-bottom: 10px;
            font-size: 1.1rem;
        }
        
        .product-vendor {
            color: #666;
            font-size: 0.9rem;
            margin-bottom: 10px;
        }
        
        .product-price {
            font-size: 1.3rem;
            font-weight: 700;
            color: #667eea;
            margin-bottom: 15px;
        }
        
        .old-price {
            text-decoration: line-through;
            color: #999;
            font-size: 1rem;
            margin-left: 10px;
        }
        
        .btn-primary {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            border: none;
            padding: 10px 20px;
            border-radius: 8px;
            font-weight: 600;
        }
        
        .pagination {
            justify-content: center;
        }
        
        .page-link {
            color: #667eea;
            border-color: #e9ecef;
        }
        
        .page-item.active .page-link {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            border-color: #667eea;
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
                        <a class="nav-link" href="{{ route('vendors.index') }}">المتاجر</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('offers.index') }}">العروض</a>
                    </li>
                </ul>
                
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('cart.index') }}">
                            <i class="fas fa-shopping-cart"></i>
                            <span class="badge bg-danger">3</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('login') }}">تسجيل الدخول</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('register') }}">إنشاء حساب</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Page Header -->
    <section class="page-header">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-8">
                    <h1>{{ $category->name_ar ?? $category->name }}</h1>
                    <p class="mb-0">{{ $category->description_ar ?? $category->description }}</p>
                </div>
                <div class="col-lg-4 text-center">
                    <i class="{{ $category->icon ?? 'fas fa-cube' }}" style="font-size: 6rem; opacity: 0.3;"></i>
                </div>
            </div>
        </div>
    </section>

    <!-- Breadcrumb -->
    <div class="container">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('home') }}">الرئيسية</a></li>
                <li class="breadcrumb-item"><a href="{{ route('categories.index') }}">الفئات</a></li>
                <li class="breadcrumb-item active" aria-current="page">{{ $category->name_ar ?? $category->name }}</li>
            </ol>
        </nav>
    </div>

    <div class="container">
        <div class="row">
            <!-- Filters Sidebar -->
            <div class="col-lg-3">
                @if($subcategories->count() > 0)
                <div class="filters-sidebar">
                    <h5 class="filter-title">الفئات الفرعية</h5>
                    @foreach($subcategories as $subcategory)
                        <a href="{{ route('categories.show', $subcategory) }}" class="subcategory-item">
                            {{ $subcategory->name_ar ?? $subcategory->name }}
                            <span class="float-end">({{ $subcategory->products_count ?? 0 }})</span>
                        </a>
                    @endforeach
                </div>
                @endif

                <!-- Price Filter -->
                <div class="filters-sidebar">
                    <h5 class="filter-title">السعر</h5>
                    <form method="GET">
                        <div class="row g-2 mb-3">
                            <div class="col-6">
                                <input type="number" class="form-control" name="min_price" 
                                       placeholder="من" value="{{ $minPrice }}">
                            </div>
                            <div class="col-6">
                                <input type="number" class="form-control" name="max_price" 
                                       placeholder="إلى" value="{{ $maxPrice }}">
                            </div>
                        </div>
                        <input type="hidden" name="sort" value="{{ $sortBy }}">
                        <button type="submit" class="btn btn-primary w-100">تطبيق</button>
                    </form>
                </div>
            </div>

            <!-- Products Section -->
            <div class="col-lg-9">
                <!-- Products Header -->
                <div class="products-header">
                    <div class="row align-items-center">
                        <div class="col-md-6">
                            <h5 class="mb-0">{{ $products->total() }} منتج متاح</h5>
                        </div>
                        <div class="col-md-6">
                            <form method="GET" class="d-flex justify-content-end">
                                <select name="sort" class="sort-select" onchange="this.form.submit()">
                                    <option value="latest" {{ $sortBy == 'latest' ? 'selected' : '' }}>الأحدث</option>
                                    <option value="price_low" {{ $sortBy == 'price_low' ? 'selected' : '' }}>السعر: من الأقل للأعلى</option>
                                    <option value="price_high" {{ $sortBy == 'price_high' ? 'selected' : '' }}>السعر: من الأعلى للأقل</option>
                                    <option value="popular" {{ $sortBy == 'popular' ? 'selected' : '' }}>الأكثر مبيعاً</option>
                                    <option value="rating" {{ $sortBy == 'rating' ? 'selected' : '' }}>الأعلى تقييماً</option>
                                </select>
                                <input type="hidden" name="min_price" value="{{ $minPrice }}">
                                <input type="hidden" name="max_price" value="{{ $maxPrice }}">
                            </form>
                        </div>
                    </div>
                </div>

                <!-- Products Grid -->
                <div class="row">
                    @forelse($products as $product)
                        <div class="col-lg-4 col-md-6">
                            <div class="product-card">
                                <div class="product-image">
                                    @if($product->is_on_sale)
                                        <div class="product-badge">
                                            خصم {{ $product->discount_percentage }}%
                                        </div>
                                    @endif
                                    <i class="fas fa-cube"></i>
                                </div>
                                <div class="product-info">
                                    <h6 class="product-title">{{ $product->name_ar ?? $product->name }}</h6>
                                    <div class="product-vendor">
                                        <i class="fas fa-store me-1"></i>
                                        {{ $product->vendor->store_name_ar ?? $product->vendor->store_name }}
                                    </div>
                                    <div class="product-price">
                                        {{ number_format($product->current_price, 0) }} جنيه
                                        @if($product->is_on_sale)
                                            <span class="old-price">{{ number_format($product->price, 0) }} جنيه</span>
                                        @endif
                                    </div>
                                    <div class="d-flex gap-2">
                                        <button class="btn btn-primary flex-grow-1">أضف للسلة</button>
                                        <a href="{{ route('products.show', $product) }}" class="btn btn-outline-primary">
                                            <i class="fas fa-eye"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @empty
                        <div class="col-12">
                            <div class="text-center py-5">
                                <i class="fas fa-box-open" style="font-size: 4rem; color: #ccc; margin-bottom: 20px;"></i>
                                <h3 class="text-muted">لا توجد منتجات في هذه الفئة</h3>
                                <p class="text-muted">جرب البحث في فئة أخرى أو تصفح جميع المنتجات</p>
                                <a href="{{ route('products.index') }}" class="btn btn-primary">تصفح جميع المنتجات</a>
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
        </div>
    </div>

    <!-- Footer -->
    <footer class="footer">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-md-6 mb-4">
                    <h5>Sokappe Shop</h5>
                    <p>السوق الإلكتروني الأول في مصر. نوفر لك أفضل المنتجات من أفضل المتاجر بأفضل الأسعار.</p>
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
</body>
</html>
