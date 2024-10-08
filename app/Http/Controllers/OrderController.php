<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\Order;
use App\Services\Api\ProductApi;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function createOrder(Request $request)
    {
        $cart = session()->get('cart', []);

        $totalPrice = 0;



        foreach ($cart as $item) {

            $product = ProductApi::getSingleProducts($item['id']);

            if ($product) {
                $totalPrice += $product['price'] * $item['quantity'];
            } else {

                return redirect()->back()->with('error', 'One or more products in the cart are unavailable.');
            }
        }


        $customer = Customer::updateOrCreate(
            ['number' => $request->number],
            [
                'name' => $request->name,
                'email' => $request->email,
                'address' => $request->address,
            ]
        );

        // Create the order
        $order = new Order;
        $order->customer_id = $customer->id;
        $order->unique_id = substr(str_shuffle(str_repeat('0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz', 12)), 0, 12);
        $order->total = $totalPrice;


        $order->save();

        $attachment = collect($cart)->pluck('quantity', 'id')->map(fn($qunatity) => ['quantity' => $qunatity]);

        $order->products()->attach($attachment);

        session()->forget('cart');


        return redirect(route('thankyou'));
    }

    public function thankyou()
    {
        return view('api.thankyou');
    }
}
