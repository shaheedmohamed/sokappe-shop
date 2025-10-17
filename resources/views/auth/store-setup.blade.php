<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>إعداد متجرك - Sokappe</title>
    
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
            max-width: 600px;
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
        
        .step-indicator {
            background: rgba(255,255,255,0.2);
            padding: 10px 20px;
            border-radius: 20px;
            margin-top: 15px;
            font-size: 0.9rem;
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
        
        .form-control, select.form-control {
            width: 100%;
            padding: 12px 15px;
            border: 2px solid #e1e5e9;
            border-radius: 10px;
            font-size: 1rem;
            transition: all 0.3s ease;
            background: #f8f9fa;
        }
        
        select.form-control {
            cursor: pointer;
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
        
        textarea.form-control {
            min-height: 100px;
            resize: vertical;
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
        
        .alert-info {
            background: #d1ecf1;
            color: #0c5460;
            border-left: 4px solid #17a2b8;
        }
        
        .location-section {
            background: #f8f9fa;
            border-radius: 10px;
            padding: 20px;
            margin-bottom: 20px;
        }
        
        .location-section h5 {
            color: #333;
            margin-bottom: 15px;
            font-weight: 600;
        }
        
        .btn-outline-primary {
            border: 2px solid #00b4db;
            color: #00b4db;
            background: transparent;
            padding: 10px 20px;
            border-radius: 8px;
            font-weight: 600;
            transition: all 0.3s ease;
        }
        
        .btn-outline-primary:hover {
            background: #00b4db;
            color: white;
        }
        
        .coordinates-display {
            background: white;
            border: 1px solid #ddd;
            border-radius: 8px;
            padding: 10px;
            margin-top: 10px;
            font-size: 0.9rem;
            color: #666;
        }
        
        .help-text {
            font-size: 0.85rem;
            color: #666;
            margin-top: 5px;
        }
    </style>
</head>
<body>
    <div class="auth-container">
        <div class="auth-header">
            <h2>إعداد متجرك <span class="emoji">🏪</span></h2>
            <p>أضف معلومات متجرك لإنشاء صفحة احترافية</p>
            <div class="step-indicator">الخطوة 3 من 3</div>
        </div>
        
        <div class="auth-body">
            @if($errors->any())
                <div class="alert alert-danger">
                    @foreach($errors->all() as $error)
                        {{ $error }}<br>
                    @endforeach
                </div>
            @endif
            
            <form method="POST" action="{{ route('register.store-setup') }}">
                @csrf
                
                <div class="form-group">
                    <label for="store_name" class="form-label">
                        <i class="fas fa-store"></i> اسم المتجر
                    </label>
                    <input type="text" 
                           id="store_name" 
                           name="store_name" 
                           class="form-control @error('store_name') is-invalid @enderror" 
                           value="{{ old('store_name') }}" 
                           placeholder="اسم متجرك التجاري"
                           required>
                    @error('store_name')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                
                <div class="form-group">
                    <label for="store_phone" class="form-label">
                        <i class="fas fa-phone"></i> رقم هاتف المتجر
                    </label>
                    <input type="tel" 
                           id="store_phone" 
                           name="store_phone" 
                           class="form-control @error('store_phone') is-invalid @enderror" 
                           value="{{ old('store_phone') }}" 
                           placeholder="رقم هاتف للتواصل مع العملاء"
                           required>
                    @error('store_phone')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                
                <div class="form-group">
                    <label for="store_description" class="form-label">
                        <i class="fas fa-info-circle"></i> وصف المتجر
                    </label>
                    <textarea id="store_description" 
                              name="store_description" 
                              class="form-control @error('store_description') is-invalid @enderror" 
                              placeholder="اكتب وصفاً مختصراً عن متجرك ونوع المنتجات أو الخدمات التي تقدمها..."
                              required>{{ old('store_description') }}</textarea>
                    <div class="help-text">اكتب وصفاً جذاباً يوضح ما يميز متجرك</div>
                    @error('store_description')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="governorate" class="form-label">
                                <i class="fas fa-map"></i> المحافظة
                            </label>
                            <select id="governorate" 
                                    name="governorate" 
                                    class="form-control @error('governorate') is-invalid @enderror" 
                                    required>
                                <option value="">اختر المحافظة</option>
                                <option value="القاهرة" {{ old('governorate') == 'القاهرة' ? 'selected' : '' }}>القاهرة</option>
                                <option value="الجيزة" {{ old('governorate') == 'الجيزة' ? 'selected' : '' }}>الجيزة</option>
                                <option value="الإسكندرية" {{ old('governorate') == 'الإسكندرية' ? 'selected' : '' }}>الإسكندرية</option>
                                <option value="الدقهلية" {{ old('governorate') == 'الدقهلية' ? 'selected' : '' }}>الدقهلية</option>
                                <option value="الشرقية" {{ old('governorate') == 'الشرقية' ? 'selected' : '' }}>الشرقية</option>
                                <option value="القليوبية" {{ old('governorate') == 'القليوبية' ? 'selected' : '' }}>القليوبية</option>
                                <option value="كفر الشيخ" {{ old('governorate') == 'كفر الشيخ' ? 'selected' : '' }}>كفر الشيخ</option>
                                <option value="الغربية" {{ old('governorate') == 'الغربية' ? 'selected' : '' }}>الغربية</option>
                                <option value="المنوفية" {{ old('governorate') == 'المنوفية' ? 'selected' : '' }}>المنوفية</option>
                                <option value="البحيرة" {{ old('governorate') == 'البحيرة' ? 'selected' : '' }}>البحيرة</option>
                                <option value="الإسماعيلية" {{ old('governorate') == 'الإسماعيلية' ? 'selected' : '' }}>الإسماعيلية</option>
                                <option value="بورسعيد" {{ old('governorate') == 'بورسعيد' ? 'selected' : '' }}>بورسعيد</option>
                                <option value="السويس" {{ old('governorate') == 'السويس' ? 'selected' : '' }}>السويس</option>
                                <option value="المنيا" {{ old('governorate') == 'المنيا' ? 'selected' : '' }}>المنيا</option>
                                <option value="بني سويف" {{ old('governorate') == 'بني سويف' ? 'selected' : '' }}>بني سويف</option>
                                <option value="الفيوم" {{ old('governorate') == 'الفيوم' ? 'selected' : '' }}>الفيوم</option>
                                <option value="أسيوط" {{ old('governorate') == 'أسيوط' ? 'selected' : '' }}>أسيوط</option>
                                <option value="سوهاج" {{ old('governorate') == 'سوهاج' ? 'selected' : '' }}>سوهاج</option>
                                <option value="قنا" {{ old('governorate') == 'قنا' ? 'selected' : '' }}>قنا</option>
                                <option value="أسوان" {{ old('governorate') == 'أسوان' ? 'selected' : '' }}>أسوان</option>
                                <option value="الأقصر" {{ old('governorate') == 'الأقصر' ? 'selected' : '' }}>الأقصر</option>
                                <option value="البحر الأحمر" {{ old('governorate') == 'البحر الأحمر' ? 'selected' : '' }}>البحر الأحمر</option>
                                <option value="الوادي الجديد" {{ old('governorate') == 'الوادي الجديد' ? 'selected' : '' }}>الوادي الجديد</option>
                                <option value="مطروح" {{ old('governorate') == 'مطروح' ? 'selected' : '' }}>مطروح</option>
                                <option value="شمال سيناء" {{ old('governorate') == 'شمال سيناء' ? 'selected' : '' }}>شمال سيناء</option>
                                <option value="جنوب سيناء" {{ old('governorate') == 'جنوب سيناء' ? 'selected' : '' }}>جنوب سيناء</option>
                                <option value="دمياط" {{ old('governorate') == 'دمياط' ? 'selected' : '' }}>دمياط</option>
                            </select>
                            @error('governorate')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="city" class="form-label">
                                <i class="fas fa-city"></i> المدينة/المنطقة
                            </label>
                            <input type="text" 
                                   id="city" 
                                   name="city" 
                                   class="form-control @error('city') is-invalid @enderror" 
                                   value="{{ old('city') }}" 
                                   placeholder="اسم المدينة أو المنطقة"
                                   required>
                            @error('city')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                </div>
                
                <div class="form-group">
                    <label for="store_address" class="form-label">
                        <i class="fas fa-map-marker-alt"></i> عنوان المتجر التفصيلي
                    </label>
                    <textarea id="store_address" 
                              name="store_address" 
                              class="form-control @error('store_address') is-invalid @enderror" 
                              placeholder="العنوان التفصيلي للمتجر (الشارع، رقم المبنى، معالم مميزة)"
                              required>{{ old('store_address') }}</textarea>
                    @error('store_address')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                
                <div class="location-section">
                    <h5><i class="fas fa-globe"></i> الموقع على الخريطة (اختياري)</h5>
                    <p class="help-text">حدد موقع متجرك على الخريطة لمساعدة العملاء في الوصول إليك</p>
                    
                    <button type="button" class="btn btn-outline-primary" onclick="getLocation()">
                        <i class="fas fa-crosshairs"></i> تحديد موقعي الحالي
                    </button>
                    
                    <div class="row mt-3">
                        <div class="col-md-6">
                            <input type="hidden" 
                                   id="store_latitude" 
                                   name="store_latitude" 
                                   value="{{ old('store_latitude') }}">
                            <input type="hidden" 
                                   id="store_longitude" 
                                   name="store_longitude" 
                                   value="{{ old('store_longitude') }}">
                        </div>
                    </div>
                    
                    <div id="coordinates" class="coordinates-display" style="display: none;">
                        <i class="fas fa-map-pin"></i> 
                        <span id="coords-text">لم يتم تحديد الموقع بعد</span>
                    </div>
                </div>
                
                <div class="alert alert-info">
                    <i class="fas fa-info-circle"></i>
                    <strong>ملاحظة:</strong> بعد إرسال الطلب، سيتم مراجعة بيانات متجرك خلال 48 ساعة وستصلك النتيجة عبر البريد الإلكتروني.
                </div>
                
                <button type="submit" class="btn btn-primary">
                    <i class="fas fa-store"></i> إرسال طلب تسجيل المتجر
                </button>
            </form>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    
    <script>
        function getLocation() {
            if (navigator.geolocation) {
                navigator.geolocation.getCurrentPosition(showPosition, showError);
            } else {
                alert("الموقع الجغرافي غير مدعوم في هذا المتصفح.");
            }
        }

        function showPosition(position) {
            const latitude = position.coords.latitude;
            const longitude = position.coords.longitude;
            
            document.getElementById('store_latitude').value = latitude;
            document.getElementById('store_longitude').value = longitude;
            
            document.getElementById('coords-text').textContent = 
                `خط العرض: ${latitude.toFixed(6)}, خط الطول: ${longitude.toFixed(6)}`;
            document.getElementById('coordinates').style.display = 'block';
        }

        function showError(error) {
            let message = '';
            switch(error.code) {
                case error.PERMISSION_DENIED:
                    message = "تم رفض طلب الموقع الجغرافي.";
                    break;
                case error.POSITION_UNAVAILABLE:
                    message = "معلومات الموقع غير متوفرة.";
                    break;
                case error.TIMEOUT:
                    message = "انتهت مهلة طلب الموقع الجغرافي.";
                    break;
                default:
                    message = "حدث خطأ غير معروف.";
                    break;
            }
            alert(message);
        }
    </script>
</body>
</html>
