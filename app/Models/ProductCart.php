<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductCart extends Model
{

    protected $table = 'product_cart';

    protected $fillable = ['product_id', 'qty', 'user_id'];

    use HasFactory;

    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function getNameAttribute()
    {
        return $this->product->name;
    }

    public function getAmountAttribute()
    {
        return to_usd($this->qty * $this->product->price);
    }

    public static function boot()
    {
        parent::boot();
        static::saving(function($model) {
            if($model->qty > $model->product->stock) {
                throw new \Exception('Product quantity exceeds stock.');
            }
        });
    }

}
