<?php

namespace Database\Factories;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProductFactory extends Factory
{
    protected $model = Product::class;

    public function definition(): array
    {
        return [
            'name' => $this->faker->words(3, true),
            'price' => $this->faker->randomFloat(2, 10, 5000),
            'category_id' => Category::inRandomOrder()->value('id') ?? 1,
            'in_stock' => $this->faker->boolean(80),
            'rating' => $this->faker->randomFloat(1, 0, 5),
        ];
    }
}
