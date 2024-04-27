<?php

namespace Database\Factories;

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
            'category_id' => $this->faker->numberBetween(1, 3),
            'name' => $this->faker->name(),
            'description' => $this->faker->text(1000),
            'price' => $this->faker->numberBetween(100000, 300000),
            'stock' => $this->faker->randomNumber(2),
        ];
    }
}
