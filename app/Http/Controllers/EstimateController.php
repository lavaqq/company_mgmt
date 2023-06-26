<?php

namespace App\Http\Controllers;

use App\Models\Estimate;
use Barryvdh\DomPDF\Facade\Pdf;

class EstimateController extends Controller
{
    public function show(Estimate $record)
    {
        $html = view('pdf.estimate', ['data' => $record])->render();
        $pdf = Pdf::loadHTML($html);
        return $pdf->stream();
    }
}
