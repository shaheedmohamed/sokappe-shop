<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>انضم إلى Sokappe - الخطوة 1</title>
    
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
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            direction: rtl;
            padding: 20px 0;
        }
        
        .auth-container {
            background: white;
            border-radius: 20px;
            box-shadow: 0 20px 60px rgba(0,0,0,0.1);
            overflow: hidden;
            width: 100%;
            max-width: 450px;
            margin: 20px;
        }
        
        .auth-header {
            background: linear-gradient(135deg, #00b4db 0%, #0083b0 100%);
            color: white;
            padding: 40px 30px;
            text-align: center;
        }
        
        .auth-header h2 {
            margin: 0;
            font-size: 1.8rem;
            font-weight: 600;
            margin-bottom: 10px;
        }
        
        .auth-header p {
            margin: 0;
            opacity: 0.9;
            font-size: 1rem;
        }
        
        .auth-body {
            padding: 40px 30px;
        }
        
        .form-group {
            margin-bottom: 20px;
        }
        
        .form-label {
            display: block;
            margin-bottom: 8px;
            font-weight: 600;
            color: #333;
            font-size: 0.95rem;
        }
        
        .form-control {
            width: 100%;
            padding: 12px 15px;
            border: 2px solid #e1e5e9;
            border-radius: 10px;
            font-size: 1rem;
            transition: all 0.3s ease;
            background: #f8f9fa;
        }
        
        .form-control:focus {
            outline: none;
            border-color: #00b4db;
            background: white;
            box-shadow: 0 0 0 3px rgba(0, 180, 219, 0.1);
        }
        
        .form-control.is-invalid {
            border-color: #dc3545;
        }
        
        .invalid-feedback {
            display: block;
            color: #dc3545;
            font-size: 0.875rem;
            margin-top: 5px;
        }
        
        .btn-primary {
            background: linear-gradient(135deg, #00b4db 0%, #0083b0 100%);
            border: none;
            padding: 15px 30px;
            border-radius: 10px;
            font-weight: 600;
            font-size: 1rem;
            width: 100%;
            transition: all 0.3s ease;
        }
        
        .btn-primary:hover {
            transform: translateY(-2px);
            box-shadow: 0 10px 25px rgba(0, 180, 219, 0.3);
        }
        
        .auth-footer {
            text-align: center;
            padding: 20px 30px;
            border-top: 1px solid #e1e5e9;
            background: #f8f9fa;
        }
        
        .auth-footer a {
            color: #00b4db;
            text-decoration: none;
            font-weight: 600;
        }
        
        .auth-footer a:hover {
            text-decoration: underline;
        }
        
        .emoji {
            font-size: 1.5rem;
            margin-left: 10px;
        }
        
        .alert {
            border-radius: 10px;
            padding: 15px;
            margin-bottom: 20px;
            border: none;
        }
        
        .alert-danger {
            background: #f8d7da;
            color: #721c24;
        }
        
        .row.g-3 > .col-md-6 {
            padding-left: 8px;
            padding-right: 8px;
        }
        
        select.form-control {
            background-image: url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 16 16'%3e%3cpath fill='none' stroke='%23343a40' stroke-linecap='round' stroke-linejoin='round' stroke-width='2' d='m1 6 7 7 7-7'/%3e%3c/svg%3e");
            background-repeat: no-repeat;
            background-position: left .75rem center;
            background-size: 16px 12px;
            padding-left: 2.5rem;
        }
    </style>
</head>
<body>
    <div class="auth-container">
        <div class="auth-header">
            <h2>انضم إلى Sokappe <span class="emoji">🚀</span></h2>
            <p>ابدأ رحلتك في عالم التسوق الآمن</p>
        </div>
        
        <div class="auth-body">
            @if($errors->any())
                <div class="alert alert-danger">
                    @foreach($errors->all() as $error)
                        {{ $error }}<br>
                    @endforeach
                </div>
            @endif
            
            <form method="POST" action="{{ route('register') }}">
                @csrf
                
                <div class="form-group">
                    <label for="name" class="form-label">
                        <i class="fas fa-user"></i> الاسم الكامل
                    </label>
                    <input type="text" 
                           id="name" 
                           name="name" 
                           class="form-control @error('name') is-invalid @enderror" 
                           value="{{ old('name') }}" 
                           placeholder="أدخل اسمك الكامل"
                           required>
                    @error('name')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                
                <div class="form-group">
                    <label for="email" class="form-label">
                        <i class="fas fa-envelope"></i> البريد الإلكتروني
                    </label>
                    <input type="email" 
                           id="email" 
                           name="email" 
                           class="form-control @error('email') is-invalid @enderror" 
                           value="{{ old('email') }}" 
                           placeholder="example@domain.com"
                           required>
                    @error('email')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                
                <div class="form-group">
                    <label for="password" class="form-label">
                        <i class="fas fa-lock"></i> كلمة المرور
                    </label>
                    <input type="password" 
                           id="password" 
                           name="password" 
                           class="form-control @error('password') is-invalid @enderror" 
                           placeholder="كلمة مرور قوية"
                           required>
                    @error('password')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                
                <div class="form-group">
                    <label for="password_confirmation" class="form-label">
                        <i class="fas fa-lock"></i> تأكيد كلمة المرور
                    </label>
                    <input type="password" 
                           id="password_confirmation" 
                           name="password_confirmation" 
                           class="form-control" 
                           placeholder="أعد كتابة كلمة المرور"
                           required>
                </div>
                
                <div class="form-group">
                    <label for="phone" class="form-label">
                        <i class="fas fa-phone"></i> رقم الهاتف
                    </label>
                    <input type="tel" 
                           id="phone" 
                           name="phone" 
                           class="form-control @error('phone') is-invalid @enderror" 
                           value="{{ old('phone') }}" 
                           placeholder="01xxxxxxxxx"
                           required>
                    @error('phone')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                
                <div class="row g-3">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="governorate" class="form-label">
                                <i class="fas fa-map-marker-alt"></i> المحافظة
                            </label>
                            <select id="governorate" 
                                    name="governorate" 
                                    class="form-control @error('governorate') is-invalid @enderror" 
                                    required>
                                <option value="">اختر المحافظة</option>
                                <option value="القاهرة" {{ old('governorate') == 'القاهرة' ? 'selected' : '' }}>القاهرة</option>
                                <option value="الجيزة" {{ old('governorate') == 'الجيزة' ? 'selected' : '' }}>الجيزة</option>
                                <option value="الإسكندرية" {{ old('governorate') == 'الإسكندرية' ? 'selected' : '' }}>الإسكندرية</option>
                                <option value="الشرقية" {{ old('governorate') == 'الشرقية' ? 'selected' : '' }}>الشرقية</option>
                                <option value="المنوفية" {{ old('governorate') == 'المنوفية' ? 'selected' : '' }}>المنوفية</option>
                                <option value="القليوبية" {{ old('governorate') == 'القليوبية' ? 'selected' : '' }}>القليوبية</option>
                                <option value="البحيرة" {{ old('governorate') == 'البحيرة' ? 'selected' : '' }}>البحيرة</option>
                                <option value="الغربية" {{ old('governorate') == 'الغربية' ? 'selected' : '' }}>الغربية</option>
                                <option value="كفر الشيخ" {{ old('governorate') == 'كفر الشيخ' ? 'selected' : '' }}>كفر الشيخ</option>
                                <option value="الدقهلية" {{ old('governorate') == 'الدقهلية' ? 'selected' : '' }}>الدقهلية</option>
                                <option value="دمياط" {{ old('governorate') == 'دمياط' ? 'selected' : '' }}>دمياط</option>
                                <option value="بورسعيد" {{ old('governorate') == 'بورسعيد' ? 'selected' : '' }}>بورسعيد</option>
                                <option value="الإسماعيلية" {{ old('governorate') == 'الإسماعيلية' ? 'selected' : '' }}>الإسماعيلية</option>
                                <option value="السويس" {{ old('governorate') == 'السويس' ? 'selected' : '' }}>السويس</option>
                                <option value="شمال سيناء" {{ old('governorate') == 'شمال سيناء' ? 'selected' : '' }}>شمال سيناء</option>
                                <option value="جنوب سيناء" {{ old('governorate') == 'جنوب سيناء' ? 'selected' : '' }}>جنوب سيناء</option>
                                <option value="الفيوم" {{ old('governorate') == 'الفيوم' ? 'selected' : '' }}>الفيوم</option>
                                <option value="بني سويف" {{ old('governorate') == 'بني سويف' ? 'selected' : '' }}>بني سويف</option>
                                <option value="المنيا" {{ old('governorate') == 'المنيا' ? 'selected' : '' }}>المنيا</option>
                                <option value="أسيوط" {{ old('governorate') == 'أسيوط' ? 'selected' : '' }}>أسيوط</option>
                                <option value="سوهاج" {{ old('governorate') == 'سوهاج' ? 'selected' : '' }}>سوهاج</option>
                                <option value="قنا" {{ old('governorate') == 'قنا' ? 'selected' : '' }}>قنا</option>
                                <option value="الأقصر" {{ old('governorate') == 'الأقصر' ? 'selected' : '' }}>الأقصر</option>
                                <option value="أسوان" {{ old('governorate') == 'أسوان' ? 'selected' : '' }}>أسوان</option>
                                <option value="البحر الأحمر" {{ old('governorate') == 'البحر الأحمر' ? 'selected' : '' }}>البحر الأحمر</option>
                                <option value="الوادي الجديد" {{ old('governorate') == 'الوادي الجديد' ? 'selected' : '' }}>الوادي الجديد</option>
                                <option value="مطروح" {{ old('governorate') == 'مطروح' ? 'selected' : '' }}>مطروح</option>
                            </select>
                            @error('governorate')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="city" class="form-label">
                                <i class="fas fa-building"></i> المدينة (اختياري)
                            </label>
                            <input type="text" 
                                   id="city" 
                                   name="city" 
                                   class="form-control @error('city') is-invalid @enderror" 
                                   value="{{ old('city') }}" 
                                   placeholder="اسم المدينة">
                            @error('city')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                </div>
                
                <button type="submit" class="btn btn-primary">
                    <i class="fas fa-arrow-left"></i> إنشاء حساب جديد
                </button>
            </form>
        </div>
        
        <div class="auth-footer">
            لديك حساب بالفعل؟ <a href="{{ route('login') }}">سجل الدخول</a>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
