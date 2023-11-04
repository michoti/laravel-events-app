<?php

namespace Database\Factories;

use App\Models\Category;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Event>
 */
class EventFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'image' => fake()->imageUrl(),
            'public_id' => fake()->randomDigit(),
            'name' => fake()->name(),
            'venue' => fake()->address(),
            'description' => fake()->paragraph(2),
            'actors' => fake()->name(),
            'time' => fake()->time('H:i'),
            'date' => fake()->date(),
            'age' => fake()->randomNumber(2),
            'dresscode' => fake()->text(7),
            'status' => fake()->randomDigit(),
            'quantity' => fake()->randomNumber(2),
            'category_id' => (Category::inRandomOrder()->first())->id,
        ];
    }
}
