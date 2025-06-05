<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class OrderCreateRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'customer' => ['required', 'string', 'max:255'],
            'product_id' => ['nullable', 'exists:products,id'],
            'quantity' => ['required', 'integer', 'min:1'],
            'comment' => ['nullable', 'string', 'max:65535'],
            'created_at' => ['nullable', 'date'],
        ];
    }
}
