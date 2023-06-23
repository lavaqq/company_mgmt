<?php

namespace App\Filament\Resources\UserResource\Pages;

use App\Filament\Resources\UserResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\ListRecords;

class ListUsers extends ListRecords
{
    protected static string $resource = UserResource::class;

    protected function getActions(): array
    {
        return [
            Actions\CreateAction::make()
                ->label('Créer un utilisateur'),
        ];
    }

    protected function getTitle(): string
    {
        return 'Gestion des utilisateurs';
    }

    protected function getTableEmptyStateIcon(): ?string
    {
        return 'heroicon-o-users';
    }

    protected function getTableEmptyStateHeading(): ?string
    {
        return 'Aucun utilisateur enregistré';
    }
}
