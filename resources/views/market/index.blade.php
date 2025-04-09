<!DOCTYPE html>
<html>
<head>
    <title>Market - TesisatMarket</title>
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
            background-color: white;
            font-size: 14px;
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
        .main-content {
            max-width: 1200px;
            margin: 40px auto;
            padding: 0 20px;
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
                <a href="{{ route('login') }}">Giriş Yap</a>
                <a href="{{ route('register') }}">Üye Ol</a>
            </div>
        </div>
    </div>

    <div class="main-content">
        <!-- Buraya ürünler gelecek -->
    </div>
</body>
</html> 