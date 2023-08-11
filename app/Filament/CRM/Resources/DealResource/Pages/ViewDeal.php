<?php

namespace App\Filament\CRM\Resources\DealResource\Pages;

use App\Filament\CRM\Resources\DealResource;
use Filament\Actions;
use Filament\Resources\Pages\ViewRecord;

class ViewDeal extends ViewRecord
{
    protected static string $resource = DealResource::class;

    public function getHeading(): string
    {
        return $this->record->title;
    }

    protected function getHeaderActions(): array
    {
        return [
            Actions\EditAction::make(),
        ];
    }
}
