<?php

namespace App\Http\Controllers;

use App\Models\Estimate;
use Barryvdh\DomPDF\Facade\Pdf;

class EstimateController extends Controller
{
    public function show(Estimate $record)
    {
        $html = view('pdf.estimate', ['data' => $record])->render();
        $pdf = Pdf::setOption([
            'defaultFont' => 'sans-serif'
        ])->loadHTML($html);
        return $pdf->stream($record->reference . ' (' . $record->company->name . ').pdf');
    }
}
