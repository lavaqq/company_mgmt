<?php

namespace App\Filament\Resources\DealResource\Pages;

use App\Filament\Resources\DealResource;
use App\Filament\Resources\LeadResource;
use Filament\Resources\Pages\Page;
use Filament\Pages\Actions\Action;

class DeletedListDeal extends Page
{
    protected static string $resource = DealResource::class;

    protected static string $view = 'filament.resources.deal-resource.pages.deleted-table-deal';

    protected static ?string $breadcrumb = 'Liste (supprimé)';

    protected static ?string $title = 'Gestion des deals';

    protected function getActions(): array
    {
        return [
            Action::make('deleted')
                ->url(fn () => DealResource::getUrl('index'))
                ->label('Voir les deals')
        ];
    }

    protected function getHeaderWidgets(): array
    {
        return [
            DealResource\Widgets\DeletedDealTable::class,
        ];
    }

    protected function getHeaderWidgetsColumns(): int|string|array
    {
        return 1;
    }
}
