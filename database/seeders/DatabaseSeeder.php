<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use Database\Seeders\secret\CompanySeeder;
use Database\Seeders\secret\EstimateSeeder;
use Database\Seeders\secret\InvoiceSeeder;
use Database\Seeders\secret\UserSeeder;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            UserSeeder::class,
            CompanySeeder::class,
            InvoiceSeeder::class,
            EstimateSeeder::class,
        ]);
    }
}
