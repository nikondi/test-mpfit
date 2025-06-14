<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Category extends Model
{
    public $timestamps = false;

    protected $fillable = [
        'name',
    ];

    // ---- Связи

    public function products(): HasMany
    {
        return $this->hasMany(Product::class, 'category_id');
    }
}
