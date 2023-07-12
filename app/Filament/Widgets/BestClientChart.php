<?php

namespace App\Filament\Widgets;

use App\Models\Company;
use Filament\Widgets\BarChartWidget;

class BestClientChart extends BarChartWidget
{
    protected static ?string $heading = 'Top 5 clients';
    protected static ?int $sort = 3;

    protected function getData(): array
    {
        $topFiveCompanies = $this->getTopFiveCompanies();

        $data = [];
        $labels = [];

        foreach ($topFiveCompanies as $companyId => $totalAmount) {
            $company = Company::find($companyId);
            $companyName = strlen($company->name) > 15 ? substr($company->name, 0, 15) . '...' : $company->name;
            $data[] = $totalAmount;
            $labels[] = $companyName;
        }

        $dataset = [
            'label' => 'Total facturé (HT)',
            'data' => $data,
            'borderColor' => 'rgba(56, 138, 132, 0.7)',
            'backgroundColor' => 'rgba(56, 138, 132, 0.7)',
        ];

        return [
            'datasets' => [$dataset],
            'labels' => $labels,
        ];
    }

    protected function getTopFiveCompanies()
    {
        $companies = Company::all();
        $totals = [];

        foreach ($companies as $company) {
            $invoices = $company->invoices()->get();
            $sum = 0;

            foreach ($invoices as $invoice) {
                $sum += $invoice->getTotalExcludingTax();
            }

            $totals[$company->id] = $sum;
        }

        arsort($totals); // Sort totals array in descending order while maintaining key-value association
        $topFive = array_slice($totals, 0, 5, true); // Retrieve the top 5 companies

        return $topFive;
    }
}
