@extends('admin.layouts.app')

@section('title', 'لوحة التحكم')
@section('page-title', 'لوحة التحكم الرئيسية')

@section('content')
<!-- Statistics Cards -->
<div class="row g-4 mb-4">
    <div class="col-xl-3 col-md-6">
        <div class="stat-card">
            <div class="stat-number">{{ number_format($stats['total_users']) }}</div>
            <div class="stat-label">إجمالي المستخدمين</div>
            <div class="stat-icon">
                <i class="fas fa-users"></i>
            </div>
            <small class="text-muted">
                <i class="fas fa-arrow-up text-success"></i>
                +{{ $stats['users_today'] }} اليوم
            </small>
        </div>
    </div>
    
    <div class="col-xl-3 col-md-6">
        <div class="stat-card">
            <div class="stat-number">{{ number_format($stats['total_products']) }}</div>
            <div class="stat-label">إجمالي المنتجات</div>
            <div class="stat-icon">
                <i class="fas fa-box"></i>
            </div>
            <small class="text-muted">
                <i class="fas fa-arrow-up text-success"></i>
                +{{ $stats['products_today'] }} اليوم
            </small>
        </div>
    </div>
    
    <div class="col-xl-3 col-md-6">
        <div class="stat-card">
            <div class="stat-number">{{ number_format($stats['total_vendors']) }}</div>
            <div class="stat-label">المتاجر المسجلة</div>
            <div class="stat-icon">
                <i class="fas fa-store"></i>
            </div>
            <small class="text-muted">
                <i class="fas fa-chart-line text-info"></i>
                نشط
            </small>
        </div>
    </div>
    
    <div class="col-xl-3 col-md-6">
        <div class="stat-card">
            <div class="stat-number">{{ number_format($stats['total_categories']) }}</div>
            <div class="stat-label">الفئات المتاحة</div>
            <div class="stat-icon">
                <i class="fas fa-tags"></i>
            </div>
            <small class="text-muted">
                <i class="fas fa-check text-success"></i>
                مكتملة
            </small>
        </div>
    </div>
</div>

<!-- Charts Row -->
<div class="row g-4 mb-4">
    <div class="col-xl-8">
        <div class="table-card">
            <div class="table-header">
                <i class="fas fa-chart-line me-2"></i>
                إحصائيات النمو (آخر 7 أيام)
            </div>
            <div class="p-4">
                <canvas id="growthChart" height="100"></canvas>
            </div>
        </div>
    </div>
    
    <div class="col-xl-4">
        <div class="table-card">
            <div class="table-header">
                <i class="fas fa-chart-pie me-2"></i>
                توزيع المنتجات
            </div>
            <div class="p-4">
                <canvas id="productsChart" height="200"></canvas>
            </div>
        </div>
    </div>
</div>

<!-- Recent Activities -->
<div class="row g-4">
    <div class="col-xl-6">
        <div class="table-card">
            <div class="table-header">
                <i class="fas fa-user-plus me-2"></i>
                المستخدمين الجدد
            </div>
            <div class="table-responsive">
                <table class="table">
                    <thead>
                        <tr>
                            <th>الاسم</th>
                            <th>البريد الإلكتروني</th>
                            <th>تاريخ التسجيل</th>
                            <th>الحالة</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($recent_users as $user)
                        <tr>
                            <td>
                                <div class="d-flex align-items-center">
                                    <div class="admin-avatar me-3" style="width: 35px; height: 35px; font-size: 0.9rem;">
                                        {{ substr($user->name, 0, 1) }}
                                    </div>
                                    {{ $user->name }}
                                </div>
                            </td>
                            <td>{{ $user->email }}</td>
                            <td>{{ $user->created_at->format('Y/m/d') }}</td>
                            <td>
                                <span class="badge badge-success">نشط</span>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="4" class="text-center text-muted py-4">
                                لا توجد مستخدمين جدد
                            </td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    
    <div class="col-xl-6">
        <div class="table-card">
            <div class="table-header">
                <i class="fas fa-box me-2"></i>
                المنتجات الحديثة
            </div>
            <div class="table-responsive">
                <table class="table">
                    <thead>
                        <tr>
                            <th>المنتج</th>
                            <th>البائع</th>
                            <th>السعر</th>
                            <th>الحالة</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($recent_products as $product)
                        <tr>
                            <td>
                                <div class="d-flex align-items-center">
                                    <div class="me-3" style="width: 35px; height: 35px; background: #f8f9fa; border-radius: 8px; display: flex; align-items: center; justify-content: center;">
                                        <i class="fas fa-box text-muted"></i>
                                    </div>
                                    {{ Str::limit($product->name_ar ?? $product->name, 30) }}
                                </div>
                            </td>
                            <td>{{ $product->user->name ?? 'غير محدد' }}</td>
                            <td>{{ number_format($product->price) }} جنيه</td>
                            <td>
                                @if($product->is_active)
                                    <span class="badge badge-success">نشط</span>
                                @else
                                    <span class="badge badge-warning">في الانتظار</span>
                                @endif
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="4" class="text-center text-muted py-4">
                                لا توجد منتجات حديثة
                            </td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<!-- Quick Actions -->
