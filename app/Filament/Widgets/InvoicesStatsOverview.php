<?php

namespace App\Filament\Widgets;

use App\Models\Invoice;
use Carbon\Carbon;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Card;

class InvoicesStatsOverview extends BaseWidget
{

    public static function getTotalInvoiced(): float
    {
        return Invoice::all()->sum(fn (Invoice $invoice) => $invoice->getTotalExclTax());
    }
    public static function getCurrentQuarter(): object
    {
        $quarterStart = Carbon::now()->startOfQuarter();
        $quarterEnd = Carbon::now()->endOfQuarter();
        return (object) [
            'start' => $quarterStart,
            'end' => $quarterEnd,
        ];
    }
    public static function getCurrentQuarterTotalInvoiced(): float
    {
        return Invoice::whereBetween('issue_date', [self::getCurrentQuarter()->start, self::getCurrentQuarter()->end])->get()->sum(fn (Invoice $invoice) => $invoice->getTotalExclTax());
    }

    public static function getGoalPercentage(): float
    {
        $goal = 53732; // maybe config table with filament page
        $total = self::getTotalInvoiced();
        $percentage = ($total / $goal) * 100;
        $roundedPercentage = round($percentage, 2);
        return $roundedPercentage;
    }

    protected function getCards(): array
    {
        return [
            Card::make('Total facturé (HT) 2023', self::getTotalInvoiced() . ' €')
                ->description(self::getGoalPercentage() . " % de l'objectif")
                ->color('success'),
            Card::make(
                'Total facturé (HT) ' .
                    self::getCurrentQuarter()->start->format('m/Y') .
                    ' au ' .
                    self::getCurrentQuarter()->end->format('m/Y'),
                self::getCurrentQuarterTotalInvoiced() . ' €'
            ),
        ];
    }
}
