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
