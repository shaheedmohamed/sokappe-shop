@extends('admin.layouts.app')

@section('title', 'طلبات المتاجر')
@section('page-title', 'إدارة طلبات المتاجر')
@section('page-subtitle', 'مراجعة والموافقة على طلبات المتاجر الجديدة')
@section('page-icon', '<i class="fas fa-clipboard-check"></i>')

@section('content')
<style>
.bulk-actions {
    animation: slideInRight 0.3s ease-in-out;
}

@keyframes slideInRight {
    from {
        opacity: 0;
        transform: translateX(20px);
    }
    to {
        opacity: 1;
        transform: translateX(0);
    }
}

.form-check-input:indeterminate {
    background-color: #0d6efd;
    border-color: #0d6efd;
    background-image: url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 20 20'%3e%3cpath fill='none' stroke='%23fff' stroke-linecap='round' stroke-linejoin='round' stroke-width='3' d='M6 10h8'/%3e%3c/svg%3e");
}

.table-card .table-header {
    background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
    color: white;
    padding: 1rem;
    border-radius: 10px 10px 0 0;
    font-weight: 600;
}

.store-checkbox:checked + label {
    font-weight: 600;
    color: #0d6efd;
}
</style>
<!-- Statistics Cards -->
<div class="row g-4 mb-4">
    <div class="col-xl-3 col-md-6">
        <div class="stat-card">
            <div class="stat-number text-warning">{{ $stats['pending_count'] }}</div>
            <div class="stat-label">طلبات في الانتظار</div>
            <div class="stat-icon">
                <i class="fas fa-clock"></i>
            </div>
            <small class="text-muted">
                <i class="fas fa-plus text-info"></i>
                +{{ $stats['today_submissions'] }} اليوم
            </small>
        </div>
    </div>
    
    <div class="col-xl-3 col-md-6">
        <div class="stat-card">
            <div class="stat-number text-success">{{ $stats['approved_count'] }}</div>
            <div class="stat-label">متاجر مقبولة</div>
            <div class="stat-icon">
                <i class="fas fa-check-circle"></i>
            </div>
        </div>
    </div>
    
    <div class="col-xl-3 col-md-6">
        <div class="stat-card">
            <div class="stat-number text-danger">{{ $stats['rejected_count'] }}</div>
            <div class="stat-label">طلبات مرفوضة</div>
            <div class="stat-icon">
                <i class="fas fa-times-circle"></i>
            </div>
        </div>
    </div>
    
    <div class="col-xl-3 col-md-6">
        <div class="stat-card">
            <div class="stat-number">{{ $stats['pending_count'] + $stats['approved_count'] + $stats['rejected_count'] }}</div>
            <div class="stat-label">إجمالي الطلبات</div>
            <div class="stat-icon">
                <i class="fas fa-store"></i>
            </div>
        </div>
    </div>
</div>

<!-- Filter Tabs -->
<div class="row g-4 mb-4">
    <div class="col-12">
        <div class="table-card">
            <div class="p-3">
                <ul class="nav nav-pills" id="statusTabs" role="tablist">
                    <li class="nav-item" role="presentation">
                        <button class="nav-link active" id="pending-tab" data-bs-toggle="pill" data-bs-target="#pending" type="button" role="tab">
                            <i class="fas fa-clock me-2"></i>
                            في الانتظار ({{ $stats['pending_count'] }})
                        </button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="approved-tab" data-bs-toggle="pill" data-bs-target="#approved" type="button" role="tab">
                            <i class="fas fa-check-circle me-2"></i>
                            مقبولة ({{ $stats['approved_count'] }})
                        </button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="rejected-tab" data-bs-toggle="pill" data-bs-target="#rejected" type="button" role="tab">
                            <i class="fas fa-times-circle me-2"></i>
                            مرفوضة ({{ $stats['rejected_count'] }})
                        </button>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>

