<?php

namespace App\Filament\CRM\Resources\CompanyResource\Pages;

use App\Filament\CRM\Resources\CompanyResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListCompanies extends ListRecords
{
    protected static string $resource = CompanyResource::class;

    public function getHeading(): string
    {
        return 'Liste des entreprises';
    }

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make()
                ->label('Créer une entreprise'),
        ];
    }
}
