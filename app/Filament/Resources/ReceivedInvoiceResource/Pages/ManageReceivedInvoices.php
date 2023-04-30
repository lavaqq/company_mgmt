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
            Actions\CreateAction::make()
                ->disableCreateAnother()
                ->label('Créer une facture')
                ->modalHeading('Créer une facture'),
        ];
    }

    protected function getTitle(): string
    {
        return 'Gestion des factures reçues';
    }
}
