<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Order extends Model
{
    protected $fillable = [
        'customer',
        'status',
        'product_id',
        'quantity',
        'final_price',
    ];

    public function product(): BelongsTo
    {
        return $this->belongsTo(Product::class);
    }
}
