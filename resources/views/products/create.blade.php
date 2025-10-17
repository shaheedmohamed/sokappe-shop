<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>أضف منتج جديد - Sokappe Shop</title>
    
    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@300;400;600;700&display=swap" rel="stylesheet">
    
    <!-- Bootstrap RTL -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.rtl.min.css" rel="stylesheet">
    
    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
    
    <style>
        * {
            font-family: 'Cairo', sans-serif;
        }
        
        body {
            background-color: #f8f9fa;
            direction: rtl;
        }
        
        .navbar {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
        }
        
        .navbar-brand {
            font-weight: 700;
            font-size: 1.8rem;
            color: white !important;
        }
        
        .page-header {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            padding: 60px 0;
            margin-bottom: 30px;
        }
        
        .coming-soon {
            text-align: center;
            padding: 80px 20px;
            background: white;
            border-radius: 15px;
            box-shadow: 0 5px 15px rgba(0,0,0,0.08);
        }
        
        .coming-soon i {
            font-size: 5rem;
            color: #667eea;
            margin-bottom: 30px;
        }
        
        .coming-soon h3 {
            font-size: 2rem;
            margin-bottom: 15px;
            color: #333;
        }
        
        .coming-soon p {
            font-size: 1.1rem;
            margin-bottom: 30px;
            color: #666;
        }
        
        .btn-primary {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            border: none;
            padding: 12px 30px;
            border-radius: 25px;
            font-weight: 600;
        }

        /* Form Styles */
        .product-form {
            max-width: 1200px;
            margin: 0 auto;
        }

        .form-section {
            background: white;
            border-radius: 15px;
            margin-bottom: 30px;
            box-shadow: 0 5px 15px rgba(0,0,0,0.08);
            overflow: hidden;
        }

        .section-header {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            padding: 20px 25px;
            border-bottom: 1px solid #e9ecef;
        }

        .section-header h4 {
            margin: 0;
            font-size: 1.2rem;
            font-weight: 600;
        }

        .section-content {
            padding: 25px;
        }

        .form-label.required::after {
            content: " *";
            color: #dc3545;
        }

        .form-control, .form-select {
            border-radius: 8px;
            border: 2px solid #e9ecef;
            padding: 12px 15px;
            transition: all 0.3s ease;
        }

        .form-control:focus, .form-select:focus {
            border-color: #667eea;
            box-shadow: 0 0 0 0.2rem rgba(102, 126, 234, 0.25);
        }

        /* Image Upload Styles */
        .image-upload-container {
            margin-bottom: 20px;
        }

        .image-upload-box {
            position: relative;
            border: 2px dashed #ddd;
            border-radius: 10px;
            padding: 20px;
            text-align: center;
            cursor: pointer;
            transition: all 0.3s ease;
            background: #f8f9fa;
            height: 200px;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .image-upload-box:hover {
            border-color: #667eea;
            background: rgba(102, 126, 234, 0.05);
        }

        .image-upload-box.has-image {
            border-color: #28a745;
            background: rgba(40, 167, 69, 0.05);
        }

        .image-upload-box.drag-over {
            border-color: #667eea;
            background: rgba(102, 126, 234, 0.1);
            transform: scale(1.02);
        }

        .upload-placeholder {
            text-align: center;
        }

        .upload-placeholder i {
            font-size: 2rem;
            color: #667eea;
            margin-bottom: 10px;
        }

        .upload-placeholder p {
            margin: 5px 0;
            font-weight: 600;
            color: #333;
        }

        .upload-placeholder span {
            font-size: 0.9rem;
            color: #666;
        }

        .file-input {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            opacity: 0;
            cursor: pointer;
        }

        .additional-images-container {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(150px, 1fr));
            gap: 15px;
        }

        .additional-images-container .image-upload-box {
            height: 150px;
        }

        .add-more {
            cursor: pointer;
            border: 2px dashed #667eea !important;
            background: rgba(102, 126, 234, 0.05) !important;
            transition: all 0.3s ease;
        }

        .add-more:hover {
            border-color: #5a67d8 !important;
            background: rgba(102, 126, 234, 0.1) !important;
            transform: scale(1.02);
        }

        .add-more .upload-placeholder i {
            color: #667eea;
            font-size: 2.5rem;
        }

        .add-more .upload-placeholder p {
            color: #667eea;
            font-weight: 600;
            margin-top: 10px;
        }

        .delete-image {
            position: absolute;
            top: 5px;
            right: 5px;
            z-index: 10;
        }

        /* Keywords Styles */
        .keywords-input-container {
            position: relative;
        }

        .keywords-display {
            margin-top: 10px;
            display: flex;
            flex-wrap: wrap;
            gap: 8px;
        }

        .keyword-tag {
            background: #667eea;
            color: white;
            padding: 5px 12px;
            border-radius: 20px;
            font-size: 0.9rem;
            display: flex;
            align-items: center;
            gap: 8px;
        }

        .keyword-tag .remove-keyword {
            cursor: pointer;
            font-weight: bold;
        }

        .keyword-tag .remove-keyword:hover {
            color: #ff6b6b;
        }

        /* Rich Text Editor */
        .ql-toolbar {
            border-top-left-radius: 8px;
            border-top-right-radius: 8px;
        }

        .ql-container {
            border-bottom-left-radius: 8px;
            border-bottom-right-radius: 8px;
        }

        /* Error Styles */
        .border-danger {
            border-color: #dc3545 !important;
        }

        .text-danger {
            color: #dc3545 !important;
        }

        .alert {
            border-radius: 10px;
            margin-bottom: 20px;
        }

        .alert-dismissible .btn-close {
            padding: 0.75rem 1rem;
        }

        .invalid-feedback {
            display: block;
            font-size: 0.875rem;
            margin-top: 0.25rem;
        }

        .is-invalid {
            border-color: #dc3545;
            box-shadow: 0 0 0 0.2rem rgba(220, 53, 69, 0.25);
        }
    </style>
