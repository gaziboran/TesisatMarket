<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    public function show($id)
    {
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
                'image' => 'https://nalburxmlbayi.com/image/cache/catalog/2-pprc-pvc-boru/pprc-pn10-plastik-kompozit-su-borusu-adem-kiral-trendyol-nalburxmlbayi-1-1000x1000.webp',
                'description' => 'Dayanıklı PPR boru, 20mm çapında. Sıcak ve soğuk su tesisatlarında güvenle kullanılır.'
            ]
        ];
        $product = $products[$id] ?? null;
        if (!$product) {
            abort(404);
        }
        return view('products.show', compact('product'));
    }

    public function storeCart(Request $request, $id)
    {
        $user = Auth::user();
        $cartItem = DB::table('cart_items')
            ->where('user_id', $user->id)
            ->where('product_id', $id)
            ->first();

        if ($cartItem) {
            DB::table('cart_items')
                ->where('user_id', $user->id)
                ->where('product_id', $id)
                ->update([
                    'quantity' => $cartItem->quantity + 1,
                    'updated_at' => now()
                ]);
        } else {
            DB::table('cart_items')->insert([
                'user_id' => $user->id,
                'product_id' => $id,
                'quantity' => 1,
                'created_at' => now(),
                'updated_at' => now()
            ]);
        }
        return Redirect::back()->with('success', 'Ürün sepete eklendi!');
    }

    public function storeFavorite(Request $request, $id)
    {
        $user = Auth::user();
        DB::table('favorites')->updateOrInsert(
            [
                'user_id' => $user->id,
                'product_id' => $id
            ],
            [
                'updated_at' => now(),
                'created_at' => now()
            ]
        );
        return Redirect::back()->with('success', 'Ürün favorilere eklendi!');
    }

    public function destroyCart($id)
    {
        $user = Auth::user();
        DB::table('cart_items')
            ->where('user_id', $user->id)
            ->where('product_id', $id)
            ->delete();
        return Redirect::back()->with('success', 'Ürün sepetten kaldırıldı!');
    }
} 