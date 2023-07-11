<?php

namespace App\Filament\Resources\LeadResource\Pages;

use App\Filament\Resources\LeadResource;
use Filament\Pages\Actions\Action;
use Filament\Resources\Pages\Page;

class MultipleListLead extends Page
{
    protected static string $resource = LeadResource::class;

    protected static ?string $breadcrumb = 'Listes';

    protected static ?string $title = 'Gestion des leads';

    protected static string $view = 'filament.resources.lead-resource.pages.multi-table-lead';

    protected function getActions(): array
    {
        return [
            Action::make('deleted')
                ->url(fn () => LeadResource::getUrl('deleted'))
                ->label('Voir les leads supprimés')
                ->color('danger'),
            Action::make('create')
                ->url(fn () => LeadResource::getUrl('create'))
                ->label('Créer un lead'),
        ];
    }

    protected function getHeaderWidgets(): array
    {
        return [
            LeadResource\Widgets\LeadInProgressTable::class,
            LeadResource\Widgets\LeadQualifiedTable::class,
            LeadResource\Widgets\LeadUnqualifiedTable::class,
        ];
    }

    protected function getHeaderWidgetsColumns(): int|string|array
    {
        return 1;
    }
}
