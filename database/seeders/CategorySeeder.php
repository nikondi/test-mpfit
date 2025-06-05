<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    protected array $categories = ['легкий', 'хрупкий', 'тяжелый'];

    public function run(): void
    {
        // Подобный импорт лучше джобой делать, но в данном случае и так пойдет
        $exists = Category::query()->whereIn('name', $this->categories)->pluck('name');
        collect($this->categories)->diff($exists)->each(function ($category) {
            Category::query()->create([
                'name' => $category,
            ]);
        });
    }
}
