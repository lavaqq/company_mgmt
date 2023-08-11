<?php

namespace App\Filament\CRM\Resources\DealResource\Pages;

use App\Filament\CRM\Resources\DealResource;
use App\Models\Lead;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditDeal extends EditRecord
{
    protected static string $resource = DealResource::class;

    public function getHeading(): string
    {
        return "Modifier le deal : " . $this->record->title;
    }

    protected function getRedirectUrl(): string
    {
        $resource = static::getResource();
        return $resource::getUrl('index');
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

    protected function mutateFormDataBeforeSave(array $data): array
    {
        $data['company_id'] = Lead::find($data['lead_id'])->company_id;
        return $data;
    }
}
