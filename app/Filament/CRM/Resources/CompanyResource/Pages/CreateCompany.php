<?php

namespace App\Filament\CRM\Resources\CompanyResource\Pages;

use App\Filament\CRM\Resources\CompanyResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateCompany extends CreateRecord
{
    protected static string $resource = CompanyResource::class;

    protected static bool $canCreateAnother = false;

    public function getHeading(): string
    {
        return 'Créer une entreprise';
    }

    protected function getRedirectUrl(): string
    {
        $resource = static::getResource();
        return $resource::getUrl('index');
    }
}
