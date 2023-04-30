<?php

namespace App\Filament\Resources\CompanyResource\Pages;

use App\Filament\Resources\CompanyResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\ListRecords;

class ListCompanies extends ListRecords
{
    protected static string $resource = CompanyResource::class;
    protected function getActions(): array
    {
        return [
            Actions\CreateAction::make()
                ->label('Créer une entreprise'),
        ];
    }
    protected function getTitle(): string
    {
        return 'Gestion des entreprises';
    }
}
