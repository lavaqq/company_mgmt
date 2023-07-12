<?php

namespace App\Filament\Resources\EstimateResource\Pages;

use App\Filament\Resources\EstimateResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\EditRecord;

class EditEstimate extends EditRecord
{
    protected static string $resource = EstimateResource::class;

    protected function getActions(): array
    {
        return [
            Actions\DeleteAction::make()
                ->modalHeading('Supprimer le devis : '.$this->record->reference),
        ];
    }

    protected function getTitle(): string
    {
        return 'Modifier le devis : '.$this->record->reference;
    }

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
}
