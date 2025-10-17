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
            padding: 20px;
            box-shadow: 0 5px 15px rgba(0,0,0,0.08);
            transition: all 0.3s ease;
            height: 100%;
            position: relative;
            display: flex;
            flex-direction: column;
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
            padding: 15px 0;
            flex-grow: 1;
            display: flex;
            flex-direction: column;
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
            margin-top: auto;
            padding-top: 15px;
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
            padding: 80px 20px;
            color: #666;
        }
        
        .empty-state i {
            font-size: 5rem;
            color: #ddd;
            margin-bottom: 20px;
        }

        /* Responsive Design */
        @media (min-width: 1200px) {
            .product-card {
                min-height: 450px;
            }
        }

        @media (max-width: 991px) {
            .product-card {
                min-height: 400px;
            }
            
            .product-actions {
                flex-direction: column;
                gap: 8px;
            }
            
            .btn-add-cart, .btn-favorite {
                width: 100%;
                justify-content: center;
            }
        }

        @media (max-width: 576px) {
            .product-card {
                min-height: 350px;
                padding: 15px;
            }
            
            .product-image {
                height: 150px;
            }
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
        
    </style>
</head>
<body class="non-home-page">
    @include('layouts.navbar')

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
        <div class="row g-4">
            @forelse($products as $product)
            <div class="col-xl-3 col-lg-4 col-md-6 col-sm-6 mb-4">
                <a href="{{ route('product.show', $product) }}" class="text-decoration-none">
                    <div class="product-card">
                        @if($product->is_featured)
                            <div class="product-badge">مميز</div>
                        @endif
                        
                        <div class="product-image">
                            @if($product->featured_image)
                                <img src="{{ asset('storage/' . $product->featured_image) }}" alt="{{ $product->name }}" class="img-fluid" style="width: 100%; height: 200px; object-fit: cover;">
                            @elseif($product->images && $product->images->first())
                                <img src="{{ asset('storage/' . $product->images->first()->image_path) }}" alt="{{ $product->name }}" class="img-fluid" style="width: 100%; height: 200px; object-fit: cover;">
                            @else
                                <div class="placeholder-image d-flex align-items-center justify-content-center" style="width: 100%; height: 200px; background: #f8f9fa; border-radius: 8px;">
                                    <i class="fas fa-image fa-3x text-muted"></i>
                                </div>
                            @endif
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
                                <i class="fas fa-heart"></i>
                            </button>
                        </div>
                    </div>
                </a>
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

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    
    <script>

        function addToCart(productId) {
            fetch('{{ route("cart.add") }}', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                },
                body: JSON.stringify({
                    product_id: productId
                })
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    // Update cart badge
                    const badge = document.getElementById('cartBadge');
                    if (data.cart_count > 0) {
                        badge.textContent = data.cart_count;
                        badge.style.display = 'block';
                    }
                    
                    // Show success message
                    const button = event.target.closest('button');
                    const originalText = button.innerHTML;
                    button.innerHTML = '<i class="fas fa-check"></i> تم الإضافة';
                    button.style.background = '#28a745';
                    
                    setTimeout(() => {
                        button.innerHTML = originalText;
                        button.style.background = '#ff6b35';
                    }, 1500);
                }
            })
            .catch(error => {
                console.error('Error:', error);
                alert('حدث خطأ أثناء إضافة المنتج للسلة');
            });
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
