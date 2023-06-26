<?php

namespace App\Http\Controllers;

use App\Models\Invoice;
use Barryvdh\DomPDF\Facade\Pdf;

class InvoiceController extends Controller
{
    public function show(Invoice $record)
    {
        $pdf = Pdf::loadView('pdf.invoice', ['data' => $record]);
        $pdf->setOption([
            'isRemoteEnabled' => true,
            'fontDir' => sys_get_temp_dir(),
            'fontCache' => sys_get_temp_dir(),
            'tempDir' => sys_get_temp_dir(),
        ]);
        return $pdf->stream('invoice.pdf');
    }
}
