<?php

namespace App\Filament\Resources\ReccurringInvoiceResource\Pages;

use App\Filament\Resources\ReccurringInvoiceResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateReccurringInvoice extends CreateRecord
{
    protected static string $resource = ReccurringInvoiceResource::class;
    protected function getTitle(): string
    {
        return 'Créer une facture récurrente';
    }
    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
}
