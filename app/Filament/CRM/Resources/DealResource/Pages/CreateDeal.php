<?php

namespace App\Filament\CRM\Resources\DealResource\Pages;

use App\Filament\CRM\Resources\DealResource;
use App\Models\Lead;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateDeal extends CreateRecord
{
    protected static string $resource = DealResource::class;

    protected static bool $canCreateAnother = false;

    public function getHeading(): string
    {
        return 'Créer un deal';
    }

    protected function getRedirectUrl(): string
    {
        $resource = static::getResource();
        return $resource::getUrl('index');
    }

    protected function mutateFormDataBeforeCreate(array $data): array
    {
        $data['company_id'] = Lead::find($data['lead_id'])->company_id;
        return $data;
    }
}
