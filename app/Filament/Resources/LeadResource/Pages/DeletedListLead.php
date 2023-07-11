<?php

namespace App\Filament\Resources\LeadResource\Pages;

use App\Filament\Resources\LeadResource;
use Filament\Resources\Pages\Page;
use Filament\Pages\Actions\Action;

class DeletedListLead extends Page
{
    protected static string $resource = LeadResource::class;

    protected static ?string $breadcrumb = 'Liste (supprimé)';

    protected static ?string $title = 'Gestion des leads';

    protected static string $view = 'filament.resources.lead-resource.pages.deleted-list-lead';

    protected function getActions(): array
    {
        return [
            Action::make('deleted')
                ->url(fn () => LeadResource::getUrl('index'))
                ->label('Voir les leads')
        ];
    }

    protected function getHeaderWidgets(): array
    {
        return [
            LeadResource\Widgets\LeadDeletedTable::class,
        ];
    }

    protected function getHeaderWidgetsColumns(): int|string|array
    {
        return 1;
    }
}