<!-- Tab Content -->
<div class="tab-content" id="statusTabsContent">
    <!-- Pending Stores -->
    <div class="tab-pane fade show active" id="pending" role="tabpanel">
        <div class="table-card">
            <div class="table-header d-flex justify-content-between align-items-center">
                <div>
                    <i class="fas fa-clock me-2"></i>
                    طلبات المتاجر في الانتظار
                </div>
                <div class="bulk-actions" style="display: none;">
                    <button class="btn btn-success btn-sm me-2" onclick="bulkApprove()">
                        <i class="fas fa-check me-1"></i>
                        موافقة على المحدد (<span id="selected-count">0</span>)
                    </button>
                    <button class="btn btn-danger btn-sm" onclick="bulkReject()">
                        <i class="fas fa-times me-1"></i>
                        رفض المحدد
                    </button>
                </div>
            </div>
            
            <div class="table-responsive">
                <table class="table">
                    <thead>
                        <tr>
                            <th>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="select-all" onchange="toggleSelectAll()">
                                    <label class="form-check-label" for="select-all">#</label>
                                </div>
                            </th>
                            <th>المتجر</th>
                            <th>صاحب المتجر</th>
                            <th>البريد الإلكتروني</th>
                            <th>الهاتف</th>
                            <th>تاريخ التقديم</th>
                            <th>الإجراءات</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($pendingStores as $store)
                        <tr id="store-{{ $store->id }}">
                            <td>
                                <div class="form-check">
                                    <input class="form-check-input store-checkbox" type="checkbox" value="{{ $store->id }}" onchange="updateBulkActions()">
                                    <label class="form-check-label">{{ $loop->iteration }}</label>
                                </div>
                            </td>
                            <td>
                                <div class="d-flex align-items-center">
                                    <div class="me-3" style="width: 50px; height: 50px; background: linear-gradient(135deg, #ffc107 0%, #ff8f00 100%); border-radius: 10px; display: flex; align-items: center; justify-content: center; color: white; font-weight: bold;">
                                        {{ substr($store->store_name, 0, 2) }}
                                    </div>
                                    <div>
                                        <div class="fw-bold">{{ $store->store_name }}</div>
                                        <small class="text-muted">{{ Str::limit($store->store_description ?? 'لا يوجد وصف', 40) }}</small>
                                    </div>
                                </div>
                            </td>
                            <td>{{ $store->name }}</td>
                            <td>{{ $store->email }}</td>
                            <td>{{ $store->store_phone ?? $store->phone ?? 'غير محدد' }}</td>
                            <td>
                                {{ $store->store_submitted_at ? $store->store_submitted_at->format('Y/m/d H:i') : $store->created_at->format('Y/m/d H:i') }}
                                <br>
                                <small class="text-muted">
                                    {{ $store->store_submitted_at ? $store->store_submitted_at->diffForHumans() : $store->created_at->diffForHumans() }}
                                </small>
                            </td>
                            <td>
                                <div class="btn-group btn-group-sm">
                                    <button class="btn btn-outline-info" title="عرض التفاصيل" onclick="viewStoreDetails({{ $store->id }})">
                                        <i class="fas fa-eye"></i>
                                    </button>
                                    <button class="btn btn-outline-success" title="موافقة" onclick="approveStore({{ $store->id }}, '{{ $store->store_name }}')">
                                        <i class="fas fa-check"></i>
                                    </button>
                                    <button class="btn btn-outline-danger" title="رفض" onclick="showRejectModal({{ $store->id }}, '{{ $store->store_name }}')">
                                        <i class="fas fa-times"></i>
                                    </button>
                                </div>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="7" class="text-center text-muted py-5">
                                <i class="fas fa-clock fa-3x mb-3 d-block"></i>
                                لا توجد طلبات في الانتظار
                            </td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
            
            @if($pendingStores->hasPages())
            <div class="p-3 border-top">
                {{ $pendingStores->links() }}
            </div>
            @endif
        </div>
    </div>
    
    <!-- Approved Stores -->
    <div class="tab-pane fade" id="approved" role="tabpanel">
        <div class="table-card">
            <div class="table-header">
                <i class="fas fa-check-circle me-2"></i>
                المتاجر المقبولة
            </div>
            
            <div class="table-responsive">
                <table class="table">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>المتجر</th>
                            <th>صاحب المتجر</th>
                            <th>تاريخ الموافقة</th>
                            <th>المنتجات</th>
                            <th>الإجراءات</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($approvedStores as $store)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>
                                <div class="d-flex align-items-center">
                                    <div class="me-3" style="width: 40px; height: 40px; background: linear-gradient(135deg, #28a745 0%, #20c997 100%); border-radius: 8px; display: flex; align-items: center; justify-content: center; color: white; font-weight: bold;">
                                        {{ substr($store->store_name, 0, 2) }}
                                    </div>
                                    <div>
                                        <div class="fw-bold">{{ $store->store_name }}</div>
                                        <span class="badge badge-success">نشط</span>
                                    </div>
                                </div>
                            </td>
                            <td>{{ $store->name }}</td>
                            <td>{{ $store->store_approved_at->format('Y/m/d H:i') }}</td>
                            <td>
                                <span class="badge bg-primary">{{ $store->products->count() }}</span>
                            </td>
                            <td>
                                <button class="btn btn-outline-primary btn-sm" onclick="viewStoreDetails({{ $store->id }})">
                                    <i class="fas fa-eye"></i>
                                </button>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="6" class="text-center text-muted py-5">
                                <i class="fas fa-check-circle fa-3x mb-3 d-block"></i>
                                لا توجد متاجر مقبولة
                            </td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    
    <!-- Rejected Stores -->
    <div class="tab-pane fade" id="rejected" role="tabpanel">
        <div class="table-card">
            <div class="table-header">
                <i class="fas fa-times-circle me-2"></i>
                الطلبات المرفوضة
            </div>
            
            <div class="table-responsive">
                <table class="table">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>المتجر</th>
                            <th>صاحب المتجر</th>
                            <th>سبب الرفض</th>
                            <th>تاريخ الرفض</th>
                            <th>الإجراءات</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($rejectedStores as $store)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>
                                <div class="d-flex align-items-center">
                                    <div class="me-3" style="width: 40px; height: 40px; background: linear-gradient(135deg, #dc3545 0%, #c82333 100%); border-radius: 8px; display: flex; align-items: center; justify-content: center; color: white; font-weight: bold;">
                                        {{ substr($store->store_name, 0, 2) }}
                                    </div>
                                    <div>
                                        <div class="fw-bold">{{ $store->store_name }}</div>
                                        <span class="badge badge-danger">مرفوض</span>
                                    </div>
                                </div>
                            </td>
                            <td>{{ $store->name }}</td>
                            <td>
                                <span class="text-muted" title="{{ $store->rejection_reason }}">
                                    {{ Str::limit($store->rejection_reason, 50) }}
                                </span>
                            </td>
                            <td>{{ $store->updated_at->format('Y/m/d H:i') }}</td>
                            <td>
                                <div class="btn-group btn-group-sm">
                                    <button class="btn btn-outline-info" title="عرض التفاصيل" onclick="viewStoreDetails({{ $store->id }})">
                                        <i class="fas fa-eye"></i>
                                    </button>
                                    <button class="btn btn-outline-success" title="قبول المتجر" onclick="approveRejectedStore({{ $store->id }}, '{{ $store->store_name }}')">
                                        <i class="fas fa-check"></i>
                                    </button>
                                </div>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="6" class="text-center text-muted py-5">
                                <i class="fas fa-times-circle fa-3x mb-3 d-block"></i>
                                لا توجد طلبات مرفوضة
                            </td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<!-- Reject Modal -->
