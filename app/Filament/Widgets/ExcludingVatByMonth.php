<?php

namespace App\Filament\Widgets;

use App\Models\Invoice;
use Carbon\Carbon;
use Filament\Widgets\BarChartWidget;

class ExcludingVatByMonth extends BarChartWidget
{
    protected static ?string $heading = 'Chart';

    function getTotalExcludingTaxByMonth(): array
    {
        $currentYear = Carbon::now()->year;

        $data = [];
        for ($month = 1; $month <= 12; $month++) {
            $invoices = Invoice::whereYear('issue_date', $currentYear)
                ->whereMonth('issue_date', $month)
                ->whereNotIn('status', ['cancelled', 'creation'])
                ->get();

            $totalExcludingTax = 0;
            foreach ($invoices as $invoice) {
                $totalExcludingTax += $invoice->getTotalExcludingTax();
            }

            $data['datasets'][0]['data'][] = $totalExcludingTax;
        }

        $data['labels'] = [
            'Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun',
            'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'
        ];
        $data['datasets'][0] = [
            'label' => 'Total Excluding Tax',
            'data' => $data['datasets'][0]['data'],
            'borderColor' => 'rgba(56, 138, 132, 0.7)',
            'backgroundColor' => 'rgba(56, 138, 132, 0.7)',
        ];

        return $data;
    }

    protected function getData(): array
    {
        return self::getTotalExcludingTaxByMonth();
    }
}
