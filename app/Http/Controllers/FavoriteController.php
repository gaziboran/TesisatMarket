<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;

class FavoriteController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $user = Auth::user();
        $favoriteProducts = DB::table('favorites')
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
        $favorites = [];
        foreach ($favoriteProducts as $pid) {
            if (isset($products[$pid])) {
                $favorites[] = $products[$pid];
            }
        }
        return view('favorites.index', compact('favorites'));
    }

    public function destroy($id)
    {
        $user = Auth::user();
        DB::table('favorites')
            ->where('user_id', $user->id)
            ->where('product_id', $id)
            ->delete();
        return Redirect::back()->with('success', 'Ürün favorilerden kaldırıldı!');
    }
} 