<?php

namespace App\Filament\CRM\Resources\DealResource\Pages;

use App\Filament\CRM\Resources\DealResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListDeals extends ListRecords
{
    protected static string $resource = DealResource::class;

    public function getHeading(): string
    {
        return 'Liste des deals';
    }

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make()
                ->label('Créer un deal'),
        ];
    }
}
