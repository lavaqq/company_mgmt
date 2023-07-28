<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Invoice>
 */
class InvoiceFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'reference' => 'IN-'.fake()->randomNumber(4, true),
            'vcs' => null,
            'tax_rate' => fake()->randomFloat(1, 0, 25),
            'issue_date' => fake()->dateTimeThisYear(),
            'due_date' => fake()->dateTimeThisYear(),
            'status' => fake()->randomElement([
                'creation',
                'sended',
                'paid',
                'cancelled',
            ]),
            'in_accounting_software' => fake()->boolean(),
        ];
    }
}
