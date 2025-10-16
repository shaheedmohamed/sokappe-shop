<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>جميع المنتجات - Sokappe Shop</title>
    
    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@300;400;600;700&display=swap" rel="stylesheet">
    
    <!-- Bootstrap RTL -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.rtl.min.css" rel="stylesheet">
    
    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
    
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
        
        .nav-link {
            color: rgba(255,255,255,0.9) !important;
            font-weight: 500;
        }
        
        .nav-link:hover {
            color: white !important;
        }
        
        .page-header {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            padding: 60px 0;
            margin-bottom: 30px;
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
        
        .filters-section {
            background: white;
            border-radius: 15px;
            padding: 25px;
            margin-bottom: 30px;
            box-shadow: 0 5px 15px rgba(0,0,0,0.08);
        }
        
        .filter-title {
            font-weight: 600;
            margin-bottom: 15px;
            color: #333;
        }
        
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
            overflow: hidden;
        }
        
        .product-image img {
            width: 100%;
            height: 100%;
            object-fit: cover;
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
            display: -webkit-box;
            -webkit-line-clamp: 2;
            -webkit-box-orient: vertical;
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
        
        .product-location {
            display: flex;
            align-items: center;
            gap: 5px;
        }
        
        .product-views {
            display: flex;
            align-items: center;
            gap: 5px;
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
        
        .negotiable-badge {
            background: #28a745;
            color: white;
            padding: 3px 8px;
            border-radius: 10px;
            font-size: 0.75rem;
            font-weight: 600;
        }
        
        .cart-badge {
            position: absolute;
            top: -8px;
            left: -8px;
            background: #ff6b35;
            color: white;
            border-radius: 50%;
            width: 20px;
            height: 20px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 0.8rem;
            font-weight: 600;
        }
        
        .sort-controls {
            display: flex;
            align-items: center;
            gap: 15px;
            margin-bottom: 20px;
        }
        
        .sort-label {
            font-weight: 600;
            color: #333;
        }
        
        .form-select {
            border-radius: 8px;
            border: 2px solid #e9ecef;
            padding: 8px 12px;
        }
        
        .results-info {
            color: #666;
            font-size: 0.9rem;
        }
        
        .empty-state {
            text-align: center;
            padding: 60px 20px;
            color: #666;
        }
        
        .empty-state i {
            font-size: 4rem;
            color: #ddd;
            margin-bottom: 20px;
        }
        
        .pagination {
            justify-content: center;
            margin-top: 40px;
        }
        
        .page-link {
            color: #667eea;
            border-color: #e9ecef;
        }
        
        .page-item.active .page-link {
            background-color: #667eea;
            border-color: #667eea;
        }
        
        /* Cart Sidebar */
        .cart-sidebar {
            position: fixed;
            top: 0;
            left: -400px;
            width: 400px;
            height: 100vh;
            background: white;
            box-shadow: 2px 0 10px rgba(0,0,0,0.1);
            z-index: 1050;
            transition: left 0.3s ease;
            overflow-y: auto;
        }
        
        .cart-sidebar.open {
            left: 0;
        }
        
        .cart-header {
            padding: 20px;
            border-bottom: 1px solid #e9ecef;
            background: #f8f9fa;
        }
        
        .cart-title {
            font-weight: 600;
            margin: 0;
        }
        
        .cart-close {
            background: none;
            border: none;
            font-size: 1.5rem;
            color: #666;
            cursor: pointer;
        }
        
        .cart-body {
            padding: 20px;
        }
        
        .cart-item {
            display: flex;
            align-items: center;
            gap: 15px;
            padding: 15px 0;
            border-bottom: 1px solid #f0f0f0;
        }
        
        .cart-item-image {
            width: 60px;
            height: 60px;
            border-radius: 8px;
            background: #f8f9fa;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.5rem;
            color: #adb5bd;
        }
        
        .cart-item-info {
            flex: 1;
        }
        
        .cart-item-title {
            font-weight: 600;
            font-size: 0.9rem;
            margin-bottom: 5px;
        }
        
        .cart-item-price {
            color: #ff6b35;
            font-weight: 600;
        }
        
        .cart-item-remove {
            background: none;
            border: none;
            color: #dc3545;
            cursor: pointer;
            font-size: 1.2rem;
        }
        
        .cart-footer {
            padding: 20px;
            border-top: 1px solid #e9ecef;
            background: #f8f9fa;
        }
        
        .cart-total {
            font-size: 1.2rem;
            font-weight: 700;
            margin-bottom: 15px;
        }
        
        .cart-overlay {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0,0,0,0.5);
            z-index: 1040;
            display: none;
        }
        
        .cart-overlay.show {
            display: block;
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
                        <a class="nav-link" href="{{ route('categories.index') }}">الفئات</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="{{ route('products.index') }}">جميع الإعلانات</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('products.create') }}">أضف إعلان</a>
                    </li>
                </ul>
                
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" href="#" onclick="toggleCart()">
                            <i class="fas fa-shopping-cart position-relative">
                                <span class="cart-badge" id="cartBadge" style="display: none;">0</span>
                            </i>
                            السلة
                        </a>
                    </li>
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

    <!-- Page Header -->
    <section class="page-header">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-8">
                    <h1 class="page-title">جميع المنتجات</h1>
                    <p class="page-subtitle">اكتشف آلاف المنتجات من متاجر موثوقة</p>
                </div>
                <div class="col-lg-4 text-center">
                    <i class="fas fa-boxes" style="font-size: 8rem; opacity: 0.3;"></i>
                </div>
            </div>
        </div>
    </section>

    <div class="container">
        <!-- Filters Section -->
        <div class="filters-section">
            <div class="row">
                <div class="col-md-3">
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
                <div class="col-md-3">
                    <h6 class="filter-title">السعر من</h6>
                    <input type="number" class="form-control" placeholder="الحد الأدنى">
                </div>
                <div class="col-md-3">
                    <h6 class="filter-title">السعر إلى</h6>
                    <input type="number" class="form-control" placeholder="الحد الأقصى">
                </div>
                <div class="col-md-3">
                    <h6 class="filter-title">المحافظة</h6>
                    <select class="form-select" name="governorate">
                        <option value="">جميع المحافظات</option>
                        <option value="القاهرة">القاهرة</option>
                        <option value="الجيزة">الجيزة</option>
                        <option value="الإسكندرية">الإسكندرية</option>
                    </select>
                </div>
            </div>
        </div>

        <!-- Sort and Results Info -->
        <div class="d-flex justify-content-between align-items-center mb-4">
            <div class="sort-controls">
                <span class="sort-label">ترتيب حسب:</span>
                <select class="form-select" style="width: auto;">
                    <option value="latest">الأحدث</option>
                    <option value="price_low">السعر: من الأقل للأعلى</option>
                    <option value="price_high">السعر: من الأعلى للأقل</option>
                    <option value="popular">الأكثر مشاهدة</option>
                </select>
            </div>
            <div class="results-info">
                عرض {{ $products->count() }} منتج من أصل {{ $products->total() }} منتج
            </div>
        </div>

        <!-- Products Grid -->
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
                            <button class="btn btn-add-cart" onclick="addToCart({{ $product->id }}, '{{ $product->name_ar ?? $product->name }}', {{ $product->price }})">
                                <i class="fas fa-cart-plus"></i> أضف للسلة
                            </button>
                            <button class="btn btn-favorite" onclick="toggleFavorite(this)">
                                <i class="fas fa-heart"></i>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
            @empty
            <div class="col-12">
                <div class="empty-state">
                    <i class="fas fa-box-open"></i>
                    <h3>لا توجد منتجات</h3>
                    <p>لم يتم العثور على منتجات تطابق البحث</p>
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

    <!-- Cart Sidebar -->
    <div class="cart-overlay" id="cartOverlay" onclick="toggleCart()"></div>
    <div class="cart-sidebar" id="cartSidebar">
        <div class="cart-header d-flex justify-content-between align-items-center">
            <h5 class="cart-title">سلة التسوق</h5>
            <button class="cart-close" onclick="toggleCart()">
                <i class="fas fa-times"></i>
            </button>
        </div>
        
        <div class="cart-body" id="cartBody">
            <div class="text-center text-muted py-4">
                <i class="fas fa-shopping-cart fa-3x mb-3"></i>
                <p>السلة فارغة</p>
            </div>
        </div>
        
        <div class="cart-footer" id="cartFooter" style="display: none;">
            <div class="cart-total">
                المجموع: <span id="cartTotal">0</span> جنيه
            </div>
            <button class="btn btn-primary w-100">
                <i class="fas fa-credit-card"></i> إتمام الشراء
            </button>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    
    <script>
        let cart = [];
        let cartTotal = 0;

        function toggleCart() {
            const sidebar = document.getElementById('cartSidebar');
            const overlay = document.getElementById('cartOverlay');
            
            if (sidebar.classList.contains('open')) {
                sidebar.classList.remove('open');
                overlay.classList.remove('show');
            } else {
                sidebar.classList.add('open');
                overlay.classList.add('show');
            }
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
            
            updateCartUI();
            
            // Show success message
            const button = event.target;
            const originalText = button.innerHTML;
            button.innerHTML = '<i class="fas fa-check"></i> تم الإضافة';
            button.style.background = '#28a745';
            
            setTimeout(() => {
                button.innerHTML = originalText;
                button.style.background = '#ff6b35';
            }, 1500);
        }

        function removeFromCart(productId) {
            cart = cart.filter(item => item.id !== productId);
            updateCartUI();
        }

        function updateCartUI() {
            const cartBody = document.getElementById('cartBody');
            const cartFooter = document.getElementById('cartFooter');
            const cartBadge = document.getElementById('cartBadge');
            const cartTotalElement = document.getElementById('cartTotal');
            
            // Update cart badge
            const totalItems = cart.reduce((sum, item) => sum + item.quantity, 0);
            if (totalItems > 0) {
                cartBadge.textContent = totalItems;
                cartBadge.style.display = 'flex';
            } else {
                cartBadge.style.display = 'none';
            }
            
            // Update cart body
            if (cart.length === 0) {
                cartBody.innerHTML = `
                    <div class="text-center text-muted py-4">
                        <i class="fas fa-shopping-cart fa-3x mb-3"></i>
                        <p>السلة فارغة</p>
                    </div>
                `;
                cartFooter.style.display = 'none';
            } else {
                cartBody.innerHTML = cart.map(item => `
                    <div class="cart-item">
                        <div class="cart-item-image">
                            <i class="fas fa-box"></i>
                        </div>
                        <div class="cart-item-info">
                            <div class="cart-item-title">${item.name}</div>
                            <div class="cart-item-price">${item.price.toLocaleString()} جنيه × ${item.quantity}</div>
                        </div>
                        <button class="cart-item-remove" onclick="removeFromCart(${item.id})">
                            <i class="fas fa-trash"></i>
                        </button>
                    </div>
                `).join('');
                
                // Calculate total
                cartTotal = cart.reduce((sum, item) => sum + (item.price * item.quantity), 0);
                cartTotalElement.textContent = cartTotal.toLocaleString();
                cartFooter.style.display = 'block';
            }
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

        // Initialize favorites as outline hearts
        document.addEventListener('DOMContentLoaded', function() {
            const favoriteButtons = document.querySelectorAll('.btn-favorite i');
            favoriteButtons.forEach(icon => {
                icon.classList.remove('fas');
                icon.classList.add('far');
            });
        });
    </script>
</body>
</html>
