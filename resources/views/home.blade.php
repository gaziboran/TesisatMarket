<!DOCTYPE html>
<html>
<head>
    <title>Dashboard - TesisatMarket</title>
    <style>
        body {
            font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f5f5f5;
        }
        .top-bar {
            background: white;
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
            color: #333;
            text-decoration: none;
        }
        .search-bar {
            flex-grow: 0;
            width: 40%;
            margin: 0 20px;
            position: relative;
        }
        .search-input {
            width: 100%;
            padding: 10px 15px;
            border: 1px solid #e6e6e6;
            border-radius: 8px;
            background-color: #f5f5f5;
            font-size: 14px;
        }
        .user-menu {
            display: flex;
            gap: 20px;
            align-items: center;
            margin-left: auto;
        }
        .user-menu a {
            text-decoration: none;
            color: #333;
            font-size: 14px;
            display: flex;
            align-items: center;
            gap: 5px;
        }
        .user-name {
            font-weight: 500;
            color: #f27a1a;
            white-space: nowrap;
        }
        .main-content {
            max-width: 1200px;
            margin: 40px auto;
            padding: 0 20px;
        }
        .dashboard-card {
            background: white;
            border-radius: 8px;
            box-shadow: 0 1px 3px rgba(0,0,0,0.1);
            padding: 20px;
            margin-bottom: 20px;
        }
        .welcome-message {
            font-size: 24px;
            color: #333;
            margin-bottom: 10px;
        }
        .sub-message {
            color: #666;
            font-size: 16px;
        }
        .menu-categories {
            display: flex;
            gap: 20px;
            margin-top: 20px;
            padding: 15px 0;
            border-bottom: 1px solid #e6e6e6;
        }
        .menu-categories a {
            text-decoration: none;
            color: #333;
            font-size: 14px;
            padding: 8px 16px;
            border-radius: 4px;
        }
        .menu-categories a:hover {
            background-color: #f5f5f5;
        }
        .logout-btn {
            background-color: #f27a1a;
            color: white;
            padding: 8px 16px;
            border-radius: 4px;
            text-decoration: none;
            font-size: 14px;
        }
        .logout-btn:hover {
            background-color: #e86f0c;
        }
    </style>
</head>
<body>
    <div class="top-bar">
        <div class="top-container">
            <a href="/" class="logo">TesisatMarket</a>
            <div class="search-bar">
                <input type="text" class="search-input" placeholder="Aradığınız ürün, kategori veya markayı yazınız">
            </div>
            <div class="user-menu">
                <span class="user-name">{{ Auth::user()->name }}</span>
                <a href="#">Siparişlerim</a>
                <a href="#">Favorilerim</a>
                <a href="#">Sepetim</a>
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

    <div class="menu-categories">
        <div class="top-container">
            <a href="#">Anasayfa</a>
            <a href="#">Ürünler</a>
            <a href="#">Kategoriler</a>
            <a href="#">Kampanyalar</a>
            <a href="#">Hesabım</a>
        </div>
    </div>

    <div class="main-content">
        <div class="dashboard-card">
            <h1 class="welcome-message">Hoş Geldiniz, {{ Auth::user()->name }}!</h1>
            <p class="sub-message">TesisatMarket'te size özel fırsatları kaçırmayın.</p>
        </div>

        <!-- Buraya diğer dashboard içerikleri eklenebilir -->
    </div>
</body>
</html>
