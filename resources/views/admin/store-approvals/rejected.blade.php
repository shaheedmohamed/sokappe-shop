@extends('admin.layouts.app')

@section('title', 'الطلبات المرفوضة')
@section('page-title', 'الطلبات المرفوضة')
@section('page-subtitle', 'إدارة طلبات المتاجر المرفوضة')
@section('page-icon', '<i class="fas fa-ban"></i>')

@section('content')
<!-- Rejected Requests Alert - في المقدمة -->
<div class="row mb-4">
    <div class="col-12">
        @if($stats['total'] > 0)
        <div class="alert alert-danger border-0 shadow-sm" style="background: linear-gradient(135deg, #f8d7da 0%, #f5c6cb 100%);">
            <div class="d-flex align-items-center justify-content-between">
                <div class="d-flex align-items-center">
                    <i class="fas fa-exclamation-triangle fa-2x me-3 text-danger"></i>
                    <div>
                        <h5 class="alert-heading mb-1 text-danger">⚠️ انتباه: طلبات مرفوضة تحتاج مراجعة</h5>
                        <p class="mb-0">يوجد <strong>{{ $stats['total'] }}</strong> طلب مرفوض يحتاج لمراجعة وإتخاذ إجراء</p>
                    </div>
                </div>
                <div class="text-end">
                    <span class="badge bg-danger fs-6 px-3 py-2">{{ $stats['total'] }}</span>
                </div>
            </div>
        </div>
        @else
        <div class="alert alert-success border-0 shadow-sm">
            <div class="d-flex align-items-center">
                <i class="fas fa-check-circle fa-2x me-3 text-success"></i>
                <div>
                    <h5 class="alert-heading mb-1 text-success">✅ ممتاز! لا توجد طلبات مرفوضة</h5>
                    <p class="mb-0">جميع الطلبات تم التعامل معها بنجاح</p>
                </div>
            </div>
        </div>
        @endif
    </div>
</div>
<div class="table-card border-danger" style="border-width: 2px !important;">
    <div class="table-header bg-danger text-white">
        <i class="fas fa-ban me-2"></i>
        جدول الطلبات المرفوضة - يحتاج إجراء فوري
    </div>
    
    <div class="table-responsive">
        <table class="table">
            <thead>
                <tr>
                    <th>#</th>
                    <th>المتجر</th>
                    <th>صاحب المتجر</th>
                    <th>البريد الإلكتروني</th>
                    <th>سبب الرفض</th>
                    <th>تاريخ الرفض</th>
                    <th>الإجراءات</th>
                </tr>
            </thead>
            <tbody>
                @forelse($rejectedStores as $store)
                <tr id="store-{{ $store->id }}">
                    <td>{{ $loop->iteration + ($rejectedStores->currentPage() - 1) * $rejectedStores->perPage() }}</td>
                    <td>
                        <div class="d-flex align-items-center">
                            <div class="me-3" style="width: 50px; height: 50px; background: linear-gradient(135deg, #dc3545 0%, #c82333 100%); border-radius: 10px; display: flex; align-items: center; justify-content: center; color: white; font-weight: bold;">
                                {{ substr($store->store_name, 0, 2) }}
                            </div>
                            <div>
                                <div class="fw-bold">{{ $store->store_name }}</div>
                                <small class="text-muted">{{ Str::limit($store->store_description ?? 'لا يوجد وصف', 40) }}</small>
                                <br>
                                <span class="badge badge-danger">مرفوض</span>
                            </div>
                        </div>
                    </td>
                    <td>
                        <div>
                            <div class="fw-semibold">{{ $store->name }}</div>
                            <small class="text-muted">{{ $store->phone ?? 'غير محدد' }}</small>
                        </div>
                    </td>
                    <td>{{ $store->email }}</td>
                    <td>
                        <div class="text-danger" style="max-width: 200px;">
                            <small title="{{ $store->rejection_reason }}">
                                {{ Str::limit($store->rejection_reason, 60) }}
                            </small>
                        </div>
                    </td>
                    <td>
                        <div>
                            {{ $store->updated_at->format('Y/m/d') }}
                            <br>
                            <small class="text-muted">{{ $store->updated_at->format('H:i') }}</small>
                        </div>
                    </td>
                    <td>
                        <div class="btn-group btn-group-sm">
                            <button class="btn btn-outline-info" title="عرض التفاصيل" onclick="viewStoreDetails({{ $store->id }})">
                                <i class="fas fa-eye"></i>
                            </button>
                            <button class="btn btn-outline-success" title="قبول المتجر" onclick="approveRejectedStore({{ $store->id }}, '{{ $store->store_name }}')">
                                <i class="fas fa-check"></i>
                            </button>
                            <button class="btn btn-outline-primary" title="عرض سبب الرفض" onclick="showRejectionReason('{{ $store->store_name }}', '{{ $store->rejection_reason }}')">
                                <i class="fas fa-info-circle"></i>
                            </button>
                        </div>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="7" class="text-center text-muted py-5">
                        <i class="fas fa-check-circle fa-3x mb-3 d-block text-success"></i>
                        لا توجد طلبات مرفوضة
                        <br>
                        <small>جميع الطلبات إما مقبولة أو في انتظار المراجعة</small>
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
    
    @if($rejectedStores->hasPages())
    <div class="p-3 border-top">
        {{ $rejectedStores->links() }}
    </div>
    @endif
</div>

