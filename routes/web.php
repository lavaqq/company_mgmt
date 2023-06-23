<?php

use App\Http\Controllers\EstimateController;
use App\Http\Controllers\InvoiceController;
use Filament\Http\Middleware\Authenticate;
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

Route::name('invoice.pdf.')->group(function () {
    Route::prefix('invoices')->group(function () {
        Route::middleware([Authenticate::class])->group(function () {
            Route::get('/{record}/pdf/download', [InvoiceController::class, 'download'])->name('download');
        });
    });
});

Route::name('estimate.pdf.')->group(function () {
    Route::prefix('estimates')->group(function () {
        Route::middleware([Authenticate::class])->group(function () {
            Route::get('/{record}/pdf/download', [EstimateController::class, 'download'])->name('download');
        });
    });
});

Route::get('/test', function () {
    return 'test';
})->name('test');
