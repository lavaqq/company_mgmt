<?php

namespace App\Filament\Resources\UserResource\Pages;

use App\Filament\Resources\UserResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\ManageRecords;

class ManageUsers extends ManageRecords
{
    protected static string $resource = UserResource::class;

    protected function getActions(): array
    {
        return [
            Actions\CreateAction::make()
                ->disableCreateAnother()
                ->label('Créer un utilisateur')
                ->modalHeading('Créer un utilisateur'),
        ];
    }

    protected function getTitle(): string
    {
        return 'Gestion des utilisateurs';
    }
}
