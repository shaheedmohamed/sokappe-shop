<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $vendor->store_display_name }} - Sokappe Shop</title>
    
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
        
        
        
        .store-header {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            padding: 60px 0;
            margin-bottom: 30px;
        }
        
        .store-avatar {
            width: 120px;
            height: 120px;
            border-radius: 50%;
            background: rgba(255,255,255,0.2);
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 3rem;
            margin-bottom: 20px;
            border: 4px solid rgba(255,255,255,0.3);
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
        
        .stats-card {
            background: white;
            border-radius: 15px;
            padding: 30px;
            text-align: center;
            box-shadow: 0 5px 15px rgba(0,0,0,0.08);
            border: none;
            height: 100%;
        }
        
        .stats-number {
            font-size: 2.5rem;
            font-weight: 700;
            color: #667eea;
            margin-bottom: 10px;
        }
        
        .stats-label {
            color: #666;
            font-size: 1rem;
            font-weight: 500;
        }
        
        .verified-badge {
            background: #28a745;
            color: white;
            padding: 4px 12px;
            border-radius: 15px;
            font-size: 0.8rem;
            font-weight: 600;
        }
        
        .rating-stars {
            color: #ffc107;
            font-size: 1.2rem;
        }
    </style>
</head>
<body class="non-home-page">
    @include('layouts.navbar')

    <!-- Store Header -->
    <section class="store-header">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-8">
                    <div class="store-avatar">
                        <i class="fas fa-store"></i>
                    </div>
                    <h1 class="store-name">{{ $vendor->store_display_name }}</h1>
                    <p class="store-description">{{ $vendor->store_description }}</p>
                    
                    <div class="store-meta d-flex flex-wrap gap-4 mt-3">
                        @if($vendor->store_verified)
                            <span class="verified-badge">
                                <i class="fas fa-check-circle"></i> متجر موثق
                            </span>
                        @endif
                        
                        <div class="store-meta-item d-flex align-items-center gap-2">
                            <i class="fas fa-phone"></i>
                            <span>{{ $vendor->store_phone }}</span>
                        </div>
                        
                        <div class="store-meta-item d-flex align-items-center gap-2">
                            <i class="fas fa-map-marker-alt"></i>
                            <span>{{ $vendor->governorate }}</span>
                        </div>
                        
                        @if($vendor->store_rating > 0)
                        <div class="store-meta-item d-flex align-items-center gap-2">
                            <div class="rating-stars">
                                @for($i = 1; $i <= 5; $i++)
                                    @if($i <= $vendor->store_rating)
                                        <i class="fas fa-star"></i>
                                    @else
                                        <i class="far fa-star"></i>
                                    @endif
                                @endfor
                            </div>
                            <span>({{ $vendor->store_reviews_count }} تقييم)</span>
                        </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Statistics -->
    <section class="container mb-5">
        <div class="row g-4">
            <div class="col-lg-3 col-md-6">
                <div class="stats-card">
                    <div class="stats-number">{{ $stats['total_products'] }}</div>
                    <div class="stats-label">إجمالي المنتجات</div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <div class="stats-card">
                    <div class="stats-number">{{ $stats['active_products'] }}</div>
                    <div class="stats-label">منتجات نشطة</div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <div class="stats-card">
                    <div class="stats-number">{{ number_format($stats['total_views']) }}</div>
                    <div class="stats-label">إجمالي المشاهدات</div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <div class="stats-card">
                    <div class="stats-number">{{ number_format($stats['store_rating'], 1) }}</div>
                    <div class="stats-label">تقييم المتجر</div>
                </div>
            </div>
        </div>
    </section>

    <!-- Products Section -->
    <section class="container mb-5">
        <h2 class="section-title mb-4">منتجات المتجر</h2>
        
        @if($products->count() > 0)
            <div class="row">
                @foreach($products as $product)
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
                                
                                <div class="product-actions">
                                    <button class="btn btn-add-cart" onclick="addToCart({{ $product->id }}, '{{ $product->name_ar ?? $product->name }}', {{ $product->price }})">
                                        <i class="fas fa-cart-plus"></i> أضف للسلة
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
            
            <!-- Pagination -->
            @if($products->hasPages())
                <div class="d-flex justify-content-center mt-4">
                    {{ $products->links() }}
                </div>
            @endif
        @else
            <div class="text-center py-5">
                <i class="fas fa-box-open" style="font-size: 4rem; color: #ddd; margin-bottom: 20px;"></i>
                <h3 class="text-muted">لا توجد منتجات في هذا المتجر حالياً</h3>
                <p class="text-muted">تابع المتجر ليصلك إشعار عند إضافة منتجات جديدة</p>
            </div>
        @endif
    </section>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    
    <script>
        function addToCart(productId, productName, productPrice) {
            console.log('Added product', productId, 'to cart');
            
            // Show success message
            const button = event.target.closest('.btn-add-cart');
            const originalText = button.innerHTML;
            button.innerHTML = '<i class="fas fa-check"></i> تم الإضافة';
            button.style.background = '#28a745';
            
            setTimeout(() => {
                button.innerHTML = originalText;
                button.style.background = '#ff6b35';
            }, 2000);
        }
    </script>
</body>
</html>
