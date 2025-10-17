<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $product->name }} - Sokappe Shop</title>
    <meta name="description" content="{{ $product->meta_description ?? Str::limit(strip_tags($product->description), 160) }}">
    
    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@300;400;600;700&display=swap" rel="stylesheet">
    
    <!-- Bootstrap RTL -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.rtl.min.css" rel="stylesheet">
    
    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
    
    <!-- Swiper CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.css">
    
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

        .breadcrumb {
            background: white;
            padding: 15px 0;
            margin-bottom: 0;
            border-bottom: 1px solid #e9ecef;
        }

        .breadcrumb-item a {
            color: #667eea;
            text-decoration: none;
        }

        .product-container {
            background: white;
            border-radius: 10px;
            box-shadow: 0 2px 10px rgba(0,0,0,0.05);
            margin: 20px 0;
            padding: 30px;
        }

        /* Product Images */
        .product-images {
            position: sticky;
            top: 20px;
        }

        .main-image-container {
            border: 1px solid #e9ecef;
            border-radius: 10px;
            overflow: hidden;
            margin-bottom: 15px;
            position: relative;
        }

        .main-image {
            width: 100%;
            height: 500px;
            object-fit: cover;
            cursor: zoom-in;
        }

        .image-thumbnails {
            display: flex;
            gap: 10px;
            overflow-x: auto;
            padding: 5px 0;
        }

        .thumbnail {
            width: 80px;
            height: 80px;
            object-fit: cover;
            border: 2px solid transparent;
            border-radius: 8px;
            cursor: pointer;
            transition: all 0.3s ease;
            flex-shrink: 0;
        }

        .thumbnail.active {
            border-color: #667eea;
        }

        .thumbnail:hover {
            border-color: #667eea;
            opacity: 0.8;
        }

        /* Product Info */
        .product-title {
            font-size: 1.8rem;
            font-weight: 700;
            color: #333;
            margin-bottom: 10px;
            line-height: 1.3;
        }

        .product-rating {
            display: flex;
            align-items: center;
            gap: 10px;
            margin-bottom: 15px;
        }

        .stars {
            color: #ffc107;
        }

        .rating-text {
            color: #666;
            font-size: 0.9rem;
        }

        .price-section {
            background: #f8f9fa;
            border-radius: 10px;
            padding: 20px;
            margin: 20px 0;
            border: 1px solid #e9ecef;
        }

        .current-price {
            font-size: 2rem;
            font-weight: 700;
            color: #dc3545;
            margin-bottom: 5px;
        }

        .original-price {
            font-size: 1.2rem;
            color: #666;
            text-decoration: line-through;
            margin-left: 10px;
        }

        .discount-badge {
            background: #dc3545;
            color: white;
            padding: 5px 10px;
            border-radius: 20px;
            font-size: 0.8rem;
            font-weight: 600;
            margin-right: 10px;
        }

        .stock-status {
            margin: 15px 0;
        }

        .in-stock {
            color: #28a745;
            font-weight: 600;
        }

        .out-of-stock {
            color: #dc3545;
            font-weight: 600;
        }

        /* Product Actions */
        .product-actions {
            background: white;
            border: 1px solid #e9ecef;
            border-radius: 10px;
            padding: 20px;
            margin-top: 20px;
            position: sticky;
            top: 20px;
        }

        .quantity-selector {
            display: flex;
            align-items: center;
            gap: 10px;
            margin: 15px 0;
        }

        .quantity-btn {
            width: 35px;
            height: 35px;
            border: 1px solid #ddd;
            background: white;
            border-radius: 5px;
            display: flex;
            align-items: center;
            justify-content: center;
            cursor: pointer;
            transition: all 0.3s ease;
        }

        .quantity-btn:hover {
            background: #667eea;
            color: white;
            border-color: #667eea;
        }

        .quantity-input {
            width: 60px;
            text-align: center;
            border: 1px solid #ddd;
            border-radius: 5px;
            padding: 8px;
        }

        .btn-add-to-cart {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            border: none;
            color: white;
            padding: 15px 25px;
            border-radius: 25px;
            font-weight: 600;
            width: 100%;
            margin: 10px 0;
            transition: all 0.3s ease;
        }

        .btn-add-to-cart:hover {
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(102, 126, 234, 0.3);
        }

        .btn-buy-now {
            background: #ff6b35;
            border: none;
            color: white;
            padding: 15px 25px;
            border-radius: 25px;
            font-weight: 600;
            width: 100%;
            margin: 10px 0;
            transition: all 0.3s ease;
        }

        .btn-buy-now:hover {
            background: #e55a2b;
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(255, 107, 53, 0.3);
        }

        /* Product Details Tabs */
        .product-tabs {
            margin-top: 40px;
        }

        .nav-tabs {
            border-bottom: 2px solid #e9ecef;
        }

        .nav-tabs .nav-link {
            border: none;
            color: #666;
            font-weight: 600;
            padding: 15px 25px;
            border-radius: 0;
            position: relative;
        }

        .nav-tabs .nav-link.active {
            color: #667eea;
            background: none;
            border-bottom: 3px solid #667eea;
        }

        .tab-content {
            padding: 30px 0;
        }

        .product-description {
            line-height: 1.8;
            color: #333;
        }

        .product-specs table {
            width: 100%;
            border-collapse: collapse;
        }

        .product-specs th,
        .product-specs td {
            padding: 12px 15px;
            border-bottom: 1px solid #e9ecef;
            text-align: right;
        }

        .product-specs th {
            background: #f8f9fa;
            font-weight: 600;
            width: 30%;
        }

        /* Vendor Info */
        .vendor-info {
            background: white;
            border: 1px solid #e9ecef;
            border-radius: 10px;
            padding: 20px;
            margin-top: 20px;
        }

        .vendor-header {
            display: flex;
            align-items: center;
            gap: 15px;
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
        }

        .vendor-name {
            font-size: 1.2rem;
            font-weight: 600;
            margin-bottom: 5px;
        }

        .vendor-rating {
            color: #ffc107;
        }

        /* Related Products */
        .related-products {
            margin-top: 50px;
        }

        .section-title {
            font-size: 1.5rem;
            font-weight: 700;
            margin-bottom: 30px;
            color: #333;
        }

        .product-card {
            background: white;
            border-radius: 10px;
            overflow: hidden;
            box-shadow: 0 2px 10px rgba(0,0,0,0.05);
            transition: all 0.3s ease;
            height: 100%;
        }

        .product-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 5px 20px rgba(0,0,0,0.1);
        }

        .product-card-image {
            height: 200px;
            background: #f8f9fa;
            display: flex;
            align-items: center;
            justify-content: center;
            overflow: hidden;
        }

        .product-card-image img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .product-card-body {
            padding: 15px;
        }

        .product-card-title {
            font-weight: 600;
            margin-bottom: 10px;
            color: #333;
            font-size: 0.95rem;
            line-height: 1.4;
        }

        .product-card-price {
            font-size: 1.1rem;
            font-weight: 700;
            color: #667eea;
        }

        /* Responsive */
        @media (max-width: 768px) {
            .product-container {
                padding: 15px;
            }
            
            .main-image {
                height: 300px;
            }
            
            .product-title {
                font-size: 1.4rem;
            }
            
            .current-price {
                font-size: 1.5rem;
            }
        }
    </style>
