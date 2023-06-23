<?php

namespace App\Filament\Resources\ContactResource\Pages;

use App\Filament\Resources\ContactResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\ListRecords;

class ListContacts extends ListRecords
{
    protected static string $resource = ContactResource::class;

    protected function getActions(): array
    {
        return [
            Actions\CreateAction::make()
                ->label('Créer un contact'),
        ];
    }

    protected function getTitle(): string
    {
        return 'Gestion des contacts';
    }

    protected function getTableEmptyStateIcon(): ?string

    {
        return 'heroicon-o-users';
    }

    protected function getTableEmptyStateHeading(): ?string
    {
        return 'Aucun contact trouvé';
    }
}
