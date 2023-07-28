<?php

use App\Http\Controllers\CompanyController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\CreditNoteController;
use App\Http\Controllers\DealController;
use App\Http\Controllers\EstimateController;
use App\Http\Controllers\InvoiceController;
use App\Http\Controllers\LeadController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\ReceivedInvoiceController;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\UserController;
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
    Route::resource('company', CompanyController::class)->only(['index', 'show']);
    Route::resource('contact', ContactController::class)->only(['index', 'show']);
    Route::resource('credit-note', CreditNoteController::class)->only(['index', 'show']);
    Route::resource('estimate', EstimateController::class)->only(['index', 'show']);
    Route::resource('invoice', InvoiceController::class)->only(['index', 'show']);
    Route::resource('lead', LeadController::class)->only(['index', 'show']);
    Route::resource('deal', DealController::class)->only(['index', 'show']);
    Route::resource('received-invoice', ReceivedInvoiceController::class)->only(['index', 'show']);
    Route::resource('project', ProjectController::class)->only(['index', 'show']);
    Route::resource('task', TaskController::class)->only(['index', 'show']);
    Route::resource('user', UserController::class)->only(['index', 'show']);
});
