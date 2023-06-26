<?php

namespace App\Http\Controllers;

use App\Models\Invoice;
use Barryvdh\DomPDF\Facade\Pdf;

class InvoiceController extends Controller
{
    public function show(Invoice $record)
    {
        $tmp = sys_get_temp_dir();
        $html = view('pdf.invoice', ['data' => $record])->render();
        $pdf = Pdf::setOption([
            'logOutputFile' => '',
            'isRemoteEnabled' => true,
            'fontDir' => $tmp,
            'fontCache' => $tmp,
            'tempDir' => $tmp,
            'chroot' => $tmp,
        ])->loadHTML($html);
        return $pdf->stream($record->reference . ' (' . $record->company->name . ').pdf');
    }
}
