<?php

namespace App\Filament\Widgets;

use App\Models\Invoice;
use Carbon\Carbon;
use Filament\Widgets\BarChartWidget;

class InvoicedByMonthExclVAT extends BarChartWidget
{
    protected static ?string $heading = 'Total facturé (HT) par mois';

    protected static ?int $sort = 2;

    public ?string $filter;

    public function __construct()
    {
        $filters = $this->createFilters();
        $this->filter = isset($filters[date('y')]) ? $filters[date('y')] : reset($filters);
    }

    protected function getFilters(): ?array
    {
        return self::createFilters();
    }

    protected function createFilters(): array
    {
        $invoices = Invoice::all()->whereNotIn('status', ['cancelled', 'creation']);
        $years = $invoices->pluck('issue_date')->map(function ($date) {
            return date('Y', strtotime($date));
        })->unique()->toArray();

        $filteredYears = [];
        foreach ($years as $year) {
            $filteredYears[$year] = $year;
        }

        return $filteredYears;
    }

    protected function getData(): array
    {
        $activeFilter = $this->filter;

        $data = $this->calculateTotalExcludingTaxByMonth($activeFilter);

        $labels = [
            'Jan', 'Fév', 'Mar', 'Avr', 'Mai', 'Juin',
            'Juil', 'Août', 'Sep', 'Oct', 'Nov', 'Déc'
        ];

        $dataset = [
            'label' => 'Total facturé (HT) ' . $activeFilter,
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
