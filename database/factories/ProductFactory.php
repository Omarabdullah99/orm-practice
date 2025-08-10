<?php

namespace Database\Factories;

use App\Models\Category;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

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
    public function definition(): array
    {
        return [
            'user_id'=>User::inRandomOrder()->first()->id,
            'category_id'=>Category::inRandomOrder()->first()->id,
            'title'=> substr(fake()->word(), 0,7),
            'description'=>fake()->paragraph(),
            'price'=>fake()->numberBetween(100,5000)
        ];
    }
}