<div class="modal fade" id="rejectModal" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">رفض طلب المتجر</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                <p>أنت على وشك رفض طلب المتجر: <strong id="rejectStoreName"></strong></p>
                <div class="mb-3">
                    <label class="form-label">سبب الرفض <span class="text-danger">*</span></label>
                    <textarea class="form-control" id="rejectionReason" rows="4" placeholder="اكتب سبب رفض الطلب..." required></textarea>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">إلغاء</button>
                <button type="button" class="btn btn-danger" onclick="confirmReject()">
                    <i class="fas fa-times me-1"></i>
                    رفض الطلب
                </button>
            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script>
let currentStoreId = null;

function viewStoreDetails(storeId) {
    window.open(`/admin/store-approvals/${storeId}`, '_blank');
}

function approveStore(storeId, storeName) {
    if (confirm(`هل أنت متأكد من الموافقة على متجر "${storeName}"؟`)) {
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
                // Remove row from pending table
                document.getElementById(`store-${storeId}`).remove();
                
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

function showRejectModal(storeId, storeName) {
    currentStoreId = storeId;
    document.getElementById('rejectStoreName').textContent = storeName;
    document.getElementById('rejectionReason').value = '';
    
    const modal = new bootstrap.Modal(document.getElementById('rejectModal'));
    modal.show();
}

function confirmReject() {
    const reason = document.getElementById('rejectionReason').value.trim();
    
    if (!reason) {
        alert('يجب كتابة سبب الرفض');
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
            // Remove row from pending table
            document.getElementById(`store-${currentStoreId}`).remove();
            
            // Hide modal
            const modal = bootstrap.Modal.getInstance(document.getElementById('rejectModal'));
            modal.hide();
            
            // Show success message
            alert(`تم رفض متجر "${data.store_name}"`);
            
            // Reload page to update stats
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

function approveRejectedStore(storeId, storeName) {
    if (confirm(`هل أنت متأكد من الموافقة على متجر "${storeName}" المرفوض سابقاً؟`)) {
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
                // Show success message
                alert(`تم الموافقة على متجر "${data.store_name}" بنجاح`);
                
                // Reload page to update stats and move store to approved tab
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

// Bulk Actions Functions
function toggleSelectAll() {
    const selectAllCheckbox = document.getElementById('select-all');
    const storeCheckboxes = document.querySelectorAll('.store-checkbox');
    
    storeCheckboxes.forEach(checkbox => {
        checkbox.checked = selectAllCheckbox.checked;
    });
    
    updateBulkActions();
}

function updateBulkActions() {
    const checkedBoxes = document.querySelectorAll('.store-checkbox:checked');
    const bulkActions = document.querySelector('.bulk-actions');
    const selectedCount = document.getElementById('selected-count');
    
    if (checkedBoxes.length > 0) {
        bulkActions.style.display = 'block';
        selectedCount.textContent = checkedBoxes.length;
    } else {
        bulkActions.style.display = 'none';
    }
    
    // Update select all checkbox state
    const allCheckboxes = document.querySelectorAll('.store-checkbox');
    const selectAllCheckbox = document.getElementById('select-all');
    
    if (checkedBoxes.length === allCheckboxes.length && allCheckboxes.length > 0) {
        selectAllCheckbox.checked = true;
        selectAllCheckbox.indeterminate = false;
    } else if (checkedBoxes.length > 0) {
        selectAllCheckbox.checked = false;
        selectAllCheckbox.indeterminate = true;
    } else {
        selectAllCheckbox.checked = false;
        selectAllCheckbox.indeterminate = false;
    }
}

function bulkApprove() {
    const checkedBoxes = document.querySelectorAll('.store-checkbox:checked');
    const storeIds = Array.from(checkedBoxes).map(cb => cb.value);
    
    if (storeIds.length === 0) {
        alert('يجب تحديد متجر واحد على الأقل');
        return;
    }
    
    if (confirm(`هل أنت متأكد من الموافقة على ${storeIds.length} متجر؟`)) {
        fetch('/admin/store-approvals/bulk-approve', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': '{{ csrf_token() }}'
            },
            body: JSON.stringify({
                store_ids: storeIds
            })
        })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                alert(`تم الموافقة على ${data.approved_count} متجر بنجاح`);
                location.reload();
            } else {
                alert('حدث خطأ: ' + data.message);
            }
        })
        .catch(error => {
            console.error('Error:', error);
            alert('حدث خطأ أثناء الموافقة الجماعية');
        });
    }
}

function bulkReject() {
    const checkedBoxes = document.querySelectorAll('.store-checkbox:checked');
    const storeIds = Array.from(checkedBoxes).map(cb => cb.value);
    
    if (storeIds.length === 0) {
        alert('يجب تحديد متجر واحد على الأقل');
        return;
    }
    
    const reason = prompt(`اكتب سبب رفض ${storeIds.length} متجر:`);
    if (!reason || reason.trim() === '') {
        alert('يجب كتابة سبب الرفض');
        return;
    }
    
    if (confirm(`هل أنت متأكد من رفض ${storeIds.length} متجر؟`)) {
        fetch('/admin/store-approvals/bulk-reject', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': '{{ csrf_token() }}'
            },
            body: JSON.stringify({
                store_ids: storeIds,
                reason: reason.trim()
            })
        })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                alert(`تم رفض ${data.rejected_count} متجر بنجاح`);
                location.reload();
            } else {
                alert('حدث خطأ: ' + data.message);
            }
        })
        .catch(error => {
            console.error('Error:', error);
            alert('حدث خطأ أثناء الرفض الجماعي');
        });
    }
}
</script>
@endpush
