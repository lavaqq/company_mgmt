<?php

namespace App\Filament\Resources\DealResource\Pages;

use App\Filament\Resources\DealResource;
use Filament\Pages\Actions\Action;
use Filament\Resources\Pages\Page;

class MultipleListDeal extends Page
{
    protected static string $resource = DealResource::class;

    protected static string $view = 'filament.resources.deal-resource.pages.multi-table-deal';

    protected static ?string $breadcrumb = 'Listes';

    protected static ?string $title = 'Gestion des deals';

    protected function getActions(): array
    {
        return [
            Action::make('deleted')
                ->url(fn () => DealResource::getUrl('deleted'))
                ->label('Voir les deals supprimés')
                ->color('danger'),
            Action::make('create')
                ->url(fn () => DealResource::getUrl('create'))
                ->label('Créer un deal'),
        ];
    }

    protected function getHeaderWidgets(): array
    {
        return [
            DealResource\Widgets\ActiveDealTable::class,
            DealResource\Widgets\WonDealTable::class,
            DealResource\Widgets\LostDealTable::class,
        ];
    }

    protected function getHeaderWidgetsColumns(): int|string|array
    {
        return 1;
    }
}