<div class="row g-4 mt-4">
    <div class="col-12">
        <div class="table-card">
            <div class="table-header">
                <i class="fas fa-bolt me-2"></i>
                إجراءات سريعة
            </div>
            <div class="p-4">
                <div class="row g-3">
                    <div class="col-md-3">
                        <a href="{{ route('admin.users') }}" class="btn btn-primary w-100">
                            <i class="fas fa-users me-2"></i>
                            إدارة المستخدمين
                        </a>
                    </div>
                    <div class="col-md-3">
                        <a href="{{ route('admin.products') }}" class="btn btn-primary w-100">
                            <i class="fas fa-box me-2"></i>
                            إدارة المنتجات
                        </a>
                    </div>
                    <div class="col-md-3">
                        <a href="{{ route('admin.vendors') }}" class="btn btn-primary w-100">
                            <i class="fas fa-store me-2"></i>
                            إدارة المتاجر
                        </a>
                    </div>
                    <div class="col-md-3">
                        <a href="{{ route('admin.settings') }}" class="btn btn-primary w-100">
                            <i class="fas fa-cog me-2"></i>
                            الإعدادات
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script>
// Growth Chart
const growthCtx = document.getElementById('growthChart').getContext('2d');
const growthChart = new Chart(growthCtx, {
    type: 'line',
    data: {
        labels: {!! json_encode(array_column($user_growth, 'date')) !!},
        datasets: [{
            label: 'المستخدمين الجدد',
            data: {!! json_encode(array_column($user_growth, 'count')) !!},
            borderColor: '#667eea',
            backgroundColor: 'rgba(102, 126, 234, 0.1)',
            tension: 0.4,
            fill: true
        }, {
            label: 'المنتجات الجديدة',
            data: {!! json_encode(array_column($product_growth, 'count')) !!},
            borderColor: '#764ba2',
            backgroundColor: 'rgba(118, 75, 162, 0.1)',
            tension: 0.4,
            fill: true
        }]
    },
    options: {
        responsive: true,
        maintainAspectRatio: false,
        plugins: {
            legend: {
                position: 'top',
            }
        },
        scales: {
            y: {
                beginAtZero: true
            }
        }
    }
});

// Products Distribution Chart
const productsCtx = document.getElementById('productsChart').getContext('2d');
const productsChart = new Chart(productsCtx, {
    type: 'doughnut',
    data: {
        labels: ['منتجات نشطة', 'منتجات في الانتظار'],
        datasets: [{
            data: [{{ $stats['active_products'] }}, {{ $stats['pending_products'] }}],
            backgroundColor: ['#28a745', '#ffc107'],
            borderWidth: 0
        }]
    },
    options: {
        responsive: true,
        maintainAspectRatio: false,
        plugins: {
            legend: {
                position: 'bottom',
            }
        }
    }
});
</script>
@endpush
