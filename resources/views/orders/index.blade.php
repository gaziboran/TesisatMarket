<!DOCTYPE html>
<html>
<head>
    <title>Siparişlerim - TesisatMarket</title>
    <style>
        body {
            font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f5f5f5;
        }
        .top-bar {
            background-color: #f27a1a;
            padding: 15px 0;
            box-shadow: 0 1px 3px rgba(0,0,0,0.1);
        }
        .top-container {
            max-width: 1200px;
            margin: 0 auto;
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 0 20px;
        }
        .logo {
            font-size: 24px;
            font-weight: bold;
            color: white;
            text-decoration: none;
        }
        .user-menu {
            display: flex;
            gap: 20px;
            align-items: center;
        }
        .user-menu a {
            color: white;
            text-decoration: none;
            font-size: 14px;
        }
        .user-welcome {
            display: flex;
            flex-direction: column;
            align-items: flex-end;
            margin-right: 10px;
        }
        .welcome-text {
            color: rgba(255, 255, 255, 0.8);
            font-size: 12px;
            margin-bottom: 2px;
        }
        .user-name {
            color: white;
            font-weight: 600;
            font-size: 15px;
        }
        .logout-btn {
            background-color: #e86f0c;
            color: white;
            padding: 8px 16px;
            border-radius: 4px;
            text-decoration: none;
            font-weight: 500;
            transition: background-color 0.2s;
        }
        .logout-btn:hover {
            background-color: #d65f00;
        }
        .main-content {
            max-width: 1200px;
            margin: 40px auto;
            padding: 0 20px;
        }
        .orders-container {
            background: white;
            border-radius: 8px;
            padding: 20px;
            box-shadow: 0 1px 3px rgba(0,0,0,0.1);
        }
        .orders-title {
            font-size: 24px;
            font-weight: 600;
            color: #333;
            margin-bottom: 20px;
        }
        .orders-empty {
            text-align: center;
            padding: 40px 0;
            color: #666;
        }
        .orders-empty-icon {
            font-size: 48px;
            margin-bottom: 20px;
            color: #ddd;
        }
        .orders-empty-text {
            font-size: 18px;
            margin-bottom: 20px;
        }
        .start-shopping {
            display: inline-block;
            background-color: #f27a1a;
            color: white;
            padding: 12px 24px;
            border-radius: 4px;
            text-decoration: none;
            font-weight: 500;
        }
        .start-shopping:hover {
            background-color: #e86f0c;
        }
        .order-status {
            display: inline-block;
            padding: 4px 8px;
            border-radius: 4px;
            font-size: 12px;
            font-weight: 500;
        }
        .status-pending {
            background-color: #fff3cd;
            color: #856404;
        }
        .status-processing {
            background-color: #cce5ff;
            color: #004085;
        }
        .status-completed {
            background-color: #d4edda;
            color: #155724;
        }
        .status-cancelled {
            background-color: #f8d7da;
            color: #721c24;
        }
        .back-button {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            background-color: #f5f5f5;
            color: #666;
            padding: 8px 16px;
            border-radius: 4px;
            text-decoration: none;
            font-weight: 500;
            margin-bottom: 20px;
            transition: background-color 0.2s;
        }
        .back-button:hover {
            background-color: #e0e0e0;
        }
        .back-button svg {
            width: 16px;
            height: 16px;
        }
    </style>
</head>
<body>
    <!-- Üst bar -->
    <div class="top-bar">
        <div class="top-container">
            <a href="/" class="logo">TesisatMarket</a>
            <div class="user-menu">
                <div class="user-welcome">
                    <span class="welcome-text">Hoş Geldiniz,</span>
                    <span class="user-name">{{ Auth::user()->name }}</span>
                </div>
                <a href="{{ route('orders.index') }}">Siparişlerim</a>
                <a href="#">Favorilerim</a>
                <a href="{{ route('cart.index') }}">Sepetim</a>
                <a href="{{ route('logout') }}" 
                   class="logout-btn"
                   onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                    Çıkış Yap
                </a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>
            </div>
        </div>
    </div>

    <!-- Ana içerik -->
    <div class="main-content">
        <a href="{{ route('home') }}" class="back-button">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                <path d="M19 12H5M12 19l-7-7 7-7"/>
            </svg>
            Geri Dön
        </a>
        <div class="orders-container">
            <h1 class="orders-title">Siparişlerim</h1>
            
            <div class="orders-empty">
                <div class="orders-empty-icon">📦</div>
                <div class="orders-empty-text">Henüz hiç siparişiniz bulunmuyor.</div>
                <a href="{{ route('home') }}" class="start-shopping">Alışverişe Başla</a>
            </div>
        </div>
    </div>
</body>
</html> 