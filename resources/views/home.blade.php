<!DOCTYPE html>
<html>
<head>
    <title>TesisatMarket - Hoşgeldiniz</title>
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
        .categories {
            background: white;
            padding: 10px 0;
            border-bottom: 1px solid #e6e6e6;
        }
        .category-list {
            display: flex;
            gap: 30px;
            list-style: none;
            padding: 0;
            margin: 0;
        }
        .category-list a {
            color: #333;
            text-decoration: none;
            font-size: 14px;
            font-weight: 500;
        }
        .category-list a:hover {
            color: #f27a1a;
        }
        .products-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(250px, 1fr));
            gap: 20px;
            margin-top: 30px;
        }
        .product-card {
            background: white;
            border-radius: 8px;
            padding: 15px;
            box-shadow: 0 1px 3px rgba(0,0,0,0.1);
            transition: transform 0.2s;
        }
        .product-card:hover {
            transform: translateY(-5px);
        }
        .product-image {
            width: 100%;
            height: 200px;
            object-fit: cover;
            border-radius: 4px;
            margin-bottom: 10px;
        }
        .product-title {
            font-size: 16px;
            font-weight: 500;
            color: #333;
            margin-bottom: 10px;
        }
        .product-price {
            font-size: 18px;
            font-weight: bold;
            color: #f27a1a;
        }
        .product-category {
            font-size: 12px;
            color: #666;
            margin-bottom: 5px;
        }
    </style>
</head>
<body>
    <!-- Üst bar -->
    <div class="top-bar">
        <div class="top-container">
            <a href="/" class="logo">TesisatMarket</a>
            <div class="search-bar">
                <input type="text" class="search-input" placeholder="Aradığınız ürün, kategori veya markayı yazınız">
            </div>
            <div class="user-menu">
                <div class="user-welcome">
                    <span class="welcome-text">Hoş Geldiniz,</span>
                    <span class="user-name">{{ Auth::user()->name }}</span>
                </div>
                <a href="{{ route('orders.index') }}">Siparişlerim</a>
                <a href="{{ route('favorites.index') }}">Favorilerim</a>
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

    <!-- Kategoriler -->
    <div class="categories">
        <div class="top-container">
            <ul class="category-list">
                <li><a href="#">Tüm Ürünler</a></li>
                <li><a href="#">Banyo</a></li>
                <li><a href="#">Su Tesisatı</a></li>
                <li><a href="#">Vitrifiye</a></li>
                <li><a href="#">Armatür</a></li>
                <li><a href="#">Duş Sistemleri</a></li>
                <li><a href="#">Musluk ve Bataryalar</a></li>
                <li><a href="#">Klozet ve Rezervuarlar</a></li>
                <li><a href="#">Lavabolar</a></li>
            </ul>
        </div>
    </div>

    <!-- Ana içerik -->
    <div class="main-content">
        <!-- Ürün Grid -->
        <div class="products-grid">
            <!-- Örnek Ürün 1 -->
            <div class="product-card">
                <a href="{{ route('product.show', 1) }}" style="text-decoration:none;color:inherit;">
                    <img src="https://www.yapimarka.com/resimler/Kale-Sempre-Ankastre-Dus-Seti-22.jpg.webp" alt="Ürün" class="product-image">
                    <div class="product-category">Banyo</div>
                    <div class="product-title">Ankastre Duş Bataryası</div>
                    <div class="product-price">1.699,90 ₺</div>
                </a>
            </div>

            <!-- Örnek Ürün 2 -->
            <div class="product-card">
                <a href="{{ route('product.show', 2) }}" style="text-decoration:none;color:inherit;">
                    <img src="https://nalburxmlbayi.com/image/cache/catalog/2-pprc-pvc-boru/pprc-pn10-plastik-kompozit-su-borusu-adem-kiral-trendyol-nalburxmlbayi-1-1000x1000.webp" alt="Ürün" class="product-image">
                    <div class="product-category">Su Tesisatı</div>
                    <div class="product-title">PPR Boru 20mm</div>
                    <div class="product-price">24,90 ₺</div>
                </a>
            </div>

            <!-- Diğer örnek ürünler aynı şekilde devam edecek -->
        </div>
    </div>
</body>
</html>
