<?php

namespace App\Http\Controllers;

use App\Models\CreditNote;
use App\Models\ReceivedInvoice;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Storage;

class CreditNoteController extends Controller
{
    public function show(CreditNote $record)
    {
        return Response::file(public_path(Storage::url($record->attachment->file_path)));
    }
}
