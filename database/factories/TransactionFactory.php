<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Arr;

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
    public function definition(): array
    {
        return [
            'status' => Arr::random(['COMPLETED', 'PENDING', 'DELETED']),
            'user_id' => (User::inRandomOrder()->first())->id,
            'reference_id' => fake()->numberBetween(999,10000),
            'tran_id' => fake()->numberBetween(99,1000),
            'amount' => fake()->numberBetween(500,3000),
            'paid_through' => fake()->text(),
            'event_name' => fake()->text(),
        ];
    }
}
