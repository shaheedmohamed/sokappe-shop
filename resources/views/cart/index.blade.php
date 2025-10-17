<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>السلة - Sokappe Shop</title>
    
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
        
        .page-header {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            padding: 60px 0;
            margin-bottom: 30px;
        }
        
        .cart-item {
            background: white;
            border-radius: 15px;
            padding: 20px;
            margin-bottom: 20px;
            box-shadow: 0 5px 15px rgba(0,0,0,0.08);
        }
        
        .cart-item-image {
            width: 100px;
            height: 100px;
            border-radius: 10px;
            object-fit: cover;
        }
        
        .quantity-controls {
            display: flex;
            align-items: center;
            gap: 10px;
        }
        
        .quantity-btn {
            width: 35px;
            height: 35px;
            border: none;
            border-radius: 50%;
            background: #667eea;
            color: white;
            display: flex;
            align-items: center;
            justify-content: center;
        }
        
        .cart-summary {
            background: white;
            border-radius: 15px;
            padding: 30px;
            box-shadow: 0 5px 15px rgba(0,0,0,0.08);
            position: sticky;
            top: 100px;
        }
        
        .empty-cart {
            text-align: center;
            padding: 80px 20px;
            color: #666;
        }
        
        .empty-cart i {
            font-size: 5rem;
            color: #ddd;
            margin-bottom: 20px;
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
                    <h1 class="page-title">سلة التسوق</h1>
                    <p class="page-subtitle">راجع منتجاتك المختارة واتمم عملية الشراء</p>
                </div>
                <div class="col-lg-4 text-center">
                    <i class="fas fa-shopping-cart" style="font-size: 8rem; opacity: 0.3;"></i>
                </div>
            </div>
        </div>
    </section>

    <div class="container">
        <div class="row">
            <div class="col-lg-8">
                <!-- Cart Items -->
                <div id="cart-items">
                    @if(count($cartItems) > 0)
                        @foreach($cartItems as $item)
                        <div class="cart-item" data-product-id="{{ $item['id'] }}">
                            <div class="row align-items-center">
                                <div class="col-md-2">
                                    @if($item['image'])
                                        <img src="{{ asset('storage/' . $item['image']) }}" alt="{{ $item['name'] }}" class="cart-item-image">
                                    @else
                                        <div class="cart-item-image d-flex align-items-center justify-content-center bg-light">
                                            <i class="fas fa-image text-muted"></i>
                                        </div>
                                    @endif
                                </div>
                                <div class="col-md-4">
                                    <h6 class="mb-1">{{ $item['name'] }}</h6>
                                    <small class="text-muted">{{ number_format($item['price']) }} جنيه</small>
                                </div>
                                <div class="col-md-3">
                                    <div class="quantity-controls">
                                        <button class="quantity-btn" onclick="updateQuantity({{ $item['id'] }}, {{ $item['quantity'] - 1 }})">
                                            <i class="fas fa-minus"></i>
                                        </button>
                                        <span class="mx-3">{{ $item['quantity'] }}</span>
                                        <button class="quantity-btn" onclick="updateQuantity({{ $item['id'] }}, {{ $item['quantity'] + 1 }})">
                                            <i class="fas fa-plus"></i>
                                        </button>
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <strong>{{ number_format($item['price'] * $item['quantity']) }} جنيه</strong>
                                </div>
                                <div class="col-md-1">
                                    <button class="btn btn-sm btn-outline-danger" onclick="removeFromCart({{ $item['id'] }})">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    @else
                        <div class="empty-cart">
                            <i class="fas fa-shopping-cart"></i>
                            <h3>السلة فارغة</h3>
                            <p>لم تقم بإضافة أي منتجات للسلة بعد</p>
                            <a href="{{ route('products.index') }}" class="btn btn-primary">
                                <i class="fas fa-shopping-bag me-2"></i>
                                تصفح المنتجات
                            </a>
                        </div>
                    @endif
                </div>
            </div>
            
            <div class="col-lg-4">
                <!-- Cart Summary -->
                <div class="cart-summary">
                    <h4 class="mb-4">ملخص الطلب</h4>
                    
                    <div class="d-flex justify-content-between mb-3">
                        <span>المجموع الفرعي:</span>
                        <span id="subtotal">{{ number_format($total) }} جنيه</span>
                    </div>
                    
                    <div class="d-flex justify-content-between mb-3">
                        <span>الشحن:</span>
                        <span id="shipping">مجاني</span>
                    </div>
                    
                    <div class="d-flex justify-content-between mb-3">
                        <span>الضرائب:</span>
                        <span id="tax">0 جنيه</span>
                    </div>
                    
                    <hr>
                    
                    <div class="d-flex justify-content-between mb-4">
                        <strong>المجموع الكلي:</strong>
                        <strong id="total">{{ number_format($total) }} جنيه</strong>
                    </div>
                    
                    <button class="btn btn-primary w-100 mb-3" id="checkout-btn" {{ count($cartItems) == 0 ? 'disabled' : '' }}>
                        <i class="fas fa-credit-card me-2"></i>
                        إتمام الشراء
                    </button>
                    
                    <a href="{{ route('products.index') }}" class="btn btn-outline-primary w-100">
                        <i class="fas fa-arrow-right me-2"></i>
                        متابعة التسوق
                    </a>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    
    <script>
        function updateQuantity(productId, quantity) {
            if (quantity < 1) {
                removeFromCart(productId);
                return;
            }
            
            fetch('{{ route("cart.update") }}', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                },
                body: JSON.stringify({
                    product_id: productId,
                    quantity: quantity
                })
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    location.reload();
                }
            });
        }
        
        function removeFromCart(productId) {
            if (confirm('هل تريد حذف هذا المنتج من السلة؟')) {
                fetch('{{ route("cart.remove") }}', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': '{{ csrf_token() }}'
                    },
                    body: JSON.stringify({
                        product_id: productId
                    })
                })
                .then(response => response.json())
                .then(data => {
                    if (data.success) {
                        location.reload();
                    }
                });
            }
        }
    </script>
</body>
</html>
