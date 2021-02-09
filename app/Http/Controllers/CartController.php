<?php

namespace App\Http\Controllers;

use App\Transformers\CartItem;
use Illuminate\Support\Facades\DB;

class CartController extends Controller
{
    public function index()
    {

        $cartItems = auth()->user()->products()->get();

        $data['data'] = json_encode(fractal($cartItems, new CartItem())->toArray()['data']);
        $data['total'] = $cartItems->map(function($item) {
            return $item->qty * $item->product->price;
        })->sum();

        return view('cart', $data);
    }

    public function checkout()
    {

        $user = auth()->user();

        $products = $user->products()->get();

        DB::beginTransaction();
        try {
            // update product stock
            foreach ($products as $userProduct) {
                $userProduct->product->updateStock($userProduct->qty);
            }

            // create order and attach products
            $order = $user->orders()->create();
            $order->products()->attach($products);

            // clear cart
            $user->products()->delete();

        } catch (\Exception $e) {
            DB::rollBack();
            return response()->json(['message' => $e->getMessage()], 500);
        }

        DB::commit();

        return response()->json(['message' => 'products-has-been-checked-out'], 200);

    }


}
