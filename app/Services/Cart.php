<?php
namespace App\Services;
class Cart
{

    protected $cart;

    public function __construct()
    {

        // dd(session()->get('cart'));
        if (!isset(session()->get('cart')['products'])) {

            session()->put('cart', [
                'products' => [],
                'quantity' => 0,
                'total' => 0
            ]);
        }
        $this->cart = session()->get('cart');
    }


    public function getTotal()
    {
        $cart = new self;
        return $cart->cart['total'];
    }

    public function getQuantity()
    {
        $cart = new self;
        return $cart->cart['quantity'];
    }
    public function add($id, $qty = 1)
    {
        $cart = new self;


        $products = $cart->cart['products'];

        if (isset($products[$id])) {

            $products[$id]['quantity'] += $qty;
        } else {
            $products[$id] = [
                'quantity' => $qty,
                'price' => 0,
            ];
        }

        $cart->cart['products'] = $products;

        session()->put('cart', $cart->cart);

    }

    public function getCart()
    {
        return session()->get('cart');
    }

}