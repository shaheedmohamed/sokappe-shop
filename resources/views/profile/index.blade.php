<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>الملف الشخصي - Sokappe Shop</title>
    
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
        
        .profile-card {
            background: white;
            border-radius: 15px;
            padding: 30px;
            box-shadow: 0 5px 15px rgba(0,0,0,0.08);
            margin-bottom: 30px;
        }
        
        .profile-avatar {
            width: 120px;
            height: 120px;
            border-radius: 50%;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 3rem;
            color: white;
            margin: 0 auto 20px;
        }
        
        .info-item {
            display: flex;
            align-items: center;
            padding: 15px 0;
            border-bottom: 1px solid #eee;
        }
        
        .info-item:last-child {
            border-bottom: none;
        }
        
        .info-icon {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            background: rgba(102, 126, 234, 0.1);
            display: flex;
            align-items: center;
            justify-content: center;
            color: #667eea;
            margin-left: 15px;
        }
        
        .stats-card {
            background: white;
            border-radius: 15px;
            padding: 25px;
            text-align: center;
            box-shadow: 0 5px 15px rgba(0,0,0,0.08);
            margin-bottom: 20px;
        }
        
        .stats-number {
            font-size: 2rem;
            font-weight: 700;
            color: #667eea;
            margin-bottom: 5px;
        }
        
        .stats-label {
            color: #666;
            font-size: 0.9rem;
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
                    <h1 class="page-title">الملف الشخصي</h1>
                    <p class="page-subtitle">إدارة معلوماتك الشخصية وإعداداتك</p>
                </div>
                <div class="col-lg-4 text-center">
                    <i class="fas fa-user-circle" style="font-size: 8rem; opacity: 0.3;"></i>
                </div>
            </div>
        </div>
    </section>

    <div class="container">
        <div class="row">
            <div class="col-lg-8">
                <!-- Profile Information -->
                <div class="profile-card">
                    <div class="text-center mb-4">
                        <div class="profile-avatar">
                            <i class="fas fa-user"></i>
                        </div>
                        <h3>{{ auth()->user()->name ?? 'المستخدم' }}</h3>
                        <p class="text-muted">{{ auth()->user()->email ?? 'user@example.com' }}</p>
                    </div>
                    
                    <div class="info-item">
                        <div class="info-icon">
                            <i class="fas fa-envelope"></i>
                        </div>
                        <div>
                            <strong>البريد الإلكتروني</strong>
                            <p class="mb-0 text-muted">{{ auth()->user()->email ?? 'user@example.com' }}</p>
                        </div>
                    </div>
                    
                    <div class="info-item">
                        <div class="info-icon">
                            <i class="fas fa-phone"></i>
                        </div>
                        <div>
                            <strong>رقم الهاتف</strong>
                            <p class="mb-0 text-muted">{{ auth()->user()->phone ?? 'غير محدد' }}</p>
                        </div>
                    </div>
                    
                    <div class="info-item">
                        <div class="info-icon">
                            <i class="fas fa-map-marker-alt"></i>
                        </div>
                        <div>
                            <strong>العنوان</strong>
                            <p class="mb-0 text-muted">{{ auth()->user()->address ?? 'غير محدد' }}</p>
                        </div>
                    </div>
                    
                    <div class="info-item">
                        <div class="info-icon">
                            <i class="fas fa-calendar"></i>
                        </div>
                        <div>
                            <strong>تاريخ التسجيل</strong>
                            <p class="mb-0 text-muted">{{ auth()->user()->created_at->format('Y/m/d') ?? 'غير محدد' }}</p>
                        </div>
                    </div>
                    
                    <div class="text-center mt-4">
                        <a href="#" class="btn btn-primary me-3" onclick="alert('قريباً!')">
                            <i class="fas fa-edit me-2"></i>
                            تعديل المعلومات
                        </a>
                        <a href="#" class="btn btn-outline-primary" onclick="alert('قريباً!')">
                            <i class="fas fa-key me-2"></i>
                            تغيير كلمة المرور
                        </a>
                    </div>
                </div>
            </div>
            
            <div class="col-lg-4">
                <!-- Statistics -->
                <div class="stats-card">
                    <div class="stats-number">0</div>
                    <div class="stats-label">إجمالي الطلبات</div>
                </div>
                
                <div class="stats-card">
                    <div class="stats-number">0</div>
                    <div class="stats-label">المنتجات المفضلة</div>
                </div>
                
                <div class="stats-card">
                    <div class="stats-number">0</div>
                    <div class="stats-label">المنتجات المنشورة</div>
                </div>
                
                <!-- Quick Actions -->
                <div class="profile-card">
                    <h5 class="mb-3">إجراءات سريعة</h5>
                    
                    <div class="d-grid gap-2">
                        <a href="{{ route('orders.index') }}" class="btn btn-outline-primary">
                            <i class="fas fa-shopping-bag me-2"></i>
                            طلباتي
                        </a>
                        
                        <a href="{{ route('products.favorites') }}" class="btn btn-outline-primary">
                            <i class="fas fa-heart me-2"></i>
                            المفضلة
                        </a>
                        
                        <a href="{{ route('settings.index') }}" class="btn btn-outline-primary">
                            <i class="fas fa-cog me-2"></i>
                            الإعدادات
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
