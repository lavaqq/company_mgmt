<?php

namespace App\Filament\CRM\Resources\ContactResource\Pages;

use App\Filament\CRM\Resources\ContactResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListContacts extends ListRecords
{
    protected static string $resource = ContactResource::class;

    public function getHeading(): string
    {
        return 'Liste des contacts';
    }

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make()
                ->label('Créer un contact'),
        ];
    }
}
