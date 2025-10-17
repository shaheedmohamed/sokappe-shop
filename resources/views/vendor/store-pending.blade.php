@extends('layouts.app')

@section('title', 'انتظار الموافقة على المتجر')

@section('content')
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-lg-8">
            @if($user->isStorePending())
                <!-- Pending Approval -->
                <div class="text-center">
                    <div class="mb-4">
                        <div class="spinner-border text-warning" style="width: 4rem; height: 4rem;" role="status">
                            <span class="visually-hidden">جاري المراجعة...</span>
                        </div>
                    </div>
                    
                    <div class="card border-0 shadow-lg">
                        <div class="card-body p-5">
                            <div class="mb-4">
                                <i class="fas fa-clock text-warning" style="font-size: 4rem;"></i>
                            </div>
                            
                            <h2 class="card-title text-warning mb-4">تم استلام طلبك!</h2>
                            
                            <div class="alert alert-info border-0" style="background: linear-gradient(135deg, #e3f2fd 0%, #bbdefb 100%);">
                                <h5 class="alert-heading">
                                    <i class="fas fa-info-circle me-2"></i>
                                    طلب تسجيل المتجر قيد المراجعة
                                </h5>
                                <p class="mb-0">
                                    سيتم مراجعة طلبك خلال <strong>48 ساعة القادمة</strong> وستصلك النتيجة عبر البريد الإلكتروني
                                </p>
                            </div>
                            
                            <div class="row g-4 mt-4">
                                <div class="col-md-6">
                                    <div class="d-flex align-items-center">
                                        <i class="fas fa-store text-primary me-3" style="font-size: 1.5rem;"></i>
                                        <div>
                                            <strong>اسم المتجر:</strong><br>
                                            <span class="text-muted">{{ $user->store_name }}</span>
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="col-md-6">
                                    <div class="d-flex align-items-center">
                                        <i class="fas fa-calendar text-success me-3" style="font-size: 1.5rem;"></i>
                                        <div>
                                            <strong>تاريخ التقديم:</strong><br>
                                            <span class="text-muted">
                                                {{ $user->store_submitted_at ? $user->store_submitted_at->format('Y/m/d H:i') : 'اليوم' }}
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="mt-5">
                                <h6 class="mb-3">ما يحدث بعد ذلك؟</h6>
                                <div class="row g-3">
                                    <div class="col-md-4">
                                        <div class="text-center">
                                            <div class="bg-primary text-white rounded-circle d-inline-flex align-items-center justify-content-center mb-2" style="width: 50px; height: 50px;">
                                                <i class="fas fa-search"></i>
                                            </div>
                                            <small class="d-block">مراجعة البيانات</small>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="text-center">
                                            <div class="bg-warning text-white rounded-circle d-inline-flex align-items-center justify-content-center mb-2" style="width: 50px; height: 50px;">
                                                <i class="fas fa-check"></i>
                                            </div>
                                            <small class="d-block">الموافقة</small>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="text-center">
                                            <div class="bg-success text-white rounded-circle d-inline-flex align-items-center justify-content-center mb-2" style="width: 50px; height: 50px;">
                                                <i class="fas fa-rocket"></i>
                                            </div>
                                            <small class="d-block">بدء البيع</small>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                
            @elseif($user->isStoreRejected())
                <!-- Rejected -->
                <div class="text-center">
                    <div class="card border-0 shadow-lg">
                        <div class="card-body p-5">
                            <div class="mb-4">
                                <i class="fas fa-times-circle text-danger" style="font-size: 4rem;"></i>
                            </div>
                            
                            <h2 class="card-title text-danger mb-4">تم رفض الطلب</h2>
                            
                            <div class="alert alert-danger border-0">
                                <h5 class="alert-heading">
                                    <i class="fas fa-exclamation-triangle me-2"></i>
                                    سبب الرفض
                                </h5>
                                <p class="mb-0">{{ $user->rejection_reason }}</p>
                            </div>
                            
                            <div class="mt-4">
                                <p class="text-muted mb-4">
                                    يمكنك تعديل البيانات وإرسال طلب جديد
                                </p>
                                
                                <a href="{{ route('vendor.edit-profile') }}" class="btn btn-primary btn-lg">
                                    <i class="fas fa-edit me-2"></i>
                                    إرسال طلب جديد
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                
            @elseif($user->isStoreApproved())
                <!-- Approved - Welcome -->
                <div class="text-center">
                    <div class="card border-0 shadow-lg">
                        <div class="card-body p-5">
                            <div class="mb-4">
                                <i class="fas fa-check-circle text-success" style="font-size: 4rem;"></i>
                            </div>
                            
                            <h2 class="card-title text-success mb-4">مبروك! تم قبول متجرك</h2>
                            
                            <div class="alert alert-success border-0">
                                <h5 class="alert-heading">
                                    <i class="fas fa-party-horn me-2"></i>
                                    مرحباً بك في عائلة Sokappe
                                </h5>
                                <p class="mb-0">
                                    تم الموافقة على متجرك بنجاح! يمكنك الآن البدء في إضافة المنتجات والبيع
                                </p>
                            </div>
                            
                            <div class="row g-4 mt-4">
                                <div class="col-md-6">
                                    <div class="d-flex align-items-center">
                                        <i class="fas fa-store text-success me-3" style="font-size: 1.5rem;"></i>
                                        <div>
                                            <strong>متجرك:</strong><br>
                                            <span class="text-muted">{{ $user->store_name }}</span>
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="col-md-6">
                                    <div class="d-flex align-items-center">
                                        <i class="fas fa-calendar-check text-success me-3" style="font-size: 1.5rem;"></i>
                                        <div>
                                            <strong>تاريخ الموافقة:</strong><br>
                                            <span class="text-muted">
                                                {{ $user->store_approved_at ? $user->store_approved_at->format('Y/m/d H:i') : 'اليوم' }}
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="mt-5">
                                <a href="{{ route('vendor.profile') }}" class="btn btn-success btn-lg me-3">
                                    <i class="fas fa-store me-2"></i>
                                    دخول المتجر
                                </a>
                                
                                <a href="{{ route('products.create') }}" class="btn btn-primary btn-lg">
                                    <i class="fas fa-plus me-2"></i>
                                    إضافة منتج
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            @endif
        </div>
    </div>
</div>

<style>
.card {
    border-radius: 20px;
}

.btn-lg {
    padding: 12px 30px;
    border-radius: 25px;
    font-weight: 600;
}

.alert {
    border-radius: 15px;
}

.spinner-border {
    animation: spin 2s linear infinite;
}

@keyframes spin {
    0% { transform: rotate(0deg); }
    100% { transform: rotate(360deg); }
}
</style>
@endsection