</head>
<body class="non-home-page">
    @include('layouts.navbar')

    <!-- Page Header -->
    <section class="page-header">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-8">
                    <h1 class="page-title">أضف منتج جديد</h1>
                    <p class="page-subtitle">انشر منتجك واعرضه لآلاف المشترين</p>
                </div>
                <div class="col-lg-4 text-center">
                    <i class="fas fa-plus-circle" style="font-size: 8rem; opacity: 0.3;"></i>
                </div>
            </div>
        </div>
    </section>

    <div class="container">
        <!-- Display Success/Error Messages -->
        @if(session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <i class="fas fa-check-circle me-2"></i>
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
        @endif

        @if(session('error'))
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <i class="fas fa-exclamation-circle me-2"></i>
                {{ session('error') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
        @endif

        @if($errors->any())
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <i class="fas fa-exclamation-triangle me-2"></i>
                <strong>يرجى تصحيح الأخطاء التالية:</strong>
                <ul class="mb-0 mt-2">
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
        @endif

        <form action="{{ route('products.store') }}" method="POST" enctype="multipart/form-data" class="product-form">
            @csrf
            
            <!-- Basic Information Section -->
            <div class="form-section">
                <div class="section-header">
                    <h4><i class="fas fa-info-circle"></i> معلومات أساسية</h4>
                </div>
                <div class="section-content">
                    <div class="row">
                        <div class="col-md-12 mb-3">
                            <label for="name" class="form-label required">اسم المنتج</label>
                            <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" placeholder="أدخل اسم المنتج" value="{{ old('name') }}" required>
                            @error('name')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-md-12 mb-3">
                            <label for="description" class="form-label required">الوصف</label>
                            <div id="description-editor" style="height: 200px;" class="@error('description') border border-danger @enderror"></div>
                            <input type="hidden" name="description" id="description-input">
                            @error('description')
                                <div class="text-danger mt-2">
                                    <small><i class="fas fa-exclamation-circle"></i> {{ $message }}</small>
                                </div>
                            @enderror
                        </div>
                    </div>
                </div>
            </div>

            <!-- General Information Section -->
            <div class="form-section">
                <div class="section-header">
                    <h4><i class="fas fa-cog"></i> معلومات عامة</h4>
                </div>
                <div class="section-content">
                    <div class="row">
                        <div class="col-md-4 mb-3">
                            <label for="category_id" class="form-label required">اختر الفئة</label>
                            <select class="form-select @error('category_id') is-invalid @enderror" id="category_id" name="category_id" required>
                                <option value="">اختر الفئة</option>
                                @foreach($categories as $category)
                                    <option value="{{ $category->id }}" {{ old('category_id') == $category->id ? 'selected' : '' }}>{{ $category->name_ar }}</option>
                                @endforeach
                            </select>
                            @error('category_id')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-md-4 mb-3">
                            <label for="subcategory_id" class="form-label">اختر الفئة الفرعية</label>
                            <select class="form-select" id="subcategory_id" name="subcategory_id">
                                <option value="">اختر الفئة الفرعية</option>
                            </select>
                        </div>
                        <div class="col-md-4 mb-3">
                            <label for="brand" class="form-label">اختر الماركة</label>
                            <input type="text" class="form-control" id="brand" name="brand" placeholder="اختر الماركة" value="{{ old('brand') }}">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4 mb-3">
                            <label for="color" class="form-label">اختر اللون</label>
                            <input type="text" class="form-control" id="color" name="color" placeholder="اختر اللون" value="{{ old('color') }}">
                        </div>
                        <div class="col-md-4 mb-3">
                            <label for="unit" class="form-label">اختر الوحدة</label>
                            <select class="form-select" id="unit" name="unit">
                                <option value="">اختر الوحدة</option>
                                <option value="piece" {{ old('unit') == 'piece' ? 'selected' : '' }}>قطعة</option>
                                <option value="kg" {{ old('unit') == 'kg' ? 'selected' : '' }}>كيلو</option>
                                <option value="gram" {{ old('unit') == 'gram' ? 'selected' : '' }}>جرام</option>
                                <option value="liter" {{ old('unit') == 'liter' ? 'selected' : '' }}>لتر</option>
                                <option value="meter" {{ old('unit') == 'meter' ? 'selected' : '' }}>متر</option>
                            </select>
                        </div>
                        <div class="col-md-4 mb-3">
                            <label for="size" class="form-label">اختر الحجم</label>
                            <input type="text" class="form-control" id="size" name="size" placeholder="اختر الحجم" value="{{ old('size') }}">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="sku" class="form-label">كود المنتج (SKU)</label>
                            <div class="input-group">
                                <input type="text" class="form-control @error('sku') is-invalid @enderror" id="sku" name="sku" placeholder="Ex. 134543" value="{{ old('sku') }}">
                                <button type="button" class="btn btn-outline-primary" id="generate-sku">إنشاء كود</button>
                            </div>
                            @error('sku')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                </div>
            </div>

            <!-- Price Information Section -->
            <div class="form-section">
                <div class="section-header">
                    <h4><i class="fas fa-dollar-sign"></i> معلومات السعر <span class="badge bg-warning">غير مشمول الضريبة</span></h4>
                </div>
                <div class="section-content">
                    <div class="row">
                        <div class="col-md-3 mb-3">
                            <label for="price" class="form-label required">سعر البيع</label>
                            <input type="number" class="form-control @error('price') is-invalid @enderror" id="price" name="price" placeholder="10" step="0.01" value="{{ old('price') }}" required>
                            @error('price')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-md-3 mb-3">
                            <label for="sale_price" class="form-label">سعر الخصم</label>
                            <input type="number" class="form-control @error('sale_price') is-invalid @enderror" id="sale_price" name="sale_price" placeholder="0" step="0.01" value="{{ old('sale_price') }}">
                            @error('sale_price')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-md-3 mb-3">
                            <label for="stock_quantity" class="form-label required">الكمية الحالية في المخزن</label>
                            <input type="number" class="form-control @error('stock_quantity') is-invalid @enderror" id="stock_quantity" name="stock_quantity" placeholder="الكمية الحالية في المخزن" value="{{ old('stock_quantity') }}" required>
                            @error('stock_quantity')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-md-3 mb-3">
                            <label for="minimum_order_quantity" class="form-label">الحد الأدنى لكمية الطلب</label>
                            <input type="number" class="form-control @error('minimum_order_quantity') is-invalid @enderror" id="minimum_order_quantity" name="minimum_order_quantity" placeholder="1" value="{{ old('minimum_order_quantity', 1) }}">
                            @error('minimum_order_quantity')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                </div>
            </div>

            <!-- Image Upload Section -->
            <div class="form-section">
                <div class="section-header">
                    <h4><i class="fas fa-images"></i> صور المنتج</h4>
                </div>
                <div class="section-content">
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label class="form-label required">الصورة المصغرة</label>
                            <div class="image-upload-container">
                                <div class="image-upload-box @error('thumbnail') border-danger @enderror" id="thumbnail-upload">
                                    <div class="upload-placeholder">
                                        <i class="fas fa-cloud-upload-alt"></i>
                                        <p>أي حجم</p>
                                        <span>اسحب الصورة هنا أو انقر للتحديد</span>
                                        <small class="text-muted d-block mt-1">ستعرض بحجم 500×500</small>
                                    </div>
                                    <input type="file" name="thumbnail" accept="image/*" class="file-input" id="thumbnail-input">
                                </div>
                                @error('thumbnail')
                                    <div class="text-danger mt-2">
                                        <small><i class="fas fa-exclamation-circle"></i> {{ $message }}</small>
                                    </div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="form-label">صور إضافية</label>
                            <div class="additional-images-container">
                                <div class="image-upload-box additional-image" data-index="0">
                                    <div class="upload-placeholder">
                                        <i class="fas fa-cloud-upload-alt"></i>
                                        <p>أي حجم</p>
                                        <small class="text-muted">ستعرض 500×500</small>
                                    </div>
                                    <input type="file" name="additional_images[]" accept="image/*" class="file-input">
                                    <button type="button" class="btn btn-sm btn-danger delete-image" style="display: none;" onclick="removeImage(this)">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </div>
                                <div class="image-upload-box additional-image" data-index="1">
                                    <div class="upload-placeholder">
                                        <i class="fas fa-cloud-upload-alt"></i>
                                        <p>أي حجم</p>
                                        <small class="text-muted">ستعرض 500×500</small>
                                    </div>
                                    <input type="file" name="additional_images[]" accept="image/*" class="file-input">
                                    <button type="button" class="btn btn-sm btn-danger delete-image" style="display: none;" onclick="removeImage(this)">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </div>
                                <div class="image-upload-box additional-image" data-index="2">
                                    <div class="upload-placeholder">
                                        <i class="fas fa-cloud-upload-alt"></i>
                                        <p>أي حجم</p>
                                        <small class="text-muted">ستعرض 500×500</small>
                                    </div>
                                    <input type="file" name="additional_images[]" accept="image/*" class="file-input">
                                    <button type="button" class="btn btn-sm btn-danger delete-image" style="display: none;" onclick="removeImage(this)">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </div>
                                <div class="image-upload-box add-more">
                                    <div class="upload-placeholder">
                                        <i class="fas fa-plus"></i>
                                        <p>رفع صورة</p>
                                    </div>
                                </div>
                            </div>
                            @error('additional_images.*')
                                <div class="text-danger mt-2">
                                    <small><i class="fas fa-exclamation-circle"></i> {{ $message }}</small>
                                </div>
                            @enderror
                        </div>
                    </div>
                </div>
            </div>

            <!-- SEO Section -->
            <div class="form-section">
                <div class="section-header">
                    <h4><i class="fas fa-search"></i> تحسين محركات البحث (SEO)</h4>
                </div>
                <div class="section-content">
                    <div class="row">
                        <div class="col-md-12 mb-3">
                            <label for="meta_title" class="form-label">عنوان المنتج للـ SEO</label>
                            <input type="text" class="form-control @error('meta_title') is-invalid @enderror" id="meta_title" name="meta_title" placeholder="أدخل اسم المنتج" value="{{ old('meta_title') }}">
                            @error('meta_title')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-md-12 mb-3">
                            <label for="meta_description" class="form-label">وصف SEO</label>
                            <textarea class="form-control @error('meta_description') is-invalid @enderror" id="meta_description" name="meta_description" rows="4" placeholder="أدخل وصف seo">{{ old('meta_description') }}</textarea>
                            @error('meta_description')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-md-12 mb-3">
                            <label for="seo_keywords" class="form-label">الكلمات المفتاحية</label>
                            <div class="keywords-input-container">
                                <input type="text" class="form-control" id="keyword-input" placeholder="اكتب كلمة مفتاحية واضغط Enter">
                                <div class="keywords-display" id="keywords-display"></div>
                                <input type="hidden" name="seo_keywords" id="seo-keywords-input">
                                <button type="button" class="btn btn-primary" id="add-keyword">إضافة</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="text-center">
                <button type="button" class="btn btn-secondary me-2">إعادة تعيين</button>
                <button type="submit" class="btn btn-primary">حفظ المنتج</button>
            </div>
        </form>
    </div>

    <!-- Quill Editor -->
    <link href="https://cdn.quilljs.com/1.3.6/quill.snow.css" rel="stylesheet">
    <script src="https://cdn.quilljs.com/1.3.6/quill.min.js"></script>
    
    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    
    <script>
        // Initialize Quill Editor
        var quill = new Quill('#description-editor', {
            theme: 'snow',
            modules: {
                toolbar: [
                    ['bold', 'italic', 'underline', 'strike'],
                    ['blockquote', 'code-block'],
                    [{ 'header': 1 }, { 'header': 2 }],
                    [{ 'list': 'ordered'}, { 'list': 'bullet' }],
                    [{ 'script': 'sub'}, { 'script': 'super' }],
                    [{ 'indent': '-1'}, { 'indent': '+1' }],
                    [{ 'direction': 'rtl' }],
                    [{ 'size': ['small', false, 'large', 'huge'] }],
                    [{ 'header': [1, 2, 3, 4, 5, 6, false] }],
                    [{ 'color': [] }, { 'background': [] }],
                    [{ 'font': [] }],
                    [{ 'align': [] }],
                    ['clean'],
                    ['link', 'image']
                ]
            }
        });

        // Set old value if exists
        @if(old('description'))
            quill.root.innerHTML = {!! json_encode(old('description')) !!};
        @endif

        // Update hidden input when form is submitted
        document.querySelector('form').addEventListener('submit', function() {
            document.getElementById('description-input').value = quill.root.innerHTML;
        });

        // Generate SKU functionality
        document.getElementById('generate-sku').addEventListener('click', function() {
            const sku = 'SKU-' + Math.random().toString(36).substr(2, 8).toUpperCase();
            document.getElementById('sku').value = sku;
        });

        // Keywords functionality
        let keywords = [];
        
        // Restore keywords from old input
        @if(old('seo_keywords'))
            try {
                keywords = JSON.parse('{!! old('seo_keywords') !!}');
                updateKeywordsDisplay();
                updateKeywordsInput();
            } catch(e) {
                keywords = [];
            }
        @endif
        
        function addKeyword() {
            const input = document.getElementById('keyword-input');
            const keyword = input.value.trim();
            
            if (keyword && !keywords.includes(keyword)) {
                keywords.push(keyword);
                updateKeywordsDisplay();
                input.value = '';
                updateKeywordsInput();
            }
        }
        
        function removeKeyword(keyword) {
            keywords = keywords.filter(k => k !== keyword);
            updateKeywordsDisplay();
            updateKeywordsInput();
        }
        
        function updateKeywordsDisplay() {
            const display = document.getElementById('keywords-display');
            display.innerHTML = keywords.map(keyword => 
                `<span class="keyword-tag">
                    ${keyword}
                    <span class="remove-keyword" onclick="removeKeyword('${keyword}')">&times;</span>
                </span>`
            ).join('');
        }
        
        function updateKeywordsInput() {
            document.getElementById('seo-keywords-input').value = JSON.stringify(keywords);
        }
        
        document.getElementById('add-keyword').addEventListener('click', addKeyword);
        
        document.getElementById('keyword-input').addEventListener('keypress', function(e) {
            if (e.key === 'Enter') {
                e.preventDefault();
                addKeyword();
            }
        });

        // Image upload functionality
        function handleImageUpload(input, container) {
            const file = input.files[0];
            if (file) {
                const reader = new FileReader();
                reader.onload = function(e) {
                    // Keep the original input element
                    const originalInput = container.querySelector('.file-input');
                    
                    container.innerHTML = `
                        <img src="${e.target.result}" alt="Preview" style="width: 100%; height: 100%; object-fit: cover; border-radius: 8px;">
                        <button type="button" class="btn btn-sm btn-danger delete-image" onclick="removeImage(this)" style="position: absolute; top: 5px; right: 5px; z-index: 10; display: block;">
                            <i class="fas fa-trash"></i>
                        </button>
                    `;
                    
                    // Re-add the input element (hidden)
                    const hiddenInput = originalInput.cloneNode(true);
                    hiddenInput.style.display = 'none';
                    container.appendChild(hiddenInput);
                    
                    container.classList.add('has-image');
                };
                reader.readAsDataURL(file);
            }
        }

        function removeImage(button) {
            const container = button.closest('.image-upload-box');
            
            if (container.id === 'thumbnail-upload') {
                // For thumbnail, just reset the content
                const input = container.querySelector('.file-input');
                input.value = '';
                container.classList.remove('has-image');
                
                container.innerHTML = `
                    <div class="upload-placeholder">
                        <i class="fas fa-cloud-upload-alt"></i>
                        <p>أي حجم</p>
                        <span>اسحب الصورة هنا أو انقر للتحديد</span>
                        <small class="text-muted d-block mt-1">ستعرض بحجم 500×500</small>
                    </div>
                    <input type="file" name="thumbnail" accept="image/*" class="file-input" id="thumbnail-input">
                `;
                
                // Re-attach event listener for thumbnail
                document.getElementById('thumbnail-input').addEventListener('change', function() {
                    handleImageUpload(this, document.getElementById('thumbnail-upload'));
                });
            } else {
                // For additional images, remove the entire container if it's dynamically added
                const additionalContainer = document.querySelector('.additional-images-container');
                const addMoreButton = additionalContainer.querySelector('.add-more');
                const imageCount = additionalContainer.querySelectorAll('.additional-image').length;
                
                // If this is one of the original 3 boxes, just reset it
                const dataIndex = parseInt(container.getAttribute('data-index'));
                if (dataIndex < 3) {
                    const input = container.querySelector('.file-input');
                    input.value = '';
                    container.classList.remove('has-image');
                    
                    container.innerHTML = `
                        <div class="upload-placeholder">
                            <i class="fas fa-cloud-upload-alt"></i>
                            <p>أي حجم</p>
                            <small class="text-muted">ستعرض 500×500</small>
                        </div>
                        <input type="file" name="additional_images[]" accept="image/*" class="file-input">
                        <button type="button" class="btn btn-sm btn-danger delete-image" style="display: none;" onclick="removeImage(this)">
                            <i class="fas fa-trash"></i>
                        </button>
                    `;
                    
                    // Re-attach event listener
                    container.querySelector('.file-input').addEventListener('change', function() {
                        handleImageUpload(this, container);
                    });
                } else {
                    // Remove the dynamically added container
                    container.remove();
                    
                    // Show add more button if we're below the limit
                    if (imageCount - 1 < 6) {
                        addMoreButton.style.display = 'flex';
                    }
                }
            }
        }

        // Add new image upload slot
        function addNewImageSlot() {
            const container = document.querySelector('.additional-images-container');
            const addMoreButton = container.querySelector('.add-more');
            const imageCount = container.querySelectorAll('.additional-image').length;
            
            if (imageCount < 6) { // Limit to 6 additional images
                const newImageBox = document.createElement('div');
                newImageBox.className = 'image-upload-box additional-image';
                newImageBox.setAttribute('data-index', imageCount);
                
                newImageBox.innerHTML = `
                    <div class="upload-placeholder">
                        <i class="fas fa-cloud-upload-alt"></i>
                        <p>أي حجم</p>
                        <small class="text-muted">ستعرض 500×500</small>
                    </div>
                    <input type="file" name="additional_images[]" accept="image/*" class="file-input">
                    <button type="button" class="btn btn-sm btn-danger delete-image" style="display: none;" onclick="removeImage(this)">
                        <i class="fas fa-trash"></i>
                    </button>
                `;
                
                // Insert before the "add more" button
                container.insertBefore(newImageBox, addMoreButton);
                
                // Attach event listener to the new input
                newImageBox.querySelector('.file-input').addEventListener('change', function() {
                    handleImageUpload(this, newImageBox);
                });
                
                // Add drag and drop to the new container
                addDragDropListeners(newImageBox);
                
                // Hide add more button if we reach the limit
                if (imageCount + 1 >= 6) {
                    addMoreButton.style.display = 'none';
                }
            }
        }

        // Attach image upload event listeners
        document.addEventListener('DOMContentLoaded', function() {
            // Thumbnail upload
            document.getElementById('thumbnail-input').addEventListener('change', function() {
                handleImageUpload(this, document.getElementById('thumbnail-upload'));
            });

            // Additional images upload
            document.querySelectorAll('.additional-image .file-input').forEach(input => {
                input.addEventListener('change', function() {
                    handleImageUpload(this, this.closest('.image-upload-box'));
                });
            });
            
            // Add more images button
            document.querySelector('.add-more').addEventListener('click', function() {
                addNewImageSlot();
            });

            // Add drag and drop functionality
            function addDragDropListeners(container) {
                const uploadBox = container;
                const fileInput = container.querySelector('.file-input');

                ['dragenter', 'dragover', 'dragleave', 'drop'].forEach(eventName => {
                    uploadBox.addEventListener(eventName, preventDefaults, false);
                });

                function preventDefaults(e) {
                    e.preventDefault();
                    e.stopPropagation();
                }

                ['dragenter', 'dragover'].forEach(eventName => {
                    uploadBox.addEventListener(eventName, highlight, false);
                });

                ['dragleave', 'drop'].forEach(eventName => {
                    uploadBox.addEventListener(eventName, unhighlight, false);
                });

                function highlight(e) {
                    uploadBox.classList.add('drag-over');
                }

                function unhighlight(e) {
                    uploadBox.classList.remove('drag-over');
                }

                uploadBox.addEventListener('drop', handleDrop, false);

                function handleDrop(e) {
                    const dt = e.dataTransfer;
                    const files = dt.files;

                    if (files.length > 0) {
                        fileInput.files = files;
                        handleImageUpload(fileInput, container);
                    }
                }
            }

            // Add drag and drop to existing containers
            document.getElementById('thumbnail-upload') && addDragDropListeners(document.getElementById('thumbnail-upload'));
            document.querySelectorAll('.additional-image').forEach(container => {
                addDragDropListeners(container);
            });

            // Subcategory loading based on category selection
            document.getElementById('category_id').addEventListener('change', function() {
                const categoryId = this.value;
                const subcategorySelect = document.getElementById('subcategory_id');
                
                // Clear existing options
                subcategorySelect.innerHTML = '<option value="">اختر الفئة الفرعية</option>';
                
                if (categoryId) {
                    // Here you would typically make an AJAX call to get subcategories
                    // For now, we'll just show a placeholder
                    subcategorySelect.innerHTML += '<option value="">جاري التحميل...</option>';
                }
            });
        });
    </script>
</body>
</html>
