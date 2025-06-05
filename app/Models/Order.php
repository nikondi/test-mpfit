<?php

namespace App\Models;

use App\Enums\OrderStatus;
use App\Http\Requests\OrderCreateRequest;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Validation\ValidationException;
use Illuminate\Support\Facades\Validator;

class Order extends Model
{
    protected $fillable = [
        'customer',
        'status',
        'product_id',
        'quantity',
        'final_price',
        'comment',
        'created_at',
    ];

    protected $casts = [
        'status' => OrderStatus::class,
        'final_price' => 'float',
    ];

    public static function make(OrderCreateRequest $request): Order
    {
        $product = Product::query()->find($request->get('product_id'));

        $data = $request->validated();
        if(empty($data['created_at']))
            $data['created_at'] = now();

        $final_price = $product->price * $data['quantity'];

        return new static([
            ...$data,
            'final_price' => $final_price,
            'status' => OrderStatus::NEW,
        ]);
    }

    public function validate(): static
    {
        $validator = Validator::make($this->toArray(), [
            'final_price' => ['numeric', 'min:0', 'max:999999.99'],
        ]);

        if($validator->fails())
            throw new ValidationException($validator);

        return $this;
    }

    // ---- Связи

    public function product(): BelongsTo
    {
        return $this->belongsTo(Product::class);
    }
}
