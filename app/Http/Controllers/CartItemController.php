<?php

namespace App\Http\Controllers;

use App\Models\ProductCart;
use Illuminate\Http\Request;

class CartItemController extends Controller
{
    public function destroy($id)
    {

        $item = ProductCart::findOrFail($id);

        $item->delete();

        return response()->json(['message' => 'item-removed-from-cart'], 200);
    }
}
