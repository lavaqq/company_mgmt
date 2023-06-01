<?php

namespace App\Http\Controllers;

use App\Models\Estimate;

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
