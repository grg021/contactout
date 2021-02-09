<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductCartController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'id' => 'required'
        ]);

        $user = auth()->user();

        $product = Product::findOrFail($request->id);

        $user->products()->attach($product);

        return response()->json(['message' => 'added-to-cart'], 200);

    }
}
