<?php

namespace App\Models;

use App\Exceptions\OutOfStock;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'description', 'stock', 'price'];

    protected $appends = ['price_in_usd'];

    public function carts()
    {
        return $this->belongsToMany(Cart::class);
    }

    public function orders()
    {
        return $this->belongsToMany(Order::class);
    }

    public function getPriceInUsdAttribute()
    {
        return to_usd($this->price);
    }

    public function updateStock(int $qty)
    {

        if($this->stock < $qty) {
            throw new OutOfStock();
        }

        $this->update([
            'stock' => $this->stock - $qty
        ]);
    }

}
