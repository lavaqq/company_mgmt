<?php

namespace App\Http\Controllers;

use App\Models\Invoice;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Storage;

class InvoiceController extends Controller
{
    public function show(Invoice $record)
    {
        if ($record->external_invoice) {
            return Response::file(public_path(Storage::url($record->external_invoice)));
        }

        $pdf = Pdf::loadView('pdf.invoice', ['data' => $record]);

        return $pdf->stream($record->reference.' ('.$record->deal->lead->company->name.')'.'.pdf');
    }
}
