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
        if ($record->is_external) {
            return Response::file(public_path(Storage::url($record->external_file)));
        }

        $pdf = Pdf::loadView('pdf.invoice', ['data' => $record]);
        return $pdf->stream($record->reference . ' (' . $record->company->name . ')' . '.pdf');
    }
}
