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

Route::middleware([Authenticate::class])->group(function () {
    Route::get('invoices/{record}/pdf', [InvoiceController::class, 'show'])->name('invoice.pdf');
    Route::get('estimates/{record}/pdf', [EstimateController::class, 'show'])->name('estimate.pdf');
});

Route::get('test', function () {
    $name = 'testfile.txt';
    $content = "test";
    $directory = sys_get_temp_dir();
    $filePath = $directory . DIRECTORY_SEPARATOR . $name;
    $fileHandle = fopen($filePath, 'w');
    if ($fileHandle !== false) {
        fwrite($fileHandle, $content);
        fclose($fileHandle);
    }
});
