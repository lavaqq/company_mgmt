<?php

namespace Database\Factories;

use App\Models\Company;
use App\Models\Invoice;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Invoice>
 */
class InvoiceFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'invoice_number' => Invoice::genInvoiceNum(),
            'vcs' => Invoice::genVCS(),
            'issue_date' => fake()->dateTimeThisYear(),
            'due_date' => fake()->dateTimeThisYear(),
            'tax_rate' => fake()->randomNumber(2, false),
        ];
    }
}
