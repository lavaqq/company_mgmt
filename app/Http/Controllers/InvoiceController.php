<?php

namespace App\Http\Controllers;

use App\Models\Invoice;
use Dompdf\Dompdf;

class InvoiceController extends Controller
{
    public function show(Invoice $record)
    {
        $html = view('pdf.invoice', ['data' => $record]);
        $dompdf = new Dompdf();
        $dompdf->loadHtml($html);
        $dompdf->render();
        $dompdf->stream();
    }
}
