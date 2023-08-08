<?php

namespace App\Filament\CRM\Resources\CompanyResource\Pages;

use App\Filament\CRM\Resources\CompanyResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditCompany extends EditRecord
{
    protected static string $resource = CompanyResource::class;

    public function getHeading(): string
    {
        return "Modifier l'entreprise : ".$this->record->name;
    }

    protected function getHeaderActions(): array
    {
        return [
            Actions\ViewAction::make(),
            Actions\DeleteAction::make(),
            Actions\ForceDeleteAction::make(),
            Actions\RestoreAction::make(),
        ];
    }
}
