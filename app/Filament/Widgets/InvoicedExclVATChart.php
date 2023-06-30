<?php

namespace App\Filament\Widgets;

use App\Models\Invoice;
use Carbon\Carbon;
use Filament\Widgets\BarChartWidget;

class InvoicedExclVATChart extends BarChartWidget
{
    protected static ?string $heading = 'Total facturé (HT) par mois';
    protected static ?int $sort = 2;

    protected function getData(): array
    {
        $currentYear = Carbon::now()->year;

        $data = $this->calculateTotalExcludingTaxByMonth($currentYear);

        $labels = [
            'Jan', 'Fév', 'Mar', 'Avr', 'Mai', 'Juin',
            'Juil', 'Août', 'Sep', 'Oct', 'Nov', 'Déc'
        ];

        $dataset = [
            'label' => 'Total facturé (HT) ' . $currentYear,
            'data' => $data,
            'borderColor' => 'rgba(56, 138, 132, 0.7)',
            'backgroundColor' => 'rgba(56, 138, 132, 0.7)',
        ];

        return [
            'datasets' => [$dataset],
            'labels' => $labels,
        ];
    }

    protected function calculateTotalExcludingTaxByMonth($year): array
    {
        $data = [];
        for ($month = 1; $month <= 12; $month++) {
            $invoices = Invoice::whereYear('issue_date', $year)
                ->whereMonth('issue_date', $month)
                ->whereNotIn('status', ['cancelled', 'creation'])
                ->get();

            $totalExcludingTax = $invoices->sum(function ($invoice) {
                return $invoice->getTotalExcludingTax();
            });

            $data[] = $totalExcludingTax;
        }

        return $data;
    }
}
