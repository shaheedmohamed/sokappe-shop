<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>الإعدادات - Sokappe Shop</title>
    
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
        
        .settings-card {
            background: white;
            border-radius: 15px;
            padding: 30px;
            margin-bottom: 30px;
            box-shadow: 0 5px 15px rgba(0,0,0,0.08);
        }
        
        .settings-section {
            margin-bottom: 40px;
        }
        
        .settings-section:last-child {
            margin-bottom: 0;
        }
        
        .section-title {
            font-size: 1.3rem;
            font-weight: 600;
            color: #333;
            margin-bottom: 20px;
            padding-bottom: 10px;
            border-bottom: 2px solid #f0f0f0;
        }
        
        .setting-item {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 15px 0;
            border-bottom: 1px solid #f5f5f5;
        }
        
        .setting-item:last-child {
            border-bottom: none;
        }
        
        .setting-info {
            flex-grow: 1;
        }
        
        .setting-title {
            font-weight: 600;
            color: #333;
            margin-bottom: 5px;
        }
        
        .setting-description {
            color: #666;
            font-size: 0.9rem;
            margin: 0;
        }
        
        .setting-control {
            margin-right: 20px;
        }
        
        .toggle-switch {
            position: relative;
            display: inline-block;
            width: 50px;
            height: 24px;
        }
        
        .toggle-switch input {
            opacity: 0;
            width: 0;
            height: 0;
        }
        
        .slider {
            position: absolute;
            cursor: pointer;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background-color: #ccc;
            transition: .4s;
            border-radius: 24px;
        }
        
        .slider:before {
            position: absolute;
            content: "";
            height: 18px;
            width: 18px;
            left: 3px;
            bottom: 3px;
            background-color: white;
            transition: .4s;
            border-radius: 50%;
        }
        
        input:checked + .slider {
            background-color: #667eea;
        }
        
        input:checked + .slider:before {
            transform: translateX(26px);
        }
        
        .danger-zone {
            border: 2px solid #dc3545;
            border-radius: 15px;
            padding: 25px;
            background: #fff5f5;
        }
        
        .danger-title {
            color: #dc3545;
            font-weight: 600;
            margin-bottom: 15px;
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
                    <h1 class="page-title">الإعدادات</h1>
                    <p class="page-subtitle">إدارة إعدادات حسابك وتفضيلاتك</p>
                </div>
                <div class="col-lg-4 text-center">
                    <i class="fas fa-cog" style="font-size: 8rem; opacity: 0.3;"></i>
                </div>
            </div>
        </div>
    </section>

    <div class="container">
        <div class="row">
            <div class="col-lg-8">
                <!-- Account Settings -->
                <div class="settings-card">
                    <div class="settings-section">
                        <h3 class="section-title">
                            <i class="fas fa-user me-2"></i>
                            إعدادات الحساب
                        </h3>
                        
                        <div class="setting-item">
                            <div class="setting-info">
                                <div class="setting-title">تعديل المعلومات الشخصية</div>
                                <p class="setting-description">تحديث الاسم، البريد الإلكتروني، ورقم الهاتف</p>
                            </div>
                            <div class="setting-control">
                                <button class="btn btn-outline-primary" onclick="alert('قريباً!')">
                                    <i class="fas fa-edit me-1"></i>
                                    تعديل
                                </button>
                            </div>
                        </div>
                        
                        <div class="setting-item">
                            <div class="setting-info">
                                <div class="setting-title">تغيير كلمة المرور</div>
                                <p class="setting-description">تحديث كلمة المرور لحماية حسابك</p>
                            </div>
                            <div class="setting-control">
                                <button class="btn btn-outline-primary" onclick="alert('قريباً!')">
                                    <i class="fas fa-key me-1"></i>
                                    تغيير
                                </button>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Notification Settings -->
                <div class="settings-card">
                    <div class="settings-section">
                        <h3 class="section-title">
                            <i class="fas fa-bell me-2"></i>
                            إعدادات الإشعارات
                        </h3>
                        
                        <div class="setting-item">
                            <div class="setting-info">
                                <div class="setting-title">إشعارات البريد الإلكتروني</div>
                                <p class="setting-description">تلقي إشعارات حول الطلبات والعروض عبر البريد الإلكتروني</p>
                            </div>
                            <div class="setting-control">
                                <label class="toggle-switch">
                                    <input type="checkbox" checked>
                                    <span class="slider"></span>
                                </label>
                            </div>
                        </div>
                        
                        <div class="setting-item">
                            <div class="setting-info">
                                <div class="setting-title">إشعارات الرسائل النصية</div>
                                <p class="setting-description">تلقي إشعارات حول حالة الطلبات عبر الرسائل النصية</p>
                            </div>
                            <div class="setting-control">
                                <label class="toggle-switch">
                                    <input type="checkbox">
                                    <span class="slider"></span>
                                </label>
                            </div>
                        </div>
                        
                        <div class="setting-item">
                            <div class="setting-info">
                                <div class="setting-title">إشعارات العروض والخصومات</div>
                                <p class="setting-description">تلقي إشعارات حول العروض الخاصة والخصومات</p>
                            </div>
                            <div class="setting-control">
                                <label class="toggle-switch">
                                    <input type="checkbox" checked>
                                    <span class="slider"></span>
                                </label>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Privacy Settings -->
                <div class="settings-card">
                    <div class="settings-section">
                        <h3 class="section-title">
                            <i class="fas fa-shield-alt me-2"></i>
                            إعدادات الخصوصية
                        </h3>
                        
                        <div class="setting-item">
                            <div class="setting-info">
                                <div class="setting-title">إظهار الملف الشخصي</div>
                                <p class="setting-description">السماح للآخرين برؤية ملفك الشخصي</p>
                            </div>
                            <div class="setting-control">
                                <label class="toggle-switch">
                                    <input type="checkbox" checked>
                                    <span class="slider"></span>
                                </label>
                            </div>
                        </div>
                        
                        <div class="setting-item">
                            <div class="setting-info">
                                <div class="setting-title">إظهار سجل الطلبات</div>
                                <p class="setting-description">السماح للمتاجر برؤية سجل طلباتك السابقة</p>
                            </div>
                            <div class="setting-control">
                                <label class="toggle-switch">
                                    <input type="checkbox">
                                    <span class="slider"></span>
                                </label>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Danger Zone -->
                <div class="danger-zone">
                    <h4 class="danger-title">
                        <i class="fas fa-exclamation-triangle me-2"></i>
                        منطقة الخطر
                    </h4>
                    
                    <div class="setting-item">
                        <div class="setting-info">
                            <div class="setting-title">حذف الحساب</div>
                            <p class="setting-description">حذف حسابك نهائياً مع جميع البيانات المرتبطة به</p>
                        </div>
                        <div class="setting-control">
                            <button class="btn btn-danger" onclick="confirmDeleteAccount()">
                                <i class="fas fa-trash me-1"></i>
                                حذف الحساب
                            </button>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="col-lg-4">
                <!-- Quick Actions -->
                <div class="settings-card">
                    <h5 class="mb-3">إجراءات سريعة</h5>
                    
                    <div class="d-grid gap-2">
                        <a href="{{ route('profile.index') }}" class="btn btn-outline-primary">
                            <i class="fas fa-user me-2"></i>
                            الملف الشخصي
                        </a>
                        
                        <a href="{{ route('orders.index') }}" class="btn btn-outline-primary">
                            <i class="fas fa-shopping-bag me-2"></i>
                            طلباتي
                        </a>
                        
                        <a href="{{ route('products.favorites') }}" class="btn btn-outline-primary">
                            <i class="fas fa-heart me-2"></i>
                            المفضلة
                        </a>
                        
                        <button class="btn btn-outline-danger" onclick="confirmLogout()">
                            <i class="fas fa-sign-out-alt me-2"></i>
                            تسجيل الخروج
                        </button>
                    </div>
                </div>
                
                <!-- Help & Support -->
                <div class="settings-card">
                    <h5 class="mb-3">المساعدة والدعم</h5>
                    
                    <div class="d-grid gap-2">
                        <button class="btn btn-outline-info" onclick="alert('قريباً!')">
                            <i class="fas fa-question-circle me-2"></i>
                            الأسئلة الشائعة
                        </button>
                        
                        <button class="btn btn-outline-info" onclick="alert('قريباً!')">
                            <i class="fas fa-headset me-2"></i>
                            تواصل معنا
                        </button>
                        
                        <button class="btn btn-outline-info" onclick="alert('قريباً!')">
                            <i class="fas fa-file-alt me-2"></i>
                            الشروط والأحكام
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    
    <script>
        function confirmDeleteAccount() {
            if (confirm('هل أنت متأكد من رغبتك في حذف حسابك؟ هذا الإجراء لا يمكن التراجع عنه.')) {
                alert('سيتم تنفيذ هذه الميزة قريباً');
            }
        }
        
        function confirmLogout() {
            if (confirm('هل تريد تسجيل الخروج؟')) {
                // Logout logic here
                window.location.href = '{{ route("logout") }}';
            }
        }
    </script>
</body>
</html>
