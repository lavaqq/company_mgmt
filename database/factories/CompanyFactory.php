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
                'sa',
                'sas',
                'snc',
                'scs',
                'scop',
                'scm',
                'selarl',
                'sci',
                'eurl',
                'sasu',
                'sep',
                'selas',
                'selafa',
                'sem',
                'sca',
                'srl',
                'sarl',
                'sprl',
                'independent',
            ]),
            'vat_number' => self::generateRandomNumber(),
            'vat_country_code' => fake()->randomElement([
                'at',
                'be',
                'bg',
                'cy',
                'cz',
                'de',
                'dk',
                'ee',
                'el',
                'es',
                'fi',
                'fr',
                'hr',
                'hu',
                'ie',
                'it',
                'lt',
                'lu',
                'lv',
                'mt',
                'nl',
                'pl',
                'pt',
                'ro',
                'se',
                'si',
                'sk',
                'xi',
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
