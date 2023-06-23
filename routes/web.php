<?php

use App\Http\Controllers\EstimateController;
use App\Http\Controllers\InvoiceController;
use Filament\Http\Middleware\Authenticate;
use Illuminate\Support\Facades\Route;

require('../fpdf.php');

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

Route::middleware([Authenticate::class])->group(function () {
    Route::get('invoices/{record}/pdf', [InvoiceController::class, 'show'])->name('invoice.pdf');
    Route::get('estimates/{record}/pdf', [EstimateController::class, 'show'])->name('estimate.pdf');
});

Route::get('/test', function () {
    $pdf = new FPDF();
    $pdf->AddPage();
    $pdf->SetFont('Arial', 'B', 16);
    $pdf->Cell(40, 10, 'Hello World !');
    $pdf->Output();
});
