<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sokappe Shop - السوق الإلكتروني الأول في مصر</title>
    <meta name="description" content="تسوق من أفضل المتاجر في مصر - منتجات متنوعة وأسعار مميزة">
    
    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@300;400;600;700&display=swap" rel="stylesheet">
    
    <!-- Bootstrap RTL -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.rtl.min.css" rel="stylesheet">
    
    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
    
    <!-- Custom CSS -->
    <style>
        * {
            font-family: 'Cairo', sans-serif;
        }
        
        body {
            background-color: #f8f9fa;
            direction: rtl;
            padding-top: 0 !important; /* Override navbar padding for this page */
        }
        
        
        .hero-section {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            min-height: 90vh;
            display: flex;
            align-items: center;
            position: relative;
            overflow: hidden;
            padding: 35px 0;
        }
        
        .hero-animation {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            pointer-events: none;
        }
        
        .floating-icons {
            position: relative;
            width: 100%;
            height: 100%;
        }
        
        .floating-icon {
            position: absolute;
            font-size: 2rem;
            opacity: 0.1;
            animation: float 6s ease-in-out infinite;
            color: rgba(255,255,255,0.3);
        }
        
        @keyframes float {
            0%, 100% { transform: translateY(0px) rotate(0deg); }
            50% { transform: translateY(-20px) rotate(180deg); }
        }
        
        .hero-badge {
            background: rgba(255,107,53,0.9);
            color: white;
            padding: 8px 20px;
            border-radius: 25px;
            display: inline-flex;
            align-items: center;
            gap: 8px;
            margin-bottom: 20px;
            font-weight: 600;
            animation: pulse 2s infinite;
        }
        
        @keyframes pulse {
            0% { transform: scale(1); }
            50% { transform: scale(1.05); }
            100% { transform: scale(1); }
        }
        
        .hero-title {
            font-size: 3.5rem;
            font-weight: 700;
            margin-bottom: 25px;
            line-height: 1.2;
        }
        
        .text-gradient {
            background: linear-gradient(45deg, #ff6b35, #f7931e, #ffd700);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
            animation: shimmer 3s ease-in-out infinite;
        }
        
        @keyframes shimmer {
            0%, 100% { background-position: 0% 50%; }
            50% { background-position: 100% 50%; }
        }
        
        .hero-subtitle {
            font-size: 1.2rem;
            margin-bottom: 30px;
            line-height: 2;
        }
        
        .hero-buttons {
            display: flex;
            gap: 15px;
            margin: 30px 0;
            flex-wrap: wrap;
        }
        
        .pulse-btn {
            animation: buttonPulse 2s infinite;
            position: relative;
            overflow: hidden;
        }
        
        @keyframes buttonPulse {
            0% { box-shadow: 0 0 0 0 rgba(255,107,53,0.7); }
            70% { box-shadow: 0 0 0 10px rgba(255,107,53,0); }
            100% { box-shadow: 0 0 0 0 rgba(255,107,53,0); }
        }
        
        .hero-stats {
            display: flex;
            gap: 30px;
            margin-top: 40px;
            flex-wrap: wrap;
        }
        
        .stat-item {
            text-align: center;
        }
        
        .stat-number {
            font-size: 2.5rem;
            font-weight: 700;
            color: #ffd700;
            display: block;
            margin-bottom: 5px;
        }
        
        .stat-label {
            font-size: 0.9rem;
            opacity: 0.8;
        }
        
        .hero-image {
            position: relative;
            display: flex;
            justify-content: center;
            align-items: center;
        }
        
        .hero-main-image {
            position: relative;
            border-radius: 20px;
            overflow: hidden;
            box-shadow: 0 20px 40px rgba(0,0,0,0.3);
            transform: perspective(1000px) rotateY(-5deg);
            animation: imageFloat 6s ease-in-out infinite;
        }
        
        @keyframes imageFloat {
            0%, 100% { transform: perspective(1000px) rotateY(-5deg) translateY(0px); }
            50% { transform: perspective(1000px) rotateY(-5deg) translateY(-10px); }
        }
        
        .main-img {
            width: 100%;
            height: 400px;
            object-fit: cover;
            border-radius: 20px;
        }
        
        .floating-cards {
            position: absolute;
            width: 100%;
            height: 100%;
        }
        
        .product-card-mini {
            position: absolute;
            background: white;
            border-radius: 10px;
            padding: 10px;
            box-shadow: 0 10px 25px rgba(0,0,0,0.2);
            animation: cardFloat 4s ease-in-out infinite;
        }
        
        .card-1 {
            top: 10%;
            right: -20px;
            animation-delay: 0s;
        }
        
        .card-2 {
            bottom: 30%;
            left: -30px;
            animation-delay: 1s;
        }
        
        .card-3 {
            top: 60%;
            right: -15px;
            animation-delay: 2s;
        }
        
        @keyframes cardFloat {
            0%, 100% { transform: translateY(0px) rotate(0deg); }
            50% { transform: translateY(-15px) rotate(2deg); }
        }
        
        .product-card-mini img {
            width: 60px;
            height: 60px;
            object-fit: cover;
            border-radius: 8px;
            margin-bottom: 8px;
        }
        
        .card-info {
            display: flex;
            justify-content: space-between;
            align-items: center;
            font-size: 0.8rem;
        }
        
        .price {
            font-weight: 600;
            color: #ff6b35;
        }
        
        .card-info i {
            color: #667eea;
            cursor: pointer;
            transition: all 0.3s ease;
        }
        
        .card-info i:hover {
            transform: scale(1.2);
            color: #ff6b35;
        }
        
        .scroll-indicator {
            position: absolute;
            bottom: 30px;
            left: 50%;
            transform: translateX(-50%);
            text-align: center;
            animation: bounce 2s infinite;
        }
        
        @keyframes bounce {
            0%, 20%, 50%, 80%, 100% { transform: translateX(-50%) translateY(0); }
            40% { transform: translateX(-50%) translateY(-10px); }
            60% { transform: translateX(-50%) translateY(-5px); }
        }
        
        .scroll-text {
            font-size: 0.9rem;
            margin-bottom: 5px;
            opacity: 0.8;
        }
        
        .scroll-arrow {
            font-size: 1.2rem;
        }
        
        .search-box {
            background: white;
            border-radius: 50px;
            padding: 5px;
            box-shadow: 0 5px 20px rgba(0,0,0,0.1);
        }
        
        .search-input {
            border: none;
            padding: 15px 25px;
            font-size: 1.1rem;
            border-radius: 50px;
        }
        
        .search-btn {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            border: none;
            padding: 15px 30px;
            border-radius: 50px;
            color: white;
            font-weight: 600;
        }
        
        .category-card {
            background: white;
            border-radius: 20px;
            padding: 35px 25px;
            text-align: center;
            box-shadow: 0 8px 25px rgba(0,0,0,0.1);
            transition: all 0.4s ease;
            border: none;
            height: 100%;
            position: relative;
            overflow: hidden;
        }
        
        .category-card::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(255,255,255,0.4), transparent);
            transition: left 0.5s;
        }
        
        .category-card:hover::before {
            left: 100%;
        }
        
        .category-card:hover {
            transform: translateY(-10px) scale(1.02);
            box-shadow: 0 20px 40px rgba(102, 126, 234, 0.2);
            border: 2px solid rgba(102, 126, 234, 0.3);
        }
        
        .category-icon {
            font-size: 4rem;
            margin-bottom: 25px;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
            animation: iconPulse 3s ease-in-out infinite;
        }
        
        @keyframes iconPulse {
            0%, 100% { transform: scale(1); }
            50% { transform: scale(1.1); }
        }
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }
        
        .category-title {
            font-size: 1.3rem;
            font-weight: 600;
            color: #333;
            margin-bottom: 10px;
        }
        
        .category-desc {
            color: #666;
            font-size: 0.95rem;
        }
        
        .product-card {
            background: white;
            border-radius: 15px;
            overflow: hidden;
            box-shadow: 0 5px 15px rgba(0,0,0,0.08);
            transition: all 0.3s ease;
            border: none;
        }
        
        .product-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 25px rgba(0,0,0,0.15);
        }
        
        .product-image {
            height: 200px;
            background: linear-gradient(45deg, #f0f0f0, #e0e0e0);
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 4rem;
            color: #ccc;
        }
        
        .product-info {
            padding: 20px;
        }
        
        .product-title {
            font-weight: 600;
            color: #333;
            margin-bottom: 10px;
        }
        
        .product-price {
            font-size: 1.3rem;
            font-weight: 700;
            color: #667eea;
        }
        
        .section-title {
            font-size: 2.5rem;
            font-weight: 700;
            text-align: center;
            margin-bottom: 50px;
            color: #333;
        }
        
        .stats-section {
            background: white;
            padding: 60px 0;
            margin: 50px 0;
        }
        
        .stat-item {
            text-align: center;
            padding: 20px;
        }
        
        .stat-number {
            font-size: 3rem;
            font-weight: 700;
            color: #667eea;
            margin-bottom: 10px;
        }
        
        .stat-label {
            font-size: 1.1rem;
            color: #666;
        }
        
        .footer {
            background: #333;
            color: white;
            padding: 50px 0 20px;
            margin-top: 80px;
        }
        
        .footer h5 {
            color: #667eea;
            margin-bottom: 20px;
        }
        
        .footer a {
            color: #ccc;
            text-decoration: none;
            transition: color 0.3s ease;
        }
        
        .footer a:hover {
            color: #667eea;
        }
        
        /* New Sections Styles */
        .vendor-card {
            background: white;
            border-radius: 15px;
            padding: 25px;
            box-shadow: 0 5px 15px rgba(0,0,0,0.08);
            transition: all 0.3s ease;
            height: 100%;
        }
        
        .vendor-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 15px 35px rgba(0,0,0,0.15);
        }
        
        .vendor-header {
            display: flex;
            align-items: center;
            margin-bottom: 15px;
        }
        
        .vendor-avatar {
            width: 60px;
            height: 60px;
            border-radius: 50%;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-size: 1.5rem;
            margin-left: 15px;
        }
        
        .vendor-name {
            font-size: 1.2rem;
            font-weight: 600;
            margin-bottom: 5px;
        }
        
        .vendor-rating .stars {
            color: #ffc107;
            margin-bottom: 5px;
        }
        
        .vendor-stats {
            display: flex;
            justify-content: space-between;
            margin-top: 20px;
        }
        
        .vendor-stats .stat {
            text-align: center;
        }
        
        .vendor-stats .number {
            display: block;
            font-size: 1.5rem;
            font-weight: 700;
            color: #667eea;
        }
        
        .vendor-stats .label {
            font-size: 0.9rem;
            color: #666;
        }
        
        .offers-banner {
            background: linear-gradient(135deg, #ff6b6b 0%, #ee5a24 100%);
            border-radius: 20px;
            padding: 50px 40px;
            color: white;
            margin: 30px 0;
        }
        
        .offers-title {
            font-size: 2.2rem;
            font-weight: 700;
            margin-bottom: 15px;
        }
        
        .offers-subtitle {
            font-size: 1.2rem;
            margin-bottom: 25px;
            opacity: 0.9;
        }
        
        .offer-badge {
            width: 150px;
            height: 150px;
            border-radius: 50%;
            background: rgba(255,255,255,0.2);
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            margin: 0 auto;
            border: 3px solid rgba(255,255,255,0.3);
        }
        
        .offer-badge .discount {
            font-size: 2.5rem;
            font-weight: 700;
        }
        
        .categories-showcase {
            margin: 30px 0;
        }
        
        .category-showcase-item {
            display: block;
            background: white;
            border-radius: 10px;
            padding: 20px;
            text-align: center;
            text-decoration: none;
            color: inherit;
            box-shadow: 0 3px 10px rgba(0,0,0,0.05);
            transition: all 0.3s ease;
            height: 100%;
        }
        
        .category-showcase-item:hover {
            transform: translateY(-3px);
            box-shadow: 0 8px 25px rgba(0,0,0,0.1);
            text-decoration: none;
            color: inherit;
        }
        
        .category-image {
            font-size: 2.5rem;
            color: #667eea;
            margin-bottom: 15px;
        }
        
        .category-name {
            font-weight: 600;
            margin-bottom: 5px;
        }
        
        .category-count {
            font-size: 0.9rem;
            color: #666;
        }
        
        .popular-searches {
            margin: 30px 0;
        }
        
        .search-tags {
            display: flex;
            flex-wrap: wrap;
            gap: 10px;
        }
        
        .search-tag {
            background: #f8f9fa;
            color: #333;
            padding: 8px 16px;
            border-radius: 20px;
            text-decoration: none;
            font-size: 0.9rem;
            transition: all 0.3s ease;
            border: 1px solid #e9ecef;
        }
        
        .search-tag:hover {
            background: #667eea;
            color: white;
            text-decoration: none;
            transform: translateY(-2px);
        }
        
        .how-it-works-item {
            text-align: center;
            padding: 30px 20px;
            position: relative;
        }
        
        .step-number {
            position: absolute;
            top: 10px;
            right: 10px;
            width: 30px;
            height: 30px;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: 700;
            font-size: 0.9rem;
        }
        
        .step-icon {
            font-size: 3rem;
            color: #667eea;
            margin-bottom: 20px;
        }
        
        .step-title {
            font-weight: 600;
            margin-bottom: 15px;
        }
        
        .step-desc {
            color: #666;
            line-height: 1.6;
        }
        
        .app-promotion {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            border-radius: 20px;
            padding: 50px 40px;
            color: white;
            margin: 30px 0;
        }
        
        .app-title {
            font-size: 2.2rem;
            font-weight: 700;
            margin-bottom: 15px;
        }
        
        .app-subtitle {
            font-size: 1.2rem;
            margin-bottom: 25px;
            opacity: 0.9;
        }
        
        .app-features {
            list-style: none;
            padding: 0;
            margin-bottom: 30px;
        }
        
        .app-features li {
            padding: 8px 0;
            font-size: 1.1rem;
        }
        
        .app-features i {
            color: #4CAF50;
            margin-left: 10px;
        }
        
        .app-buttons {
            display: flex;
            gap: 15px;
        }
        
        .app-button img {
            height: 50px;
            border-radius: 8px;
        }
        
        .phone-mockup {
            font-size: 8rem;
            opacity: 0.3;
        }
        
        .newsletter-section {
            background: #f8f9fa;
            border-radius: 15px;
            padding: 40px;
            margin: 30px 0;
        }
        
        .newsletter-title {
            font-weight: 600;
            margin-bottom: 10px;
        }
        
        .newsletter-subtitle {
            color: #666;
            margin-bottom: 0;
        }
        
        .newsletter-form .form-control {
            border-radius: 25px 0 0 25px;
            border: 2px solid #e9ecef;
            padding: 12px 20px;
        }
        
        .newsletter-form .btn {
            border-radius: 0 25px 25px 0;
            padding: 12px 25px;
        }
        
        /* Interactive Product Slider */
        .product-slider-container {
            position: relative;
            overflow: hidden;
            margin: 30px 0;
        }
        
        .product-slider {
            display: flex;
            transition: transform 0.5s ease;
            gap: 20px;
        }
        
        .slider-item {
            min-width: 250px;
            flex-shrink: 0;
        }
        
        .slider-btn {
            position: absolute;
            top: 50%;
            transform: translateY(-50%);
            background: rgba(102, 126, 234, 0.9);
            color: white;
            border: none;
            width: 50px;
            height: 50px;
            border-radius: 50%;
            font-size: 1.2rem;
            cursor: pointer;
            z-index: 10;
            transition: all 0.3s ease;
        }
        
        .slider-btn:hover {
            background: #667eea;
            transform: translateY(-50%) scale(1.1);
        }
        
        .slider-btn.prev {
            right: 10px;
        }
        
        .slider-btn.next {
            left: 10px;
        }
        
        /* Category Tabs */
        .category-tabs {
            background: white;
            border-radius: 15px;
            padding: 30px;
            box-shadow: 0 5px 15px rgba(0,0,0,0.08);
        }
        
        .tab-buttons {
            display: flex;
            gap: 10px;
            margin-bottom: 30px;
            flex-wrap: wrap;
        }
        
        .tab-btn {
            background: #f8f9fa;
            border: 2px solid #e9ecef;
            color: #666;
            padding: 12px 25px;
            border-radius: 25px;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s ease;
        }
        
        .tab-btn.active,
        .tab-btn:hover {
            background: #667eea;
            border-color: #667eea;
            color: white;
        }
        
        .tab-pane {
            display: none;
        }
        
        .tab-pane.active {
            display: block;
        }
        
        .category-item {
            background: #f8f9fa;
            border-radius: 10px;
            padding: 25px;
            text-align: center;
            cursor: pointer;
            transition: all 0.3s ease;
            border: 2px solid transparent;
        }
        
        .category-item:hover {
            background: white;
            border-color: #667eea;
            transform: translateY(-5px);
            box-shadow: 0 10px 25px rgba(0,0,0,0.1);
        }
        
        .category-item i {
            font-size: 2.5rem;
            color: #667eea;
            margin-bottom: 15px;
        }
        
        .category-item h6 {
            font-weight: 600;
            margin-bottom: 10px;
        }
        
        .category-item span {
            color: #666;
            font-size: 0.9rem;
        }
        
        /* Live Statistics */
        .live-stats {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            border-radius: 20px;
            padding: 50px 30px;
            color: white;
        }
        
        .stat-counter {
            padding: 20px;
        }
        
        .stat-counter i {
            font-size: 3rem;
            margin-bottom: 20px;
            opacity: 0.8;
        }
        
        .counter {
            font-size: 3rem;
            font-weight: 700;
            margin-bottom: 10px;
        }
        
        .stat-counter p {
            font-size: 1.1rem;
            margin: 0;
            opacity: 0.9;
        }
        
        /* User Dropdown Styles */
        .user-dropdown {
            display: flex;
            align-items: center;
            gap: 10px;
            padding: 8px 15px !important;
            border-radius: 25px;
            transition: all 0.3s ease;
        }
        
        .user-dropdown:hover {
            background: rgba(255,255,255,0.1);
        }
        
        .user-avatar {
            width: 35px;
            height: 35px;
            border-radius: 50%;
            background: rgba(255,255,255,0.2);
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1rem;
        }
        
        .user-name {
            font-weight: 600;
            max-width: 120px;
            overflow: hidden;
            text-overflow: ellipsis;
            white-space: nowrap;
        }
        
        .user-dropdown-menu {
            min-width: 280px;
            border-radius: 15px;
            border: none;
            box-shadow: 0 10px 30px rgba(0,0,0,0.15);
            padding: 0;
            margin-top: 10px;
        }
        
        .user-info {
            display: flex;
            align-items: center;
            gap: 15px;
            padding: 20px;
        }
        
        .user-avatar-large {
            width: 50px;
            height: 50px;
            border-radius: 50%;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-size: 1.5rem;
        }
        
        .user-details strong {
            display: block;
            font-size: 1.1rem;
            margin-bottom: 2px;
        }
        
        .user-details small {
            font-size: 0.85rem;
        }
        
        .dropdown-item {
            padding: 12px 20px;
            font-size: 0.95rem;
            transition: all 0.3s ease;
        }
        
        .dropdown-item:hover {
            background: #f8f9fa;
            padding-right: 25px;
        }
        
        .dropdown-item i {
            width: 20px;
            text-align: center;
        }
        
        /* Flash Sale Banner */
        .flash-sale-banner {
            position: relative;
            border-radius: 25px;
            overflow: hidden;
            margin: 40px 0;
            min-height: 300px;
        }
        
        .sale-background {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
        }
        
        .sale-background img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }
        
        .sale-overlay {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: linear-gradient(135deg, rgba(255,107,53,0.9) 0%, rgba(247,147,30,0.8) 100%);
        }
        
        .sale-content {
            position: relative;
            z-index: 2;
            padding: 50px 40px;
            color: white;
        }
        
        .sale-badge {
            background: rgba(255,255,255,0.2);
            color: white;
            padding: 8px 20px;
            border-radius: 25px;
            display: inline-flex;
            align-items: center;
            gap: 8px;
            margin-bottom: 20px;
            font-weight: 600;
            animation: flashPulse 1.5s infinite;
        }
        
        @keyframes flashPulse {
            0%, 100% { transform: scale(1); background: rgba(255,255,255,0.2); }
            50% { transform: scale(1.05); background: rgba(255,255,255,0.3); }
        }
        
        .sale-title {
            font-size: 2.8rem;
            font-weight: 700;
            margin-bottom: 15px;
            text-shadow: 2px 2px 4px rgba(0,0,0,0.3);
        }
        
        .sale-subtitle {
            font-size: 1.3rem;
            margin-bottom: 30px;
            opacity: 0.95;
        }
        
        .countdown-timer {
            display: flex;
            gap: 20px;
            margin-bottom: 30px;
        }
        
        .time-unit {
            background: rgba(255,255,255,0.15);
            border-radius: 15px;
            padding: 15px 20px;
            text-align: center;
            backdrop-filter: blur(10px);
            border: 1px solid rgba(255,255,255,0.2);
        }
        
        .time-number {
            display: block;
            font-size: 2rem;
            font-weight: 700;
            margin-bottom: 5px;
            animation: numberFlip 1s ease-in-out infinite;
        }
        
        @keyframes numberFlip {
            0%, 100% { transform: rotateX(0deg); }
            50% { transform: rotateX(180deg); }
        }
        
        .time-label {
            font-size: 0.9rem;
            opacity: 0.8;
        }
        
        .flash-btn {
            background: linear-gradient(45deg, #ffd700, #ffed4e);
            color: #333;
            border: none;
            padding: 15px 35px;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: 1px;
            animation: flashGlow 2s ease-in-out infinite;
        }
        
        @keyframes flashGlow {
            0%, 100% { box-shadow: 0 0 20px rgba(255,215,0,0.5); }
            50% { box-shadow: 0 0 30px rgba(255,215,0,0.8); }
        }
        
        .sale-products {
            display: flex;
            flex-direction: column;
            gap: 15px;
        }
        
        .sale-product-item {
            position: relative;
            border-radius: 15px;
            overflow: hidden;
            animation: productFloat 3s ease-in-out infinite;
        }
        
        .sale-product-item:nth-child(2) {
            animation-delay: 1s;
        }
        
        .sale-product-item:nth-child(3) {
            animation-delay: 2s;
        }
        
        @keyframes productFloat {
            0%, 100% { transform: translateY(0px) rotate(0deg); }
            50% { transform: translateY(-10px) rotate(1deg); }
        }
        
        .sale-product-item img {
            width: 100px;
            height: 100px;
            object-fit: cover;
            border-radius: 15px;
        }
        
        .discount-badge {
            position: absolute;
            top: -5px;
            right: -5px;
            background: #ff4757;
            color: white;
            padding: 5px 10px;
            border-radius: 50%;
            font-size: 0.8rem;
            font-weight: 700;
            animation: badgeBounce 2s ease-in-out infinite;
        }
        
        @keyframes badgeBounce {
            0%, 100% { transform: scale(1) rotate(0deg); }
            50% { transform: scale(1.1) rotate(5deg); }
        }
        
        /* Ripple Effect */
        .ripple {
            position: absolute;
            border-radius: 50%;
            background: rgba(102, 126, 234, 0.3);
            transform: scale(0);
            animation: rippleEffect 0.6s linear;
            pointer-events: none;
        }
        
        @keyframes rippleEffect {
            to {
                transform: scale(4);
                opacity: 0;
            }
        }
        
        /* Enhanced Animations */
        @media (prefers-reduced-motion: no-preference) {
            .category-card {
                animation: cardEntrance 0.6s ease-out forwards;
                opacity: 0;
                transform: translateY(30px);
            }
            
            .category-card:nth-child(1) { animation-delay: 0.1s; }
            .category-card:nth-child(2) { animation-delay: 0.2s; }
            .category-card:nth-child(3) { animation-delay: 0.3s; }
            .category-card:nth-child(4) { animation-delay: 0.4s; }
        }
        
        @keyframes cardEntrance {
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }
        
        /* Why Choose Us Section */
        .why-choose-us {
            background: white;
            border-radius: 25px;
            padding: 60px 40px;
            box-shadow: 0 10px 30px rgba(0,0,0,0.1);
            margin: 60px 0;
        }
        
        .features-title {
            font-size: 2.5rem;
            font-weight: 700;
            color: #333;
            margin-bottom: 15px;
        }
        
        .features-subtitle {
            font-size: 1.2rem;
            color: #666;
            margin-bottom: 40px;
        }
        
        .feature-item {
            display: flex;
            align-items: flex-start;
            gap: 20px;
            margin-bottom: 30px;
            padding: 20px;
            border-radius: 15px;
            transition: all 0.3s ease;
        }
        
        .feature-item:hover {
            background: #f8f9fa;
            transform: translateX(10px);
        }
        
        .feature-icon {
            width: 60px;
            height: 60px;
            border-radius: 50%;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-size: 1.5rem;
            flex-shrink: 0;
        }
        
        .feature-content h4 {
            font-size: 1.3rem;
            font-weight: 600;
            color: #333;
            margin-bottom: 8px;
        }
        
        .feature-content p {
            color: #666;
            line-height: 1.6;
            margin: 0;
        }
        
        .features-image {
            position: relative;
            text-align: center;
        }
        
        .main-feature-img {
            width: 100%;
            max-width: 500px;
            border-radius: 20px;
            box-shadow: 0 20px 40px rgba(0,0,0,0.2);
        }
        
        .floating-badges {
            position: absolute;
            width: 100%;
            height: 100%;
            top: 0;
            left: 0;
        }
        
        .badge-item {
            position: absolute;
            background: white;
            padding: 10px 15px;
            border-radius: 25px;
            box-shadow: 0 5px 15px rgba(0,0,0,0.2);
            display: flex;
            align-items: center;
            gap: 8px;
            font-weight: 600;
            animation: badgeFloat 3s ease-in-out infinite;
        }
        
        .badge-1 {
            top: 20%;
            right: -10px;
            color: #ffc107;
        }
        
        .badge-2 {
            bottom: 40%;
            left: -20px;
            color: #28a745;
            animation-delay: 1s;
        }
        
        .badge-3 {
            top: 60%;
            right: -15px;
            color: #ff6b35;
            animation-delay: 2s;
        }
        
        @keyframes badgeFloat {
            0%, 100% { transform: translateY(0px); }
            50% { transform: translateY(-10px); }
        }
        
        /* How It Works Section */
        .how-it-works {
            padding: 60px 0;
        }
        
        .step-card {
            background: white;
            border-radius: 20px;
            padding: 40px 30px;
            text-align: center;
            box-shadow: 0 8px 25px rgba(0,0,0,0.1);
            transition: all 0.4s ease;
            position: relative;
            overflow: hidden;
        }
        
        .step-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 20px 40px rgba(102, 126, 234, 0.2);
        }
        
        .step-number {
            position: absolute;
            top: -20px;
            right: 20px;
            width: 50px;
            height: 50px;
            background: linear-gradient(135deg, #ff6b35 0%, #f7931e 100%);
            color: white;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.5rem;
            font-weight: 700;
        }
        
        .step-icon {
            width: 80px;
            height: 80px;
            border-radius: 50%;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-size: 2rem;
            margin: 0 auto 25px;
        }
        
        .step-title {
            font-size: 1.4rem;
            font-weight: 600;
            color: #333;
            margin-bottom: 15px;
        }
        
        .step-desc {
            color: #666;
            line-height: 1.6;
        }
        
        /* Trust Section */
        .trust-section {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            border-radius: 25px;
            padding: 60px 40px;
            color: white;
        }
        
        .trust-item {
            padding: 20px;
        }
        
        .trust-icon {
            width: 80px;
            height: 80px;
            border-radius: 50%;
            background: rgba(255,255,255,0.2);
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 2rem;
            margin: 0 auto 20px;
            animation: trustPulse 3s ease-in-out infinite;
        }
        
        @keyframes trustPulse {
            0%, 100% { transform: scale(1); }
            50% { transform: scale(1.1); }
        }
        
        .trust-number {
            font-size: 2.5rem;
            font-weight: 700;
            margin-bottom: 10px;
        }
        
        .trust-label {
            font-size: 1.1rem;
            opacity: 0.9;
        }
        
        /* Responsive Enhancements */
        @media (max-width: 768px) {
            .hero-title {
                font-size: 2.5rem;
            }
            
            .sale-title {
                font-size: 2rem;
            }
            
            .countdown-timer {
                flex-wrap: wrap;
                gap: 10px;
            }
            
            .time-unit {
                padding: 10px 15px;
            }
            
            .time-number {
                font-size: 1.5rem;
            }
            
            .hero-stats {
                justify-content: center;
                gap: 20px;
            }
            
            .floating-cards {
                display: none;
            }
            
            .why-choose-us {
                padding: 40px 20px;
            }
            
            .features-title {
                font-size: 2rem;
            }
            
            .feature-item {
                flex-direction: column;
                text-align: center;
            }
            
            .floating-badges {
                display: none;
            }
        }
        
        .btn-primary {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            border: none;
            padding: 12px 30px;
            border-radius: 25px;
            font-weight: 600;
        }
        
        .btn-outline-primary {
            border: 2px solid #667eea;
            color: #667eea;
            padding: 12px 30px;
            border-radius: 25px;
            font-weight: 600;
        }
        
        .btn-outline-primary:hover {
            background: #667eea;
            border-color: #667eea;
        }
    </style>
</head>
<body>
    @include('layouts.navbar')

    <!-- Hero Section -->
    <section class="hero-section">
        <div class="hero-animation">
            <div class="floating-icons">
                <i class="fas fa-mobile-alt floating-icon" style="top: 20%; left: 10%; animation-delay: 0s;"></i>
                <i class="fas fa-laptop floating-icon" style="top: 60%; left: 15%; animation-delay: 1s;"></i>
                <i class="fas fa-car floating-icon" style="top: 30%; right: 20%; animation-delay: 2s;"></i>
                <i class="fas fa-home floating-icon" style="top: 70%; right: 10%; animation-delay: 3s;"></i>
                <i class="fas fa-tshirt floating-icon" style="top: 40%; left: 80%; animation-delay: 4s;"></i>
            </div>
        </div>
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6">
                    <div class="hero-badge">
                        <i class="fas fa-fire"></i>
                        <span>الأكثر مبيعاً في مصر</span>
                    </div>
                    <h1 class="hero-title">
                        اكتشف عالم من 
                        <span class="text-gradient">المنتجات المذهلة</span>
                    </h1>
                    <p class="hero-subtitle">
                        <i class="fas fa-check-circle text-success me-2"></i>
                        أكثر من 10,000 منتج متنوع
                        <br>
                        <i class="fas fa-shield-alt text-primary me-2"></i>
                        ضمان الجودة والأمان
                        <br>
                        <i class="fas fa-shipping-fast text-warning me-2"></i>
                        توصيل سريع لجميع المحافظات
                    </p>
                    
                    <form action="{{ route('search') }}" method="GET" class="search-box d-flex mb-4">
                        <input type="text" name="q" class="form-control search-input flex-grow-1" placeholder="ابحث عن المنتجات..." value="{{ request('q') }}">
                        <button type="submit" class="btn search-btn pulse-btn">
                            <i class="fas fa-search"></i>
                        </button>
                    </form>
                    
                    <div class="hero-buttons">
                        <a href="{{ route('products.index') }}" class="btn btn-primary btn-lg pulse-btn">
                            <i class="fas fa-rocket"></i> ابدأ التسوق
                        </a>
                        <a href="{{ route('register') }}" class="btn btn-outline-light btn-lg">
                            <i class="fas fa-store"></i> افتح متجرك
                        </a>
                    </div>
                    
                    <div class="hero-stats">
                        <div class="stat-item">
                            <div class="stat-number" data-target="15000">0</div>
                            <div class="stat-label">منتج</div>
                        </div>
                        <div class="stat-item">
                            <div class="stat-number" data-target="5000">0</div>
                            <div class="stat-label">عميل</div>
                        </div>
                        <div class="stat-item">
                            <div class="stat-number" data-target="500">0</div>
                            <div class="stat-label">متجر</div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="hero-image">
                        <div class="hero-main-image">
                            <img src="https://images.unsplash.com/photo-1556742049-0cfed4f6a45d?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80" alt="Shopping" class="main-img">
                            <div class="floating-cards">
                                <div class="product-card-mini card-1">
                                    <img src="https://images.unsplash.com/photo-1511707171634-5f897ff02aa9?ixlib=rb-4.0.3&auto=format&fit=crop&w=100&q=80" alt="Phone">
                                    <div class="card-info">
                                        <span class="price">2,500 ج.م</span>
                                        <i class="fas fa-heart"></i>
                                    </div>
                                </div>
                                <div class="product-card-mini card-2">
                                    <img src="https://images.unsplash.com/photo-1542291026-7eec264c27ff?ixlib=rb-4.0.3&auto=format&fit=crop&w=100&q=80" alt="Shoes">
                                    <div class="card-info">
                                        <span class="price">850 ج.م</span>
                                        <i class="fas fa-shopping-cart"></i>
                                    </div>
                                </div>
                                <div class="product-card-mini card-3">
                                    <img src="https://images.unsplash.com/photo-1484704849700-f032a568e944?ixlib=rb-4.0.3&auto=format&fit=crop&w=100&q=80" alt="Watch">
                                    <div class="card-info">
                                        <span class="price">1,200 ج.م</span>
                                        <i class="fas fa-star"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <!-- Scroll Indicator -->
        <div class="scroll-indicator">
            <div class="scroll-text">اكتشف المزيد</div>
            <div class="scroll-arrow">
                <i class="fas fa-chevron-down"></i>
            </div>
        </div>
    </section>

    <!-- Flash Sale Banner -->
    <section class="container mb-5">
        <div class="flash-sale-banner">
            <div class="sale-background">
                <img src="https://images.unsplash.com/photo-1607083206869-4c7672e72a8a?ixlib=rb-4.0.3&auto=format&fit=crop&w=1200&q=80" alt="Flash Sale">
                <div class="sale-overlay"></div>
            </div>
            <div class="sale-content">
                <div class="row align-items-center">
                    <div class="col-lg-8">
                        <div class="sale-badge">
                            <i class="fas fa-bolt"></i>
                            <span>عرض محدود</span>
                        </div>
                        <h2 class="sale-title">تخفيضات هائلة تصل إلى 70%</h2>
                        <p class="sale-subtitle">على مختارات من أفضل المنتجات - العرض ينتهي قريباً!</p>
                        <div class="countdown-timer">
                            <div class="time-unit">
                                <span class="time-number" id="hours">12</span>
                                <span class="time-label">ساعة</span>
                            </div>
                            <div class="time-unit">
                                <span class="time-number" id="minutes">45</span>
                                <span class="time-label">دقيقة</span>
                            </div>
                            <div class="time-unit">
                                <span class="time-number" id="seconds">30</span>
                                <span class="time-label">ثانية</span>
                            </div>
                        </div>
                        <a href="{{ route('products.index') }}" class="btn btn-warning btn-lg flash-btn">
                            <i class="fas fa-fire"></i> تسوق الآن
                        </a>
                    </div>
                    <div class="col-lg-4">
                        <div class="sale-products">
                            <div class="sale-product-item">
                                <img src="https://images.unsplash.com/photo-1511707171634-5f897ff02aa9?ixlib=rb-4.0.3&auto=format&fit=crop&w=150&q=80" alt="Phone">
                                <div class="discount-badge">-50%</div>
                            </div>
                            <div class="sale-product-item">
                                <img src="https://images.unsplash.com/photo-1542291026-7eec264c27ff?ixlib=rb-4.0.3&auto=format&fit=crop&w=150&q=80" alt="Shoes">
                                <div class="discount-badge">-40%</div>
                            </div>
                            <div class="sale-product-item">
                                <img src="https://images.unsplash.com/photo-1484704849700-f032a568e944?ixlib=rb-4.0.3&auto=format&fit=crop&w=150&q=80" alt="Watch">
                                <div class="discount-badge">-60%</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Why Choose Us Section -->
    <section class="container mb-5">
        <div class="why-choose-us">
            <div class="row align-items-center">
                <div class="col-lg-6">
                    <div class="features-content">
                        <h2 class="features-title">لماذا تختار Sokappe Shop؟</h2>
                        <p class="features-subtitle">نحن نقدم أفضل تجربة تسوق إلكتروني في مصر</p>
                        
                        <div class="feature-item">
                            <div class="feature-icon">
                                <i class="fas fa-shield-alt"></i>
                            </div>
                            <div class="feature-content">
                                <h4>أمان وثقة مضمونة</h4>
                                <p>جميع المتاجر موثقة ومعتمدة مع ضمان حماية بياناتك الشخصية</p>
                            </div>
                        </div>
                        
                        <div class="feature-item">
                            <div class="feature-icon">
                                <i class="fas fa-shipping-fast"></i>
                            </div>
                            <div class="feature-content">
                                <h4>توصيل سريع ومجاني</h4>
                                <p>توصيل مجاني لجميع المحافظات خلال 24-48 ساعة</p>
                            </div>
                        </div>
                        
                        <div class="feature-item">
                            <div class="feature-icon">
                                <i class="fas fa-headset"></i>
                            </div>
                            <div class="feature-content">
                                <h4>دعم فني 24/7</h4>
                                <p>فريق دعم متاح على مدار الساعة لمساعدتك في أي وقت</p>
                            </div>
                        </div>
                        
                        <div class="feature-item">
                            <div class="feature-icon">
                                <i class="fas fa-undo-alt"></i>
                            </div>
                            <div class="feature-content">
                                <h4>إرجاع مجاني خلال 14 يوم</h4>
                                <p>يمكنك إرجاع أي منتج خلال 14 يوم مع استرداد كامل</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="features-image">
                        <img src="https://images.unsplash.com/photo-1556742049-0cfed4f6a45d?ixlib=rb-4.0.3&auto=format&fit=crop&w=600&q=80" alt="Shopping Experience" class="main-feature-img">
                        <div class="floating-badges">
                            <div class="badge-item badge-1">
                                <i class="fas fa-star"></i>
                                <span>تقييم 4.8/5</span>
                            </div>
                            <div class="badge-item badge-2">
                                <i class="fas fa-users"></i>
                                <span>+50K عميل</span>
                            </div>
                            <div class="badge-item badge-3">
                                <i class="fas fa-award"></i>
                                <span>الأفضل 2024</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Categories Section -->
    <section class="container mb-5">
        <h2 class="section-title">تصفح حسب الفئة</h2>
        <div class="row g-4">
            @foreach($categories as $category)
            <div class="col-lg-3 col-md-6">
                <a href="{{ route('categories.index', ['category_id' => $category->id]) }}" class="text-decoration-none">
                    <div class="category-card">
                        <div class="category-icon">
                            <i class="{{ $category->icon }}"></i>
                        </div>
                        <h4 class="category-title">{{ $category->name_ar }}</h4>
                        <p class="category-desc">{{ $category->description_ar }}</p>
                    </div>
                </a>
            </div>
            @endforeach
        </div>
        
        @if($categories->count() > 8)
        <div class="text-center mt-4">
            <a href="{{ route('categories.index') }}" class="btn btn-outline-primary">
                <i class="fas fa-th-large me-2"></i>
                شاهد جميع الفئات
            </a>
        </div>
        @endif
    </section>

    <!-- How It Works Section -->
    <section class="container mb-5">
        <div class="how-it-works">
            <div class="text-center mb-5">
                <h2 class="section-title">كيف يعمل Sokappe Shop؟</h2>
                <p class="section-subtitle">تسوق بسهولة في 4 خطوات بسيطة</p>
            </div>
            
            <div class="row g-4">
                <div class="col-lg-3 col-md-6">
                    <div class="step-card">
                        <div class="step-number">1</div>
                        <div class="step-icon">
                            <i class="fas fa-search"></i>
                        </div>
                        <h4 class="step-title">ابحث عن المنتج</h4>
                        <p class="step-desc">ابحث عن المنتج المطلوب من بين آلاف المنتجات المتاحة</p>
                    </div>
                </div>
                
                <div class="col-lg-3 col-md-6">
                    <div class="step-card">
                        <div class="step-number">2</div>
                        <div class="step-icon">
                            <i class="fas fa-shopping-cart"></i>
                        </div>
                        <h4 class="step-title">أضف للسلة</h4>
                        <p class="step-desc">أضف المنتجات المفضلة لديك إلى سلة التسوق</p>
                    </div>
                </div>
                
                <div class="col-lg-3 col-md-6">
                    <div class="step-card">
                        <div class="step-number">3</div>
                        <div class="step-icon">
                            <i class="fas fa-credit-card"></i>
                        </div>
                        <h4 class="step-title">ادفع بأمان</h4>
                        <p class="step-desc">ادفع بطريقة آمنة باستخدام وسائل الدفع المختلفة</p>
                    </div>
                </div>
                
                <div class="col-lg-3 col-md-6">
                    <div class="step-card">
                        <div class="step-number">4</div>
                        <div class="step-icon">
                            <i class="fas fa-truck"></i>
                        </div>
                        <h4 class="step-title">استلم طلبك</h4>
                        <p class="step-desc">استلم طلبك في المكان والوقت المحدد</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Trust Indicators Section -->
    <section class="container mb-5">
        <div class="trust-section">
            <div class="row text-center">
                <div class="col-lg-3 col-md-6 mb-4">
                    <div class="trust-item">
                        <div class="trust-icon">
                            <i class="fas fa-certificate"></i>
                        </div>
                        <h4 class="trust-number">100%</h4>
                        <p class="trust-label">منتجات أصلية</p>
                    </div>
                </div>
                
                <div class="col-lg-3 col-md-6 mb-4">
                    <div class="trust-item">
                        <div class="trust-icon">
                            <i class="fas fa-lock"></i>
                        </div>
                        <h4 class="trust-number">SSL</h4>
                        <p class="trust-label">حماية مشفرة</p>
                    </div>
                </div>
                
                <div class="col-lg-3 col-md-6 mb-4">
                    <div class="trust-item">
                        <div class="trust-icon">
                            <i class="fas fa-medal"></i>
                        </div>
                        <h4 class="trust-number">5★</h4>
                        <p class="trust-label">تقييم العملاء</p>
                    </div>
                </div>
                
                <div class="col-lg-3 col-md-6 mb-4">
                    <div class="trust-item">
                        <div class="trust-icon">
                            <i class="fas fa-clock"></i>
                        </div>
                        <h4 class="trust-number">24/7</h4>
                        <p class="trust-label">دعم فني</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Featured Products -->
    @if($featuredProducts->count() > 0)
    <section class="container mb-5">
        <h2 class="section-title">المنتجات المميزة</h2>
        <div class="row g-4">
            @foreach($featuredProducts as $product)
            <div class="col-lg-3 col-md-6">
                <a href="{{ route('product.show', $product) }}" class="text-decoration-none">
                    <div class="product-card">
                        <div class="product-image">
                            @if($product->featured_image)
                                <img src="{{ asset('storage/' . $product->featured_image) }}" alt="{{ $product->name }}" class="img-fluid" style="width: 100%; height: 200px; object-fit: cover;">
                            @elseif($product->images && $product->images->first())
                                <img src="{{ asset('storage/' . $product->images->first()->image_path) }}" alt="{{ $product->name }}" class="img-fluid" style="width: 100%; height: 200px; object-fit: cover;">
                            @else
                                <div class="placeholder-image d-flex align-items-center justify-content-center" style="width: 100%; height: 200px; background: #f8f9fa; border-radius: 8px;">
                                    <i class="fas fa-image fa-3x text-muted"></i>
                                </div>
                            @endif
                        </div>
                        <div class="product-info">
                            <h5 class="product-title">{{ $product->name_ar ?: $product->name }}</h5>
                            <div class="product-price">
                                @if($product->sale_price && $product->sale_price < $product->price)
                                    <span class="text-danger">{{ number_format($product->sale_price, 2) }} جنيه</span>
                                    <small class="text-muted text-decoration-line-through">{{ number_format($product->price, 2) }} جنيه</small>
                                @else
                                    {{ number_format($product->price, 2) }} جنيه
                                @endif
                            </div>
                            @if($product->brand)
                                <small class="text-muted">
                                    <i class="fas fa-tag"></i>
                                    {{ $product->brand }}
                                </small>
                            @endif
                        </div>
                    </div>
                </a>
            </div>
            @endforeach
        </div>
    </section>
    @endif

    <!-- Latest Products -->
    @if($latestProducts->count() > 0)
    <section class="container mb-5">
        <h2 class="section-title">أحدث المنتجات</h2>
        <div class="row g-4">
            @foreach($latestProducts as $product)
            <div class="col-lg-3 col-md-6">
                <a href="{{ route('product.show', $product) }}" class="text-decoration-none">
                    <div class="product-card">
                        <div class="product-image">
                            @if($product->featured_image)
                                <img src="{{ asset('storage/' . $product->featured_image) }}" alt="{{ $product->name }}" class="img-fluid" style="width: 100%; height: 200px; object-fit: cover;">
                            @elseif($product->images && $product->images->first())
                                <img src="{{ asset('storage/' . $product->images->first()->image_path) }}" alt="{{ $product->name }}" class="img-fluid" style="width: 100%; height: 200px; object-fit: cover;">
                            @else
                                <div class="placeholder-image d-flex align-items-center justify-content-center" style="width: 100%; height: 200px; background: #f8f9fa; border-radius: 8px;">
                                    <i class="fas fa-image fa-3x text-muted"></i>
                                </div>
                            @endif
                        </div>
                        <div class="product-info">
                            <h5 class="product-title">{{ $product->name_ar ?: $product->name }}</h5>
                            <div class="product-price">
                                @if($product->sale_price && $product->sale_price < $product->price)
                                    <span class="text-danger">{{ number_format($product->sale_price, 2) }} جنيه</span>
                                    <small class="text-muted text-decoration-line-through">{{ number_format($product->price, 2) }} جنيه</small>
                                @else
                                    {{ number_format($product->price, 2) }} جنيه
                                @endif
                            </div>
                            <small class="text-muted">
                                @if($product->brand)
                                    <i class="fas fa-tag"></i>
                                    {{ $product->brand }}
                                @endif
                                <span class="float-end">
                                    <i class="fas fa-eye"></i>
                                    {{ $product->views_count }}
                                </span>
                            </small>
                        </div>
                    </div>
                </a>
            </div>
            @endforeach
        </div>
        
        <div class="text-center mt-4">
            <a href="{{ route('products.index') }}" class="btn btn-outline-primary">
                <i class="fas fa-th me-2"></i>
                شاهد جميع المنتجات
            </a>
        </div>
    </section>
    @endif

    <!-- Top Vendors Section -->
    <section class="container mb-5">
        <h2 class="section-title">أفضل المتاجر</h2>
        <div class="row g-4">
            @for($i = 1; $i <= 6; $i++)
            <div class="col-lg-4 col-md-6">
                <div class="vendor-card">
                    <div class="vendor-header">
                        <div class="vendor-avatar">
                            <i class="fas fa-store"></i>
                        </div>
                        <div class="vendor-info">
                            <h5 class="vendor-name">متجر الإلكترونيات الحديثة</h5>
                            <div class="vendor-rating">
                                <div class="stars">
                                    @for($j = 1; $j <= 5; $j++)
                                        <i class="fas fa-star"></i>
                                    @endfor
                                </div>
                                <span>(127 تقييم)</span>
                            </div>
                        </div>
                    </div>
                    <p class="vendor-desc">متجر متخصص في بيع أحدث الأجهزة الإلكترونية والهواتف الذكية</p>
                    <div class="vendor-stats">
                        <div class="stat">
                            <span class="number">45</span>
                            <span class="label">منتج</span>
                        </div>
                        <div class="stat">
                            <span class="number">4.8</span>
                            <span class="label">تقييم</span>
                        </div>
                        <div class="stat">
                            <span class="number">2</span>
                            <span class="label">سنوات</span>
                        </div>
                    </div>
                </div>
            </div>
            @endfor
        </div>
        
        <div class="text-center mt-4">
            <a href="/vendors" class="btn btn-outline-primary">
                <i class="fas fa-store me-2"></i>
                شاهد جميع المتاجر
            </a>
        </div>
    </section>

    <!-- Special Offers Section -->
    <section class="container mb-5">
        <div class="offers-banner">
            <div class="row align-items-center">
                <div class="col-lg-6">
                    <h2 class="offers-title">عروض خاصة لفترة محدودة</h2>
                    <p class="offers-subtitle">خصومات تصل إلى 50% على مختارات من أفضل المنتجات</p>
                    <a href="/offers" class="btn btn-warning btn-lg">
                        <i class="fas fa-fire me-2"></i>
                        اكتشف العروض
                    </a>
                </div>
                <div class="col-lg-6 text-center">
                    <div class="offer-badge">
                        <span class="discount">50%</span>
                        <span class="text">خصم</span>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Categories Showcase -->
    <section class="container mb-5">
        <h2 class="section-title">تسوق حسب الفئة</h2>
        <div class="categories-showcase">
            <div class="row g-3">
                @foreach($categories->take(8) as $category)
                <div class="col-lg-3 col-md-4 col-6">
                    <a href="{{ route('category.show', $category->slug) }}" class="category-showcase-item">
                        <div class="category-image">
                            <i class="{{ $category->icon }}"></i>
                        </div>
                        <h6 class="category-name">{{ $category->name_ar }}</h6>
                        <span class="category-count">{{ rand(10, 100) }} منتج</span>
                    </a>
                </div>
                @endforeach
            </div>
        </div>
    </section>

    <!-- Popular Searches -->
    <section class="container mb-5">
        <h2 class="section-title">البحث الشائع</h2>
        <div class="popular-searches">
            <div class="search-tags">
                <a href="/search?q=آيفون" class="search-tag">آيفون</a>
                <a href="/search?q=سامسونج" class="search-tag">سامسونج</a>
                <a href="/search?q=لابتوب" class="search-tag">لابتوب</a>
                <a href="/search?q=سيارة" class="search-tag">سيارة</a>
                <a href="/search?q=شقة" class="search-tag">شقة للإيجار</a>
                <a href="/search?q=وظيفة" class="search-tag">وظائف</a>
                <a href="/search?q=أثاث" class="search-tag">أثاث منزلي</a>
                <a href="/search?q=ملابس" class="search-tag">ملابس</a>
                <a href="/search?q=كتب" class="search-tag">كتب</a>
                <a href="/search?q=رياضة" class="search-tag">معدات رياضية</a>
            </div>
        </div>
    </section>

    <!-- How It Works -->
    <section class="container mb-5">
        <h2 class="section-title">كيف يعمل Sokappe؟</h2>
        <div class="row g-4">
            <div class="col-lg-3 col-md-6">
                <div class="how-it-works-item">
                    <div class="step-number">1</div>
                    <div class="step-icon">
                        <i class="fas fa-user-plus"></i>
                    </div>
                    <h5 class="step-title">أنشئ حسابك</h5>
                    <p class="step-desc">سجل مجاناً واختر نوع حسابك كعميل أو تاجر</p>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <div class="how-it-works-item">
                    <div class="step-number">2</div>
                    <div class="step-icon">
                        <i class="fas fa-search"></i>
                    </div>
                    <h5 class="step-title">ابحث واستكشف</h5>
                    <p class="step-desc">تصفح آلاف المنتجات والخدمات من متاجر موثوقة</p>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <div class="how-it-works-item">
                    <div class="step-number">3</div>
                    <div class="step-icon">
                        <i class="fas fa-comments"></i>
                    </div>
                    <h5 class="step-title">تواصل مباشرة</h5>
                    <p class="step-desc">تحدث مع البائع مباشرة وتفاوض على الأسعار</p>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <div class="how-it-works-item">
                    <div class="step-number">4</div>
                    <div class="step-icon">
                        <i class="fas fa-handshake"></i>
                    </div>
                    <h5 class="step-title">أتمم الصفقة</h5>
                    <p class="step-desc">اتفق على التفاصيل واستلم منتجك بأمان</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Mobile App Promotion -->
    <section class="container mb-5">
        <div class="app-promotion">
            <div class="row align-items-center">
                <div class="col-lg-6">
                    <h2 class="app-title">حمل تطبيق Sokappe</h2>
                    <p class="app-subtitle">تسوق بسهولة أكبر من هاتفك المحمول</p>
                    <ul class="app-features">
                        <li><i class="fas fa-check"></i> تصفح سريع ومريح</li>
                        <li><i class="fas fa-check"></i> إشعارات فورية للعروض</li>
                        <li><i class="fas fa-check"></i> دردشة مباشرة مع البائعين</li>
                        <li><i class="fas fa-check"></i> متابعة طلباتك بسهولة</li>
                    </ul>
                    <div class="app-buttons">
                        <a href="#" class="app-button">
                            <img src="https://via.placeholder.com/150x50/000000/FFFFFF?text=App+Store" alt="App Store">
                        </a>
                        <a href="#" class="app-button">
                            <img src="https://via.placeholder.com/150x50/000000/FFFFFF?text=Google+Play" alt="Google Play">
                        </a>
                    </div>
                </div>
                <div class="col-lg-6 text-center">
                    <div class="phone-mockup">
                        <i class="fas fa-mobile-alt"></i>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Interactive Product Slider -->
    <section class="container mb-5">
        <h2 class="section-title">منتجات مختارة لك</h2>
        <div class="product-slider-container">
            <div class="product-slider" id="productSlider">
                @for($i = 1; $i <= 20; $i++)
                <div class="slider-item">
                    <div class="product-card">
                        <div class="product-image">
                            <i class="fas fa-{{ $i <= 5 ? 'mobile-alt' : ($i <= 10 ? 'laptop' : ($i <= 15 ? 'car' : 'home')) }}"></i>
                        </div>
                        <div class="product-info">
                            <h5 class="product-title">منتج رقم {{ $i }}</h5>
                            <div class="product-price">{{ rand(100, 5000) }} جنيه</div>
                            <button class="btn btn-add-cart btn-sm" onclick="addToCart({{ $i }})">
                                <i class="fas fa-cart-plus"></i> أضف للسلة
                            </button>
                        </div>
                    </div>
                </div>
                @endfor
            </div>
            <button class="slider-btn prev" onclick="slideProducts('prev')">
                <i class="fas fa-chevron-right"></i>
            </button>
            <button class="slider-btn next" onclick="slideProducts('next')">
                <i class="fas fa-chevron-left"></i>
            </button>
        </div>
    </section>

    <!-- Interactive Categories Tabs -->
    <section class="container mb-5">
        <h2 class="section-title">استكشف الفئات</h2>
        <div class="category-tabs">
            <div class="tab-buttons">
                <button class="tab-btn active" onclick="showCategoryTab('electronics')">الإلكترونيات</button>
                <button class="tab-btn" onclick="showCategoryTab('services')">الخدمات</button>
                <button class="tab-btn" onclick="showCategoryTab('vehicles')">المركبات</button>
                <button class="tab-btn" onclick="showCategoryTab('real-estate')">العقارات</button>
            </div>
            
            <div class="tab-content">
                <div class="tab-pane active" id="electronics">
                    <div class="row g-4">
                        <div class="col-md-3">
                            <div class="category-item" onclick="goToCategory('electronics')">
                                <i class="fas fa-mobile-alt"></i>
                                <h6>هواتف ذكية</h6>
                                <span>{{ rand(50, 200) }} منتج</span>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="category-item" onclick="goToCategory('electronics')">
                                <i class="fas fa-laptop"></i>
                                <h6>أجهزة كمبيوتر</h6>
                                <span>{{ rand(30, 150) }} منتج</span>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="category-item" onclick="goToCategory('electronics')">
                                <i class="fas fa-tv"></i>
                                <h6>أجهزة منزلية</h6>
                                <span>{{ rand(40, 180) }} منتج</span>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="category-item" onclick="goToCategory('electronics')">
                                <i class="fas fa-camera"></i>
                                <h6>كاميرات</h6>
                                <span>{{ rand(20, 100) }} منتج</span>
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="tab-pane" id="services">
                    <div class="row g-4">
                        <div class="col-md-3">
                            <div class="category-item" onclick="goToCategory('services')">
                                <i class="fas fa-graduation-cap"></i>
                                <h6>تدريس وتدريب</h6>
                                <span>{{ rand(25, 120) }} خدمة</span>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="category-item" onclick="goToCategory('services')">
                                <i class="fas fa-wrench"></i>
                                <h6>صيانة وإصلاح</h6>
                                <span>{{ rand(35, 140) }} خدمة</span>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="category-item" onclick="goToCategory('services')">
                                <i class="fas fa-paint-brush"></i>
                                <h6>تصميم وإبداع</h6>
                                <span>{{ rand(15, 80) }} خدمة</span>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="category-item" onclick="goToCategory('services')">
                                <i class="fas fa-cut"></i>
                                <h6>تجميل وعناية</h6>
                                <span>{{ rand(20, 90) }} خدمة</span>
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="tab-pane" id="vehicles">
                    <div class="row g-4">
                        <div class="col-md-3">
                            <div class="category-item" onclick="goToCategory('vehicles')">
                                <i class="fas fa-car"></i>
                                <h6>سيارات</h6>
                                <span>{{ rand(100, 300) }} سيارة</span>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="category-item" onclick="goToCategory('vehicles')">
                                <i class="fas fa-motorcycle"></i>
                                <h6>دراجات نارية</h6>
                                <span>{{ rand(30, 120) }} دراجة</span>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="category-item" onclick="goToCategory('vehicles')">
                                <i class="fas fa-truck"></i>
                                <h6>شاحنات</h6>
                                <span>{{ rand(20, 80) }} شاحنة</span>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="category-item" onclick="goToCategory('vehicles')">
                                <i class="fas fa-bicycle"></i>
                                <h6>دراجات هوائية</h6>
                                <span>{{ rand(15, 60) }} دراجة</span>
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="tab-pane" id="real-estate">
                    <div class="row g-4">
                        <div class="col-md-3">
                            <div class="category-item" onclick="goToCategory('real-estate')">
                                <i class="fas fa-home"></i>
                                <h6>شقق للبيع</h6>
                                <span>{{ rand(200, 500) }} شقة</span>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="category-item" onclick="goToCategory('real-estate')">
                                <i class="fas fa-building"></i>
                                <h6>شقق للإيجار</h6>
                                <span>{{ rand(150, 400) }} شقة</span>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="category-item" onclick="goToCategory('real-estate')">
                                <i class="fas fa-store"></i>
                                <h6>محلات تجارية</h6>
                                <span>{{ rand(50, 200) }} محل</span>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="category-item" onclick="goToCategory('real-estate')">
                                <i class="fas fa-warehouse"></i>
                                <h6>مخازن ومكاتب</h6>
                                <span>{{ rand(30, 150) }} مكان</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Live Statistics Counter -->
    <section class="container mb-5">
        <div class="live-stats">
            <div class="row text-center">
                <div class="col-lg-3 col-md-6">
                    <div class="stat-counter">
                        <i class="fas fa-users"></i>
                        <div class="counter" data-target="{{ $stats['total_users'] }}">0</div>
                        <p>مستخدم نشط</p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="stat-counter">
                        <i class="fas fa-box"></i>
                        <div class="counter" data-target="{{ $stats['total_products'] }}">0</div>
                        <p>منتج متاح</p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="stat-counter">
                        <i class="fas fa-store"></i>
                        <div class="counter" data-target="150">0</div>
                        <p>متجر موثق</p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="stat-counter">
                        <i class="fas fa-handshake"></i>
                        <div class="counter" data-target="5000">0</div>
                        <p>صفقة ناجحة</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Newsletter -->
    <section class="container mb-5">
        <div class="newsletter-section">
            <div class="row align-items-center">
                <div class="col-lg-6">
                    <h3 class="newsletter-title">اشترك في النشرة الإخبارية</h3>
                    <p class="newsletter-subtitle">احصل على أحدث العروض والمنتجات الجديدة</p>
                </div>
                <div class="col-lg-6">
                    <form class="newsletter-form">
                        <div class="input-group">
                            <input type="email" class="form-control" placeholder="أدخل بريدك الإلكتروني">
                            <button class="btn btn-primary" type="submit">اشتراك</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>

    <!-- Stats Section -->
    <section class="stats-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-6">
                    <div class="stat-item">
                        <div class="stat-number">{{ number_format($stats['total_products']) }}+</div>
                        <div class="stat-label">إعلان متاح</div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="stat-item">
                        <div class="stat-number">{{ number_format($stats['total_users']) }}+</div>
                        <div class="stat-label">مستخدم مسجل</div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="stat-item">
                        <div class="stat-number">{{ number_format($stats['total_categories']) }}</div>
                        <div class="stat-label">فئة متنوعة</div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="stat-item">
                        <div class="stat-number">{{ number_format($stats['total_views']) }}+</div>
                        <div class="stat-label">مشاهدة يومية</div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="footer">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-md-6 mb-4">
                    <h5>Sokappe Shop</h5>
                    <p>السوق الإلكتروني الأول في مصر. نوفر لك أفضل المنتجات من أفضل المتاجر بأفضل الأسعار.</p>
                    <div class="d-flex gap-3">
                        <a href="#"><i class="fab fa-facebook-f"></i></a>
                        <a href="#"><i class="fab fa-twitter"></i></a>
                        <a href="#"><i class="fab fa-instagram"></i></a>
                        <a href="#"><i class="fab fa-linkedin-in"></i></a>
                    </div>
                </div>
                <div class="col-lg-2 col-md-6 mb-4">
                    <h5>روابط سريعة</h5>
                    <ul class="list-unstyled">
                        <li><a href="/">الرئيسية</a></li>
                        <li><a href="/categories">الفئات</a></li>
                        <li><a href="/vendors">المتاجر</a></li>
                        <li><a href="/offers">العروض</a></li>
                    </ul>
                </div>
                <div class="col-lg-3 col-md-6 mb-4">
                    <h5>خدمة العملاء</h5>
                    <ul class="list-unstyled">
                        <li><a href="/contact">اتصل بنا</a></li>
                        <li><a href="/support">الدعم الفني</a></li>
                        <li><a href="/returns">سياسة الإرجاع</a></li>
                        <li><a href="/shipping">الشحن والتوصيل</a></li>
                    </ul>
                </div>
                <div class="col-lg-3 col-md-6 mb-4">
                    <h5>معلومات التواصل</h5>
                    <ul class="list-unstyled">
                        <li><i class="fas fa-phone me-2"></i> 01000000000</li>
                        <li><i class="fas fa-envelope me-2"></i> info@sokappe.com</li>
                        <li><i class="fas fa-map-marker-alt me-2"></i> القاهرة، مصر</li>
                    </ul>
                </div>
            </div>
            <hr class="my-4">
            <div class="row align-items-center">
                <div class="col-md-6">
                    <p class="mb-0">&copy; 2025 Sokappe Shop. جميع الحقوق محفوظة.</p>
                </div>
                <div class="col-md-6 text-end">
                    <a href="/privacy" class="me-3">سياسة الخصوصية</a>
                    <a href="/terms">الشروط والأحكام</a>
                </div>
            </div>
        </div>
    </footer>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    
    <script>
        let currentSlide = 0;
        const slideWidth = 270; // 250px + 20px gap
        
        // Product Slider Functions
        function slideProducts(direction) {
            const slider = document.getElementById('productSlider');
            const maxSlides = 20 - 4; // Show 4 items at once
            
            if (direction === 'next' && currentSlide < maxSlides) {
                currentSlide++;
            } else if (direction === 'prev' && currentSlide > 0) {
                currentSlide--;
            }
            
            slider.style.transform = `translateX(${currentSlide * slideWidth}px)`;
        }
        
        // Category Tabs Functions
        function showCategoryTab(tabId) {
            // Hide all tab panes
            document.querySelectorAll('.tab-pane').forEach(pane => {
                pane.classList.remove('active');
            });
            
            // Remove active class from all buttons
            document.querySelectorAll('.tab-btn').forEach(btn => {
                btn.classList.remove('active');
            });
            
            // Show selected tab
            document.getElementById(tabId).classList.add('active');
            
            // Add active class to clicked button
            event.target.classList.add('active');
        }
        
        function goToCategory(category) {
            window.location.href = '/categories';
        }
        
        // Counter Animation
        function animateCounters() {
            const counters = document.querySelectorAll('.counter');
            
            counters.forEach(counter => {
                const target = parseInt(counter.getAttribute('data-target'));
                const increment = target / 100;
                let current = 0;
                
                const timer = setInterval(() => {
                    current += increment;
                    if (current >= target) {
                        counter.textContent = target.toLocaleString();
                        clearInterval(timer);
                    } else {
                        counter.textContent = Math.floor(current).toLocaleString();
                    }
                }, 20);
            });
        }
        
        // Intersection Observer for Counter Animation
        const observerOptions = {
            threshold: 0.5
        };
        
        const observer = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    animateCounters();
                    observer.unobserve(entry.target);
                }
            });
        }, observerOptions);
        
        // Countdown Timer
        function startCountdown() {
            const hoursEl = document.getElementById('hours');
            const minutesEl = document.getElementById('minutes');
            const secondsEl = document.getElementById('seconds');
            
            if (!hoursEl || !minutesEl || !secondsEl) return;
            
            let hours = parseInt(hoursEl.textContent);
            let minutes = parseInt(minutesEl.textContent);
            let seconds = parseInt(secondsEl.textContent);
            
            setInterval(() => {
                seconds--;
                
                if (seconds < 0) {
                    seconds = 59;
                    minutes--;
                    
                    if (minutes < 0) {
                        minutes = 59;
                        hours--;
                        
                        if (hours < 0) {
                            hours = 23;
                        }
                    }
                }
                
                hoursEl.textContent = hours.toString().padStart(2, '0');
                minutesEl.textContent = minutes.toString().padStart(2, '0');
                secondsEl.textContent = seconds.toString().padStart(2, '0');
            }, 1000);
        }
        
        // Hero Stats Animation
        function animateHeroStats() {
            const heroStats = document.querySelectorAll('.hero-stats .stat-number');
            
            heroStats.forEach(stat => {
                const target = parseInt(stat.getAttribute('data-target'));
                const increment = target / 100;
                let current = 0;
                
                const timer = setInterval(() => {
                    current += increment;
                    if (current >= target) {
                        stat.textContent = target.toLocaleString();
                        clearInterval(timer);
                    } else {
                        stat.textContent = Math.floor(current).toLocaleString();
                    }
                }, 30);
            });
        }
        
        // Parallax Effect for Hero
        function initParallax() {
            window.addEventListener('scroll', () => {
                const scrolled = window.pageYOffset;
                const parallaxElements = document.querySelectorAll('.floating-icon');
                
                parallaxElements.forEach((element, index) => {
                    const speed = 0.5 + (index * 0.1);
                    element.style.transform = `translateY(${scrolled * speed}px)`;
                });
            });
        }
        
        // Initialize when page loads
        document.addEventListener('DOMContentLoaded', function() {
            // Start countdown timer
            startCountdown();
            
            // Animate hero stats
            setTimeout(animateHeroStats, 1000);
            
            // Initialize parallax
            initParallax();
            
            // Observe the stats section
            const statsSection = document.querySelector('.live-stats');
            if (statsSection) {
                observer.observe(statsSection);
            }
            
            // Auto-slide products every 5 seconds
            setInterval(() => {
                slideProducts('next');
                if (currentSlide >= 16) { // Reset to beginning
                    currentSlide = -1;
                }
            }, 5000);
            
            // Add click effects to cards
            document.querySelectorAll('.category-card').forEach(card => {
                card.addEventListener('click', function(e) {
                    // Create ripple effect
                    const ripple = document.createElement('span');
                    const rect = this.getBoundingClientRect();
                    const size = Math.max(rect.width, rect.height);
                    const x = e.clientX - rect.left - size / 2;
                    const y = e.clientY - rect.top - size / 2;
                    
                    ripple.style.width = ripple.style.height = size + 'px';
                    ripple.style.left = x + 'px';
                    ripple.style.top = y + 'px';
                    ripple.classList.add('ripple');
                    
                    this.appendChild(ripple);
                    
                    setTimeout(() => {
                        ripple.remove();
                    }, 600);
                });
            });
        });
        
        // Add to cart function (placeholder)
        function addToCart(productId) {
            console.log('Added product', productId, 'to cart');
            
            // Show success message
            const button = event.target;
            const originalText = button.innerHTML;
            button.innerHTML = '<i class="fas fa-check"></i> تم الإضافة';
            button.style.background = '#28a745';
            
            setTimeout(() => {
                button.innerHTML = originalText;
                button.style.background = '';
            }, 2000);
        }
    </script>
    
    <!-- Custom JS -->
    <script>
        // Add smooth scrolling
        document.querySelectorAll('a[href^="#"]').forEach(anchor => {
            anchor.addEventListener('click', function (e) {
                e.preventDefault();
                document.querySelector(this.getAttribute('href')).scrollIntoView({
                    behavior: 'smooth'
                });
            });
        });
        
        // Add animation on scroll
        const observerOptions = {
            threshold: 0.1,
            rootMargin: '0px 0px -50px 0px'
        };
        
        const observer = new IntersectionObserver(function(entries) {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    entry.target.style.opacity = '1';
                    entry.target.style.transform = 'translateY(0)';
                }
            });
        }, observerOptions);
        
        // Observe all cards
        document.querySelectorAll('.category-card, .product-card').forEach(card => {
            card.style.opacity = '0';
            card.style.transform = 'translateY(20px)';
            card.style.transition = 'all 0.6s ease';
            observer.observe(card);
        });
    </script>
</body>
</html>