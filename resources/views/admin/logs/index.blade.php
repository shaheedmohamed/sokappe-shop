@extends('admin.layouts.app')

@section('title', 'سجل الأنشطة')
@section('page-title', 'سجل الأنشطة والعمليات')

@section('content')
<!-- Filter Controls -->
<div class="row g-4 mb-4">
    <div class="col-12">
        <div class="table-card">
            <div class="table-header">
                <i class="fas fa-filter me-2"></i>
                فلترة السجلات
            </div>
            <div class="p-4">
                <div class="row g-3">
                    <div class="col-md-3">
                        <label class="form-label">نوع العملية</label>
                        <select class="form-select">
                            <option value="">جميع العمليات</option>
                            <option value="login">تسجيل دخول</option>
                            <option value="logout">تسجيل خروج</option>
                            <option value="product_add">إضافة منتج</option>
                            <option value="product_edit">تعديل منتج</option>
                            <option value="user_register">تسجيل مستخدم</option>
                        </select>
                    </div>
                    <div class="col-md-3">
                        <label class="form-label">الحالة</label>
                        <select class="form-select">
                            <option value="">جميع الحالات</option>
                            <option value="success">نجح</option>
                            <option value="failed">فشل</option>
                            <option value="warning">تحذير</option>
                        </select>
                    </div>
                    <div class="col-md-3">
                        <label class="form-label">من تاريخ</label>
                        <input type="date" class="form-control" value="{{ date('Y-m-d') }}">
                    </div>
                    <div class="col-md-3">
                        <label class="form-label">إلى تاريخ</label>
                        <input type="date" class="form-control" value="{{ date('Y-m-d') }}">
                    </div>
                </div>
                <div class="row mt-3">
                    <div class="col-12">
                        <button class="btn btn-primary me-2">
                            <i class="fas fa-search me-1"></i>
                            بحث
                        </button>
                        <button class="btn btn-outline-secondary me-2">
                            <i class="fas fa-refresh me-1"></i>
                            إعادة تعيين
                        </button>
                        <button class="btn btn-outline-success">
                            <i class="fas fa-download me-1"></i>
                            تصدير النتائج
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Logs Table -->
<div class="table-card">
    <div class="table-header d-flex justify-content-between align-items-center">
        <div>
            <i class="fas fa-history me-2"></i>
            سجل العمليات الأخيرة
        </div>
        <div>
            <span class="badge bg-light text-dark">{{ count($logs) }} عملية</span>
        </div>
    </div>
    
    <div class="table-responsive">
        <table class="table">
            <thead>
                <tr>
                    <th>#</th>
                    <th>المستخدم</th>
                    <th>العملية</th>
                    <th>عنوان IP</th>
                    <th>التوقيت</th>
                    <th>الحالة</th>
                    <th>التفاصيل</th>
                </tr>
            </thead>
            <tbody>
                @forelse($logs as $log)
                <tr>
                    <td>{{ $log['id'] }}</td>
                    <td>
                        <div class="d-flex align-items-center">
                            <div class="admin-avatar me-2" style="width: 30px; height: 30px; font-size: 0.8rem;">
                                {{ substr($log['user'], 0, 1) }}
                            </div>
                            {{ $log['user'] }}
                        </div>
                    </td>
                    <td>
                        <div class="d-flex align-items-center">
                            @switch($log['action'])
                                @case('تسجيل دخول')
                                    <i class="fas fa-sign-in-alt text-success me-2"></i>
                                    @break
                                @case('إضافة منتج')
                                    <i class="fas fa-plus-circle text-primary me-2"></i>
                                    @break
                                @case('محاولة تسجيل دخول فاشلة')
                                    <i class="fas fa-exclamation-triangle text-danger me-2"></i>
                                    @break
                                @default
                                    <i class="fas fa-info-circle text-info me-2"></i>
                            @endswitch
                            {{ $log['action'] }}
                        </div>
                    </td>
                    <td>
                        <code class="bg-light px-2 py-1 rounded">{{ $log['ip'] }}</code>
                    </td>
                    <td>
                        <div>{{ $log['time'] }}</div>
                        <small class="text-muted">{{ \Carbon\Carbon::parse($log['time'])->diffForHumans() }}</small>
                    </td>
                    <td>
                        @switch($log['status'])
                            @case('success')
                                <span class="badge badge-success">
                                    <i class="fas fa-check me-1"></i>
                                    نجح
                                </span>
                                @break
                            @case('failed')
                                <span class="badge badge-danger">
                                    <i class="fas fa-times me-1"></i>
                                    فشل
                                </span>
                                @break
                            @default
                                <span class="badge badge-warning">
                                    <i class="fas fa-question me-1"></i>
                                    غير محدد
                                </span>
                        @endswitch
                    </td>
                    <td>
                        <button class="btn btn-outline-primary btn-sm" onclick="showLogDetails({{ $log['id'] }})">
                            <i class="fas fa-eye"></i>
                        </button>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="7" class="text-center text-muted py-5">
                        <i class="fas fa-history fa-3x mb-3 d-block"></i>
                        لا توجد عمليات مسجلة
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>

