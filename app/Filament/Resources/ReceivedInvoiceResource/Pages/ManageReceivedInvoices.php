<?php

namespace App\Filament\Resources\ReceivedInvoiceResource\Pages;

use App\Filament\Resources\ReceivedInvoiceResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\ManageRecords;

class ManageReceivedInvoices extends ManageRecords
{
    protected static string $resource = ReceivedInvoiceResource::class;

    protected function getActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }

    protected function getTitle(): string
    {
        return 'Gestion des factures reçues';
    }

    protected function getTableEmptyStateIcon(): ?string
    {
        return 'heroicon-o-document-text';
    }

    protected function getTableEmptyStateHeading(): ?string
    {
        return 'Aucune facture reçue enregistrée';
    }

    protected function shouldPersistTableSortInSession(): bool
    {
        return true;
    }

    protected function getDefaultTableSortColumn(): ?string
    {
        return 'issue_date';
    }

    protected function getDefaultTableSortDirection(): ?string
    {
        return 'desc';
    }
}
