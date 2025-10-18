<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>جميع المنتجات - Sokappe Shop</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    
    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@300;400;600;700;800&display=swap" rel="stylesheet">
    
    <!-- Bootstrap RTL -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.rtl.min.css" rel="stylesheet">
    
    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
    
    <style>
        * {
            font-family: 'Cairo', sans-serif;
            box-sizing: border-box;
        }
        
        body {
            background: linear-gradient(135deg, #f5f7fa 0%, #c3cfe2 100%);
            direction: rtl;
            margin: 0;
            padding: 0;
            min-height: 100vh;
            padding-top: 80px; /* For fixed navbar */
        }
        
        /* Navbar Styles */
        .navbar {
            background: linear-gradient(135deg, #2c3e50 0%, #34495e 100%);
            box-shadow: 0 4px 15px rgba(0,0,0,0.1);
            backdrop-filter: blur(10px);
        }
        
        .navbar-brand {
            font-weight: 800;
            font-size: 1.5rem;
        }
        
        .brand-logo {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            width: 40px;
            height: 40px;
            border-radius: 10px;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
        }
        
        .navbar-nav .nav-link {
            color: white !important;
            font-weight: 600;
            padding: 8px 16px !important;
            border-radius: 8px;
            transition: all 0.3s ease;
        }
        
        .navbar-nav .nav-link:hover {
            background: rgba(255,255,255,0.1);
            transform: translateY(-2px);
        }
        
        /* Page Header */
        .page-header {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            padding: 100px 0;
            margin-bottom: 50px;
            position: relative;
            overflow: hidden;
        }
        
        .page-header::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: radial-gradient(circle at 30% 20%, rgba(255,255,255,0.1) 0%, transparent 50%);
        }
        
        .page-title {
            font-size: 3.5rem;
            font-weight: 800;
            margin-bottom: 25px;
            text-shadow: 0 4px 8px rgba(0,0,0,0.2);
            animation: slideInDown 0.8s ease-out;
        }
        
        .page-subtitle {
            font-size: 1.4rem;
            opacity: 0.9;
            font-weight: 400;
            animation: slideInUp 0.8s ease-out 0.2s both;
        }
        
        @keyframes slideInDown {
            from {
                opacity: 0;
                transform: translateY(-50px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }
        
        @keyframes slideInUp {
            from {
                opacity: 0;
                transform: translateY(50px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }
        
        /* Filters Section */
        .filters-section {
            background: white;
            border-radius: 25px;
            padding: 40px;
            margin-bottom: 50px;
            box-shadow: 0 15px 35px rgba(0, 0, 0, 0.1);
            border: 1px solid rgba(255,255,255,0.3);
            backdrop-filter: blur(10px);
            animation: fadeInUp 0.8s ease-out 0.4s both;
        }
        
        .filter-title {
            font-weight: 700;
            color: #2c3e50;
            margin-bottom: 15px;
            font-size: 1rem;
            text-transform: uppercase;
            letter-spacing: 1px;
        }
        
        .form-select, .form-control {
            border-radius: 15px;
            border: 2px solid #e9ecef;
            padding: 15px 20px;
            font-size: 1rem;
            transition: all 0.3s ease;
            background: #f8f9fa;
            font-weight: 500;
        }
        
        .form-select:focus, .form-control:focus {
            border-color: #667eea;
            box-shadow: 0 0 0 0.25rem rgba(102, 126, 234, 0.15);
            background: white;
            transform: translateY(-2px);
        }
        
        .input-group .btn {
            border-radius: 0 15px 15px 0;
            border: 2px solid #667eea;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            padding: 15px 25px;
            transition: all 0.3s ease;
            font-weight: 700;
        }
        
        .input-group .btn:hover {
            transform: translateY(-3px);
            box-shadow: 0 8px 20px rgba(102, 126, 234, 0.4);
        }
        
        /* Sort and Results */
        .controls-section {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 40px;
            gap: 20px;
        }
        
        .sort-controls {
            display: flex;
            align-items: center;
            gap: 15px;
            background: white;
            padding: 20px 25px;
            border-radius: 20px;
            box-shadow: 0 8px 20px rgba(0,0,0,0.08);
            animation: fadeInLeft 0.8s ease-out 0.6s both;
        }
        
        .sort-label {
            font-weight: 700;
            color: #2c3e50;
            font-size: 1rem;
        }
        
        .results-info {
            color: #6c757d;
            font-size: 1rem;
            background: white;
            padding: 20px 25px;
            border-radius: 20px;
            box-shadow: 0 8px 20px rgba(0,0,0,0.08);
            font-weight: 600;
            animation: fadeInRight 0.8s ease-out 0.6s both;
        }
        
        @keyframes fadeInLeft {
            from {
                opacity: 0;
                transform: translateX(-30px);
            }
            to {
                opacity: 1;
                transform: translateX(0);
            }
        }
        
        @keyframes fadeInRight {
            from {
                opacity: 0;
                transform: translateX(30px);
            }
            to {
                opacity: 1;
                transform: translateX(0);
            }
        }
        
        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(30px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }
        
        /* Product Cards */
        .product-card {
            background: white;
            border-radius: 25px;
            padding: 0;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
            transition: all 0.4s cubic-bezier(0.175, 0.885, 0.32, 1.275);
            height: 100%;
            position: relative;
            overflow: hidden;
            border: 1px solid rgba(255,255,255,0.3);
            animation: fadeInUp 0.6s ease-out both;
        }
        
        .product-card:hover {
            transform: translateY(-15px) scale(1.03);
            box-shadow: 0 25px 50px rgba(0, 0, 0, 0.2);
        }
        
        .product-badge {
            position: absolute;
            top: 20px;
            right: 20px;
            background: linear-gradient(135deg, #ff6b6b 0%, #ee5a24 100%);
            color: white;
            padding: 10px 20px;
            border-radius: 30px;
            font-size: 0.85rem;
            font-weight: 700;
            z-index: 3;
            box-shadow: 0 6px 20px rgba(255, 107, 107, 0.4);
            text-transform: uppercase;
            letter-spacing: 1px;
        }
        
        .product-image {
            position: relative;
            margin-bottom: 0;
            overflow: hidden;
            border-radius: 25px 25px 0 0;
            height: 280px;
        }
        
        .product-image img {
            transition: transform 0.5s ease;
            width: 100%;
            height: 100%;
            object-fit: cover;
        }
        
        .product-card:hover .product-image img {
            transform: scale(1.15);
        }
        
        .product-info {
            padding: 30px;
        }
        
        .product-title {
            font-size: 1.3rem;
            font-weight: 700;
            color: #2c3e50;
            margin-bottom: 15px;
            line-height: 1.4;
            display: -webkit-box;
            -webkit-line-clamp: 2;
            -webkit-box-orient: vertical;
            overflow: hidden;
            min-height: 3.2rem;
        }
        
        .product-price {
            font-size: 1.6rem;
            font-weight: 800;
            color: #27ae60;
            margin-bottom: 20px;
            display: flex;
            align-items: center;
            gap: 12px;
        }
        
        .product-old-price {
            font-size: 1.1rem;
            color: #95a5a6;
            text-decoration: line-through;
            font-weight: 500;
        }
        
        .product-meta {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 25px;
            font-size: 0.95rem;
            color: #7f8c8d;
            padding: 15px 0;
            border-top: 2px solid #f1f2f6;
        }
        
        .product-location, .product-views {
            display: flex;
            align-items: center;
            gap: 8px;
            font-weight: 600;
        }
        
        .product-actions {
            display: flex;
            gap: 15px;
        }
        
        .btn-add-cart {
            flex: 1;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            border: none;
            padding: 16px 24px;
            border-radius: 15px;
            font-size: 1rem;
            font-weight: 700;
            transition: all 0.3s ease;
            text-transform: uppercase;
            letter-spacing: 1px;
        }
        
        .btn-add-cart:hover {
            transform: translateY(-3px);
            box-shadow: 0 10px 30px rgba(102, 126, 234, 0.4);
            color: white;
        }
        .btn-add-cart:disabled {
            opacity: 0.8;
            cursor: not-allowed;
        }
        
        .btn-favorite {
            background: white;
            color: #e74c3c;
            border: 3px solid #e74c3c;
            padding: 16px 20px;
            border-radius: 15px;
            transition: all 0.3s ease;
            font-size: 1.2rem;
        }
        
        .btn-favorite:hover {
            background: #e74c3c;
            color: white;
            transform: translateY(-3px);
            box-shadow: 0 10px 30px rgba(231, 76, 60, 0.4);
        }
        
        .btn-favorite.active {
            background: #e74c3c;
            color: white;
        }
        
        /* Empty State */
        .empty-state {
            text-align: center;
            padding: 120px 20px;
            color: #7f8c8d;
            background: white;
            border-radius: 25px;
            margin: 50px 0;
            box-shadow: 0 15px 35px rgba(0,0,0,0.1);
        }
        
        .empty-state i {
            font-size: 7rem;
            margin-bottom: 40px;
            color: #bdc3c7;
            opacity: 0.7;
        }
        
        .empty-state h3 {
            font-size: 2.2rem;
            margin-bottom: 20px;
            color: #2c3e50;
            font-weight: 700;
        }
        
        .empty-state p {
            font-size: 1.3rem;
            margin-bottom: 0;
            opacity: 0.8;
        }
        
        /* Pagination */
        .pagination {
            margin-top: 60px;
            justify-content: center;
        }
        
        .page-link {
            color: #667eea;
            border-color: #e9ecef;
            border-radius: 12px;
            margin: 0 5px;
            padding: 15px 22px;
            font-weight: 600;
            transition: all 0.3s ease;
            font-size: 1rem;
        }
        
        .page-link:hover {
            background-color: #667eea;
            border-color: #667eea;
            color: white;
            transform: translateY(-3px);
        }
        
        .page-item.active .page-link {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            border-color: #667eea;
            box-shadow: 0 6px 20px rgba(102, 126, 234, 0.4);
        }
        
        /* Responsive Design */
        @media (max-width: 768px) {
            .page-title {
                font-size: 2.5rem;
            }
            
            .page-subtitle {
                font-size: 1.1rem;
            }
            
            .filters-section {
                padding: 25px;
            }
            
            .product-card {
                margin-bottom: 25px;
            }
            
            .product-image {
                height: 220px;
            }
            
            .product-info {
                padding: 25px;
            }
            
            .controls-section {
                flex-direction: column;
                gap: 15px;
            }
            
            .sort-controls, .results-info {
                font-size: 0.9rem;
                padding: 15px 20px;
            }
        }
        
        /* Animation Delays */
        .product-card:nth-child(1) { animation-delay: 0.1s; }
        .product-card:nth-child(2) { animation-delay: 0.2s; }
        .product-card:nth-child(3) { animation-delay: 0.3s; }
        .product-card:nth-child(4) { animation-delay: 0.4s; }
        .product-card:nth-child(5) { animation-delay: 0.5s; }
        .product-card:nth-child(6) { animation-delay: 0.6s; }
        .product-card:nth-child(7) { animation-delay: 0.7s; }
        .product-card:nth-child(8) { animation-delay: 0.8s; }
    </style>
</head>
<body>
    @include('layouts.navbar')

    <!-- Page Header -->
    <section class="page-header">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-8">
                    <h1 class="page-title">جميع المنتجات</h1>
                    <p class="page-subtitle">اكتشف آلاف المنتجات المميزة من متاجر موثوقة</p>
                </div>
                <div class="col-lg-4 text-center">
                    <i class="fas fa-boxes" style="font-size: 10rem; opacity: 0.2;"></i>
                </div>
            </div>
        </div>
    </section>

    <div class="container">
        <!-- Filters Section -->
        <div class="filters-section">
            <div class="row g-4">
                <div class="col-lg-3 col-md-6">
                    <h6 class="filter-title">الفئة</h6>
                    <select class="form-select" name="category">
                        <option value="">جميع الفئات</option>
                        @foreach($categories as $category)
                            <option value="{{ $category->id }}" {{ request('category') == $category->id ? 'selected' : '' }}>
                                {{ $category->name_ar ?? $category->name }}
                            </option>
                        @endforeach
                    </select>
                </div>
                <div class="col-lg-3 col-md-6">
                    <h6 class="filter-title">السعر من</h6>
                    <input type="number" class="form-control" placeholder="0" name="min_price" value="{{ request('min_price') }}">
                </div>
                <div class="col-lg-3 col-md-6">
                    <h6 class="filter-title">السعر إلى</h6>
                    <input type="number" class="form-control" placeholder="10000" name="max_price" value="{{ request('max_price') }}">
                </div>
                <div class="col-lg-3 col-md-6">
                    <h6 class="filter-title">البحث</h6>
                    <div class="input-group">
                        <input type="text" class="form-control" placeholder="ابحث عن منتج..." name="search" value="{{ request('search') }}">
                        <button class="btn btn-primary" type="button" onclick="applyFilters()">
                            <i class="fas fa-search"></i>
                        </button>
                    </div>
                </div>
            </div>
        </div>

        <!-- Sort and Results Info -->
        <div class="controls-section">
            <div class="sort-controls">
                <span class="sort-label">ترتيب حسب:</span>
                <select class="form-select" style="width: auto;" name="sort">
                    <option value="latest" {{ request('sort') == 'latest' || !request('sort') ? 'selected' : '' }}>الأحدث</option>
                    <option value="price_low" {{ request('sort') == 'price_low' ? 'selected' : '' }}>السعر: من الأقل للأعلى</option>
                    <option value="price_high" {{ request('sort') == 'price_high' ? 'selected' : '' }}>السعر: من الأعلى للأقل</option>
                    <option value="popular" {{ request('sort') == 'popular' ? 'selected' : '' }}>الأكثر مشاهدة</option>
                    <option value="featured" {{ request('sort') == 'featured' ? 'selected' : '' }}>المميزة</option>
                </select>
            </div>
            <div class="results-info">
                عرض {{ $products->count() }} منتج من أصل {{ $products->total() }} منتج
            </div>
        </div>

        <!-- Products Grid -->
        <div class="row g-4">
            @forelse($products as $product)
            <div class="col-xl-3 col-lg-4 col-md-6 col-sm-6 mb-4">
                <a href="{{ route('product.show', $product) }}" class="text-decoration-none">
                    <div class="product-card">
                        @if($product->is_featured)
                            <div class="product-badge">مميز</div>
                        @endif
                        
                        <div class="product-image">
                            <img src="{{ $product->first_image }}" alt="{{ $product->name }}" onerror="this.style.display='none'; this.nextElementSibling.style.display='flex';">
                            <div style="display: none; width: 100%; height: 100%; align-items: center; justify-content: center; background: linear-gradient(135deg, #667eea 0%, #764ba2 100%); color: white;">
                                <i class="fas fa-box fa-4x"></i>
                            </div>
                        </div>
                        
                        <div class="product-info">
                            <h5 class="product-title">{{ $product->name_ar ?? $product->name }}</h5>
                        
                            <div class="product-price">
                                {{ number_format($product->price) }} جنيه
                                @if($product->sale_price && $product->sale_price < $product->price)
                                    <span class="product-old-price">{{ number_format($product->sale_price) }} جنيه</span>
                                @endif
                            </div>
                        
                            <div class="product-meta">
                                <div class="product-location">
                                    <i class="fas fa-map-marker-alt"></i>
                                    {{ $product->category->name_ar ?? $product->category->name ?? 'غير محدد' }}
                                </div>
                                <div class="product-views">
                                    <i class="fas fa-eye"></i>
                                    {{ $product->views_count ?? 0 }}
                                </div>
                            </div>
                        
                            <div class="product-actions">
                                <button class="btn btn-add-cart" onclick="event.preventDefault(); event.stopPropagation(); addToCart({{ $product->id }})">
                                    <i class="fas fa-cart-plus"></i> أضف للسلة
                                </button>
                                <button class="btn btn-favorite" onclick="event.preventDefault(); event.stopPropagation(); toggleFavorite(this)">
                                    <i class="far fa-heart"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                </a>
            </div>
            @empty
            <div class="col-12">
                <div class="empty-state">
                    <i class="fas fa-box-open"></i>
                    <h3>لا توجد منتجات</h3>
                    <p>لم يتم العثور على منتجات تطابق البحث الحالي</p>
                </div>
            </div>
            @endforelse
        </div>

        <!-- Pagination -->
        @if($products->hasPages())
        <div class="d-flex justify-content-center">
            {{ $products->links() }}
        </div>
        @endif
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    
    <script>
        function addToCart(productId) {
            const button = event.target.closest('.btn-add-cart');
            const originalText = button.innerHTML;
            const csrf = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
            
            // Loading state
            button.innerHTML = '<i class="fas fa-spinner fa-spin"></i> جاري الإضافة...';
            button.disabled = true;
            
            fetch('{{ route('cart.add') }}', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': csrf,
                    'Accept': 'application/json'
                },
                body: JSON.stringify({ product_id: productId, quantity: 1 })
            })
            .then(async (res) => {
                let data = {};
                try { data = await res.json(); } catch(_){}
                if (!res.ok) throw new Error(data.message || 'حدث خطأ');
                // Success UI
                button.innerHTML = '<i class="fas fa-check"></i> تم الإضافة';
                button.style.background = 'linear-gradient(135deg, #28a745, #20c997)';
                // Update cart badge if available
                if (typeof window.updateCartBadge === 'function') {
                    window.updateCartBadge(data.count ?? ((window.currentCartCount||0)+1));
                }
                if (typeof window.bumpCartBadge === 'function') {
                    window.bumpCartBadge();
                }
                setTimeout(() => {
                    button.innerHTML = originalText;
                    button.style.background = 'linear-gradient(135deg, #667eea 0%, #764ba2 100%)';
                    button.disabled = false;
                }, 1200);
            })
            .catch(err => {
                console.error(err);
                button.innerHTML = '<i class="fas fa-exclamation-triangle"></i> فشل الإضافة';
                button.style.background = 'linear-gradient(135deg, #e74c3c, #ff7675)';
                setTimeout(() => {
                    button.innerHTML = originalText;
                    button.style.background = 'linear-gradient(135deg, #667eea 0%, #764ba2 100%)';
                    button.disabled = false;
                }, 1500);
            });
        }

        function toggleFavorite(button) {
            button.classList.toggle('active');
            const icon = button.querySelector('i');
            
            if (button.classList.contains('active')) {
                icon.classList.remove('far');
                icon.classList.add('fas');
                button.style.transform = 'scale(1.1)';
                setTimeout(() => {
                    button.style.transform = 'scale(1)';
                }, 200);
            } else {
                icon.classList.remove('fas');
                icon.classList.add('far');
            }
        }

        // Initialize and handle interactions
        document.addEventListener('DOMContentLoaded', function() {
            // Handle filter changes
            const filterInputs = document.querySelectorAll('select[name="category"], input[name="min_price"], input[name="max_price"], input[name="search"]');
            const sortSelect = document.querySelector('.sort-controls select');
            
            filterInputs.forEach(input => {
                if (input.name === 'search') {
                    // Add Enter key support for search
                    input.addEventListener('keypress', function(e) {
                        if (e.key === 'Enter') {
                            applyFilters();
                        }
                    });
                } else {
                    input.addEventListener('change', applyFilters);
                }
            });
            
            if (sortSelect) {
                sortSelect.addEventListener('change', applyFilters);
            }
        });
        
        function applyFilters() {
            const params = new URLSearchParams();
            
            // Get filter values
            const category = document.querySelector('select[name="category"]').value;
            const minPrice = document.querySelector('input[name="min_price"]').value;
            const maxPrice = document.querySelector('input[name="max_price"]').value;
            const search = document.querySelector('input[name="search"]').value;
            const sort = document.querySelector('.sort-controls select').value;
            
            // Add non-empty values to params
            if (category) params.set('category', category);
            if (minPrice) params.set('min_price', minPrice);
            if (maxPrice) params.set('max_price', maxPrice);
            if (search) params.set('search', search);
            if (sort && sort !== 'latest') params.set('sort', sort);
            
            // Redirect with filters
            window.location.href = '{{ route("products.index") }}?' + params.toString();
        }
    </script>
</body>
</html>
