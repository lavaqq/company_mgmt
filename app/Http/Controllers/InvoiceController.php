<?php

namespace App\Http\Controllers;

use App\Models\Invoice;
use Barryvdh\DomPDF\Facade\Pdf;

class InvoiceController extends Controller
{
    public function show(Invoice $record)
    {
        $pdf = Pdf::loadView('pdf.invoice', ['data' => $record]);
        return $pdf->stream($record->reference . ' (' . $record->company->name . ')' . '.pdf');
    }
}
