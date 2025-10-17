@extends('admin.layouts.app')

@section('title', 'إدارة الفئات الفرعية')
@section('page-title', 'إدارة الفئات الفرعية')
@section('page-subtitle', 'إدارة جميع الفئات الفرعية في النظام')
@section('page-icon', '<i class="fas fa-sitemap"></i>')

@section('content')
<!-- Statistics Cards -->
<div class="row g-4 mb-4">
    <div class="col-xl-3 col-md-6">
        <div class="stat-card">
            <div class="stat-number text-info">{{ $stats['total_subcategories'] }}</div>
            <div class="stat-label">إجمالي الفئات الفرعية</div>
            <div class="stat-icon">
                <i class="fas fa-sitemap"></i>
            </div>
        </div>
    </div>
    
    <div class="col-xl-3 col-md-6">
        <div class="stat-card">
            <div class="stat-number text-success">{{ $stats['active_subcategories'] }}</div>
            <div class="stat-label">فئات فرعية نشطة</div>
            <div class="stat-icon">
                <i class="fas fa-check-circle"></i>
            </div>
        </div>
    </div>
    
    <div class="col-xl-3 col-md-6">
        <div class="stat-card">
            <div class="stat-number text-primary">{{ $stats['total_categories'] }}</div>
            <div class="stat-label">إجمالي الفئات الرئيسية</div>
            <div class="stat-icon">
                <i class="fas fa-tags"></i>
            </div>
        </div>
    </div>
    
    <div class="col-xl-3 col-md-6">
        <div class="stat-card">
            <div class="stat-number text-warning">{{ $stats['categories_with_subcategories'] }}</div>
            <div class="stat-label">فئات لها فئات فرعية</div>
            <div class="stat-icon">
                <i class="fas fa-layer-group"></i>
            </div>
        </div>
    </div>
</div>

<!-- Add Subcategory Button -->
<div class="row g-4 mb-4">
    <div class="col-12">
        <button class="btn btn-primary" onclick="showAddSubcategoryModal()">
            <i class="fas fa-plus me-2"></i>
            إضافة فئة فرعية جديدة
        </button>
        <a href="{{ route('admin.categories') }}" class="btn btn-outline-secondary ms-2">
            <i class="fas fa-arrow-left me-2"></i>
            العودة للفئات الرئيسية
        </a>
    </div>
</div>

<!-- Subcategories Table -->
<div class="table-card">
    <div class="table-header">
        <i class="fas fa-sitemap me-2"></i>
        قائمة الفئات الفرعية
    </div>
    
    <div class="table-responsive">
        <table class="table">
            <thead>
                <tr>
                    <th>#</th>
                    <th>الفئة الفرعية</th>
                    <th>الفئة الرئيسية</th>
                    <th>الاسم بالإنجليزية</th>
                    <th>الوصف</th>
                    <th>عدد المنتجات</th>
                    <th>تاريخ الإنشاء</th>
                    <th>الحالة</th>
                    <th>الإجراءات</th>
                </tr>
            </thead>
            <tbody>
                @forelse($subcategories as $subcategory)
                <tr>
                    <td>{{ $loop->iteration + ($subcategories->currentPage() - 1) * $subcategories->perPage() }}</td>
                    <td>
                        <div class="d-flex align-items-center">
                            <div class="me-3" style="width: 40px; height: 40px; background: {{ $subcategory->color ?? '#667eea' }}; border-radius: 8px; display: flex; align-items: center; justify-content: center; color: white; font-weight: bold;">
                                <i class="{{ $subcategory->icon ?? 'fas fa-tag' }}"></i>
                            </div>
                            <div>
                                <div class="fw-bold">{{ $subcategory->name }}</div>
                                <small class="text-muted">ID: {{ $subcategory->id }}</small>
                            </div>
                        </div>
                    </td>
                    <td>
                        <span class="badge bg-primary">{{ $subcategory->category->name ?? 'غير محدد' }}</span>
                    </td>
                    <td>{{ $subcategory->name_en ?? '-' }}</td>
                    <td>{{ Str::limit($subcategory->description ?? 'لا يوجد وصف', 50) }}</td>
                    <td>
                        <span class="badge bg-info">{{ $subcategory->products_count ?? 0 }}</span>
                    </td>
                    <td>{{ $subcategory->created_at->format('Y/m/d') }}</td>
                    <td>
                        @if($subcategory->is_active)
                            <span class="badge badge-success">نشط</span>
                        @else
                            <span class="badge badge-secondary">غير نشط</span>
                        @endif
                    </td>
                    <td>
                        <div class="btn-group btn-group-sm">
                            <button class="btn btn-outline-primary" title="عرض المنتجات" onclick="viewSubcategoryProducts({{ $subcategory->id }})">
                                <i class="fas fa-eye"></i>
                            </button>
                            <button class="btn btn-outline-warning" title="تعديل" onclick="editSubcategory({{ $subcategory->id }})">
                                <i class="fas fa-edit"></i>
                            </button>
                            <button class="btn btn-outline-danger" title="حذف" onclick="deleteSubcategory({{ $subcategory->id }}, '{{ $subcategory->name }}')">
                                <i class="fas fa-trash"></i>
                            </button>
                        </div>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="9" class="text-center text-muted py-5">
                        <i class="fas fa-sitemap fa-3x mb-3 d-block"></i>
                        لا توجد فئات فرعية
                        <br>
                        <small>ابدأ بإضافة فئة فرعية جديدة</small>
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
    
    @if($subcategories->hasPages())
    <div class="p-3 border-top">
        {{ $subcategories->links() }}
    </div>
    @endif
