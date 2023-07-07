<?php

use App\Models\Company;
use App\Models\Invoice;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

Route::get('/test/company/{id}', function ($id) {
    return Company::with('contacts', 'leads', 'deals', 'estimates', 'invoices', 'receivedInvoices')->find($id);
});

Route::get('/test', function () {
    return Invoice::first()->deal->lead->company;
});
