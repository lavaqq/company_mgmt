<?php

namespace App\Http\Controllers;

use App\Models\Invoice;
use Dompdf\Dompdf;


class InvoiceController extends Controller
{
    public function show(Invoice $record)
    {

        $html = <<<HTML
        <!DOCTYPE html>
        <html lang="fr">
            <head>
                <meta charset="UTF-8">
                <meta name="viewport" content="width=device-width, initial-scale=1.0">
                <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
                <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">
                <style>
                    body {
                        font-family: 'Poppins';
                        margin: 64px;
                    }
                </style>
            </head>
            <body>
                <p>REFERENCE</p>
                <p>
                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Similique soluta nihil quos beatae quam recusandae
                    repellendus sequi tenetur consequuntur explicabo quia, ad ipsa repudiandae! Non laboriosam sed praesentium fugit
                    veniam.
                </p>
            </body>
        </html>
        HTML;


        $html = view('pdf.invoice', ['data' => $record])->render();

        $tmp = getcwd() . DIRECTORY_SEPARATOR . 'tmp';

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
            'compress' => false,
            'Attachment' => false,
        ]);

        exit();
    }
}
