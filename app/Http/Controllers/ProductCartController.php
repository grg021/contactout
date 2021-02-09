<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductCartController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'id' => 'required|exists:products'
        ]);

        $user = auth()->user();

        $userProduct = $user->products()->firstOrCreate([
            'product_id' => $request->id
        ], [ 'qty' => 0 ]);

        try {
            $userProduct->qty = $userProduct->qty + 1;
            $userProduct->save();
        } catch (\Exception $e) {
            throw new \Exception($e->getMessage());
        }



        return response()->json(['message' => 'added-to-cart'], 200);

    }
}
