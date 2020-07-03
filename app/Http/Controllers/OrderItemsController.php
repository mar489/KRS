<?php

namespace App\Http\Controllers;

use App\Product;
use App\Sizes;
use Illuminate\Http\Request;
class OrderItemsController extends Controller
{
    public function show()
    {
        $prodwithall = [];
        if (!empty($_COOKIE['cart'])){
            $cart = json_decode($_COOKIE['cart']);
            if (!empty($cart)) {
                foreach ($cart as $item) {
                    $product = Product::find($item->item_id);
                    if ($product->is_available === 1) {
                        $prodwithall[] = ['product' => $product, 'size' => $item->size, 'count' => $item->count];
                        $forcookies[] = ['item_id' => $item->item_id, 'size' => $item->size, 'count' => $item->count, 'price' => $item -> price];
                    }
                }
                setcookie('avail_cart',json_encode($forcookies));
            }
            else $prodwithall = null;
        }

        return view('shopping-card', [
            'products' => $prodwithall,
            'sizes' => Sizes::all()
        ]);
    }
}
