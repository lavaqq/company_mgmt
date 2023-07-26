<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\CompanyInformation>
 */
class CompanyInformationFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'legal_form' => 'SRL', // TODO: need to replace by randomElement() with enum values
            'vat_number' => fake()->randomNumber(10, true),
            'vat_country_code' => fake()->countryCode(), // TODO: need to replace by randomElement() with enum values
        ];
    }
}
