@extends('admin.layouts.app')

@section('title', 'إدارة المتاجر')
@section('page-title', 'إدارة المتاجر')
@section('page-subtitle', 'إدارة المتاجر المقبولة والنشطة')
@section('page-icon', '<i class="fas fa-store"></i>')

@section('content')
<!-- Statistics Row -->
<div class="row g-4 mb-4">
    <div class="col-md-3">
        <div class="stat-card">
            <div class="stat-number text-success">{{ $vendors->total() }}</div>
            <div class="stat-label">متاجر مقبولة</div>
            <div class="stat-icon">
                <i class="fas fa-check-circle"></i>
            </div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="stat-card">
            <div class="stat-number text-warning">
                @php
                    $pendingCount = \App\Models\User::whereNotNull('store_name')->where('store_status', 'pending')->count();
                @endphp
                {{ $pendingCount }}
            </div>
            <div class="stat-label">في الانتظار</div>
            <div class="stat-icon">
                <i class="fas fa-clock"></i>
            </div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="stat-card">
            <div class="stat-number text-danger">
                @php
                    $rejectedCount = \App\Models\User::whereNotNull('store_name')->where('store_status', 'rejected')->count();
                @endphp
                {{ $rejectedCount }}
            </div>
            <div class="stat-label">مرفوضة</div>
            <div class="stat-icon">
                <i class="fas fa-times-circle"></i>
            </div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="stat-card">
            <div class="stat-number">{{ $vendors->sum('products_count') }}</div>
            <div class="stat-label">إجمالي المنتجات</div>
            <div class="stat-icon">
                <i class="fas fa-box"></i>
            </div>
        </div>
    </div>
</div>

<!-- Navigation Tabs -->
<div class="row g-4 mb-4">
    <div class="col-12">
        <div class="table-card">
            <div class="p-3">
                <ul class="nav nav-pills" role="tablist">
                    <li class="nav-item" role="presentation">
                        <a class="nav-link active" href="{{ route('admin.vendors') }}">
                            <i class="fas fa-check-circle me-2"></i>
                            المتاجر المقبولة ({{ $vendors->total() }})
                        </a>
                    </li>
                    <li class="nav-item" role="presentation">
                        <a class="nav-link" href="{{ route('admin.vendors.rejected') }}">
                            <i class="fas fa-times-circle me-2"></i>
                            المتاجر المرفوضة ({{ $rejectedCount }})
                        </a>
                    </li>
                    <li class="nav-item" role="presentation">
                        <a class="nav-link" href="{{ route('admin.store-approvals') }}">
                            <i class="fas fa-clock me-2"></i>
                            طلبات الانتظار ({{ $pendingCount }})
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>

<!-- Statistics Row -->
<div class="row g-4 mb-4" style="display: none;">
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
        <i class="fas fa-check-circle me-2"></i>
        المتاجر المقبولة والنشطة
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
                                <br>
                                <span class="badge badge-success">مقبول ونشط</span>
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
                            <button class="btn btn-outline-danger" title="رفض المتجر" onclick="rejectStore({{ $vendor->id }}, '{{ $vendor->store_name }}')">
                                <i class="fas fa-ban"></i>
                            </button>
                            <button class="btn btn-outline-secondary" title="حذف" onclick="confirmDelete({{ $vendor->id }})">
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

<!-- Reject Store Modal -->
<div class="modal fade" id="rejectStoreModal" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">رفض المتجر</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                <div class="alert alert-warning">
                    <i class="fas fa-exclamation-triangle me-2"></i>
                    <strong>تحذير:</strong> سيتم رفض المتجر وإزالته من قائمة المتاجر النشطة
                </div>
                
                <div class="mb-3">
                    <label for="rejectionReason" class="form-label">سبب الرفض <span class="text-danger">*</span></label>
                    <textarea id="rejectionReason" 
                              class="form-control" 
                              rows="4" 
                              placeholder="اكتب سبب رفض المتجر بوضوح..."
                              required></textarea>
                    <div class="form-text">سيتم إرسال هذا السبب لصاحب المتجر</div>
                </div>
                
                <div class="mb-3">
                    <strong>المتجر المراد رفضه:</strong>
                    <div class="bg-light p-2 rounded mt-1">
                        <span id="storeNameToReject"></span>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">إلغاء</button>
                <button type="button" class="btn btn-danger" onclick="confirmRejectStore()">
                    <i class="fas fa-ban me-2"></i>
                    رفض المتجر
                </button>
            </div>
        </div>
    </div>
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

let currentStoreId = null;

function rejectStore(storeId, storeName) {
    currentStoreId = storeId;
    document.getElementById('storeNameToReject').textContent = storeName;
    document.getElementById('rejectionReason').value = '';
    
    const modal = new bootstrap.Modal(document.getElementById('rejectStoreModal'));
    modal.show();
}

function confirmRejectStore() {
    const reason = document.getElementById('rejectionReason').value.trim();
    
    if (!reason) {
        alert('يجب كتابة سبب الرفض');
        return;
    }
    
    if (!confirm('هل أنت متأكد من رفض هذا المتجر؟ سيتم إزالته من قائمة المتاجر النشطة.')) {
        return;
    }
    
    fetch(`/admin/store-approvals/${currentStoreId}/reject`, {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
            'X-CSRF-TOKEN': '{{ csrf_token() }}'
        },
        body: JSON.stringify({
            reason: reason
        })
    })
    .then(response => response.json())
    .then(data => {
        if (data.success) {
            // Hide modal
            const modal = bootstrap.Modal.getInstance(document.getElementById('rejectStoreModal'));
            modal.hide();
            
            // Show success message
            alert(`تم رفض متجر "${data.store_name}" بنجاح`);
            
            // Reload page to update the list
            location.reload();
        } else {
            alert('حدث خطأ: ' + data.message);
        }
    })
    .catch(error => {
        console.error('Error:', error);
        alert('حدث خطأ أثناء رفض المتجر');
    });
}
</script>
@endpush
