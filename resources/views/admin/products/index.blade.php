@extends('admin.layouts.app')

@section('title', 'إدارة المنتجات')
@section('page-title', 'إدارة المنتجات')
@section('page-subtitle', 'إدارة جميع منتجات المتاجر')
@section('page-icon', '<i class="fas fa-box"></i>')

@section('content')
<style>
.table-card {
    background: white;
    border-radius: 15px;
    box-shadow: 0 4px 6px rgba(0, 0, 0, 0.05);
    overflow: hidden;
    border: none;
}

.table-header {
    background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
    color: white;
    padding: 1.2rem;
    font-weight: 600;
    font-size: 1.1rem;
}

.table {
    margin-bottom: 0;
}

.table th {
    background: #f8f9fa;
    border: none;
    padding: 1rem 0.75rem;
    font-weight: 600;
    color: #495057;
    font-size: 0.9rem;
}

.table td {
    padding: 1rem 0.75rem;
    vertical-align: middle;
    border-top: 1px solid #e9ecef;
}

.table tbody tr:hover {
    background-color: #f8f9fa;
    transition: background-color 0.2s ease;
}

.product-image-container {
    transition: transform 0.2s ease, box-shadow 0.2s ease;
    cursor: pointer;
    position: relative;
}

.product-image-container:hover {
    transform: scale(1.05);
    box-shadow: 0 4px 12px rgba(0, 0, 0, 0.15);
}

.image-count-badge {
    position: absolute;
    top: -5px;
    right: -5px;
    background: linear-gradient(135deg, #ff6b6b, #ee5a24);
    color: white;
    border-radius: 50%;
    width: 20px;
    height: 20px;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 0.7rem;
    font-weight: bold;
    border: 2px solid white;
    box-shadow: 0 2px 4px rgba(0,0,0,0.2);
}

.product-thumb {
    transition: transform 0.2s ease;
}

.badge {
    font-size: 0.75rem;
    padding: 0.4rem 0.8rem;
    border-radius: 20px;
    font-weight: 500;
}

.badge-success {
    background: linear-gradient(135deg, #28a745, #20c997);
    color: white;
    border: none;
}

.badge-warning {
    background: linear-gradient(135deg, #ffc107, #fd7e14);
    color: white;
    border: none;
}

.badge-danger {
    background: linear-gradient(135deg, #dc3545, #e83e8c);
    color: white;
    border: none;
}

.btn-group-sm .btn {
    padding: 0.4rem 0.6rem;
    border-radius: 6px;
    margin: 0 1px;
}

.admin-avatar {
    background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
    color: white;
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    font-weight: bold;
    font-size: 0.8rem;
}

.stat-card {
    background: white;
    border-radius: 15px;
    padding: 1.5rem;
    box-shadow: 0 4px 6px rgba(0, 0, 0, 0.05);
    border: none;
    position: relative;
    overflow: hidden;
}

.stat-card::before {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    height: 4px;
    background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
}

.stat-number {
    font-size: 2rem;
    font-weight: bold;
    color: #2c3e50;
    margin-bottom: 0.5rem;
}

.stat-label {
    color: #6c757d;
    font-size: 0.9rem;
    font-weight: 500;
}

.stat-icon {
    position: absolute;
    top: 1rem;
    right: 1rem;
    font-size: 2rem;
    color: #e9ecef;
}

@media (max-width: 768px) {
    .table-responsive {
        font-size: 0.85rem;
    }
    
    .product-image-container {
        width: 45px !important;
        height: 45px !important;
    }
    
    .stat-card {
        margin-bottom: 1rem;
    }
}
</style>
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
                            <div class="me-3 product-image-container" style="width: 60px; height: 60px; background: #f8f9fa; border-radius: 10px; display: flex; align-items: center; justify-content: center; overflow: hidden; border: 2px solid #e9ecef;" title="انقر لعرض جميع صور المنتج" onclick="showProductImages({{ $product->id }}, '{{ $product->name }}')">
                                <img src="{{ $product->first_image }}" alt="{{ $product->name }}" class="product-thumb" style="width: 100%; height: 100%; object-fit: cover; border-radius: 8px;" onerror="this.style.display='none'; this.nextElementSibling.style.display='flex';">
                                <div style="display: none; width: 100%; height: 100%; align-items: center; justify-content: center; background: linear-gradient(135deg, #667eea 0%, #764ba2 100%); color: white;">
                                    <i class="fas fa-box"></i>
                                </div>
                                @if(count($product->all_images) > 1)
                                    <div class="image-count-badge">+{{ count($product->all_images) - 1 }}</div>
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

function showProductImages(productId, productName) {
    // Create modal HTML
    const modalHtml = `
        <div class="modal fade" id="productImagesModal" tabindex="-1">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">صور المنتج: ${productName}</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                    </div>
                    <div class="modal-body">
                        <div id="imageCarousel" class="carousel slide" data-bs-ride="carousel">
                            <div class="carousel-inner" id="carouselImages">
                                <div class="text-center p-4">
                                    <div class="spinner-border text-primary" role="status">
                                        <span class="visually-hidden">جاري التحميل...</span>
                                    </div>
                                </div>
                            </div>
                            <button class="carousel-control-prev" type="button" data-bs-target="#imageCarousel" data-bs-slide="prev">
                                <span class="carousel-control-prev-icon"></span>
                            </button>
                            <button class="carousel-control-next" type="button" data-bs-target="#imageCarousel" data-bs-slide="next">
                                <span class="carousel-control-next-icon"></span>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    `;
    
    // Remove existing modal if any
    const existingModal = document.getElementById('productImagesModal');
    if (existingModal) {
        existingModal.remove();
    }
    
    // Add modal to body
    document.body.insertAdjacentHTML('beforeend', modalHtml);
    
    // Show modal
    const modal = new bootstrap.Modal(document.getElementById('productImagesModal'));
    modal.show();
    
    // Fetch product images (simulate API call)
    setTimeout(() => {
        // This would be replaced with actual API call
        const sampleImages = [
            'https://images.unsplash.com/photo-1560472354-b33ff0c44a43?w=800',
            'https://images.unsplash.com/photo-1526170375885-4d8ecf77b99f?w=800',
            'https://images.unsplash.com/photo-1542291026-7eec264c27ff?w=800'
        ];
        
        let carouselContent = '';
        sampleImages.forEach((image, index) => {
            carouselContent += `
                <div class="carousel-item ${index === 0 ? 'active' : ''}">
                    <img src="${image}" class="d-block w-100" style="height: 400px; object-fit: contain; background: #f8f9fa;" alt="صورة المنتج ${index + 1}">
                </div>
            `;
        });
        
        document.getElementById('carouselImages').innerHTML = carouselContent;
    }, 500);
}
</script>
@endpush
