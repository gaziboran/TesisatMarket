<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class CartController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $user = Auth::user();
        $cartProducts = DB::table('cart_items')
            ->where('user_id', $user->id)
            ->pluck('product_id')
            ->toArray();

        // Örnek ürünler (veritabanı olmadığı için sabit)
        $products = [
            1 => [
                'id' => 1,
                'name' => 'Ankastre Duş Bataryası',
                'category' => 'Banyo',
                'price' => 1299.90,
                'image' => 'https://www.yapimarka.com/resimler/Kale-Sempre-Ankastre-Dus-Seti-22.jpg.webp',
                'description' => 'Yüksek kaliteli ankastre duş bataryası. Modern tasarım, uzun ömürlü kullanım, kolay montaj.'
            ],
            2 => [
                'id' => 2,
                'name' => 'PPR Boru 20mm',
                'category' => 'Su Tesisatı',
                'price' => 24.90,
                'image' => 'https://www.ozkardeslertesisat.com/images/urunler/pprc-boru-20mm.jpg',
                'description' => 'Dayanıklı PPR boru, 20mm çapında. Sıcak ve soğuk su tesisatlarında güvenle kullanılır.'
            ]
        ];
        $cart = [];
        foreach ($cartProducts as $pid) {
            if (isset($products[$pid])) {
                $cart[] = $products[$pid];
            }
        }
        return view('cart.index', compact('cart'));
    }
} 