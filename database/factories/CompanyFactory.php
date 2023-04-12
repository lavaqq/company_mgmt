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
            ]),
            'vat_number' => 'BE' . fake()->randomNumber(5, true),
            'street' => fake()->streetName(),
            'number' => fake()->buildingNumber(),
            'box' => fake()->randomElement([null, 'A', 'B']),
            'city' => fake()->city(),
            'zipcode' => fake()->postcode(),
            'country' => fake()->randomElement([
                'Allemagne',
                'Autriche',
                'Belgique',
                'Bulgarie',
                'Chypre',
                'Croatie',
                'Danemark',
                'Espagne',
                'Estonie',
                'Finlande',
                'France',
                'Grèce',
                'Hongrie',
                'Irlande',
                'Italie',
                'Lettonie',
                'Lituanie',
                'Luxembourg',
                'Malte',
                'Pays-Bas',
                'Pologne',
                'Portugal',
                'Roumanie',
                'Slovaquie',
                'Slovénie',
                'Suède',
                'Tchéquie',
            ])
        ];
    }
}
