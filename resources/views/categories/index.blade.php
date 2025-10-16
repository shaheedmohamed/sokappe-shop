<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>الفئات - Sokappe Shop</title>
    <meta name="description" content="تصفح جميع فئات المنتجات في Sokappe Shop">
    
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
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('products.favorites') }}">
                            <i class="fas fa-heart"></i>
                            المفضلة
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
        <div class="row g-4">
            @forelse($categories as $category)
                <div class="col-lg-4 col-md-6">
                    <a href="{{ route('category.show', $category) }}" class="category-card d-block">
                        <div class="category-icon">
                            <i class="{{ $category->icon ?? 'fas fa-cube' }}"></i>
                        </div>
                        <h4 class="category-title">{{ $category->name_ar ?? $category->name }}</h4>
                        <p class="category-desc">{{ $category->description_ar ?? $category->description }}</p>
                        <div class="category-count">
                            {{ $category->products_count ?? 0 }} منتج
                        </div>
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
        document.querySelectorAll('.category-card').forEach(card => {
            card.style.opacity = '0';
            card.style.transform = 'translateY(20px)';
            card.style.transition = 'all 0.6s ease';
            observer.observe(card);
        });
    </script>
</body>
</html>
