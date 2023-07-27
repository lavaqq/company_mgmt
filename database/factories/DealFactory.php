<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Deal>
 */
class DealFactory extends Factory
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
            'status' => fake()->randomElement([
                'new',
                'discovery',
                'proposal',
                'negotiation',
                'won',
                'lost',
            ]),
            'deal_value' => fake()->numberBetween(100, 8000),
            'actual_deal_value' => fake()->numberBetween(100, 8000),
            'start_date' => fake()->dateTimeThisYear(),
            'signature_date' => fake()->dateTimeThisYear(),
            'note' => fake()->sentence(20) || null,
        ];
    }
}
