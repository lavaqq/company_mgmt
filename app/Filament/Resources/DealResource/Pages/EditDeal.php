<?php

namespace App\Filament\Resources\DealResource\Pages;

use App\Filament\Resources\DealResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\EditRecord;

class EditDeal extends EditRecord
{
    protected static string $resource = DealResource::class;

    protected function getActions(): array
    {
        return [
            Actions\DeleteAction::make()
                ->modalHeading('Supprimer le deal : '.$this->record->title),
        ];
    }

    protected function getTitle(): string
    {
        return 'Modifier le deal : '.$this->record->title;
    }

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
}
