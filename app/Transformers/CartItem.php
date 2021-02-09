<?php

namespace App\Transformers;

use App\Models\ProductCart;
use League\Fractal\TransformerAbstract;

class CartItem extends TransformerAbstract
{
    /**
     * List of resources to automatically include
     *
     * @var array
     */
    protected $defaultIncludes = [
        //
    ];

    /**
     * List of resources possible to include
     *
     * @var array
     */
    protected $availableIncludes = [
        //
    ];

    /**
     * A Fractal transformer.
     *
     * @return array
     */
    public function transform(ProductCart $item)
    {
        return [
            'id' => $item->id,
            'name' => $item->name,
            'qty' => $item->qty,
            'price_in_usd' => $item->product->price_in_usd,
            'amount' => $item->amount,
        ];
    }
}
