<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\ReceivedInvoice>
 */
class ReceivedInvoiceFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'issue_date' => fake()->dateTimeThisYear(),
            'total_excl_vat' => fake()->numberBetween(100, 1000),
            'tax' => fake()->randomFloat(1, 0, 25),
            'attachment_path' => 'tmp.txt',
            'in_accounting_software' => fake()->boolean(),
        ];
    }
}
