<!DOCTYPE html>
<html>
<head>
    <title>{{ $product['name'] }} - TesisatMarket</title>
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
        .main-content {
            max-width: 800px;
            margin: 40px auto;
            padding: 0 20px;
            background: white;
            border-radius: 8px;
            box-shadow: 0 1px 3px rgba(0,0,0,0.1);
            display: flex;
            gap: 40px;
            align-items: flex-start;
        }
        .product-image {
            width: 320px;
            height: 320px;
            object-fit: contain;
            border-radius: 8px;
            background: #fafafa;
            box-shadow: 0 1px 3px rgba(0,0,0,0.05);
        }
        .product-info {
            flex: 1;
            display: flex;
            flex-direction: column;
            gap: 16px;
        }
        .product-category {
            color: #888;
            font-size: 14px;
        }
        .product-title {
            font-size: 28px;
            font-weight: 700;
            color: #222;
        }
        .product-price {
            font-size: 24px;
            font-weight: bold;
            color: #f27a1a;
        }
        .product-description {
            font-size: 16px;
            color: #444;
            margin-top: 10px;
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
        .action-buttons {
            display: flex;
            gap: 16px;
            margin-top: 10px;
        }
        .add-cart-btn, .add-fav-btn {
            padding: 10px 24px;
            border: none;
            border-radius: 6px;
            font-size: 16px;
            font-weight: 600;
            cursor: pointer;
            transition: background 0.2s;
        }
        .add-cart-btn {
            background: #f27a1a;
            color: white;
        }
        .add-cart-btn:hover {
            background: #e86f0c;
        }
        .add-fav-btn {
            background: #fff;
            color: #f27a1a;
            border: 2px solid #f27a1a;
        }
        .add-fav-btn:hover {
            background: #f27a1a;
            color: #fff;
        }
        .comments-section {
            margin-top: 40px;
            background: #fafafa;
            border-radius: 8px;
            padding: 24px;
        }
        .comments-title {
            font-size: 20px;
            font-weight: 600;
            margin-bottom: 16px;
            color: #222;
        }
        .comment {
            margin-bottom: 18px;
            padding-bottom: 12px;
            border-bottom: 1px solid #eee;
        }
        .comment-user {
            font-weight: 600;
            color: #f27a1a;
            font-size: 15px;
        }
        .comment-text {
            font-size: 15px;
            color: #444;
            margin-top: 2px;
        }
        .add-comment-form {
            margin-top: 24px;
            display: flex;
            flex-direction: column;
            gap: 10px;
        }
        .add-comment-form textarea {
            resize: vertical;
            min-height: 60px;
            font-size: 15px;
            padding: 8px;
            border-radius: 6px;
            border: 1px solid #ccc;
        }
        .add-comment-form button {
            align-self: flex-end;
            background: #f27a1a;
            color: white;
            border: none;
            border-radius: 6px;
            padding: 8px 20px;
            font-size: 15px;
            font-weight: 600;
            cursor: pointer;
            transition: background 0.2s;
        }
        .add-comment-form button:hover {
            background: #e86f0c;
        }
    </style>
</head>
<body>
    <div class="top-bar">
        <div class="top-container">
            <a href="/" class="logo">TesisatMarket</a>
        </div>
    </div>
    <div class="main-content">
        <img src="{{ $product['image'] }}" alt="{{ $product['name'] }}" class="product-image">
        <div class="product-info">
            <a href="{{ route('home') }}" class="back-button">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <path d="M19 12H5M12 19l-7-7 7-7"/>
                </svg>
                Geri Dön
            </a>
            <div class="product-category">{{ $product['category'] }}</div>
            <div class="product-title">{{ $product['name'] }}</div>
            <div class="product-price">{{ number_format($product['price'], 2, ',', '.') }} ₺</div>
            <div class="product-description">{{ $product['description'] }}</div>
            <div class="action-buttons">
                <form action="{{ route('product.addToCart', $product['id']) }}" method="POST" style="display:inline;">
                    @csrf
                    <button type="submit" class="add-cart-btn">Sepete Ekle</button>
                </form>
                <form action="{{ route('product.addToFavorite', $product['id']) }}" method="POST" style="display:inline;">
                    @csrf
                    <button type="submit" class="add-fav-btn">Favorilere Ekle</button>
                </form>
            </div>
        </div>
    </div>
    <div class="main-content">
        <div class="comments-section">
            <div class="comments-title">Kullanıcı Yorumları</div>
            <!-- Örnek Yorumlar -->
            <div class="comment">
                <div class="comment-user">Ahmet Y.</div>
                <div class="comment-text">Ürün çok kaliteli, hızlı kargo için teşekkürler.</div>
            </div>
            <div class="comment">
                <div class="comment-user">Zeynep K.</div>
                <div class="comment-text">Montajı kolay oldu, tavsiye ederim.</div>
            </div>
            <!-- Yorum Ekleme Formu -->
            <form class="add-comment-form">
                <label for="yorum">Yorumunuzu yazın:</label>
                <textarea id="yorum" name="yorum" placeholder="Yorumunuzu buraya yazın..."></textarea>
                <button type="submit">Yorumu Gönder</button>
            </form>
        </div>
    </div>
    @if(session('success'))
        <script>alert('{{ session('success') }}');</script>
    @endif
</body>
</html> 