@extends('admin.layouts.app')

@section('title', 'إدارة الفئات')
@section('page-title', 'إدارة فئات المنتجات')

@section('content')
<!-- Add Category Button -->
<div class="row g-4 mb-4">
    <div class="col-12">
        <button class="btn btn-primary" onclick="showAddCategoryModal()">
            <i class="fas fa-plus me-2"></i>
            إضافة فئة جديدة
        </button>
    </div>
</div>

<!-- Categories Table -->
<div class="table-card">
    <div class="table-header">
        <i class="fas fa-tags me-2"></i>
        قائمة الفئات
    </div>
    
    <div class="table-responsive">
        <table class="table">
            <thead>
                <tr>
                    <th>#</th>
                    <th>الفئة</th>
                    <th>الاسم بالإنجليزية</th>
                    <th>الوصف</th>
                    <th>عدد المنتجات</th>
                    <th>تاريخ الإنشاء</th>
                    <th>الحالة</th>
                    <th>الإجراءات</th>
                </tr>
            </thead>
            <tbody>
                @forelse($categories as $category)
                <tr>
                    <td>{{ $loop->iteration + ($categories->currentPage() - 1) * $categories->perPage() }}</td>
                    <td>
                        <div class="d-flex align-items-center">
                            <div class="me-3" style="width: 40px; height: 40px; background: linear-gradient(135deg, #667eea 0%, #764ba2 100%); border-radius: 8px; display: flex; align-items: center; justify-content: center; color: white; font-weight: bold;">
                                <i class="fas fa-tag"></i>
                            </div>
                            <div>
                                <div class="fw-bold">{{ $category->name_ar ?? $category->name }}</div>
                                <small class="text-muted">ID: {{ $category->id }}</small>
                            </div>
                        </div>
                    </td>
                    <td>{{ $category->name }}</td>
                    <td>{{ Str::limit($category->description_ar ?? $category->description ?? 'لا يوجد وصف', 50) }}</td>
                    <td>
                        <span class="badge bg-primary">{{ $category->products_count }}</span>
                    </td>
                    <td>{{ $category->created_at->format('Y/m/d') }}</td>
                    <td>
                        <span class="badge badge-success">نشط</span>
                    </td>
                    <td>
                        <div class="btn-group btn-group-sm">
                            <button class="btn btn-outline-primary" title="عرض المنتجات" onclick="viewCategoryProducts({{ $category->id }})">
                                <i class="fas fa-eye"></i>
                            </button>
                            <button class="btn btn-outline-warning" title="تعديل" onclick="editCategory({{ $category->id }})">
                                <i class="fas fa-edit"></i>
                            </button>
                            <button class="btn btn-outline-danger" title="حذف" onclick="confirmDelete({{ $category->id }})">
                                <i class="fas fa-trash"></i>
                            </button>
                        </div>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="8" class="text-center text-muted py-5">
                        <i class="fas fa-tags fa-3x mb-3 d-block"></i>
                        لا توجد فئات مضافة
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
    
    @if($categories->hasPages())
    <div class="p-3 border-top">
        {{ $categories->links() }}
    </div>
    @endif
</div>

<!-- Add Category Modal -->
<div class="modal fade" id="addCategoryModal" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">إضافة فئة جديدة</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                <form id="addCategoryForm">
                    <div class="mb-3">
                        <label class="form-label">اسم الفئة بالعربية</label>
                        <input type="text" class="form-control" name="name_ar" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">اسم الفئة بالإنجليزية</label>
                        <input type="text" class="form-control" name="name" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">الوصف بالعربية</label>
                        <textarea class="form-control" name="description_ar" rows="3"></textarea>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">الوصف بالإنجليزية</label>
                        <textarea class="form-control" name="description" rows="3"></textarea>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">إلغاء</button>
                <button type="button" class="btn btn-primary" onclick="saveCategory()">حفظ الفئة</button>
            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script>
function showAddCategoryModal() {
    const modal = new bootstrap.Modal(document.getElementById('addCategoryModal'));
    modal.show();
}

function saveCategory() {
    alert('سيتم تنفيذ إضافة الفئة قريباً');
    const modal = bootstrap.Modal.getInstance(document.getElementById('addCategoryModal'));
    modal.hide();
}

function viewCategoryProducts(categoryId) {
    window.open(`/category/${categoryId}`, '_blank');
}

function editCategory(categoryId) {
    alert(`تعديل الفئة رقم: ${categoryId}\nسيتم تنفيذ هذه الميزة قريباً`);
}

function confirmDelete(categoryId) {
    if (confirm('هل أنت متأكد من حذف هذه الفئة؟\nسيتم حذف جميع المنتجات المرتبطة بها.')) {
        alert('سيتم تنفيذ هذه الميزة قريباً');
    }
}
</script>
@endpush
