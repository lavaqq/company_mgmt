<?php

use App\Models\Company;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

Route::get('/test/company/{id}', function ($id) {
    return Company::with('contacts', 'leads', 'deals', 'estimates', 'invoices', 'receivedInvoices')->find($id);
});
