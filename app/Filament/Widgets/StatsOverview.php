<?php

namespace App\Filament\Widgets;

use App\Models\Invoice;
use App\Models\ReceivedInvoice;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Card;
use Carbon\Carbon;

class StatsOverview extends BaseWidget
{
    protected static ?int $sort = 1;

    public ?int $goal = 50000;

    public static function getCurrentYearTotalExclVat(): string
    {
        return Invoice::whereNotIn('status', ['cancelled', 'creation'])
            ->whereYear('issue_date', Carbon::now()->year)
            ->get()
            ->sum(function ($invoice) {
                return $invoice->getTotalExcludingTax();
            });
    }

    public static function getCurrentQuarterTax(): string
    {
        $startOfQuarter = Carbon::now()->startOfQuarter();
        $endOfQuarter = Carbon::now()->endOfQuarter();

        return Invoice::whereNotIn('status', ['cancelled', 'creation'])
            ->whereBetween('issue_date', [$startOfQuarter, $endOfQuarter])
            ->get()
            ->sum(function ($invoice) {
                return $invoice->getTax();
            });
    }

    public static function getCurrentYearTax(): string
    {
        $issuedTaxTotal = Invoice::whereNotIn('status', ['cancelled', 'creation'])
            ->whereYear('issue_date', Carbon::now()->year)
            ->get()
            ->sum(function ($invoice) {
                return $invoice->getTax();
            });

        $receivedTaxTotal = ReceivedInvoice::whereYear('issue_date', Carbon::now()->year)
            ->get()
            ->sum('tax');

        $totalTax = $issuedTaxTotal - $receivedTaxTotal;

        return $totalTax;
    }


    public static function getCurrentMonthTotalExclVat(): string
    {
        $startOfMonth = Carbon::now()->startOfMonth();
        $endOfMonth = Carbon::now()->endOfMonth();

        $issuedTotal = Invoice::whereNotIn('status', ['cancelled', 'creation'])
            ->whereBetween('issue_date', [$startOfMonth, $endOfMonth])
            ->get()
            ->sum(function ($invoice) {
                return $invoice->getTotalExcludingTax();
            });

        $receivedTotal = ReceivedInvoice::whereBetween('issue_date', [$startOfMonth, $endOfMonth])
            ->get()
            ->sum('total');

        $totalExclVat = $issuedTotal - $receivedTotal;

        return $totalExclVat;
    }


    protected function getCards(): array
    {
        $yearPercentage = ($this->getCurrentYearTotalExclVat() / $this->goal) * 100;
        $monthPercentage = ($this->getCurrentMonthTotalExclVat() / $this->goal) * 100;

        return [
            Card::make('Total facturé (HT) ' . Carbon::now()->year, self::getCurrentYearTotalExclVat() . ' €')
                ->description(number_format($yearPercentage, 2) . '% de ' . $this->goal . ' €'),
            Card::make('Total facturé (HT) ce mois', self::getCurrentMonthTotalExclVat() . ' €')
                ->description(number_format($monthPercentage, 2) . '% de ' . $this->goal . ' €'),
            Card::make('TVA ' . Carbon::now()->year, self::getCurrentYearTax() . ' €'),
            Card::make('TVA ce trimestre', self::getCurrentQuarterTax() . ' €'),
        ];
    }
}
