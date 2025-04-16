<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
        'name', 'description', 'price', 'image', 'sizes', 'colors', 'stock'
    ];

    protected $casts = [
        'sizes' => 'array',
        'colors' => 'array',
    ];
    protected $appends = ['image_url','btc_price'];
    public function getBtcPriceAttribute()
    {
        $btcPrice = $this->price / 70000; // Assuming 1 BTC = 50,000 USD
        return number_format($btcPrice, 8);
    }
    public function getImageUrlAttribute()
    {
        return asset('storage/' . $this->image);
    }
}
