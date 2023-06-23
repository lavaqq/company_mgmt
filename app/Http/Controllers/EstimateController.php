<?php

namespace App\Http\Controllers;

use App\Models\Estimate;
use Dompdf\Dompdf;

class EstimateController extends Controller
{
    public function show(Estimate $record)
    {
        $html = view('pdf.estimate', ['data' => $record])->render();
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
        $dompdf->stream($record->reference.' ('.$record->company->name.').pdf', [
            'compress' => true,
            'Attachment' => false,
        ]);
    }
}
