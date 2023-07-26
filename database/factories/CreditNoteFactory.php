<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\CreditNote>
 */
class CreditNoteFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'reference' => 'CN-' . fake()->randomNumber(4, true),
            'tax_rate' => fake()->randomFloat(1, 0, 25),
            'issue_date' => fake()->dateTimeThisYear(),
            'status' => 'tmp', // TODO: need to replace by randomElement() with enum values
        ];
    }
}
