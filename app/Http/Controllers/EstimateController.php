<?php

namespace App\Http\Controllers;

use App\Models\Estimate;
use App\Models\Invoice;

class EstimateController extends Controller
{
    public function stream(Estimate $record)
    {
        return $record;
    }

    public function download(Estimate $record)
    {
        return $record;
    }
}