</div>

<!-- Add Subcategory Modal -->
<div class="modal fade" id="addSubcategoryModal" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">إضافة فئة فرعية جديدة</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                <form id="addSubcategoryForm">
                    <div class="mb-3">
                        <label for="category_id" class="form-label">الفئة الرئيسية <span class="text-danger">*</span></label>
                        <select id="category_id" name="category_id" class="form-select" required>
                            <option value="">اختر الفئة الرئيسية</option>
                            @foreach($categories as $category)
                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    
                    <div class="mb-3">
                        <label for="name" class="form-label">اسم الفئة الفرعية <span class="text-danger">*</span></label>
                        <input type="text" id="name" name="name" class="form-control" required>
                    </div>
                    
                    <div class="mb-3">
                        <label for="name_en" class="form-label">الاسم بالإنجليزية</label>
                        <input type="text" id="name_en" name="name_en" class="form-control">
                    </div>
                    
                    <div class="mb-3">
                        <label for="description" class="form-label">الوصف</label>
                        <textarea id="description" name="description" class="form-control" rows="3"></textarea>
                    </div>
                    
                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="icon" class="form-label">الأيقونة</label>
                                <input type="text" id="icon" name="icon" class="form-control" placeholder="fas fa-tag">
                                <small class="form-text text-muted">مثال: fas fa-mobile-alt</small>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="color" class="form-label">اللون</label>
                                <input type="color" id="color" name="color" class="form-control" value="#667eea">
                            </div>
                        </div>
                    </div>
                    
                    <div class="mb-3">
                        <label for="sort_order" class="form-label">ترتيب العرض</label>
                        <input type="number" id="sort_order" name="sort_order" class="form-control" value="0">
                    </div>
                    
                    <div class="mb-3">
                        <div class="form-check">
                            <input type="checkbox" id="is_active" name="is_active" class="form-check-input" checked>
                            <label for="is_active" class="form-check-label">نشط</label>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">إلغاء</button>
                <button type="button" class="btn btn-primary" onclick="saveSubcategory()">
                    <i class="fas fa-save me-2"></i>
                    حفظ
                </button>
            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script>
function showAddSubcategoryModal() {
    const modal = new bootstrap.Modal(document.getElementById('addSubcategoryModal'));
    modal.show();
}

function saveSubcategory() {
    const form = document.getElementById('addSubcategoryForm');
    const formData = new FormData(form);
    
    // Convert FormData to JSON
    const data = {};
    formData.forEach((value, key) => {
        if (key === 'is_active') {
            data[key] = document.getElementById('is_active').checked;
        } else {
            data[key] = value;
        }
    });
    
    const categoryId = data.category_id;
    if (!categoryId) {
        alert('يجب اختيار الفئة الرئيسية');
        return;
    }
    
    fetch(`/admin/categories/${categoryId}/subcategories`, {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
            'X-CSRF-TOKEN': '{{ csrf_token() }}'
        },
        body: JSON.stringify(data)
    })
    .then(response => response.json())
    .then(data => {
        if (data.success) {
            alert('تم إضافة الفئة الفرعية بنجاح');
            location.reload();
        } else {
            alert('حدث خطأ: ' + data.message);
        }
    })
    .catch(error => {
        console.error('Error:', error);
        alert('حدث خطأ أثناء إضافة الفئة الفرعية');
    });
}

function editSubcategory(subcategoryId) {
    // TODO: Implement edit functionality
    alert('سيتم تنفيذ هذه الميزة قريباً');
}

function deleteSubcategory(subcategoryId, subcategoryName) {
    if (confirm(`هل أنت متأكد من حذف الفئة الفرعية "${subcategoryName}"؟`)) {
        fetch(`/admin/subcategories/${subcategoryId}`, {
            method: 'DELETE',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': '{{ csrf_token() }}'
            }
        })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                alert('تم حذف الفئة الفرعية بنجاح');
                location.reload();
            } else {
                alert('حدث خطأ: ' + data.message);
            }
        })
        .catch(error => {
            console.error('Error:', error);
            alert('حدث خطأ أثناء حذف الفئة الفرعية');
        });
    }
}

function viewSubcategoryProducts(subcategoryId) {
    // TODO: Implement view products functionality
    alert('سيتم تنفيذ هذه الميزة قريباً');
}
</script>
@endpush
