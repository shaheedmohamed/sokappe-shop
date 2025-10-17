@extends('admin.layouts.app')

@section('title', 'إدارة المتاجر')
@section('page-title', 'إدارة المتاجر')

@section('content')
<!-- Statistics Row -->
<div class="row g-4 mb-4">
    <div class="col-md-4">
        <div class="stat-card">
            <div class="stat-number">{{ $vendors->total() }}</div>
            <div class="stat-label">إجمالي المتاجر</div>
            <div class="stat-icon">
                <i class="fas fa-store"></i>
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="stat-card">
            <div class="stat-number">{{ $vendors->sum('products_count') }}</div>
            <div class="stat-label">إجمالي المنتجات</div>
            <div class="stat-icon">
                <i class="fas fa-box"></i>
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="stat-card">
            <div class="stat-number">{{ $vendors->where('created_at', '>=', today())->count() }}</div>
            <div class="stat-label">متاجر جديدة اليوم</div>
            <div class="stat-icon">
                <i class="fas fa-plus-circle"></i>
            </div>
        </div>
    </div>
</div>

<!-- Vendors Table -->
<div class="table-card">
    <div class="table-header">
        <i class="fas fa-store me-2"></i>
        قائمة المتاجر المسجلة
    </div>
    
    <div class="table-responsive">
        <table class="table">
            <thead>
                <tr>
                    <th>#</th>
                    <th>المتجر</th>
                    <th>صاحب المتجر</th>
                    <th>البريد الإلكتروني</th>
                    <th>الهاتف</th>
                    <th>المنتجات</th>
                    <th>تاريخ التسجيل</th>
                    <th>الحالة</th>
                    <th>الإجراءات</th>
                </tr>
            </thead>
            <tbody>
                @forelse($vendors as $vendor)
                <tr>
                    <td>{{ $loop->iteration + ($vendors->currentPage() - 1) * $vendors->perPage() }}</td>
                    <td>
                        <div class="d-flex align-items-center">
                            <div class="me-3" style="width: 50px; height: 50px; background: linear-gradient(135deg, #667eea 0%, #764ba2 100%); border-radius: 10px; display: flex; align-items: center; justify-content: center; color: white; font-weight: bold;">
                                {{ substr($vendor->store_name, 0, 2) }}
                            </div>
                            <div>
                                <div class="fw-bold">{{ $vendor->store_name }}</div>
                                <small class="text-muted">{{ Str::limit($vendor->store_description ?? 'لا يوجد وصف', 40) }}</small>
                            </div>
                        </div>
                    </td>
                    <td>{{ $vendor->name }}</td>
                    <td>{{ $vendor->email }}</td>
                    <td>{{ $vendor->phone ?? 'غير محدد' }}</td>
                    <td>
                        <span class="badge bg-primary">{{ $vendor->products_count }}</span>
                    </td>
                    <td>{{ $vendor->created_at->format('Y/m/d') }}</td>
                    <td>
                        <span class="badge badge-success">نشط</span>
                    </td>
                    <td>
                        <div class="btn-group btn-group-sm">
                            <button class="btn btn-outline-primary" title="عرض المتجر" onclick="viewStore({{ $vendor->id }})">
                                <i class="fas fa-eye"></i>
                            </button>
                            <button class="btn btn-outline-warning" title="تعديل">
                                <i class="fas fa-edit"></i>
                            </button>
                            <button class="btn btn-outline-danger" title="حذف" onclick="confirmDelete({{ $vendor->id }})">
                                <i class="fas fa-trash"></i>
                            </button>
                        </div>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="9" class="text-center text-muted py-5">
                        <i class="fas fa-store fa-3x mb-3 d-block"></i>
                        لا توجد متاجر مسجلة
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
    
    @if($vendors->hasPages())
    <div class="p-3 border-top">
        {{ $vendors->links() }}
    </div>
    @endif
</div>
@endsection

@push('scripts')
<script>
function viewStore(vendorId) {
    window.open(`/vendors/${vendorId}`, '_blank');
}

function confirmDelete(vendorId) {
    if (confirm('هل أنت متأكد من حذف هذا المتجر؟')) {
        alert('سيتم تنفيذ هذه الميزة قريباً');
    }
}
</script>
@endpush
