<?php

namespace App\Filament\Resources\ContactResource\Pages;

use App\Filament\Resources\ContactResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\EditRecord;

class EditContact extends EditRecord
{
    protected static string $resource = ContactResource::class;

    protected function getActions(): array
    {
        return [
            Actions\DeleteAction::make()
                ->modalHeading('Supprimer le contact : ' . $this->record->last_name . ' ' . $this->record->first_name),
        ];
    }

    protected function getTitle(): string
    {
        return 'Modifier le contact : ' . $this->record->last_name . ' ' . $this->record->first_name;
    }

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
}
