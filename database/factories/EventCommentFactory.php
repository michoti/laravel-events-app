<?php

namespace Database\Factories;

use App\Models\Event;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Arr;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\EventComment>
 */
class EventCommentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'event_id' => (Event::inRandomOrder()->first())->id,
            'name' => fake()->name(),
            'email' => fake()->email(),
            'status' => Arr::random([1,0]),
            'message' => fake()->text(20),
        ];
    }
}
