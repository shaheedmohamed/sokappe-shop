<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>جميع المتاجر - Sokappe Shop</title>
    
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
        
        .page-header {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            padding: 60px 0;
            margin-bottom: 30px;
        }
        
        .vendor-card {
            background: white;
            border-radius: 15px;
            padding: 25px;
            box-shadow: 0 5px 15px rgba(0,0,0,0.08);
            transition: all 0.3s ease;
            height: 100%;
            text-decoration: none;
            color: inherit;
        }
        
        .vendor-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 15px 35px rgba(0,0,0,0.15);
            text-decoration: none;
            color: inherit;
        }
        
        .vendor-avatar {
            width: 80px;
            height: 80px;
            border-radius: 50%;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-size: 2rem;
            margin: 0 auto 20px;
        }
        
        .vendor-name {
            font-size: 1.3rem;
            font-weight: 600;
            margin-bottom: 10px;
            text-align: center;
        }
        
        .vendor-description {
            color: #666;
            text-align: center;
            margin-bottom: 20px;
            line-height: 1.6;
        }
        
        .vendor-stats {
            display: flex;
            justify-content: space-around;
            margin-top: 20px;
            padding-top: 20px;
            border-top: 1px solid #eee;
        }
        
        .stat-item {
            text-align: center;
        }
        
        .stat-number {
            font-size: 1.2rem;
            font-weight: 700;
            color: #667eea;
            display: block;
        }
        
        .stat-label {
            font-size: 0.85rem;
            color: #666;
        }
        
        .verified-badge {
            background: #28a745;
            color: white;
            padding: 4px 12px;
            border-radius: 15px;
            font-size: 0.8rem;
            font-weight: 600;
            position: absolute;
            top: 15px;
            right: 15px;
        }
        
        .rating-stars {
            color: #ffc107;
            margin-bottom: 10px;
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
                    <h1 class="page-title">جميع المتاجر</h1>
                    <p class="page-subtitle">اكتشف أفضل المتاجر الموثوقة على منصتنا</p>
                </div>
                <div class="col-lg-4 text-center">
                    <i class="fas fa-store" style="font-size: 8rem; opacity: 0.3;"></i>
                </div>
            </div>
        </div>
    </section>

    <div class="container">
        <div class="row">
            @forelse($vendors as $vendor)
            <div class="col-lg-4 col-md-6 mb-4">
                <a href="{{ route('vendors.show', $vendor) }}" class="vendor-card d-block position-relative">
                    @if($vendor->store_verified)
                        <div class="verified-badge">
                            <i class="fas fa-check-circle"></i> موثق
                        </div>
                    @endif
                    
                    <div class="vendor-avatar">
                        <i class="fas fa-store"></i>
                    </div>
                    
                    <h4 class="vendor-name">{{ $vendor->store_display_name }}</h4>
                    
                    @if($vendor->store_rating > 0)
                        <div class="rating-stars text-center">
                            @for($i = 1; $i <= 5; $i++)
                                @if($i <= $vendor->store_rating)
                                    <i class="fas fa-star"></i>
                                @else
                                    <i class="far fa-star"></i>
                                @endif
                            @endfor
                            <span class="ms-2">({{ $vendor->store_reviews_count }})</span>
                        </div>
                    @endif
                    
                    <p class="vendor-description">
                        {{ Str::limit($vendor->store_description, 100) }}
                    </p>
                    
                    <div class="vendor-stats">
                        <div class="stat-item">
                            <span class="stat-number">{{ rand(10, 50) }}</span>
                            <span class="stat-label">منتج</span>
                        </div>
                        <div class="stat-item">
                            <span class="stat-number">{{ number_format($vendor->store_rating, 1) }}</span>
                            <span class="stat-label">تقييم</span>
                        </div>
                        <div class="stat-item">
                            <span class="stat-number">{{ $vendor->governorate }}</span>
                            <span class="stat-label">الموقع</span>
                        </div>
                    </div>
                </a>
            </div>
            @empty
            <div class="col-12">
                <div class="text-center py-5">
                    <i class="fas fa-store" style="font-size: 4rem; color: #ddd; margin-bottom: 20px;"></i>
                    <h3 class="text-muted">لا توجد متاجر متاحة حالياً</h3>
                    <p class="text-muted">سيتم إضافة متاجر جديدة قريباً</p>
                    <a href="{{ route('home') }}" class="btn btn-primary">العودة للرئيسية</a>
                </div>
            </div>
            @endforelse
        </div>

        <!-- Pagination -->
        @if($vendors->hasPages())
            <div class="d-flex justify-content-center mt-4">
                {{ $vendors->links() }}
            </div>
        @endif
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
