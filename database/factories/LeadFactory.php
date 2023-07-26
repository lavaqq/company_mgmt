<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Lead>
 */
class LeadFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title' => fake()->sentence(6),
            'status' => 'tmp', // TODO: need to replace by randomElement() with enum values
            'start_date' => fake()->dateTimeThisYear(),
            'origin' => 'tmp', // TODO: need to replace by randomElement() with enum values
            'note' => fake()->sentence(20) || null,
        ];
    }
}
