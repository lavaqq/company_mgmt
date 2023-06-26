<?php

namespace App\Http\Controllers;

use App\Models\Invoice;
use Barryvdh\DomPDF\Facade\Pdf;

class InvoiceController extends Controller
{
    public function show(Invoice $record)
    {
        $html = view('pdf.invoice', ['data' => $record])->render();
        $pdf = Pdf::loadHTML($html);
        return $pdf->stream();
    }
}
