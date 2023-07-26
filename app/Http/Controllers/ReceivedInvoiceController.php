<?php

namespace App\Http\Controllers;

use App\Models\ReceivedInvoice;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Storage;

class ReceivedInvoiceController extends Controller
{
    public function show(ReceivedInvoice $record)
    {
        return Response::file(public_path(Storage::url($record->attachment->file_path)));
    }
}