</head>
<body class="non-home-page">
    @include('layouts.navbar')

    <!-- Breadcrumb -->
    <nav aria-label="breadcrumb" class="breadcrumb-nav">
        <div class="container">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('home') }}">الرئيسية</a></li>
                <li class="breadcrumb-item"><a href="{{ route('products.index') }}">المنتجات</a></li>
                @if($product->category)
                    <li class="breadcrumb-item"><a href="{{ route('category.show', $product->category) }}">{{ $product->category->name_ar }}</a></li>
                @endif
                <li class="breadcrumb-item active" aria-current="page">{{ $product->name }}</li>
            </ol>
        </div>
    </nav>

    <div class="container">
        <div class="product-container">
            <div class="row">
                <!-- Product Images -->
                <div class="col-lg-6">
                    <div class="product-images">
                        <div class="main-image-container">
                            @if($product->featured_image)
                                <img src="{{ asset('storage/' . $product->featured_image) }}" alt="{{ $product->name }}" class="main-image" id="mainImage">
                            @else
                                <div class="main-image d-flex align-items-center justify-content-center bg-light">
                                    <i class="fas fa-image fa-5x text-muted"></i>
                                </div>
                            @endif
                        </div>
                        
                        @if($product->images->count() > 0)
                            <div class="image-thumbnails">
                                @foreach($product->images as $image)
                                    <img src="{{ asset('storage/' . $image->image_path) }}" 
                                         alt="{{ $product->name }}" 
                                         class="thumbnail {{ $loop->first ? 'active' : '' }}"
                                         onclick="changeMainImage(this)">
                                @endforeach
                            </div>
                        @endif
                    </div>
                </div>

                <!-- Product Info -->
                <div class="col-lg-6">
                    <h1 class="product-title">{{ $product->name }}</h1>
                    
                    <div class="product-rating">
                        <div class="stars">
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="far fa-star"></i>
                        </div>
                        <span class="rating-text">(4.2) 156 تقييم</span>
                    </div>

                    <div class="price-section">
                        <div class="d-flex align-items-center">
                            @if($product->sale_price && $product->sale_price < $product->price)
                                <span class="discount-badge">-{{ $product->discount_percentage }}%</span>
                                <div class="current-price">{{ number_format($product->sale_price, 2) }} جنيه</div>
                                <div class="original-price">{{ number_format($product->price, 2) }} جنيه</div>
                            @else
                                <div class="current-price">{{ number_format($product->price, 2) }} جنيه</div>
                            @endif
                        </div>
                        <small class="text-muted">شامل ضريبة القيمة المضافة</small>
                    </div>

                    <div class="stock-status">
                        @if($product->stock_quantity > 0)
                            <span class="in-stock">
                                <i class="fas fa-check-circle"></i>
                                متوفر في المخزن ({{ $product->stock_quantity }} قطعة)
                            </span>
                        @else
                            <span class="out-of-stock">
                                <i class="fas fa-times-circle"></i>
                                غير متوفر حالياً
                            </span>
                        @endif
                    </div>

                    <!-- Product Specifications -->
                    <div class="product-specs mt-4">
                        <table class="table table-borderless">
                            @if($product->brand)
                                <tr>
                                    <th>الماركة:</th>
                                    <td>{{ $product->brand }}</td>
                                </tr>
                            @endif
                            @if($product->color)
                                <tr>
                                    <th>اللون:</th>
                                    <td>{{ $product->color }}</td>
                                </tr>
                            @endif
                            @if($product->size)
                                <tr>
                                    <th>الحجم:</th>
                                    <td>{{ $product->size }}</td>
                                </tr>
                            @endif
                            @if($product->unit)
                                <tr>
                                    <th>الوحدة:</th>
                                    <td>{{ $product->unit }}</td>
                                </tr>
                            @endif
                            @if($product->sku)
                                <tr>
                                    <th>كود المنتج:</th>
                                    <td>{{ $product->sku }}</td>
                                </tr>
                            @endif
                        </table>
                    </div>
                </div>
            </div>
        </div>

        <!-- Product Actions Sidebar -->
        <div class="row">
            <div class="col-lg-8">
                <!-- Product Tabs -->
                <div class="product-tabs">
                    <ul class="nav nav-tabs" id="productTabs" role="tablist">
                        <li class="nav-item" role="presentation">
                            <button class="nav-link active" id="description-tab" data-bs-toggle="tab" data-bs-target="#description" type="button" role="tab">
                                الوصف
                            </button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="specifications-tab" data-bs-toggle="tab" data-bs-target="#specifications" type="button" role="tab">
                                المواصفات
                            </button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="reviews-tab" data-bs-toggle="tab" data-bs-target="#reviews" type="button" role="tab">
                                التقييمات
                            </button>
                        </li>
                    </ul>
                    <div class="tab-content" id="productTabsContent">
                        <div class="tab-pane fade show active" id="description" role="tabpanel">
                            <div class="product-description">
                                {!! $product->description !!}
                            </div>
                        </div>
                        <div class="tab-pane fade" id="specifications" role="tabpanel">
                            <div class="product-specs">
                                <table class="table">
                                    @if($product->brand)
                                        <tr>
                                            <th>الماركة</th>
                                            <td>{{ $product->brand }}</td>
                                        </tr>
                                    @endif
                                    @if($product->color)
                                        <tr>
                                            <th>اللون</th>
                                            <td>{{ $product->color }}</td>
                                        </tr>
                                    @endif
                                    @if($product->size)
                                        <tr>
                                            <th>الحجم</th>
                                            <td>{{ $product->size }}</td>
                                        </tr>
                                    @endif
                                    @if($product->weight)
                                        <tr>
                                            <th>الوزن</th>
                                            <td>{{ $product->weight }} كجم</td>
                                        </tr>
                                    @endif
                                    @if($product->unit)
                                        <tr>
                                            <th>الوحدة</th>
                                            <td>{{ $product->unit }}</td>
                                        </tr>
                                    @endif
                                    <tr>
                                        <th>كود المنتج</th>
                                        <td>{{ $product->sku }}</td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="reviews" role="tabpanel">
                            <div class="reviews-section">
                                <h5>تقييمات العملاء</h5>
                                <p class="text-muted">لا توجد تقييمات بعد. كن أول من يقيم هذا المنتج!</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-4">
                <!-- Product Actions -->
                <div class="product-actions">
                    <div class="quantity-selector">
                        <label>الكمية:</label>
                        <button class="quantity-btn" onclick="decreaseQuantity()">-</button>
                        <input type="number" class="quantity-input" id="quantity" value="1" min="1" max="{{ $product->stock_quantity }}">
                        <button class="quantity-btn" onclick="increaseQuantity()">+</button>
                    </div>

                    @if($product->stock_quantity > 0)
                        <button class="btn btn-add-to-cart">
                            <i class="fas fa-shopping-cart me-2"></i>
                            أضف إلى السلة
                        </button>
                        <button class="btn btn-buy-now">
                            <i class="fas fa-bolt me-2"></i>
                            اشتري الآن
                        </button>
                    @else
                        <button class="btn btn-secondary" disabled>
                            <i class="fas fa-times me-2"></i>
                            غير متوفر
                        </button>
                    @endif

                    <div class="mt-3">
                        <button class="btn btn-outline-secondary w-100 mb-2">
                            <i class="fas fa-heart me-2"></i>
                            أضف إلى المفضلة
                        </button>
                        <button class="btn btn-outline-secondary w-100">
                            <i class="fas fa-share me-2"></i>
                            شارك المنتج
                        </button>
                    </div>
                </div>

                <!-- Vendor Info -->
                @if($product->vendor)
                    <div class="vendor-info">
                        <div class="vendor-header">
                            <div class="vendor-avatar">
                                {{ substr($product->vendor->name, 0, 1) }}
                            </div>
                            <div>
                                <div class="vendor-name">{{ $product->vendor->name }}</div>
                                <div class="vendor-rating">
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="far fa-star"></i>
                                    <span class="text-muted">(4.5)</span>
                                </div>
                            </div>
                        </div>
                        <button class="btn btn-outline-primary w-100">
                            <i class="fas fa-store me-2"></i>
                            زيارة المتجر
                        </button>
                    </div>
                @endif
            </div>
        </div>

        <!-- Related Products -->
        @if(isset($relatedProducts) && $relatedProducts->count() > 0)
            <div class="related-products">
                <h3 class="section-title">منتجات مشابهة</h3>
                <div class="row">
                    @foreach($relatedProducts as $relatedProduct)
                        <div class="col-lg-3 col-md-4 col-sm-6 mb-4">
                            <a href="{{ route('product.show', $relatedProduct) }}" class="text-decoration-none">
                                <div class="product-card">
                                    <div class="product-card-image">
                                        @if($relatedProduct->featured_image)
                                            <img src="{{ asset('storage/' . $relatedProduct->featured_image) }}" alt="{{ $relatedProduct->name }}">
                                        @else
                                            <i class="fas fa-image fa-3x text-muted"></i>
                                        @endif
                                    </div>
                                    <div class="product-card-body">
                                        <h6 class="product-card-title">{{ Str::limit($relatedProduct->name, 50) }}</h6>
                                        <div class="product-card-price">
                                            @if($relatedProduct->sale_price && $relatedProduct->sale_price < $relatedProduct->price)
                                                {{ number_format($relatedProduct->sale_price, 2) }} جنيه
                                            @else
                                                {{ number_format($relatedProduct->price, 2) }} جنيه
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>
                    @endforeach
                </div>
            </div>
        @endif
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    
    <script>
        // Change main image when thumbnail is clicked
        function changeMainImage(thumbnail) {
            const mainImage = document.getElementById('mainImage');
            mainImage.src = thumbnail.src;
            
            // Update active thumbnail
            document.querySelectorAll('.thumbnail').forEach(thumb => {
                thumb.classList.remove('active');
            });
            thumbnail.classList.add('active');
        }

        // Quantity controls
        function increaseQuantity() {
            const quantityInput = document.getElementById('quantity');
            const currentValue = parseInt(quantityInput.value);
            const maxValue = parseInt(quantityInput.max);
            
            if (currentValue < maxValue) {
                quantityInput.value = currentValue + 1;
            }
        }

        function decreaseQuantity() {
            const quantityInput = document.getElementById('quantity');
            const currentValue = parseInt(quantityInput.value);
            const minValue = parseInt(quantityInput.min);
            
            if (currentValue > minValue) {
                quantityInput.value = currentValue - 1;
            }
        }

        // Image zoom functionality (optional enhancement)
        document.addEventListener('DOMContentLoaded', function() {
            const mainImage = document.getElementById('mainImage');
            if (mainImage) {
                mainImage.addEventListener('click', function() {
                    // You can implement image zoom/lightbox functionality here
                    console.log('Image clicked - implement zoom functionality');
                });
            }
        });
    </script>
</body>
</html>
