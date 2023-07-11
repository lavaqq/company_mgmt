<?php

namespace App\Filament\Resources\LeadResource\Pages;

use App\Filament\Resources\LeadResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\EditRecord;

class EditLead extends EditRecord
{
    protected static string $resource = LeadResource::class;

    protected function getActions(): array
    {
        return [
            Actions\DeleteAction::make()
                ->modalHeading('Supprimer le lead : ' . $this->record->title)
        ];
    }

    protected function getTitle(): string
    {
        return 'Modifier le lead : ' . $this->record->title;
    }

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
}
