<!DOCTYPE html>
<html>
<head>
    <title>Giriş Yap - TesisatMarket</title>
    <style>
        body {
            font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, sans-serif;
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
            padding: 0 20px;
            display: flex;
            justify-content: flex-start;
        }
        .logo {
            font-size: 24px;
            font-weight: bold;
            color: white;
            text-decoration: none;
        }
        .search-bar {
            flex-grow: 1;
            margin: 0 40px;
            position: relative;
        }
        .search-input {
            width: 100%;
            padding: 12px 40px 12px 15px;
            border: 1px solid #e6e6e6;
            border-radius: 8px;
            background-color: #f5f5f5;
            font-size: 14px;
        }
        .search-icon {
            position: absolute;
            right: 15px;
            top: 50%;
            transform: translateY(-50%);
            color: #666;
        }
        .top-menu {
            display: flex;
            gap: 20px;
            align-items: center;
        }
        .top-menu a {
            text-decoration: none;
            color: #333;
            font-size: 14px;
            display: flex;
            align-items: center;
            gap: 5px;
        }
        .main-container {
            max-width: 1200px;
            margin: 40px auto;
            padding: 0 20px;
            display: flex;
            gap: 30px;
        }
        .login-container {
            background: white;
            padding: 30px;
            border-radius: 8px;
            box-shadow: 0 1px 3px rgba(0,0,0,0.1);
            width: 400px;
            margin: 0 auto;
        }
        .login-title {
            font-size: 24px;
            font-weight: bold;
            margin-bottom: 20px;
            color: #333;
        }
        .form-group {
            margin-bottom: 20px;
        }
        .form-group label {
            display: block;
            margin-bottom: 8px;
            color: #666;
            font-size: 14px;
        }
        .form-group input {
            width: 100%;
            padding: 12px;
            border: 1px solid #e6e6e6;
            border-radius: 8px;
            font-size: 14px;
        }
        .form-group input:focus {
            outline: none;
            border-color: #f27a1a;
        }
        .remember-forgot {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 20px;
            font-size: 14px;
        }
        .btn-login {
            width: 100%;
            padding: 14px;
            background-color: #f27a1a;
            color: white;
            border: none;
            border-radius: 8px;
            font-size: 16px;
            font-weight: bold;
            cursor: pointer;
        }
        .btn-login:hover {
            background-color: #e86f0c;
        }
        .register-link {
            text-align: center;
            margin-top: 20px;
            font-size: 14px;
            color: #666;
        }
        .register-link a {
            color: #f27a1a;
            text-decoration: none;
            font-weight: bold;
        }
    </style>
</head>
<body>
    <div class="top-bar">
        <div class="top-container">
            <a href="/" class="logo">TesisatMarket</a>
        </div>
    </div>

    <div class="main-container">
        <div class="login-container">
            <h1 class="login-title">Giriş Yap</h1>

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
                    <label for="email">E-posta</label>
                    <input type="email" id="email" name="email" value="{{ old('email') }}" required>
                </div>

                <div class="form-group">
                    <label for="password">Şifre</label>
                    <input type="password" id="password" name="password" required>
                </div>

                <div class="remember-forgot">
                    <label>
                        <input type="checkbox" name="remember"> Beni Hatırla
                    </label>
                    <a href="{{ route('password.request') }}" style="color: #f27a1a; text-decoration: none;">
                        Şifremi Unuttum
                    </a>
                </div>

                <button type="submit" class="btn-login">Giriş Yap</button>

                <div class="register-link">
                    Hesabın yok mu? 
                    <a href="{{ route('register') }}">Üye Ol</a>
                </div>
            </form>
        </div>
    </div>
</body>
</html>
