<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>طلباتي - Sokappe Shop</title>
    
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
        
        .order-card {
            background: white;
            border-radius: 15px;
            padding: 25px;
            margin-bottom: 20px;
            box-shadow: 0 5px 15px rgba(0,0,0,0.08);
            transition: all 0.3s ease;
        }
        
        .order-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 25px rgba(0,0,0,0.15);
        }
        
        .order-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 20px;
            padding-bottom: 15px;
            border-bottom: 1px solid #eee;
        }
        
        .order-number {
            font-weight: 700;
            color: #667eea;
            font-size: 1.1rem;
        }
        
        .order-status {
            padding: 5px 15px;
            border-radius: 20px;
            font-size: 0.85rem;
            font-weight: 600;
        }
        
        .status-pending {
            background: #fff3cd;
            color: #856404;
        }
        
        .status-processing {
            background: #cce5ff;
            color: #004085;
        }
        
        .status-shipped {
            background: #d4edda;
            color: #155724;
        }
        
        .status-delivered {
            background: #d1ecf1;
            color: #0c5460;
        }
        
        .status-cancelled {
            background: #f8d7da;
            color: #721c24;
        }
        
        .order-item {
            display: flex;
            align-items: center;
            padding: 10px 0;
            border-bottom: 1px solid #f5f5f5;
        }
        
        .order-item:last-child {
            border-bottom: none;
        }
        
        .item-image {
            width: 60px;
            height: 60px;
            border-radius: 8px;
            object-fit: cover;
            margin-left: 15px;
        }
        
        .item-placeholder {
            width: 60px;
            height: 60px;
            border-radius: 8px;
            background: #f8f9fa;
            display: flex;
            align-items: center;
            justify-content: center;
            margin-left: 15px;
            color: #ccc;
        }
        
        .order-total {
            text-align: left;
            font-size: 1.2rem;
            font-weight: 700;
            color: #667eea;
        }
        
        .empty-orders {
            text-align: center;
            padding: 80px 20px;
            color: #666;
        }
        
        .empty-orders i {
            font-size: 5rem;
            color: #ddd;
            margin-bottom: 20px;
        }
        
        .filter-tabs {
            background: white;
            border-radius: 15px;
            padding: 20px;
            margin-bottom: 30px;
            box-shadow: 0 5px 15px rgba(0,0,0,0.08);
        }
        
        .filter-btn {
            border: none;
            background: none;
            padding: 10px 20px;
            border-radius: 25px;
            margin: 0 5px;
            transition: all 0.3s ease;
        }
        
        .filter-btn.active {
            background: #667eea;
            color: white;
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
                    <h1 class="page-title">طلباتي</h1>
                    <p class="page-subtitle">تتبع جميع طلباتك وحالة التوصيل</p>
                </div>
                <div class="col-lg-4 text-center">
                    <i class="fas fa-shopping-bag" style="font-size: 8rem; opacity: 0.3;"></i>
                </div>
            </div>
        </div>
    </section>

    <div class="container">
        <!-- Filter Tabs -->
        <div class="filter-tabs">
            <div class="text-center">
                <button class="filter-btn active" data-status="all">جميع الطلبات</button>
                <button class="filter-btn" data-status="pending">قيد الانتظار</button>
                <button class="filter-btn" data-status="processing">قيد التجهيز</button>
                <button class="filter-btn" data-status="shipped">تم الشحن</button>
                <button class="filter-btn" data-status="delivered">تم التوصيل</button>
                <button class="filter-btn" data-status="cancelled">ملغي</button>
            </div>
        </div>

        <!-- Orders List -->
        <div id="orders-container">
            @if(count($orders) > 0)
                @foreach($orders as $order)
                <div class="order-card" data-status="{{ $order['status'] }}">
                    <div class="order-header">
                        <div>
                            <div class="order-number">#{{ $order['id'] }}</div>
                            <small class="text-muted">تاريخ الطلب: {{ $order['date'] }}</small>
                        </div>
                        <span class="order-status status-{{ $order['status'] }}">{{ $order['status_text'] }}</span>
                    </div>
                    
                    <div class="order-items">
                        @foreach($order['items'] as $item)
                        <div class="order-item">
                            <div class="item-placeholder">
                                <i class="fas fa-image"></i>
                            </div>
                            <div class="flex-grow-1">
                                <h6 class="mb-1">{{ $item['name'] }}</h6>
                                <small class="text-muted">الكمية: {{ $item['quantity'] }}</small>
                            </div>
                            <div class="order-total">{{ number_format($item['price'] * $item['quantity']) }} جنيه</div>
                        </div>
                        @endforeach
                    </div>
                    
                    <div class="d-flex justify-content-between align-items-center mt-3">
                        <div>
                            <strong>المجموع: {{ number_format($order['total']) }} جنيه</strong>
                        </div>
                        <div>
                            <button class="btn btn-outline-primary btn-sm me-2" onclick="alert('قريباً!')">
                                <i class="fas fa-eye me-1"></i>
                                تفاصيل
                            </button>
                            @if($order['status'] == 'pending' || $order['status'] == 'processing')
                            <button class="btn btn-outline-danger btn-sm" onclick="alert('قريباً!')">
                                <i class="fas fa-times me-1"></i>
                                إلغاء
                            </button>
                            @endif
                        </div>
                    </div>
                </div>
                @endforeach
            @else
                <!-- Empty State -->
                <div class="empty-orders">
                    <i class="fas fa-shopping-bag"></i>
                    <h3>لا توجد طلبات</h3>
                    <p>لم تقم بتقديم أي طلبات بعد</p>
                    <a href="{{ route('products.index') }}" class="btn btn-primary">
                        <i class="fas fa-shopping-bag me-2"></i>
                        ابدأ التسوق الآن
                    </a>
                </div>
            @endif
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    
    <script>
        // Filter functionality
        document.querySelectorAll('.filter-btn').forEach(btn => {
            btn.addEventListener('click', function() {
                // Remove active class from all buttons
                document.querySelectorAll('.filter-btn').forEach(b => b.classList.remove('active'));
                // Add active class to clicked button
                this.classList.add('active');
                
                // Filter logic will be implemented here
                const status = this.dataset.status;
                console.log('Filter by status:', status);
            });
        });
    </script>
</body>
</html>
