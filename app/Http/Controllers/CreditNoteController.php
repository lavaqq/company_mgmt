<?php

namespace App\Http\Controllers;

use App\Models\CreditNote;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Storage;

class CreditNoteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return CreditNote::with([
            'invoice',
            'items',
            'discounts',
        ])->get();
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return CreditNote::with([
            'invoice',
            'items',
            'discounts',
        ])->find($id);
    }

    /**
     * Display the pdf of the specified resource.
     */
    public function showPDF(CreditNote $record)
    {
        if ($record->attachment_path) {
            return Response::file(public_path(Storage::url($record->attachment_path)));
        }
        $pdf = Pdf::loadView('pdf.credit-note', ['data' => $record]);

        return $pdf->stream($record->reference.' ('.$record->invoice->company->name.')'.'.pdf');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
