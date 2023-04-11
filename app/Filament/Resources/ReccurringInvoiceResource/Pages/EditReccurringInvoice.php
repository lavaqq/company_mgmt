<?php

namespace App\Filament\Resources\ReccurringInvoiceResource\Pages;

use App\Filament\Resources\ReccurringInvoiceResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\EditRecord;

class EditReccurringInvoice extends EditRecord
{
    protected static string $resource = ReccurringInvoiceResource::class;

    protected function getActions(): array
    {
        return [
            Actions\DeleteAction::make(),
            Actions\ForceDeleteAction::make(),
            Actions\RestoreAction::make(),
        ];
    }
    protected function getTitle(): string
    {
        return "Modifier la facture récurrente : " . $this->record->title;
    }
    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
}
