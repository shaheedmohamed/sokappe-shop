<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>اختر نوع حسابك - Sokappe</title>
    
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
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            direction: rtl;
            padding: 20px 0;
        }
        
        .auth-container {
            background: white;
            border-radius: 20px;
            box-shadow: 0 20px 60px rgba(0,0,0,0.1);
            overflow: hidden;
            width: 100%;
            max-width: 500px;
            margin: 20px;
        }
        
        .auth-header {
            background: linear-gradient(135deg, #00b4db 0%, #0083b0 100%);
            color: white;
            padding: 40px 30px;
            text-align: center;
        }
        
        .auth-header h2 {
            margin: 0;
            font-size: 1.8rem;
            font-weight: 600;
            margin-bottom: 10px;
        }
        
        .auth-header p {
            margin: 0;
            opacity: 0.9;
            font-size: 1rem;
        }
        
        .step-indicator {
            background: rgba(255,255,255,0.2);
            padding: 10px 20px;
            border-radius: 20px;
            margin-top: 15px;
            font-size: 0.9rem;
        }
        
        .auth-body {
            padding: 40px 30px;
        }
        
        .account-type-card {
            border: 3px solid #e1e5e9;
            border-radius: 15px;
            padding: 30px 25px;
            text-align: center;
            cursor: pointer;
            transition: all 0.3s ease;
            margin-bottom: 20px;
            position: relative;
            background: #f8f9fa;
        }
        
        .account-type-card:hover {
            border-color: #00b4db;
            background: white;
            transform: translateY(-5px);
            box-shadow: 0 10px 30px rgba(0, 180, 219, 0.15);
        }
        
        .account-type-card.selected {
            border-color: #00b4db;
            background: linear-gradient(135deg, rgba(0, 180, 219, 0.1) 0%, rgba(0, 131, 176, 0.1) 100%);
        }
        
        .account-type-icon {
            font-size: 4rem;
            margin-bottom: 20px;
            color: #667eea;
        }
        
        .account-type-title {
            font-size: 1.4rem;
            font-weight: 600;
            color: #333;
            margin-bottom: 10px;
        }
        
        .account-type-desc {
            color: #666;
            font-size: 1rem;
            line-height: 1.5;
        }
        
        .radio-input {
            position: absolute;
            opacity: 0;
            width: 0;
            height: 0;
        }
        
        .radio-indicator {
            position: absolute;
            top: 15px;
            left: 15px;
            width: 20px;
            height: 20px;
            border: 2px solid #ddd;
            border-radius: 50%;
            background: white;
        }
        
        .account-type-card.selected .radio-indicator {
            border-color: #00b4db;
            background: #00b4db;
        }
        
        .account-type-card.selected .radio-indicator::after {
            content: '';
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            width: 8px;
            height: 8px;
            background: white;
            border-radius: 50%;
        }
        
        .btn-primary {
            background: linear-gradient(135deg, #00b4db 0%, #0083b0 100%);
            border: none;
            padding: 15px 30px;
            border-radius: 10px;
            font-weight: 600;
            font-size: 1rem;
            width: 100%;
            transition: all 0.3s ease;
            margin-top: 20px;
        }
        
        .btn-primary:hover {
            transform: translateY(-2px);
            box-shadow: 0 10px 25px rgba(0, 180, 219, 0.3);
        }
        
        .btn-primary:disabled {
            opacity: 0.6;
            cursor: not-allowed;
            transform: none;
        }
        
        .emoji {
            font-size: 1.5rem;
            margin-left: 10px;
        }
    </style>
</head>
<body>
    <div class="auth-container">
        <div class="auth-header">
            <h2>اختر نوع حسابك <span class="emoji">🎯</span></h2>
            <p>حدد كيف تريد استخدام Sokappe</p>
            <div class="step-indicator">الخطوة 2 من 3</div>
        </div>
        
        <div class="auth-body">
            <form method="POST" action="{{ route('register.choose-type') }}" id="accountTypeForm">
                @csrf
                
                <div class="account-type-card" data-type="customer">
                    <input type="radio" name="user_type" value="customer" class="radio-input" id="customer">
                    <div class="radio-indicator"></div>
                    <div class="account-type-icon">
                        💼
                    </div>
                    <h3 class="account-type-title">طالب خدمة</h3>
                    <p class="account-type-desc">
                        أريد تصفح ومقارنة وشراء عروض من المستقلين المحترفين
                    </p>
                </div>
                
                <div class="account-type-card" data-type="vendor">
                    <input type="radio" name="user_type" value="vendor" class="radio-input" id="vendor">
                    <div class="radio-indicator"></div>
                    <div class="account-type-icon">
                        ⭐
                    </div>
                    <h3 class="account-type-title">مستقل</h3>
                    <p class="account-type-desc">
                        أريد عرض خدماتي وبيع منتجاتي من خلال متجري
                    </p>
                </div>
                
                <button type="submit" class="btn btn-primary" id="continueBtn" disabled>
                    <i class="fas fa-arrow-left"></i> التالي
                </button>
            </form>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const cards = document.querySelectorAll('.account-type-card');
            const radioInputs = document.querySelectorAll('.radio-input');
            const continueBtn = document.getElementById('continueBtn');
            
            cards.forEach(card => {
                card.addEventListener('click', function() {
                    // Remove selected class from all cards
                    cards.forEach(c => c.classList.remove('selected'));
                    
                    // Add selected class to clicked card
                    this.classList.add('selected');
                    
                    // Check the corresponding radio input
                    const radio = this.querySelector('.radio-input');
                    radio.checked = true;
                    
                    // Enable continue button
                    continueBtn.disabled = false;
                });
            });
            
            // Handle radio input changes
            radioInputs.forEach(radio => {
                radio.addEventListener('change', function() {
                    if (this.checked) {
                        cards.forEach(c => c.classList.remove('selected'));
                        this.closest('.account-type-card').classList.add('selected');
                        continueBtn.disabled = false;
                    }
                });
            });
        });
    </script>
</body>
</html>
