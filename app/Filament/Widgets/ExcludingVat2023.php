<?php

namespace App\Filament\Widgets;

use App\Models\Invoice;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Card;

class ExcludingVat2023 extends BaseWidget
{

    public static function getTotalExclVat(): string
    {
        $total = Invoice::whereNotIn('status', ['cancelled', 'creation'])
            ->get()
            ->sum(function ($invoice) {
                return $invoice->getTotalExcludingTax();
            });
        return $total;
    }

    protected function getCards(): array
    {
        return [
            Card::make('TOTAL HTVA 2023', self::getTotalExclVat() . '€'),
        ];
    }
}
