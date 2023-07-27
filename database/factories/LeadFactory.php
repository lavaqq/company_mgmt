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
            'status' => fake()->randomElement([
                'new',
                'waiting_for_contact',
                'contacted',
                'qualified',
                'unqualified',
            ]),
            'start_date' => fake()->dateTimeThisYear(),
            'origin' => fake()->randomElement([
                'unknown',
                'inbound',
                'outbound',
            ]),
            'note' => fake()->sentence(20) || null,
        ];
    }
}
