<?php

namespace App\Http\Controllers;

use App\Models\Invoice;
use Barryvdh\DomPDF\Facade\Pdf;
use Dompdf\Dompdf;

class InvoiceController extends Controller
{
    public function show(Invoice $record)
    {
        // $html = view('pdf.invoice', ['data' => $record])->render();
        // $tmp = sys_get_temp_dir();
        // $dompdf = new Dompdf([
        //     'logOutputFile' => '',
        //     'isRemoteEnabled' => true,
        //     'fontDir' => $tmp,
        //     'fontCache' => $tmp,
        //     'tempDir' => $tmp,
        //     'chroot' => $tmp,
        // ]);
        // $dompdf->loadHtml($html);
        // $dompdf->render();
        // $dompdf->stream($record->reference . ' (' . $record->company->name . ').pdf', [
        //     'compress' => true,
        //     'Attachment' => false,
        // ]);

        $pdf = Pdf::loadView('pdf.invoice', ['data' => $record]);
        $pdf->setOption([
            'logOutputFile' => '',
            'isRemoteEnabled' => true,
            'fontDir' => sys_get_temp_dir(),
            'fontCache' => sys_get_temp_dir(),
            'tempDir' => sys_get_temp_dir(),
            'chroot' => sys_get_temp_dir(),
        ]);
        return $pdf->stream('invoice.pdf');
    }
}
