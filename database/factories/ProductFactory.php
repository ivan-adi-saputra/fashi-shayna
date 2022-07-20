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
    public function definition()
    {
        return [
            'name' => $this->faker->sentence(3), 
            'slug' => $this->faker->slug(), 
            'description' => collect($this->faker->paragraphs(mt_rand(5, 10)))
                            ->map(fn($p) => "<p>$p</p>")
                            ->implode(''),
            'price' => $this->faker->numberBetween(10, 100), 
            'quantity' => $this->faker->numberBetween(100, 100), 
            'category_id' => mt_rand(1, 3), 
            'user_id' => mt_rand(1, 5)
        ];
    }
}
