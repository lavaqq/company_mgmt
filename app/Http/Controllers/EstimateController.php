<?php

namespace App\Http\Controllers;

use App\Models\Estimate;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Storage;

class EstimateController extends Controller
{
    public function show(Estimate $record)
    {
        if ($record->external_estimate) {
            return Response::file(public_path(Storage::url($record->external_estimate)));
        }

        $pdf = Pdf::loadView('pdf.estimate', ['data' => $record]);

        return $pdf->stream($record->reference.' ('.$record->deal->lead->company->name.')'.'.pdf');
    }
}
