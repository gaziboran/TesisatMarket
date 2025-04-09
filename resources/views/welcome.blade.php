<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TesisatMarket - Giriş Yap</title>
    @vite('resources/css/app.css')
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        .login-bg {
            background-image: url('https://images.unsplash.com/photo-1621905252507-b35492cc74b4?ixlib=rb-1.2.1&auto=format&fit=crop&w=2000&q=80');
            background-size: cover;
            background-position: center;
        }
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
            padding: 0 20px;
        }
        .logo {
            font-size: 24px;
            font-weight: bold;
            color: white;
            text-decoration: none;
        }
        .main-content {
            max-width: 1200px;
            margin: 40px auto;
            padding: 0 20px;
            text-align: center;
        }
        .button-group {
            display: flex;
            justify-content: center;
            gap: 20px;
            margin-top: 40px;
        }
        .btn {
            padding: 12px 24px;
            border-radius: 8px;
            font-size: 16px;
            font-weight: 500;
            text-decoration: none;
            transition: background-color 0.2s;
        }
        .btn-orange {
            background-color: #f27a1a;
            color: white;
        }
        .btn-orange:hover {
            background-color: #e86f0c;
        }
        .btn-gray {
            background-color: #666666;
            color: white;
        }
        .btn-gray:hover {
            background-color: #555555;
        }
    </style>
</head>
<body class="bg-gray-100">
    <div class="top-bar">
        <div class="top-container">
            <a href="/" class="logo">TesisatMarket</a>
        </div>
    </div>

    <div class="min-h-screen flex items-center justify-center login-bg">
        <div class="absolute inset-0 bg-black opacity-50 backdrop-blur-sm"></div>
        
        <div class="bg-white w-full max-w-md mx-4 rounded-xl shadow-2xl overflow-hidden z-10">
            <!-- Logo Alanı -->
            <div class="bg-orange-500 py-6 px-8">
                <h1 class="text-white text-3xl font-bold text-center">TesisatMarket</h1>
                <p class="text-white text-center mt-2 opacity-90">Hoş Geldiniz</p>
            </div>

            <!-- Form Alanı -->
            <div class="p-8">
                <h2 class="text-2xl font-semibold text-gray-700 text-center mb-6">Giriş Yap</h2>

                <form method="POST" action="{{ route('login') }}" class="space-y-6">
                    @csrf

                    <!-- Email Alanı -->
                    <div>
                        <label class="block text-gray-700 text-sm font-semibold mb-2">
                            E-posta Adresi
                        </label>
                        <div class="relative">
                            <span class="absolute inset-y-0 left-0 pl-3 flex items-center text-gray-500">
                                <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" 
                                        d="M16 12a4 4 0 10-8 0 4 4 0 008 0zm0 0v1.5a2.5 2.5 0 005 0V12a9 9 0 10-9 9m4.5-1.206a8.959 8.959 0 01-4.5 1.207" />
                                </svg>
                            </span>
                            <input type="email" name="email" 
                                class="w-full pl-10 pr-4 py-3 rounded-lg border border-gray-300 focus:border-orange-500 focus:ring-2 focus:ring-orange-200 transition-colors"
                                placeholder="ornek@email.com" required />
                        </div>
                        @error('email')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Şifre Alanı -->
                    <div>
                        <label class="block text-gray-700 text-sm font-semibold mb-2">
                            Şifre
                        </label>
                        <div class="relative">
                            <span class="absolute inset-y-0 left-0 pl-3 flex items-center text-gray-500">
                                <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" 
                                        d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z" />
                                </svg>
                            </span>
                            <input type="password" name="password" 
                                class="w-full pl-10 pr-4 py-3 rounded-lg border border-gray-300 focus:border-orange-500 focus:ring-2 focus:ring-orange-200 transition-colors"
                                placeholder="••••••••" required />
                        </div>
                        @error('password')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Beni Hatırla -->
                    <div class="flex items-center justify-between">
                        <div class="flex items-center">
                            <input type="checkbox" name="remember" id="remember" 
                                class="h-4 w-4 text-orange-500 focus:ring-orange-400 border-gray-300 rounded">
                            <label for="remember" class="ml-2 block text-sm text-gray-700">
                                Beni Hatırla
                            </label>
                        </div>
                        <a href="{{ route('password.request') }}" 
                            class="text-sm text-orange-500 hover:text-orange-600 transition-colors">
                            Şifremi Unuttum
                        </a>
                    </div>

                    <!-- Giriş Butonu -->
                    <button type="submit" 
                        class="w-full bg-orange-500 text-white py-3 px-4 rounded-lg hover:bg-orange-600 focus:outline-none focus:ring-2 focus:ring-orange-500 focus:ring-offset-2 transition-colors font-semibold">
                        Giriş Yap
                    </button>

                    <!-- Kayıt Ol Linki -->
                    <div class="text-center mt-6">
                        <p class="text-gray-600">
                            Hesabınız yok mu? 
                            <a href="{{ route('register') }}" 
                                class="text-orange-500 hover:text-orange-600 font-semibold transition-colors">
                                Üye Ol
                            </a>
                        </p>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div class="main-content">
        <div class="button-group">
            @if (Route::has('login'))
                @auth
                    <a href="{{ url('/home') }}" class="btn btn-orange">Ana Sayfa</a>
                @else
                    <a href="{{ route('login') }}" class="btn btn-orange">Giriş Yap</a>
                    <a href="{{ route('register') }}" class="btn btn-orange">Üye Ol</a>
                    <a href="{{ route('market.index') }}" class="btn btn-gray">Üye Olmadan Devam Et</a>
                @endauth
            @endif
        </div>
    </div>

    <script>
        // Form animasyonları için
        const inputs = document.querySelectorAll('input');
        inputs.forEach(input => {
            input.addEventListener('focus', function() {
                this.parentElement.classList.add('ring-2', 'ring-orange-200');
            });
            input.addEventListener('blur', function() {
                this.parentElement.classList.remove('ring-2', 'ring-orange-200');
            });
        });
    </script>
</body>
</html>
