<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Company;
use App\Models\CompanyAddress;
use App\Models\CompanyInformation;
use App\Models\CreditNote;
use App\Models\Deal;
use App\Models\Estimate;
use App\Models\Invoice;
use App\Models\Lead;
use Illuminate\Database\Eloquent\Factories\Sequence;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        Company::factory()
            ->count(20)
            ->hasAddress()
            ->hasInformation()
            ->hasContacts(5)
            ->has(
                Estimate::factory()
                    ->hasItems(3)
                    ->hasDiscounts(1)
                    ->count(3)
            )
            ->hasReceivedInvoices(5)
            ->create();

        Invoice::factory()
            ->hasItems(3)
            ->hasDiscounts(1)
            ->count(100)
            ->state(new Sequence(
                fn (Sequence $sequence) => ['company_id' => Company::all()->random()],
            ))
            ->has(
                CreditNote::factory()
                    ->state(new Sequence(
                        fn (Sequence $sequence) => ['company_id' => Company::all()->random()],
                    ))
                    ->hasItems(3)
                    ->hasDiscounts(1)
                    ->count(1)
            )
            ->create();

        Lead::factory()
            ->count(100)
            ->state(new Sequence(
                fn (Sequence $sequence) => ['company_id' => Company::all()->random()],
            ))
            ->has(
                Deal::factory()
                    ->state(new Sequence(
                        fn (Sequence $sequence) => ['company_id' => Company::all()->random()],
                    ))
                    ->count(2)
            )
            ->create();
    }
}
