<?php

namespace App\Http\Controllers;

use App\Models\Estimate;
use Barryvdh\DomPDF\Facade\Pdf;

class EstimateController extends Controller
{
    public function show(Estimate $record)
    {
        $pdf = Pdf::loadView('pdf.estimate', ['data' => $record]);
        return $pdf->stream($record->reference . ' (' . $record->company->name . ')' . '.pdf');
    }
}
