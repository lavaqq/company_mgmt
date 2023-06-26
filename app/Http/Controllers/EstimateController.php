<?php

namespace App\Http\Controllers;

use App\Models\Estimate;
use Barryvdh\DomPDF\Facade\Pdf;

class EstimateController extends Controller
{
    public function show(Estimate $record)
    {
        $tmp = sys_get_temp_dir();
        $html = view('pdf.estimate', ['data' => $record])->render();
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
