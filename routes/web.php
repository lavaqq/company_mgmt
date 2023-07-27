<?php

use App\Http\Controllers\TestingCompanyController;
use App\Models\Company;
use App\Models\Contact;
use App\Models\CreditNote;
use App\Models\Deal;
use App\Models\Estimate;
use App\Models\Invoice;
use App\Models\Lead;
use App\Models\Project;
use App\Models\ReceivedInvoice;
use App\Models\Task;
use App\Models\User;
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
    // Contact
    Route::get('/contact', function () {
        return Contact::with([
            'companies',
        ])->get();
    });
    Route::get('/contact/{id}', function (string $id) {
        return Contact::with([
            'companies',
        ])->find($id);
    });
    // Credit note
    Route::get('/credit-note', function () {
        return CreditNote::with([
            'invoice',
            'items',
            'discounts',
        ])->get();
    });
    Route::get('/credit-note/{id}', function (string $id) {
        return CreditNote::with([
            'invoice',
            'items',
            'discounts',
        ])->find($id);
    });
    // Estimate
    Route::get('/estimate', function () {
        return Estimate::with([
            'company',
            'items',
            'discounts',
        ])->get();
    });
    Route::get('/estimate/{id}', function (string $id) {
        return Estimate::with([
            'company',
            'items',
            'discounts',
        ])->find($id);
    });
    // Invoice
    Route::get('/invoice', function () {
        return Invoice::with([
            'company',
            'items',
            'discounts',
            'creditNote'
        ])->get();
    });
    Route::get('/invoice/{id}', function (string $id) {
        return Invoice::with([
            'company',
            'items',
            'discounts',
            'creditNote'
        ])->find($id);
    });
    // Lead
    Route::get('/lead', function () {
        return Lead::with([
            'company',
            'deals',
        ])->get();
    });
    Route::get('/lead/{id}', function (string $id) {
        return Lead::with([
            'company',
            'deals',
        ])->find($id);
    });
    // Deal
    Route::get('/deal', function () {
        return Deal::with([
            'lead'
        ])->get();
    });
    Route::get('/deal/{id}', function (string $id) {
        return Deal::with([
            'lead'
        ])->find($id);
    });
    // Received invoice
    Route::get('/received-invoice', function () {
        return ReceivedInvoice::with([
            'company'
        ])->get();
    });
    Route::get('/received-invoice/{id}', function (string $id) {
        return ReceivedInvoice::with([
            'company'
        ])->find($id);
    });
    // Project
    Route::get('/project', function () {
        return Project::with([
            'tasks'
        ])->get();
    });
    Route::get('/project/{id}', function (string $id) {
        return Project::with([
            'tasks'
        ])->find($id);
    });
    // Task
    Route::get('/task', function () {
        return Task::with([
            'users',
            'attachments',
            'project',
        ])->get();
    });
    Route::get('/task/{id}', function (string $id) {
        return Task::with([
            'users',
            'attachments',
            'project',
        ])->find($id);
    });
    // User
    Route::get('/user', function () {
        return User::with([
            'tasks'
        ])->get();
    });
    Route::get('/user/{id}', function (string $id) {
        return User::with([
            'tasks'
        ])->find($id);
    });
});
