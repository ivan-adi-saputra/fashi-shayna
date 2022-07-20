<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Transaction>
 */
class TransactionFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'uuid' => $this->faker->uuid(), 
            'name' => $this->faker->name(),
            'email' => $this->faker->freeEmail(), 
            'number' => $this->faker->phoneNumber(), 
            'address' => $this->faker->country(), 
            'transaction_total' => $this->faker->numberBetween(0, 100), 
            'transaction_status' => $this->faker->randomKey(['PENDING' => 'PENDING', 'FAILED' => 'FAILED', 'SUCCESS' => 'SUCCESS' ])
        ];
    }
}
