<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Company>
 */
class CompanyFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => fake()->company(),
            'street' => fake()->streetName(),
            'number' => fake()->buildingNumber(),
            'box' => fake()->randomElement(['A', null]),
            'city' => fake()->city(),
            'zipcode' => fake()->postcode(),
            'country' => fake()->randomElement([
                'germany',
                'austria',
                'belgium',
                'bulgaria',
                'cyprus',
                'croatia',
                'denmark',
                'spain',
                'estonia',
                'finland',
                'france',
                'greece',
                'hungary',
                'ireland',
                'italy',
                'latvia',
                'lithuania',
                'luxembourg',
                'malta',
                'netherlands',
                'poland',
                'portugal',
                'romania',
                'slovakia',
                'slovenia',
                'sweden',
                'czech_republic',
            ]),
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
            'vat_number' => self::generateRandomNumber(),
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
            ]),
        ];
    }

    public function generateRandomNumber($length = 10)
    {
        $min = 10 ** ($length - 1);
        $max = (10 ** $length) - 1;
        return str_pad(random_int($min, $max), $length, '0', STR_PAD_LEFT);
    }
}
