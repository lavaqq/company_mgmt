<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            CompanySeeder::class,
            ContactSeeder::class,
            LeadSeeder::class,
            DealSeeder::class,
            InvoiceSeeder::class,
            EstimateSeeder::class,
            ReceivedInvoiceSeeder::class,
        ]);
    }
}
