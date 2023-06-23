<?php

namespace App\Filament\Resources\InvoiceResource\Pages;

use App\Filament\Resources\InvoiceResource;
use App\Models\Invoice;
use Filament\Pages\Actions;
use Filament\Resources\Pages\ListRecords;
use Closure;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;

class ListInvoices extends ListRecords
{
    protected static string $resource = InvoiceResource::class;

    protected function getActions(): array
    {
        return [
            Actions\CreateAction::make()
                ->label('Créer une facture'),
        ];
    }

    protected function getTitle(): string
    {
        return 'Gestion des factures émises';
    }

    protected function getTableRecordUrlUsing(): ?Closure
    {
        return fn (Model $record): string => $record->id == 29 ? route('invoice.pdf.download', $record) : InvoiceResource::getUrl('edit', $record);
    }

    protected function getTableQuery(): Builder
    {
        return Invoice::orderBy('reference', 'desc');
    }

    // protected function getTableRecordsPerPageSelectOptions(): array
    // {
    //     return [20, 50, 100];
    // }
}
