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
            'legal_form' => fake()->randomElement([
                'SA',
                'SAS',
                'SNC',
                'SCS',
                'SCOP',
                'SCM',
                'SELARL',
                'SCI',
                'EURL',
                'SASU',
                'SEP',
                'SELAS',
                'SELAFA',
                'SEM',
                'SCA',
                'SRL',
                'SARL',
                'SPRL',
                'INDEPENDENT',
            ]),
            'vat_number' => fake()->randomNumber(10, true),
            'vat_country_code' => fake()->randomElement([
                'AT',
                'BE',
                'BG',
                'CY',
                'CZ',
                'DE',
                'DK',
                'EE',
                'EL',
                'ES',
                'FI',
                'FR',
                'HR',
                'HU',
                'IE',
                'IT',
                'LT',
                'LU',
                'LV',
                'MT',
                'NL',
                'PL',
                'PT',
                'RO',
                'SE',
                'SI',
                'SK',
                'XI',
            ])
        ];
    }
}
