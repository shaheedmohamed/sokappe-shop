@extends('admin.layouts.app')

@section('title', 'المتاجر المرفوضة')
@section('page-title', 'المتاجر المرفوضة')

@section('content')
<!-- Statistics Cards -->
<div class="row g-4 mb-4">
    <div class="col-xl-3 col-md-6">
        <div class="stat-card">
            <div class="stat-number text-danger">{{ $rejectedVendors->total() }}</div>
            <div class="stat-label">متاجر مرفوضة</div>
            <div class="stat-icon">
                <i class="fas fa-times-circle"></i>
            </div>
        </div>
    </div>
    
    <div class="col-xl-3 col-md-6">
        <div class="stat-card">
            <div class="stat-number text-warning">{{ $rejectedVendors->where('updated_at', '>=', now()->subDays(7))->count() }}</div>
            <div class="stat-label">مرفوضة هذا الأسبوع</div>
            <div class="stat-icon">
                <i class="fas fa-calendar-week"></i>
            </div>
        </div>
    </div>
    
    <div class="col-xl-3 col-md-6">
        <div class="stat-card">
            <div class="stat-number text-info">{{ $rejectedVendors->where('updated_at', '>=', now()->subDay())->count() }}</div>
            <div class="stat-label">مرفوضة اليوم</div>
            <div class="stat-icon">
                <i class="fas fa-calendar-day"></i>
            </div>
        </div>
    </div>
    
    <div class="col-xl-3 col-md-6">
        <div class="stat-card">
            <div class="stat-number text-success">
                @php
                    $approvedCount = \App\Models\User::whereNotNull('store_name')->where('store_status', 'approved')->count();
                @endphp
                {{ $approvedCount }}
            </div>
            <div class="stat-label">متاجر مقبولة</div>
            <div class="stat-icon">
                <i class="fas fa-check-circle"></i>
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
                        <a class="nav-link" href="{{ route('admin.vendors') }}">
                            <i class="fas fa-check-circle me-2"></i>
                            المتاجر المقبولة
                        </a>
                    </li>
                    <li class="nav-item" role="presentation">
                        <a class="nav-link active" href="{{ route('admin.vendors.rejected') }}">
                            <i class="fas fa-times-circle me-2"></i>
                            المتاجر المرفوضة ({{ $rejectedVendors->total() }})
                        </a>
                    </li>
                    <li class="nav-item" role="presentation">
                        <a class="nav-link" href="{{ route('admin.store-approvals') }}">
                            <i class="fas fa-clock me-2"></i>
                            طلبات الانتظار
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>

<!-- Rejected Vendors Table -->
<div class="table-card">
    <div class="table-header">
        <i class="fas fa-times-circle me-2"></i>
        المتاجر المرفوضة
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
                @forelse($rejectedVendors as $vendor)
                <tr id="vendor-{{ $vendor->id }}">
                    <td>{{ $loop->iteration + ($rejectedVendors->currentPage() - 1) * $rejectedVendors->perPage() }}</td>
                    <td>
                        <div class="d-flex align-items-center">
                            <div class="me-3" style="width: 50px; height: 50px; background: linear-gradient(135deg, #dc3545 0%, #c82333 100%); border-radius: 10px; display: flex; align-items: center; justify-content: center; color: white; font-weight: bold;">
                                {{ substr($vendor->store_name, 0, 2) }}
                            </div>
                            <div>
                                <div class="fw-bold">{{ $vendor->store_name }}</div>
                                <small class="text-muted">{{ Str::limit($vendor->store_description ?? 'لا يوجد وصف', 40) }}</small>
                                <br>
                                <span class="badge badge-danger">مرفوض</span>
                            </div>
                        </div>
                    </td>
                    <td>
                        <div>
                            <div class="fw-semibold">{{ $vendor->name }}</div>
                            <small class="text-muted">{{ $vendor->phone ?? 'غير محدد' }}</small>
                        </div>
                    </td>
                    <td>{{ $vendor->email }}</td>
                    <td>
                        <div class="text-danger" style="max-width: 200px;">
                            <small title="{{ $vendor->rejection_reason }}">
                                {{ Str::limit($vendor->rejection_reason, 60) }}
                            </small>
                        </div>
                    </td>
                    <td>
                        <div>
                            {{ $vendor->updated_at->format('Y/m/d') }}
                            <br>
                            <small class="text-muted">{{ $vendor->updated_at->format('H:i') }}</small>
                        </div>
                    </td>
                    <td>
                        <div class="btn-group btn-group-sm">
                            <button class="btn btn-outline-info" title="عرض التفاصيل" onclick="viewVendorDetails({{ $vendor->id }})">
                                <i class="fas fa-eye"></i>
                            </button>
                            <button class="btn btn-outline-success" title="قبول المتجر" onclick="approveRejectedVendor({{ $vendor->id }}, '{{ $vendor->store_name }}')">
                                <i class="fas fa-check"></i>
                            </button>
                            <button class="btn btn-outline-primary" title="عرض سبب الرفض" onclick="showRejectionReason('{{ $vendor->store_name }}', '{{ $vendor->rejection_reason }}')">
                                <i class="fas fa-info-circle"></i>
                            </button>
                        </div>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="7" class="text-center text-muted py-5">
                        <i class="fas fa-times-circle fa-3x mb-3 d-block"></i>
                        لا توجد متاجر مرفوضة
                        <br>
                        <small>جميع المتاجر إما مقبولة أو في انتظار المراجعة</small>
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
    
    @if($rejectedVendors->hasPages())
    <div class="p-3 border-top">
        {{ $rejectedVendors->links() }}
    </div>
    @endif
</div>

<!-- Rejection Reason Modal -->
<div class="modal fade" id="rejectionReasonModal" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">سبب رفض المتجر</h5>
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

@push('scripts')
<script>
function viewVendorDetails(vendorId) {
    // You can implement a detailed view or redirect to vendor profile
    window.open(`/admin/vendors/${vendorId}`, '_blank');
}

function approveRejectedVendor(vendorId, vendorName) {
    if (confirm(`هل أنت متأكد من الموافقة على متجر "${vendorName}" المرفوض سابقاً؟`)) {
        fetch(`/admin/store-approvals/${vendorId}/approve`, {
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
                document.getElementById(`vendor-${vendorId}`).remove();
                
                // Show success message
                alert(`تم الموافقة على متجر "${data.store_name}" بنجاح`);
                
                // Reload page to update stats
                location.reload();
            } else {
                alert('حدث خطأ: ' + data.message);
            }
        })
        .catch(error => {
            console.error('Error:', error);
            alert('حدث خطأ أثناء الموافقة على المتجر');
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
