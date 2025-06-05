<?php

namespace Database\Factories;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Carbon;

class ProductFactory extends Factory
{
    protected $model = Product::class;

    public function definition(): array
    {
        return [
            'name' => $this->faker->text(30),

            'description' => $this->faker->boolean()?$this->faker->text():null,
            'price' => $this->faker->randomFloat(2, 100, 100000),

            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),

            'category_id' => Category::all()->random()->id,
        ];
    }
}