<!-- Real-time Activity -->
<div class="row g-4 mt-4">
    <div class="col-md-6">
        <div class="table-card">
            <div class="table-header">
                <i class="fas fa-pulse me-2"></i>
                النشاط المباشر
                <span class="badge bg-success ms-2">مباشر</span>
            </div>
            <div class="p-4">
                <div id="realtime-activity">
                    <div class="d-flex align-items-center mb-3">
                        <div class="admin-avatar me-3" style="width: 35px; height: 35px;">أ</div>
                        <div class="flex-grow-1">
                            <div class="fw-bold">أحمد محمد</div>
                            <small class="text-muted">قام بتسجيل الدخول</small>
                        </div>
                        <small class="text-muted">الآن</small>
                    </div>
                    <div class="d-flex align-items-center mb-3">
                        <div class="admin-avatar me-3" style="width: 35px; height: 35px;">ف</div>
                        <div class="flex-grow-1">
                            <div class="fw-bold">فاطمة علي</div>
                            <small class="text-muted">أضافت منتج جديد</small>
                        </div>
                        <small class="text-muted">منذ دقيقة</small>
                    </div>
                    <div class="d-flex align-items-center">
                        <div class="admin-avatar me-3" style="width: 35px; height: 35px;">م</div>
                        <div class="flex-grow-1">
                            <div class="fw-bold">محمد حسن</div>
                            <small class="text-muted">عدل معلومات المتجر</small>
                        </div>
                        <small class="text-muted">منذ 3 دقائق</small>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <div class="col-md-6">
        <div class="table-card">
            <div class="table-header">
                <i class="fas fa-chart-bar me-2"></i>
                إحصائيات اليوم
            </div>
            <div class="p-4">
                <div class="row g-3">
                    <div class="col-6">
                        <div class="text-center">
                            <div class="h3 text-success mb-1">24</div>
                            <small class="text-muted">عمليات ناجحة</small>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="text-center">
                            <div class="h3 text-danger mb-1">3</div>
                            <small class="text-muted">عمليات فاشلة</small>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="text-center">
                            <div class="h3 text-primary mb-1">12</div>
                            <small class="text-muted">تسجيلات دخول</small>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="text-center">
                            <div class="h3 text-warning mb-1">8</div>
                            <small class="text-muted">منتجات جديدة</small>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script>
function showLogDetails(logId) {
    alert(`عرض تفاصيل العملية رقم: ${logId}\nسيتم تنفيذ هذه الميزة قريباً`);
}

// Simulate real-time updates
setInterval(function() {
    // This would typically fetch new logs via AJAX
    console.log('Checking for new activity...');
}, 30000);
</script>
@endpush
