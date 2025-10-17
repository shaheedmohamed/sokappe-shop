@extends('admin.layouts.app')

@section('title', 'إعدادات النظام')
@section('page-title', 'إعدادات وتكوين النظام')

@section('content')
<div class="row g-4">
    <!-- General Settings -->
    <div class="col-xl-8">
        <div class="table-card">
            <div class="table-header">
                <i class="fas fa-cog me-2"></i>
                الإعدادات العامة
            </div>
            <div class="p-4">
                <form>
                    <div class="row g-3">
                        <div class="col-md-6">
                            <label class="form-label">اسم الموقع</label>
                            <input type="text" class="form-control" value="Sokappe Shop">
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">البريد الإلكتروني للإدارة</label>
                            <input type="email" class="form-control" value="admin@sokappe.com">
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">رقم الهاتف</label>
                            <input type="text" class="form-control" value="01000000000">
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">العنوان</label>
                            <input type="text" class="form-control" value="القاهرة، مصر">
                        </div>
                        <div class="col-12">
                            <label class="form-label">وصف الموقع</label>
                            <textarea class="form-control" rows="3">منصة Sokappe للتجارة الإلكترونية - أفضل مكان للتسوق والبيع أونلاين</textarea>
                        </div>
                    </div>
                    
                    <hr class="my-4">
                    
                    <h6 class="mb-3">إعدادات التسجيل</h6>
                    <div class="row g-3">
                        <div class="col-md-6">
                            <div class="form-check form-switch">
                                <input class="form-check-input" type="checkbox" id="allowRegistration" checked>
                                <label class="form-check-label" for="allowRegistration">
                                    السماح بتسجيل مستخدمين جدد
                                </label>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-check form-switch">
                                <input class="form-check-input" type="checkbox" id="emailVerification" checked>
                                <label class="form-check-label" for="emailVerification">
                                    تفعيل البريد الإلكتروني مطلوب
                                </label>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-check form-switch">
                                <input class="form-check-input" type="checkbox" id="autoApproveVendors">
                                <label class="form-check-label" for="autoApproveVendors">
                                    الموافقة التلقائية على المتاجر
                                </label>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-check form-switch">
                                <input class="form-check-input" type="checkbox" id="autoApproveProducts" checked>
                                <label class="form-check-label" for="autoApproveProducts">
                                    الموافقة التلقائية على المنتجات
                                </label>
                            </div>
                        </div>
                    </div>
                    
                    <hr class="my-4">
                    
                    <h6 class="mb-3">إعدادات الأمان</h6>
                    <div class="row g-3">
                        <div class="col-md-6">
                            <label class="form-label">الحد الأقصى لمحاولات تسجيل الدخول</label>
                            <input type="number" class="form-control" value="5">
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">مدة انتهاء الجلسة (بالدقائق)</label>
                            <input type="number" class="form-control" value="120">
                        </div>
                        <div class="col-12">
                            <div class="form-check form-switch">
                                <input class="form-check-input" type="checkbox" id="enableLogs" checked>
                                <label class="form-check-label" for="enableLogs">
                                    تفعيل تسجيل العمليات
                                </label>
                            </div>
                        </div>
                    </div>
                    
                    <div class="mt-4">
                        <button type="submit" class="btn btn-primary me-2">
                            <i class="fas fa-save me-1"></i>
                            حفظ الإعدادات
                        </button>
                        <button type="button" class="btn btn-outline-secondary">
                            <i class="fas fa-undo me-1"></i>
                            إعادة تعيين
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    
    <!-- System Info & Actions -->
    <div class="col-xl-4">
        <!-- System Information -->
        <div class="table-card mb-4">
            <div class="table-header">
                <i class="fas fa-info-circle me-2"></i>
                معلومات النظام
            </div>
            <div class="p-4">
                <div class="mb-3">
                    <strong>إصدار Laravel:</strong>
                    <span class="float-end">{{ app()->version() }}</span>
                </div>
                <div class="mb-3">
                    <strong>إصدار PHP:</strong>
                    <span class="float-end">{{ PHP_VERSION }}</span>
                </div>
                <div class="mb-3">
                    <strong>البيئة:</strong>
                    <span class="float-end badge badge-{{ app()->environment() == 'production' ? 'success' : 'warning' }}">
                        {{ app()->environment() }}
                    </span>
                </div>
                <div class="mb-3">
                    <strong>وضع التطوير:</strong>
                    <span class="float-end badge badge-{{ config('app.debug') ? 'warning' : 'success' }}">
                        {{ config('app.debug') ? 'مفعل' : 'معطل' }}
                    </span>
                </div>
                <div class="mb-3">
                    <strong>المنطقة الزمنية:</strong>
                    <span class="float-end">{{ config('app.timezone') }}</span>
                </div>
                <div>
                    <strong>آخر تحديث:</strong>
                    <span class="float-end">{{ date('Y/m/d H:i') }}</span>
                </div>
            </div>
        </div>
        
        <!-- Quick Actions -->
        <div class="table-card mb-4">
            <div class="table-header">
                <i class="fas fa-bolt me-2"></i>
                إجراءات سريعة
            </div>
            <div class="p-4">
                <div class="d-grid gap-2">
                    <button class="btn btn-outline-primary" onclick="clearCache()">
                        <i class="fas fa-broom me-2"></i>
                        مسح الذاكرة المؤقتة
                    </button>
                    <button class="btn btn-outline-info" onclick="optimizeSystem()">
                        <i class="fas fa-rocket me-2"></i>
                        تحسين النظام
                    </button>
                    <button class="btn btn-outline-success" onclick="backupDatabase()">
                        <i class="fas fa-database me-2"></i>
                        نسخ احتياطي للبيانات
                    </button>
                    <button class="btn btn-outline-warning" onclick="checkUpdates()">
                        <i class="fas fa-sync me-2"></i>
                        فحص التحديثات
                    </button>
                </div>
            </div>
        </div>
        
        <!-- Maintenance Mode -->
        <div class="table-card">
            <div class="table-header">
                <i class="fas fa-tools me-2"></i>
                وضع الصيانة
            </div>
            <div class="p-4">
                <div class="form-check form-switch mb-3">
                    <input class="form-check-input" type="checkbox" id="maintenanceMode">
                    <label class="form-check-label" for="maintenanceMode">
                        تفعيل وضع الصيانة
                    </label>
                </div>
                <small class="text-muted">
                    عند تفعيل وضع الصيانة، سيتم منع الوصول للموقع من قبل المستخدمين العاديين
                </small>
                <div class="mt-3">
                    <button class="btn btn-warning btn-sm w-100" onclick="toggleMaintenance()">
                        <i class="fas fa-tools me-1"></i>
                        تطبيق وضع الصيانة
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script>
function clearCache() {
    if (confirm('هل تريد مسح الذاكرة المؤقتة؟')) {
        alert('تم مسح الذاكرة المؤقتة بنجاح');
    }
}

function optimizeSystem() {
    alert('جاري تحسين النظام...\nسيتم تنفيذ هذه الميزة قريباً');
}

function backupDatabase() {
    if (confirm('هل تريد إنشاء نسخة احتياطية من قاعدة البيانات؟')) {
        alert('جاري إنشاء النسخة الاحتياطية...\nسيتم تنفيذ هذه الميزة قريباً');
    }
}

function checkUpdates() {
    alert('جاري فحص التحديثات المتاحة...\nسيتم تنفيذ هذه الميزة قريباً');
}

function toggleMaintenance() {
    const isEnabled = document.getElementById('maintenanceMode').checked;
    const action = isEnabled ? 'تفعيل' : 'إلغاء';
    
    if (confirm(`هل تريد ${action} وضع الصيانة؟`)) {
        alert(`تم ${action} وضع الصيانة`);
    }
}
</script>
@endpush