<!-- Navigation Tabs -->
<div class="row g-4 mb-4 mt-4">
    <div class="col-12">
        <div class="table-card">
            <div class="p-3">
                <ul class="nav nav-pills" role="tablist">
                    <li class="nav-item" role="presentation">
                        <a class="nav-link" href="{{ route('admin.store-approvals') }}">
                            <i class="fas fa-clock me-2"></i>
                            طلبات الانتظار ({{ $stats['pending'] }})
                        </a>
                    </li>
                    <li class="nav-item" role="presentation">
                        <a class="nav-link active" href="{{ route('admin.store-approvals.rejected') }}">
                            <i class="fas fa-times-circle me-2"></i>
                            الطلبات المرفوضة ({{ $stats['total'] }})
                        </a>
                    </li>
                    <li class="nav-item" role="presentation">
                        <a class="nav-link" href="{{ route('admin.vendors') }}">
                            <i class="fas fa-check-circle me-2"></i>
                            المتاجر المقبولة ({{ $stats['approved'] }})
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>

<!-- Statistics Cards -->
<div class="row g-4 mb-4">
    <div class="col-xl-3 col-md-6">
        <div class="stat-card">
            <div class="stat-number text-danger">{{ $stats['total'] }}</div>
            <div class="stat-label">طلبات مرفوضة</div>
            <div class="stat-icon">
                <i class="fas fa-times-circle"></i>
            </div>
        </div>
    </div>
    
    <div class="col-xl-3 col-md-6">
        <div class="stat-card">
            <div class="stat-number text-warning">{{ $stats['this_week'] }}</div>
            <div class="stat-label">مرفوضة هذا الأسبوع</div>
            <div class="stat-icon">
                <i class="fas fa-calendar-week"></i>
            </div>
        </div>
    </div>
    
    <div class="col-xl-3 col-md-6">
        <div class="stat-card">
            <div class="stat-number text-info">{{ $stats['today'] }}</div>
            <div class="stat-label">مرفوضة اليوم</div>
            <div class="stat-icon">
                <i class="fas fa-calendar-day"></i>
            </div>
        </div>
    </div>
    
    <div class="col-xl-3 col-md-6">
        <div class="stat-card">
            <div class="stat-number text-success">{{ $stats['approved'] }}</div>
            <div class="stat-label">طلبات مقبولة</div>
            <div class="stat-icon">
                <i class="fas fa-check-circle"></i>
            </div>
        </div>
    </div>
</div>

<!-- Rejection Reason Modal -->
<div class="modal fade" id="rejectionReasonModal" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">سبب رفض الطلب</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                <div class="alert alert-danger">
                    <h6 class="alert-heading">
                        <i class="fas fa-store me-2"></i>
                        <span id="rejectedStoreName"></span>
                    </h6>
                    <hr>
                    <p class="mb-0" id="rejectionReasonText"></p>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">إغلاق</button>
            </div>
        </div>
    </div>
</div>
@endsection

@push('styles')
<style>
.table-card.border-danger {
    box-shadow: 0 0 20px rgba(220, 53, 69, 0.3) !important;
    animation: pulse-border 2s infinite;
}

@keyframes pulse-border {
    0% { box-shadow: 0 0 20px rgba(220, 53, 69, 0.3); }
    50% { box-shadow: 0 0 30px rgba(220, 53, 69, 0.5); }
    100% { box-shadow: 0 0 20px rgba(220, 53, 69, 0.3); }
}

.alert.alert-danger {
    animation: slide-in 0.5s ease-out;
}

@keyframes slide-in {
    from {
        opacity: 0;
        transform: translateY(-20px);
    }
    to {
        opacity: 1;
        transform: translateY(0);
    }
}

.table-header.bg-danger {
    background: linear-gradient(135deg, #dc3545 0%, #c82333 100%) !important;
    font-weight: 600;
    font-size: 1.1rem;
}

.badge.bg-danger {
    animation: bounce 1s infinite;
}

@keyframes bounce {
    0%, 20%, 50%, 80%, 100% {
        transform: translateY(0);
    }
    40% {
        transform: translateY(-5px);
    }
    60% {
        transform: translateY(-3px);
    }
}
</style>
@endpush

@push('scripts')
<script>
function viewStoreDetails(storeId) {
    // Redirect to store details page
    window.location.href = `/admin/store-approvals/${storeId}`;
}

function approveRejectedStore(storeId, storeName) {
    if (confirm(`هل أنت متأكد من الموافقة على طلب متجر "${storeName}" المرفوض سابقاً؟`)) {
        fetch(`/admin/store-approvals/${storeId}/approve`, {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': '{{ csrf_token() }}'
            }
        })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                // Remove row from rejected table
                document.getElementById(`store-${storeId}`).remove();
                
                // Show success message
                alert(`تم الموافقة على طلب متجر "${data.store_name}" بنجاح`);
                
                // Reload page to update stats
                location.reload();
            } else {
                alert('حدث خطأ: ' + data.message);
            }
        })
        .catch(error => {
            console.error('Error:', error);
            alert('حدث خطأ أثناء الموافقة على الطلب');
        });
    }
}

function showRejectionReason(storeName, reason) {
    document.getElementById('rejectedStoreName').textContent = storeName;
    document.getElementById('rejectionReasonText').textContent = reason;
    
    const modal = new bootstrap.Modal(document.getElementById('rejectionReasonModal'));
    modal.show();
}
</script>
@endpush
