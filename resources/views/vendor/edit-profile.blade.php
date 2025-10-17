@extends('layouts.app')

@section('title', 'تعديل بيانات المتجر')

@section('content')
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-lg-8">
            <div class="card border-0 shadow-lg">
                <div class="card-header bg-primary text-white text-center">
                    <h4 class="mb-0">
                        <i class="fas fa-edit me-2"></i>
                        تعديل بيانات المتجر
                    </h4>
                </div>
                
                <div class="card-body p-4">
                    @if($user->isStoreRejected())
                        <div class="alert alert-warning">
                            <h5 class="alert-heading">
                                <i class="fas fa-exclamation-triangle me-2"></i>
                                متجرك مرفوض حالياً
                            </h5>
                            <p class="mb-2"><strong>سبب الرفض:</strong> {{ $user->rejection_reason }}</p>
                            <p class="mb-0">يمكنك تعديل البيانات أدناه وإرسال طلب جديد للمراجعة.</p>
                        </div>
                    @endif
                    
                    <form method="POST" action="{{ route('vendor.update-profile') }}">
                        @csrf
                        @method('PUT')
                        
                        <!-- Personal Information -->
                        <div class="row mb-4">
                            <div class="col-12">
                                <h5 class="text-primary border-bottom pb-2">
                                    <i class="fas fa-user me-2"></i>
                                    البيانات الشخصية
                                </h5>
                            </div>
                        </div>
                        
                        <div class="row g-3 mb-4">
                            <div class="col-md-6">
                                <label for="name" class="form-label">
                                    <i class="fas fa-user"></i> الاسم الكامل
                                </label>
                                <input type="text" 
                                       id="name" 
                                       name="name" 
                                       class="form-control @error('name') is-invalid @enderror" 
                                       value="{{ old('name', $user->name) }}" 
                                       required>
                                @error('name')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            
                            <div class="col-md-6">
                                <label for="phone" class="form-label">
                                    <i class="fas fa-phone"></i> رقم الهاتف
                                </label>
                                <input type="tel" 
                                       id="phone" 
                                       name="phone" 
                                       class="form-control @error('phone') is-invalid @enderror" 
                                       value="{{ old('phone', $user->phone) }}" 
                                       required>
                                @error('phone')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        
                        <!-- Store Information -->
                        <div class="row mb-4">
                            <div class="col-12">
                                <h5 class="text-primary border-bottom pb-2">
                                    <i class="fas fa-store me-2"></i>
                                    بيانات المتجر
                                </h5>
                            </div>
                        </div>
                        
                        <div class="row g-3 mb-4">
                            <div class="col-md-6">
                                <label for="store_name" class="form-label">
                                    <i class="fas fa-store"></i> اسم المتجر
                                </label>
                                <input type="text" 
                                       id="store_name" 
                                       name="store_name" 
                                       class="form-control @error('store_name') is-invalid @enderror" 
                                       value="{{ old('store_name', $user->store_name) }}" 
                                       required>
                                @error('store_name')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            
                            <div class="col-md-6">
                                <label for="store_phone" class="form-label">
                                    <i class="fas fa-phone"></i> رقم هاتف المتجر
                                </label>
                                <input type="tel" 
                                       id="store_phone" 
                                       name="store_phone" 
                                       class="form-control @error('store_phone') is-invalid @enderror" 
                                       value="{{ old('store_phone', $user->store_phone) }}" 
                                       required>
                                @error('store_phone')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        
                        <div class="mb-4">
                            <label for="store_description" class="form-label">
                                <i class="fas fa-info-circle"></i> وصف المتجر
                            </label>
                            <textarea id="store_description" 
                                      name="store_description" 
                                      class="form-control @error('store_description') is-invalid @enderror" 
                                      rows="4"
                                      placeholder="اكتب وصفاً مختصراً عن متجرك ونوع المنتجات التي تقدمها..."
                                      required>{{ old('store_description', $user->store_description) }}</textarea>
                            @error('store_description')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        
                        <!-- Location Information -->
                        <div class="row mb-4">
                            <div class="col-12">
                                <h5 class="text-primary border-bottom pb-2">
                                    <i class="fas fa-map-marker-alt me-2"></i>
                                    معلومات الموقع
                                </h5>
                            </div>
                        </div>
                        
                        <div class="row g-3 mb-4">
                            <div class="col-md-6">
                                <label for="governorate" class="form-label">
                                    <i class="fas fa-map"></i> المحافظة
                                </label>
                                <select id="governorate" 
                                        name="governorate" 
                                        class="form-control @error('governorate') is-invalid @enderror" 
                                        required>
                                    <option value="">اختر المحافظة</option>
                                    <option value="القاهرة" {{ old('governorate', $user->governorate) == 'القاهرة' ? 'selected' : '' }}>القاهرة</option>
                                    <option value="الجيزة" {{ old('governorate', $user->governorate) == 'الجيزة' ? 'selected' : '' }}>الجيزة</option>
                                    <option value="الإسكندرية" {{ old('governorate', $user->governorate) == 'الإسكندرية' ? 'selected' : '' }}>الإسكندرية</option>
                                    <option value="الدقهلية" {{ old('governorate', $user->governorate) == 'الدقهلية' ? 'selected' : '' }}>الدقهلية</option>
                                    <option value="الشرقية" {{ old('governorate', $user->governorate) == 'الشرقية' ? 'selected' : '' }}>الشرقية</option>
                                    <option value="القليوبية" {{ old('governorate', $user->governorate) == 'القليوبية' ? 'selected' : '' }}>القليوبية</option>
                                    <option value="كفر الشيخ" {{ old('governorate', $user->governorate) == 'كفر الشيخ' ? 'selected' : '' }}>كفر الشيخ</option>
                                    <option value="الغربية" {{ old('governorate', $user->governorate) == 'الغربية' ? 'selected' : '' }}>الغربية</option>
                                    <option value="المنوفية" {{ old('governorate', $user->governorate) == 'المنوفية' ? 'selected' : '' }}>المنوفية</option>
                                    <option value="البحيرة" {{ old('governorate', $user->governorate) == 'البحيرة' ? 'selected' : '' }}>البحيرة</option>
                                    <option value="الإسماعيلية" {{ old('governorate', $user->governorate) == 'الإسماعيلية' ? 'selected' : '' }}>الإسماعيلية</option>
                                    <option value="بورسعيد" {{ old('governorate', $user->governorate) == 'بورسعيد' ? 'selected' : '' }}>بورسعيد</option>
                                    <option value="السويس" {{ old('governorate', $user->governorate) == 'السويس' ? 'selected' : '' }}>السويس</option>
                                    <option value="المنيا" {{ old('governorate', $user->governorate) == 'المنيا' ? 'selected' : '' }}>المنيا</option>
                                    <option value="بني سويف" {{ old('governorate', $user->governorate) == 'بني سويف' ? 'selected' : '' }}>بني سويف</option>
                                    <option value="الفيوم" {{ old('governorate', $user->governorate) == 'الفيوم' ? 'selected' : '' }}>الفيوم</option>
                                    <option value="أسيوط" {{ old('governorate', $user->governorate) == 'أسيوط' ? 'selected' : '' }}>أسيوط</option>
                                    <option value="سوهاج" {{ old('governorate', $user->governorate) == 'سوهاج' ? 'selected' : '' }}>سوهاج</option>
                                    <option value="قنا" {{ old('governorate', $user->governorate) == 'قنا' ? 'selected' : '' }}>قنا</option>
                                    <option value="أسوان" {{ old('governorate', $user->governorate) == 'أسوان' ? 'selected' : '' }}>أسوان</option>
                                    <option value="الأقصر" {{ old('governorate', $user->governorate) == 'الأقصر' ? 'selected' : '' }}>الأقصر</option>
                                    <option value="البحر الأحمر" {{ old('governorate', $user->governorate) == 'البحر الأحمر' ? 'selected' : '' }}>البحر الأحمر</option>
                                    <option value="الوادي الجديد" {{ old('governorate', $user->governorate) == 'الوادي الجديد' ? 'selected' : '' }}>الوادي الجديد</option>
                                    <option value="مطروح" {{ old('governorate', $user->governorate) == 'مطروح' ? 'selected' : '' }}>مطروح</option>
                                    <option value="شمال سيناء" {{ old('governorate', $user->governorate) == 'شمال سيناء' ? 'selected' : '' }}>شمال سيناء</option>
                                    <option value="جنوب سيناء" {{ old('governorate', $user->governorate) == 'جنوب سيناء' ? 'selected' : '' }}>جنوب سيناء</option>
                                    <option value="دمياط" {{ old('governorate', $user->governorate) == 'دمياط' ? 'selected' : '' }}>دمياط</option>
                                </select>
                                @error('governorate')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            
                            <div class="col-md-6">
                                <label for="city" class="form-label">
                                    <i class="fas fa-city"></i> المدينة/المنطقة
                                </label>
                                <input type="text" 
                                       id="city" 
                                       name="city" 
                                       class="form-control @error('city') is-invalid @enderror" 
                                       value="{{ old('city', $user->city) }}" 
                                       placeholder="اسم المدينة أو المنطقة"
                                       required>
                                @error('city')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        
                        <div class="mb-4">
                            <label for="store_address" class="form-label">
                                <i class="fas fa-map-marker-alt"></i> عنوان المتجر التفصيلي
                            </label>
                            <textarea id="store_address" 
                                      name="store_address" 
                                      class="form-control @error('store_address') is-invalid @enderror" 
                                      rows="3"
                                      placeholder="العنوان التفصيلي للمتجر (الشارع، رقم المبنى، معالم مميزة)"
                                      required>{{ old('store_address', $user->store_address) }}</textarea>
                            @error('store_address')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        
                        <!-- Action Buttons -->
                        <div class="d-flex justify-content-between">
                            <a href="{{ route('vendor.store-pending') }}" class="btn btn-secondary">
                                <i class="fas fa-arrow-right me-2"></i>
                                العودة
                            </a>
                            
                            <button type="submit" class="btn btn-primary">
                                <i class="fas fa-save me-2"></i>
                                {{ $user->isStoreRejected() ? 'إرسال طلب جديد' : 'حفظ التغييرات' }}
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
.card {
    border-radius: 15px;
}

.form-control {
    border-radius: 10px;
    border: 2px solid #e1e5e9;
    padding: 12px 15px;
    transition: all 0.3s ease;
}

.form-control:focus {
    border-color: #667eea;
    box-shadow: 0 0 0 3px rgba(102, 126, 234, 0.1);
}

.btn {
    border-radius: 25px;
    padding: 12px 30px;
    font-weight: 600;
    transition: all 0.3s ease;
}

.btn:hover {
    transform: translateY(-2px);
}

.alert {
    border-radius: 15px;
    border: none;
}

select.form-control {
    cursor: pointer;
}

.form-label {
    font-weight: 600;
    color: #333;
    margin-bottom: 8px;
}

.form-label i {
    color: #667eea;
    margin-left: 5px;
}
</style>
@endsection
