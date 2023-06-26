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

        // $dompdf->stream('test.pdf', [
        //     'compress' => true,
        //     'Attachment' => false,
        // ]);
        // exit();
        $html = <<<HTML
<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet" />
<style>
.p {
    font-family: 'Poppins';
}
</style>
</head>
<body>
    <p class="p">
        Lorem ipsum dolor sit amet, consectetur adipiscing elit.
    </p>
</body>
</html>
HTML;

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

        $dompdf->stream('hello.pdf', [
            'compress' => true,
            'Attachment' => false,
        ]);
        exit();
    }
}
