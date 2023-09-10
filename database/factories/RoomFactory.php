<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Room>
 */
class RoomFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'room_number' => fake()->unique()->numberBetween(1, 400),
            'room_type' => fake()->randomElement(['standard', 'double', 'queen', 'king']),
            'description' => fake()->paragraph(1),
            'price_per_night' => fake()->numberBetween(100, 500),
            'capacity' => fake()->numberBetween(1, 4),
            'availability' => fake()->randomElement(['AVAILABLE', 'RESERVED']),
        ];
    }
}