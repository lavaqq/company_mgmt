<?php

namespace App\Http\Controllers;

use App\Models\Invoice;
use Dompdf\Dompdf;
use Dompdf\Options;

class InvoiceController extends Controller
{
    public function show(Invoice $record)
    {
        return;
    }
}
