<?php

namespace Database\Seeders;

use App\Models\Estimate;
use App\Models\EstimateItem;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class EstimateSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Estimate::create([
            'company_id' => 22,
            'reference' => 'D-0021',
            'tax_rate' => 21,
            'issue_date' => '2023-06-02',
            'deadline' => '2 jours',
            'no_prepayment' => true,
        ]);

        EstimateItem::create([
            'estimate_id' => 1,
            'description' => 'Suppression du malware dans le wordpress',
            'amount' => 180,
        ]);
    }
}
