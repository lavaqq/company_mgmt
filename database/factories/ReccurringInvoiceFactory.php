<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\ReccurringInvoice>
 */
class ReccurringInvoiceFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title' => fake()->sentence(3),
            'frequency' => fake()->randomElement(['weekly', 'monthly', 'quarterly', 'yearly']),
            'start_date' => fake()->dateTimeThisYear(),
            'is_indefinite_duration' => fake()->randomElement([true, false]),
            'end_date' => fake()->dateTimeThisYear(),
            'tax_rate' => fake()->randomNumber(2, false),
        ];
    }
}
