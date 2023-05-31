<?php

namespace App\Http\Controllers;

use App\Models\Invoice;

class InvoiceController extends Controller
{
    public function show(Invoice $record)
    {
        return $record;
    }

    public function download(Invoice $record)
    {
        return $record;
    }
}
