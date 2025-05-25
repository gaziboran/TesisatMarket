<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Auth\LoginController;

// Ana sayfa
Route::get('/', function () {
    return view('welcome');
});

// Tüm auth rotalarını ekle
Auth::routes();

// Ana sayfa rotası
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])
    ->name('home')
    ->middleware('auth');

// Login rotaları
Route::get('/giris-yap', [LoginController::class, 'showLoginForm'])->name('giris.yap');
Route::post('/giris-yap', [LoginController::class, 'login']);

// Ürünler sayfası
Route::get('/market', [App\Http\Controllers\MarketController::class, 'index'])->name('market.index');

// Sepet sayfası
Route::get('/sepetim', [App\Http\Controllers\CartController::class, 'index'])->name('cart.index')->middleware('auth');

// Siparişlerim sayfası
Route::get('/siparislerim', [App\Http\Controllers\OrderController::class, 'index'])->name('orders.index')->middleware('auth');

// Favorilerim sayfası
Route::get('/favorilerim', [App\Http\Controllers\FavoriteController::class, 'index'])->name('favorites.index')->middleware('auth');

// Ürün detay sayfası
Route::get('/urun/{id}', [App\Http\Controllers\ProductController::class, 'show'])->name('product.show');

// Sepete ekle
Route::post('/urun/{id}/sepete-ekle', [App\Http\Controllers\ProductController::class, 'storeCart'])->name('product.addToCart')->middleware('auth');

// Favorilere ekle
Route::post('/urun/{id}/favorilere-ekle', [App\Http\Controllers\ProductController::class, 'storeFavorite'])->name('product.addToFavorite')->middleware('auth');

// Favorilerden kaldır
Route::delete('/favorilerim/{id}/kaldir', [App\Http\Controllers\FavoriteController::class, 'destroy'])->name('favorites.remove')->middleware('auth');

// Sepetten kaldır
Route::delete('/sepetim/{id}/kaldir', [App\Http\Controllers\ProductController::class, 'destroyCart'])->name('cart.remove')->middleware('auth');
