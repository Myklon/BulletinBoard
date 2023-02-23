<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Product>
 */
class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'title' => 'Заглушка ' . Str::random(3),
            'short_description' => "Фабричное краткое описание",
            'description' => fake()->text(100),
            'price' => fake()->numberBetween(10,200),
            'user_id' => fake()->numberBetween(1,2),
            'category_id' => fake()->numberBetween(1,5)
        ];
    }
}
