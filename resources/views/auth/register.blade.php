<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TesisatMarket - Üye Ol</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-50">
    <!-- Üst Menü -->
    <nav class="bg-orange-600 text-white shadow-lg">
        <div class="container mx-auto px-6 py-4">
            <div class="flex justify-between items-center">
                <a href="/" class="text-2xl font-bold">TesisatMarket</a>
                <div class="space-x-4">
                    <a href="{{ route('login') }}" class="hover:text-orange-200">Giriş Yap</a>
                    <a href="{{ route('register') }}" class="bg-white text-orange-600 px-4 py-2 rounded-lg font-medium hover:bg-orange-50">Üye Ol</a>
                </div>
            </div>
        </div>
    </nav>

    <!-- Ana İçerik -->
    <div class="container mx-auto px-4 py-12">
        <div class="max-w-md mx-auto bg-white rounded-xl shadow-lg overflow-hidden">
            <!-- Başlık -->
            <div class="bg-orange-600 text-white py-6 px-8">
                <h2 class="text-2xl font-bold text-center">Üye Ol</h2>
                <p class="text-center mt-2 text-orange-100">TesisatMarket'e hoş geldiniz</p>
            </div>

            <!-- Form -->
            <form method="POST" action="{{ route('register') }}" class="p-8 space-y-6">
                @csrf

                <!-- Ad Soyad -->
                <div>
                    <label for="name" class="block text-sm font-medium text-gray-700 mb-1">Ad Soyad</label>
                    <input type="text" id="name" name="name" value="{{ old('name') }}"
                        class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-orange-500 focus:border-orange-500"
                        placeholder="Adınız ve Soyadınız">
                    @error('name')
                        <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                    @enderror
                </div>

                <!-- E-posta -->
                <div>
                    <label for="email" class="block text-sm font-medium text-gray-700 mb-1">E-posta Adresi</label>
                    <input type="email" id="email" name="email" value="{{ old('email') }}"
                        class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-orange-500 focus:border-orange-500"
                        placeholder="ornek@email.com">
                    @error('email')
                        <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Telefon -->
                <div>
                    <label for="phone" class="block text-sm font-medium text-gray-700 mb-1">Telefon Numarası</label>
                    <input type="tel" id="phone" name="phone" value="{{ old('phone') }}"
                        class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-orange-500 focus:border-orange-500"
                        placeholder="05XX XXX XX XX">
                    @error('phone')
                        <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Şifre -->
                <div>
                    <label for="password" class="block text-sm font-medium text-gray-700 mb-1">Şifre</label>
                    <input type="password" id="password" name="password"
                        class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-orange-500 focus:border-orange-500"
                        placeholder="••••••••">
                    @error('password')
                        <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Şifre Tekrar -->
                <div>
                    <label for="password_confirmation" class="block text-sm font-medium text-gray-700 mb-1">Şifre Tekrar</label>
                    <input type="password" id="password_confirmation" name="password_confirmation"
                        class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-orange-500 focus:border-orange-500"
                        placeholder="••••••••">
                </div>

                <!-- Üyelik Sözleşmesi -->
                <div class="flex items-start">
                    <div class="flex items-center h-5">
                        <input type="checkbox" id="terms" name="terms"
                            class="w-4 h-4 text-orange-600 border-gray-300 rounded focus:ring-orange-500">
                    </div>
                    <div class="ml-3">
                        <label for="terms" class="text-sm text-gray-700">
                            <a href="#" class="text-orange-600 hover:text-orange-700 font-medium">Üyelik sözleşmesini</a> okudum ve kabul ediyorum
                        </label>
                    </div>
                </div>

                <!-- Üye Ol Butonu -->
                <button type="submit"
                    class="w-full bg-orange-600 text-white py-3 rounded-lg font-medium hover:bg-orange-700 transition-colors">
                    Üye Ol
                </button>

                <!-- Giriş Yap Linki -->
                <p class="text-center text-sm text-gray-600">
                    Zaten üye misiniz? 
                    <a href="{{ route('login') }}" class="text-orange-600 hover:text-orange-700 font-medium">
                        Giriş Yap
                    </a>
                </p>
            </form>
        </div>
    </div>
</body>
</html>
