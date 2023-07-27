<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\CompanyAddress>
 */
class CompanyAddressFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
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
        ];
    }
}
