<?php

namespace App\Filament\Resources\InvoiceResource\Pages;

use App\Filament\Resources\InvoiceResource;
use App\Models\Invoice;
use Filament\Pages\Actions;
use Filament\Resources\Pages\ListRecords;
use Illuminate\Support\Facades\Auth;

class ListInvoices extends ListRecords
{
    protected static string $resource = InvoiceResource::class;

    protected function getActions(): array
    {
        if (Auth::user()->is_admin) {
            return [
                Actions\CreateAction::make()
                    ->label('Créer une facture'),
            ];
        }
        if (Invoice::all()->last()->status == 'creation') {
            return [];
        }

        return [
            Actions\CreateAction::make()
                ->label('Créer une facture'),
        ];
    }

    protected function getTitle(): string
    {
        return 'Gestion des factures émises';
    }

    protected function getTableEmptyStateIcon(): ?string
    {
        return 'heroicon-o-document-text';
    }

    protected function getTableEmptyStateHeading(): ?string
    {
        return 'Aucune facture enregistrée';
    }

    protected function shouldPersistTableSortInSession(): bool
    {
        return true;
    }

    protected function getDefaultTableSortColumn(): ?string
    {
        return 'reference';
    }

    protected function getDefaultTableSortDirection(): ?string
    {
        return 'desc';
    }
}
