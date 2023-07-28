<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Task>
 */
class TaskFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title' => fake()->sentence(5),
            'note' => fake()->sentence(10),
            'status' => fake()->randomElement([
                'done',
                'stuck',
                'working_on_it',
                'in_progress',
                null,
            ]),
        ];
    }
}
