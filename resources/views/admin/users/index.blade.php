@extends('admin.layouts.app')

@section('title', 'إدارة المستخدمين')
@section('page-title', 'إدارة المستخدمين')
@section('page-subtitle', 'إدارة جميع مستخدمي النظام')
@section('page-icon', '<i class="fas fa-users"></i>')

@section('content')
<!-- Statistics Row -->
<div class="row g-4 mb-4">
    <div class="col-md-3">
        <div class="stat-card">
            <div class="stat-number">{{ $users->total() }}</div>
            <div class="stat-label">إجمالي المستخدمين</div>
            <div class="stat-icon">
                <i class="fas fa-users"></i>
            </div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="stat-card">
            <div class="stat-number">{{ $users->where('created_at', '>=', today())->count() }}</div>
            <div class="stat-label">مستخدمين جدد اليوم</div>
            <div class="stat-icon">
                <i class="fas fa-user-plus"></i>
            </div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="stat-card">
            <div class="stat-number">{{ $users->whereNotNull('store_name')->count() }}</div>
            <div class="stat-label">أصحاب متاجر</div>
            <div class="stat-icon">
                <i class="fas fa-store"></i>
            </div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="stat-card">
            <div class="stat-number">{{ $users->sum('products_count') }}</div>
            <div class="stat-label">إجمالي المنتجات</div>
            <div class="stat-icon">
                <i class="fas fa-box"></i>
            </div>
        </div>
    </div>
</div>

<!-- Users Table -->
<div class="table-card">
    <div class="table-header d-flex justify-content-between align-items-center">
        <div>
            <i class="fas fa-users me-2"></i>
            قائمة المستخدمين
        </div>
        <div class="d-flex gap-2">
            <button class="btn btn-outline-light btn-sm">
                <i class="fas fa-download me-1"></i>
                تصدير
            </button>
            <button class="btn btn-outline-light btn-sm">
                <i class="fas fa-filter me-1"></i>
                فلترة
            </button>
        </div>
    </div>
    
    <div class="table-responsive">
        <table class="table">
            <thead>
                <tr>
                    <th>#</th>
                    <th>المستخدم</th>
                    <th>البريد الإلكتروني</th>
                    <th>الهاتف</th>
                    <th>نوع الحساب</th>
                    <th>المنتجات</th>
                    <th>تاريخ التسجيل</th>
                    <th>الحالة</th>
                    <th>الإجراءات</th>
                </tr>
            </thead>
            <tbody>
                @forelse($users as $user)
                <tr>
                    <td>{{ $loop->iteration + ($users->currentPage() - 1) * $users->perPage() }}</td>
                    <td>
                        <div class="d-flex align-items-center">
                            <div class="admin-avatar me-3" style="width: 40px; height: 40px;">
                                {{ substr($user->name, 0, 1) }}
                            </div>
                            <div>
                                <div class="fw-bold">{{ $user->name }}</div>
                                @if($user->store_name)
                                    <small class="text-muted">
                                        <i class="fas fa-store me-1"></i>
                                        {{ $user->store_name }}
                                    </small>
                                @endif
                            </div>
                        </div>
                    </td>
                    <td>{{ $user->email }}</td>
                    <td>{{ $user->phone ?? 'غير محدد' }}</td>
                    <td>
                        @if($user->store_name)
                            <span class="badge badge-warning">
                                <i class="fas fa-store me-1"></i>
                                تاجر
                            </span>
                        @else
                            <span class="badge badge-success">
                                <i class="fas fa-user me-1"></i>
                                مستخدم عادي
                            </span>
                        @endif
                    </td>
                    <td>
                        <span class="badge bg-primary">{{ $user->products_count }}</span>
                    </td>
                    <td>{{ $user->created_at->format('Y/m/d H:i') }}</td>
                    <td>
                        @if($user->email_verified_at)
                            <span class="badge badge-success">مفعل</span>
                        @else
                            <span class="badge badge-warning">غير مفعل</span>
                        @endif
                    </td>
                    <td>
                        <div class="btn-group btn-group-sm">
                            <button class="btn btn-outline-primary" title="عرض التفاصيل">
                                <i class="fas fa-eye"></i>
                            </button>
                            <button class="btn btn-outline-warning" title="تعديل">
                                <i class="fas fa-edit"></i>
                            </button>
                            <button class="btn btn-outline-danger" title="حذف" onclick="confirmDelete({{ $user->id }})">
                                <i class="fas fa-trash"></i>
                            </button>
                        </div>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="9" class="text-center text-muted py-5">
                        <i class="fas fa-users fa-3x mb-3 d-block"></i>
                        لا توجد مستخدمين مسجلين
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
    
    @if($users->hasPages())
    <div class="p-3 border-top">
        {{ $users->links() }}
    </div>
    @endif
</div>
@endsection

@push('scripts')
<script>
function confirmDelete(userId) {
    if (confirm('هل أنت متأكد من حذف هذا المستخدم؟')) {
        // Delete logic here
        alert('سيتم تنفيذ هذه الميزة قريباً');
    }
}
</script>
@endpush
