<?php

namespace App\Filament\Widgets;

use Filament\Widgets\BarChartWidget;
use App\Models\Invoice;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class VATByQuarterChart extends BarChartWidget
{
    protected static ?string $heading = 'TVA par trimestre ';
    protected static ?int $sort = 2;

    protected function getData(): array
    {
        $currentYear = Carbon::now()->year;

        $data = $this->calculateTaxDataByQuarter($currentYear);

        $labels = ['Q1', 'Q2', 'Q3', 'Q4'];

        $dataset = [
            'label' => 'TVA ' . $currentYear,
            'data' => $data,
            'borderColor' => 'rgba(56, 138, 132, 0.7)',
            'backgroundColor' => 'rgba(56, 138, 132, 0.7)',
        ];

        return [
            'datasets' => [$dataset],
            'labels' => $labels,
        ];
    }

    protected function calculateTaxDataByQuarter($year): array
    {
        $quarters = [
            ['01', '02', '03'],
            ['04', '05', '06'],
            ['07', '08', '09'],
            ['10', '11', '12'],
        ];

        $data = [];
        foreach ($quarters as $quarter) {
            $quarterMonths = $quarter;

            $invoices = Invoice::whereYear('issue_date', $year)
                ->where(function ($query) use ($quarterMonths) {
                    foreach ($quarterMonths as $month) {
                        $query->orWhereMonth('issue_date', $month);
                    }
                })
                ->whereNotIn('status', ['cancelled', 'creation'])
                ->get();

            $taxTotal = $invoices->sum(function ($invoice) {
                return $invoice->getTax();
            });

            $data[] = $taxTotal;
        }

        return $data;
    }
}
