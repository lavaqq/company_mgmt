<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\CompanyAdress>
 */
class CompanyAdressFactory extends Factory
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
            'country' => fake()->country(), // TODO: need to replace by randomElement() with enum values
        ];
    }
}
