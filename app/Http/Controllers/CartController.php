<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Services\Api\ProductApi;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function view()
    {
        $cart = session()->get('cart', []);
        $products = [];
        $totalPrice = 0;
        foreach ($cart as $item) {
            $product = ProductApi::getSingleProducts($item['id']);
            $totalPrice += $product['price'] * $item['quantity'];
            $products[] = [
                'product' => $product,
                'quantity' => $item['quantity'],
            ];
            
        }

        // dd($products[0]['product'],$products[0]['quantity']);

        // Pass $cart and $products to the view
        return view('api.cart', compact('cart', 'products', 'totalPrice'));

    }
    public function addToCart(Request $request)
    {
        $product = [
            "id" => $request->id,
            "quantity" => $request->quantity
        ];

        $cart = session()->get('cart', []);

        if (isset($cart[$product['id']])) {
            $cart[$product['id']]['quantity'] += $product['quantity'];
        } else {
            $cart[$product['id']] = $product;
        }

        session()->put('cart', $cart);
        return redirect()->back();
    }
    public function removeFromCart($id)
    {
        $cart = session()->get('cart', []);

        if (isset($cart[$id])) {
            unset($cart[$id]);

            session()->put('cart', $cart);
        }
        return redirect()->back();
    }
    public function checkOut()
    {

        $customer = new Customer();

        if (request()->filled('phone')) {

            $customer = $customer->where('number', request()->phone)->firstOrNew();
        }
        $cart = session()->get('cart', []);
        $products = [];
        $totalPrice = 0;
        foreach ($cart as $item) {
            $product = ProductApi::getSingleProducts($item['id']);
            $totalPrice += $product['price'] * $item['quantity'];
            $products[] = [
                'product' => $product,
                'quantity' => $item['quantity'],
            ];
        }
        return view('api.checkout', compact('cart', 'products', 'totalPrice', 'customer'));
    }


}
