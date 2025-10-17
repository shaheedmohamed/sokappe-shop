@extends('admin.layouts.app')

@section('title', 'إدارة المنتجات')
@section('page-title', 'إدارة المنتجات')

@section('content')
<!-- Statistics Row -->
<div class="row g-4 mb-4">
    <div class="col-md-3">
        <div class="stat-card">
            <div class="stat-number">{{ $products->total() }}</div>
            <div class="stat-label">إجمالي المنتجات</div>
            <div class="stat-icon">
                <i class="fas fa-box"></i>
            </div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="stat-card">
            <div class="stat-number">{{ $products->where('is_active', true)->count() }}</div>
            <div class="stat-label">منتجات نشطة</div>
            <div class="stat-icon">
                <i class="fas fa-check-circle"></i>
            </div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="stat-card">
            <div class="stat-number">{{ $products->where('is_active', false)->count() }}</div>
            <div class="stat-label">في الانتظار</div>
            <div class="stat-icon">
                <i class="fas fa-clock"></i>
            </div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="stat-card">
            <div class="stat-number">{{ $products->where('created_at', '>=', today())->count() }}</div>
            <div class="stat-label">منتجات اليوم</div>
            <div class="stat-icon">
                <i class="fas fa-plus-circle"></i>
            </div>
        </div>
    </div>
</div>

<!-- Products Table -->
<div class="table-card">
    <div class="table-header d-flex justify-content-between align-items-center">
        <div>
            <i class="fas fa-box me-2"></i>
            قائمة المنتجات
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
                    <th>المنتج</th>
                    <th>البائع</th>
                    <th>الفئة</th>
                    <th>السعر</th>
                    <th>المخزون</th>
                    <th>المشاهدات</th>
                    <th>تاريخ الإضافة</th>
                    <th>الحالة</th>
                    <th>الإجراءات</th>
                </tr>
            </thead>
            <tbody>
                @forelse($products as $product)
                <tr>
                    <td>{{ $loop->iteration + ($products->currentPage() - 1) * $products->perPage() }}</td>
                    <td>
                        <div class="d-flex align-items-center">
                            <div class="me-3" style="width: 50px; height: 50px; background: #f8f9fa; border-radius: 8px; display: flex; align-items: center; justify-content: center;">
                                @if($product->featured_image)
                                    <img src="{{ asset('storage/' . $product->featured_image) }}" alt="{{ $product->name }}" style="width: 100%; height: 100%; object-fit: cover; border-radius: 8px;">
                                @else
                                    <i class="fas fa-image text-muted"></i>
                                @endif
                            </div>
                            <div>
                                <div class="fw-bold">{{ Str::limit($product->name_ar ?? $product->name, 30) }}</div>
                                <small class="text-muted">ID: {{ $product->id }}</small>
                            </div>
                        </div>
                    </td>
                    <td>
                        <div class="d-flex align-items-center">
                            <div class="admin-avatar me-2" style="width: 30px; height: 30px; font-size: 0.8rem;">
                                {{ substr($product->user->name ?? 'غ', 0, 1) }}
                            </div>
                            {{ $product->user->name ?? 'غير محدد' }}
                        </div>
                    </td>
                    <td>
                        <span class="badge bg-secondary">
                            {{ $product->category->name_ar ?? $product->category->name ?? 'غير محدد' }}
                        </span>
                    </td>
                    <td>
                        <strong>{{ number_format($product->price) }}</strong>
                        <small class="text-muted d-block">جنيه</small>
                    </td>
                    <td>
                        @if($product->stock_quantity > 10)
                            <span class="badge badge-success">{{ $product->stock_quantity }}</span>
                        @elseif($product->stock_quantity > 0)
                            <span class="badge badge-warning">{{ $product->stock_quantity }}</span>
                        @else
                            <span class="badge badge-danger">نفد المخزون</span>
                        @endif
                    </td>
                    <td>
                        <i class="fas fa-eye text-muted me-1"></i>
                        {{ $product->views_count ?? 0 }}
                    </td>
                    <td>{{ $product->created_at->format('Y/m/d') }}</td>
                    <td>
                        @if($product->is_active)
                            <span class="badge badge-success">نشط</span>
                        @else
                            <span class="badge badge-warning">في الانتظار</span>
                        @endif
                    </td>
                    <td>
                        <div class="btn-group btn-group-sm">
                            <button class="btn btn-outline-primary" title="عرض المنتج" onclick="viewProduct({{ $product->id }})">
                                <i class="fas fa-eye"></i>
                            </button>
                            <button class="btn btn-outline-success" title="تفعيل/إلغاء تفعيل" onclick="toggleStatus({{ $product->id }})">
                                @if($product->is_active)
                                    <i class="fas fa-toggle-on"></i>
                                @else
                                    <i class="fas fa-toggle-off"></i>
                                @endif
                            </button>
                            <button class="btn btn-outline-danger" title="حذف" onclick="confirmDelete({{ $product->id }})">
                                <i class="fas fa-trash"></i>
                            </button>
                        </div>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="10" class="text-center text-muted py-5">
                        <i class="fas fa-box fa-3x mb-3 d-block"></i>
                        لا توجد منتجات مضافة
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
    
    @if($products->hasPages())
    <div class="p-3 border-top">
        {{ $products->links() }}
    </div>
    @endif
</div>
@endsection

@push('scripts')
<script>
function viewProduct(productId) {
    window.open(`/product/${productId}`, '_blank');
}

function toggleStatus(productId) {
    if (confirm('هل تريد تغيير حالة هذا المنتج؟')) {
        // Toggle status logic here
        alert('سيتم تنفيذ هذه الميزة قريباً');
    }
}

function confirmDelete(productId) {
    if (confirm('هل أنت متأكد من حذف هذا المنتج؟\nهذا الإجراء لا يمكن التراجع عنه.')) {
        // Delete logic here
        alert('سيتم تنفيذ هذه الميزة قريباً');
    }
}
</script>
@endpush
