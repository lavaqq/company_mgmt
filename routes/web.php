<?php

use App\Models\Company;
use App\Models\Invoice;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EstimateController;
use App\Http\Controllers\InvoiceController;
use Filament\Http\Middleware\Authenticate;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

Route::middleware([Authenticate::class])->group(function () {
    Route::get('invoices/{record}/pdf', [InvoiceController::class, 'show'])->name('invoice.pdf');
    Route::get('estimates/{record}/pdf', [EstimateController::class, 'show'])->name('estimate.pdf');
});

Route::get('/test/company/{id}', function ($id) {
    return Company::with('contacts', 'leads', 'deals', 'estimates', 'invoices', 'receivedInvoices')->find($id);
});

Route::get('/test', function () {
    return Company::first()->invoices;
});
