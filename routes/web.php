<?php

use App\Http\Controllers\TestingCompanyController;
use App\Models\Company;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::prefix('test')->group(function () {
    // Company
    Route::get('/company', function () {
        return Company::with([
            'address',
            'information',
            'contacts',
            'leads',
            'deals',
            'estimates',
            'invoices',
            'creditNotes',
            'receivedInvoices',
        ])->get();
    });
    Route::get('/company/{id}', function (string $id) {
        return Company::with([
            'address',
            'information',
            'contacts',
            'leads',
            'deals',
            'estimates',
            'invoices',
            'creditNotes',
            'receivedInvoices',
        ])->find($id);
    });
});
