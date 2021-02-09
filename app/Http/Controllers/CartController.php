<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CartController extends Controller
{
    public function index()
    {

        $data['products'] = auth()->user()->products()->get();

        return view('cart', $data);
    }

    public function checkout()
    {

        $user = auth()->user();

        $products = $user->products()->get();

        // create order
        $order = $user->orders()->create();

        $order->products()->attach($products);

        // clear cart
        $user->products()->delete();

        return response()->json(['message' => 'products-has-been-checked-out'], 200);

    }


}
