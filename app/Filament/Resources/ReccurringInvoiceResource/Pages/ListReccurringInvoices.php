<?php

namespace App\Filament\Resources\ReccurringInvoiceResource\Pages;

use App\Filament\Resources\ReccurringInvoiceResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\ListRecords;

class ListReccurringInvoices extends ListRecords
{
    protected static string $resource = ReccurringInvoiceResource::class;

    protected function getActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
    protected function getTitle(): string
    {
        return 'Toutes les factures récurrentes';
    }
    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
}
