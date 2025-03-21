<!DOCTYPE html>
<html>
<head>
    <title>Giriş Yap - TesisatMarket</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f5f5f5;
            margin: 0;
            padding: 0;
        }
        .nav {
            background-color: #E84E0E;
            color: white;
            padding: 15px 20px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            box-shadow: 0 2px 4px rgba(0,0,0,0.1);
        }
        .nav-brand {
            font-size: 24px;
            font-weight: bold;
            text-decoration: none;
            color: white;
        }
        .nav-links {
            display: flex;
            gap: 20px;
        }
        .nav-links a {
            color: white;
            text-decoration: none;
            padding: 5px 15px;
            border-radius: 4px;
        }
        .nav-links a:hover {
            background-color: rgba(255,255,255,0.1);
        }
        .nav-links .btn-white {
            background-color: white;
            color: #E84E0E;
        }
        .container {
            max-width: 400px;
            margin: 40px auto;
            background: white;
            border-radius: 8px;
            overflow: hidden;
            box-shadow: 0 2px 4px rgba(0,0,0,0.1);
        }
        .header {
            background-color: #E84E0E;
            color: white;
            padding: 20px;
            text-align: center;
        }
        .header h1 {
            margin: 0;
            font-size: 24px;
        }
        .header p {
            margin: 10px 0 0;
            font-size: 16px;
        }
        .form-container {
            padding: 20px;
        }
        .form-group {
            margin-bottom: 15px;
        }
        label {
            display: block;
            margin-bottom: 5px;
            font-weight: bold;
        }
        input[type="email"],
        input[type="password"] {
            width: 100%;
            padding: 8px;
            border: 1px solid #ddd;
            border-radius: 4px;
            box-sizing: border-box;
        }
        .checkbox-group {
            margin: 15px 0;
        }
        .btn-login {
            background-color: #E84E0E;
            color: white;
            padding: 10px;
            border: none;
            border-radius: 4px;
            width: 100%;
            font-size: 16px;
            cursor: pointer;
        }
        .btn-login:hover {
            background-color: #d64100;
        }
        .links {
            margin-top: 15px;
            text-align: center;
        }
        .links a {
            color: #E84E0E;
            text-decoration: none;
            margin: 0 10px;
        }
        .links a:hover {
            text-decoration: underline;
        }
        .alert {
            padding: 10px;
            margin-bottom: 15px;
            border-radius: 4px;
        }
        .alert-success {
            background-color: #d4edda;
            border-color: #c3e6cb;
            color: #155724;
        }
        .alert-danger {
            background-color: #f8d7da;
            border-color: #f5c6cb;
            color: #721c24;
        }
    </style>
</head>
<body>
    <!-- Üst Çubuk -->
    <nav class="nav">
        <a href="/" class="nav-brand">TesisatMarket</a>
        <div class="nav-links">
        </div>
    </nav>

    <div class="container">
        <div class="header">
            <h1>Giriş Yap</h1>
            <p>TesisatMarket'e hoş geldiniz</p>
        </div>

        <div class="form-container">
            @if(session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif

            @if($errors->any())
                <div class="alert alert-danger">
                    @foreach($errors->all() as $error)
                        <p>{{ $error }}</p>
                    @endforeach
                </div>
            @endif

            <form method="POST" action="{{ route('login') }}">
                @csrf
                
                <div class="form-group">
                    <label for="email">E-posta Adresi</label>
                    <input type="email" id="email" name="email" value="{{ old('email') }}" required>
                </div>

                <div class="form-group">
                    <label for="password">Şifre</label>
                    <input type="password" id="password" name="password" required>
                </div>

                <div class="checkbox-group">
                    <label>
                        <input type="checkbox" name="remember"> Beni Hatırla
                    </label>
                </div>

                <button type="submit" class="btn-login">Giriş Yap</button>

                <div class="links">
                    <a href="{{ route('password.request') }}">Şifremi Unuttum</a>
                    <a href="{{ route('register') }}">Üye Ol</a>
                </div>
            </form>
        </div>
    </div>
</body>
</html>
