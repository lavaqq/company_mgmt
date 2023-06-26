<?php

namespace App\Http\Controllers;

use App\Models\Invoice;
use Dompdf\Dompdf;

class InvoiceController extends Controller
{
    public function sshow(Invoice $record)
    {
        $html = view('pdf.invoice', ['data' => $record]);
        $dompdf = new Dompdf();
        $dompdf->loadHtml($html);
        $dompdf->render();
        $dompdf->stream();
    }

    public function show(Invoice $record)
    {
        $html = view('pdf.invoice', ['data' => $record])->render();

        $tmp = sys_get_temp_dir();

        $dompdf = new Dompdf([
            'logOutputFile' => '',
            'isRemoteEnabled' => true,
            'fontDir' => $tmp,
            'fontCache' => $tmp,
            'tempDir' => $tmp,
            'chroot' => $tmp,
        ]);

        $dompdf->loadHtml($html);

        $dompdf->render();

        $dompdf->stream('test.pdf', [
            'compress' => true,
            'Attachment' => false,
        ]);
        exit();
    }
}
