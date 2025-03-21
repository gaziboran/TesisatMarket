<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

// Ana sayfa
Route::get('/', function () {
    return view('welcome');
});

// Tüm auth rotalarını ekle
Auth::routes();

// Ana sayfa rotası
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
