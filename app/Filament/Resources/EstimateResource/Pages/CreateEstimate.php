<?php

namespace App\Filament\Resources\EstimateResource\Pages;

use App\Filament\Resources\EstimateResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateEstimate extends CreateRecord
{
    protected static string $resource = EstimateResource::class;

    protected function getTitle(): string
    {
        return 'Créer un devis';
    }

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }

    protected static bool $canCreateAnother = false;
}
