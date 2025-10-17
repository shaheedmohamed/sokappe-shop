<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $user->store_display_name }} - ملف المتجر</title>
    
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
        
        .store-name {
            font-size: 2.5rem;
            font-weight: 700;
            margin-bottom: 10px;
        }
        
        .store-description {
            font-size: 1.2rem;
            opacity: 0.9;
            margin-bottom: 20px;
        }
        
        .store-meta {
            display: flex;
            gap: 30px;
            flex-wrap: wrap;
        }
        
        .store-meta-item {
            display: flex;
            align-items: center;
            gap: 8px;
            font-size: 1rem;
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
        
        .section-title {
            font-size: 1.8rem;
            font-weight: 600;
            color: #333;
            margin-bottom: 30px;
            position: relative;
            padding-bottom: 15px;
        }
        
        .section-title::after {
            content: '';
            position: absolute;
            bottom: 0;
            right: 0;
            width: 60px;
            height: 3px;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            border-radius: 2px;
        }
        
        .product-card {
            background: white;
            border-radius: 15px;
            overflow: hidden;
            box-shadow: 0 5px 15px rgba(0,0,0,0.08);
            transition: all 0.3s ease;
            border: none;
            height: 100%;
        }
        
        .product-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 15px 35px rgba(0,0,0,0.15);
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
        
        .product-image img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }
        
        .product-info {
            padding: 20px;
        }
        
        .product-title {
            font-size: 1.2rem;
            font-weight: 600;
            color: #333;
            margin-bottom: 10px;
            line-height: 1.4;
        }
        
        .product-price {
            font-size: 1.4rem;
            font-weight: 700;
            color: #667eea;
            margin-bottom: 10px;
        }
        
        .product-meta {
            display: flex;
            justify-content: space-between;
            align-items: center;
            font-size: 0.9rem;
            color: #666;
        }
        
        .btn-primary {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            border: none;
            padding: 12px 30px;
            border-radius: 25px;
            font-weight: 600;
            transition: all 0.3s ease;
        }
        
        .btn-primary:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 20px rgba(102, 126, 234, 0.3);
        }
        
        .btn-outline-primary {
            border: 2px solid #667eea;
            color: #667eea;
            background: transparent;
            padding: 12px 30px;
            border-radius: 25px;
            font-weight: 600;
            transition: all 0.3s ease;
        }
        
        .btn-outline-primary:hover {
            background: #667eea;
            color: white;
            transform: translateY(-2px);
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
        
        .alert {
            border-radius: 10px;
            border: none;
            padding: 15px 20px;
            margin-bottom: 20px;
        }
        
        .alert-success {
            background: #d4edda;
            color: #155724;
        }
        
        .rating-stars {
            color: #ffc107;
            font-size: 1.2rem;
        }
        
        .verified-badge {
            background: #28a745;
            color: white;
            padding: 4px 12px;
            border-radius: 15px;
            font-size: 0.8rem;
            font-weight: 600;
        }
        
        .unverified-badge {
            background: #ffc107;
            color: #212529;
            padding: 4px 12px;
            border-radius: 15px;
            font-size: 0.8rem;
            font-weight: 600;
        }
    </style>
</head>
<body class="non-home-page">
    @include('layouts.navbar')

    <!-- Store Header -->
    <section class="store-header">
        <div class="container">
            @if(session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif
            
            <div class="row align-items-center">
                <div class="col-lg-8">
                    <div class="store-avatar">
                        <i class="fas fa-store"></i>
                    </div>
                    <h1 class="store-name">{{ $user->store_display_name }}</h1>
                    <p class="store-description">{{ $user->store_description }}</p>
                    
                    <div class="store-meta">
                        @if($user->store_verified)
                            <span class="verified-badge">
                                <i class="fas fa-check-circle"></i> متجر موثق
                            </span>
                        @else
                            <span class="unverified-badge">
                                <i class="fas fa-clock"></i> في انتظار التوثيق
                            </span>
                        @endif
                        
                        <div class="store-meta-item">
                            <i class="fas fa-phone"></i>
                            <span>{{ $user->store_phone }}</span>
                        </div>
                        
                        <div class="store-meta-item">
                            <i class="fas fa-map-marker-alt"></i>
                            <span>{{ $user->governorate }}</span>
                        </div>
                        
                        <div class="store-meta-item">
                            <i class="fas fa-calendar"></i>
                            <span>عضو منذ {{ $user->store_created_at ? $user->store_created_at->format('Y') : $user->created_at->format('Y') }}</span>
                        </div>
                        
                        @if($user->store_rating > 0)
                        <div class="store-meta-item">
                            <div class="rating-stars">
                                @for($i = 1; $i <= 5; $i++)
                                    @if($i <= $user->store_rating)
                                        <i class="fas fa-star"></i>
                                    @else
                                        <i class="far fa-star"></i>
                                    @endif
                                @endfor
                            </div>
                            <span>({{ $user->store_reviews_count }} تقييم)</span>
                        </div>
                        @endif
                    </div>
                </div>
                <div class="col-lg-4 text-center">
                    <a href="{{ route('vendor.edit-profile') }}" class="btn btn-outline-light btn-lg">
                        <i class="fas fa-edit"></i> تعديل البيانات
                    </a>
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
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h2 class="section-title">منتجات المتجر</h2>
            <a href="{{ route('products.create') }}" class="btn btn-primary">
                <i class="fas fa-plus"></i> إضافة منتج جديد
            </a>
        </div>
        
        @if($products->count() > 0)
            <div class="row g-4">
                @foreach($products as $product)
                    <div class="col-lg-4 col-md-6">
                        <div class="product-card">
                            <div class="product-image">
                                @if($product->primaryImage)
                                    <img src="{{ $product->primaryImage->url }}" alt="{{ $product->title_ar }}">
                                @else
                                    <i class="fas fa-image"></i>
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
                                <div class="product-meta">
                                    <span>
                                        <i class="fas fa-eye"></i>
                                        {{ $product->views_count }} مشاهدة
                                    </span>
                                    <span class="badge bg-{{ $product->status === 'active' ? 'success' : 'warning' }}">
                                        {{ $product->status === 'active' ? 'نشط' : 'غير نشط' }}
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
            
            <div class="d-flex justify-content-center mt-4">
                {{ $products->links() }}
            </div>
        @else
            <div class="empty-state">
                <i class="fas fa-box-open"></i>
                <h3>لا توجد منتجات بعد</h3>
                <p>ابدأ بإضافة منتجاتك الأولى لعرضها للعملاء</p>
                <a href="{{ route('products.create') }}" class="btn btn-primary">
                    <i class="fas fa-plus"></i> إضافة منتج جديد
                </a>
            </div>
        @endif
    </section>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
