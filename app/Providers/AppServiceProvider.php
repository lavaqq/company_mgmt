<?php

namespace App\Providers;

use App\Models\Adress;
use App\Models\Company;
use App\Models\Invoice;
use App\Models\InvoiceDiscount;
use App\Models\InvoiceItem;
use App\Models\Person;
use App\Models\ReccuringInvoice;
use App\Models\ReccuringInvoiceItem;
use App\Models\Transaction;
use App\Observers\PersonObserver;
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
        Adress::observe(AdressObserver::class);
        Company::observe(CompanyObserver::class);
        InvoiceDiscount::observe(InvoiceDiscountObserver::class);
        InvoiceItem::observe(InvoiceItemObserver::class);
        Invoice::observe(InvoiceObserver::class);
        ReccuringInvoiceItem::observe(ReccuringInvoiceItemObserver::class);
        ReccuringInvoice::observe(ReccuringInvoiceObserver::class);
        Transaction::observe(TransactionObserver::class);
    }
}
