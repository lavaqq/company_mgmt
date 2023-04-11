<?php

namespace App\Providers;

use App\Models\Adress;
use App\Models\Company;
use App\Models\Invoice;
use App\Models\InvoiceDiscount;
use App\Models\InvoiceItem;
use App\Models\ReccurringInvoice;
use App\Models\ReccurringInvoiceItem;
use App\Models\Transaction;
use App\Observers\AdressObserver;
use App\Observers\CompanyObserver;
use App\Observers\InvoiceDiscountObserver;
use App\Observers\InvoiceItemObserver;
use App\Observers\InvoiceObserver;
use App\Observers\ReccurringInvoiceObserver;
use App\Observers\TransactionObserver;
use Illuminate\Support\ServiceProvider;
use Filament\Facades\Filament;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Filament::serving(function () {
            Filament::registerViteTheme('resources/css/filament.css');
        });
        Filament::registerNavigationGroups([
            'Répertoire',
            'Comptabilité',
            'Administration',
        ]);
        Company::observe(CompanyObserver::class);
        Invoice::observe(InvoiceObserver::class);
        ReccurringInvoice::observe(ReccurringInvoiceObserver::class);
    }
}
