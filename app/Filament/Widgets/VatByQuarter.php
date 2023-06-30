<?php

namespace App\Filament\Widgets;

use Filament\Widgets\BarChartWidget;
use App\Models\Invoice;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class VatByQuarter extends BarChartWidget
{
    protected static ?string $heading = 'Chart';

    function getTaxDataByQuarter(): array
    {
        $currentYear = Carbon::now()->year;
        $quarters = [
            ['01', '02', '03'],
            ['04', '05', '06'],
            ['07', '08', '09'],
            ['10', '11', '12'],
        ];

        $data = [];
        foreach ($quarters as $quarter) {
            $quarterMonths = $quarter;

            $invoices = Invoice::whereYear('issue_date', $currentYear)
                ->where(function ($query) use ($quarterMonths) {
                    foreach ($quarterMonths as $month) {
                        $query->orWhereMonth('issue_date', $month);
                    }
                })
                ->whereNotIn('status', ['cancelled', 'creation'])
                ->get();

            $taxTotal = 0;
            foreach ($invoices as $invoice) {
                $taxTotal += $invoice->getTax();
            }

            $data['datasets'][0]['data'][] = $taxTotal;
        }

        $data['labels'] = ['Q1', 'Q2', 'Q3', 'Q4'];
        $data['datasets'][0] = [
            'label' => 'VAT',
            'data' => $data['datasets'][0]['data'],
            'borderColor' => 'rgba(56, 138, 132, 0.7)',
            'backgroundColor' => 'rgba(56, 138, 132, 0.7)',
        ];

        return $data;
    }

    protected function getData(): array
    {
        return self::getTaxDataByQuarter();
    }
}
