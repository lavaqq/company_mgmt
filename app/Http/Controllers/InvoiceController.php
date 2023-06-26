<?php

namespace App\Http\Controllers;

use App\Models\Invoice;
use Barryvdh\DomPDF\Facade\Pdf;
use Dompdf\Dompdf;

class InvoiceController extends Controller
{
    public function show(Invoice $record)
    {
        $html = view('pdf.invoice', ['data' => $record]);
        $dompdf = new Dompdf();
        $dompdf->loadHtml($html);
        $dompdf->setPaper('A4', 'landscape');
        $dompdf->render();
        $dompdf->stream();
    }
}
