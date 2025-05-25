<!DOCTYPE html>
<html>
<head>
    <title>Favorilerim - TesisatMarket</title>
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
        .favorites-container {
            background: white;
            border-radius: 8px;
            padding: 20px;
            box-shadow: 0 1px 3px rgba(0,0,0,0.1);
        }
        .favorites-title {
            font-size: 24px;
            font-weight: 600;
            color: #333;
            margin-bottom: 20px;
        }
        .favorites-empty {
            text-align: center;
            padding: 40px 0;
            color: #666;
        }
        .favorites-empty-icon {
            font-size: 48px;
            margin-bottom: 20px;
            color: #ddd;
        }
        .favorites-empty-text {
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

    <!-- Ana içerik -->
    <div class="main-content">
        <a href="{{ route('home') }}" class="back-button">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                <path d="M19 12H5M12 19l-7-7 7-7"/>
            </svg>
            Geri Dön
        </a>
        <div class="favorites-container">
            <h1 class="favorites-title">Favorilerim</h1>
            @if(count($favorites) > 0)
                <div class="products-grid">
                    @foreach($favorites as $product)
                        <div class="product-card">
                            <a href="{{ route('product.show', $product['id']) }}" style="text-decoration:none;color:inherit;">
                                <img src="{{ $product['image'] }}" alt="{{ $product['name'] }}" class="product-image">
                                <div class="product-category">{{ $product['category'] }}</div>
                                <div class="product-title">{{ $product['name'] }}</div>
                                <div class="product-price">{{ number_format($product['price'], 2, ',', '.') }} ₺</div>
                            </a>
                            <form action="{{ route('favorites.remove', $product['id']) }}" method="POST" style="margin-top:10px;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" style="background:#fff;color:#f27a1a;border:2px solid #f27a1a;padding:6px 16px;border-radius:6px;font-weight:600;cursor:pointer;transition:background 0.2s;">Favorilerden Kaldır</button>
                            </form>
                        </div>
                    @endforeach
                </div>
            @else
                <div class="favorites-empty">
                    <div class="favorites-empty-icon">❤️</div>
                    <div class="favorites-empty-text">Henüz favori ürününüz bulunmuyor.</div>
                    <a href="{{ route('home') }}" class="start-shopping">Alışverişe Başla</a>
                </div>
            @endif
        </div>
    </div>
    @if(session('success'))
        <script>alert('{{ session('success') }}');</script>
    @endif
</body>
</html> 