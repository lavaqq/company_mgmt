<?php

namespace App\Filament\Resources\EstimateResource\Pages;

use App\Filament\Resources\EstimateResource;
use App\Models\Estimate;
use Filament\Pages\Actions;
use Filament\Resources\Pages\ListRecords;
use Illuminate\Support\Facades\Auth;

class ListEstimates extends ListRecords
{
    protected static string $resource = EstimateResource::class;

    protected function getActions(): array
    {
        if (Auth::user()->is_admin) {
            return [
                Actions\CreateAction::make()
                    ->label('Créer un devis'),
            ];
        }
        if (Estimate::all()->last()->status == 'creation') {
            return [];
        }

        return [
            Actions\CreateAction::make()
                ->label('Créer un devis'),
        ];
    }

    protected function getTitle(): string
    {
        return 'Gestion des devis émis';
    }

    protected function getTableEmptyStateIcon(): ?string
    {
        return 'heroicon-o-document-text';
    }

    protected function getTableEmptyStateHeading(): ?string
    {
        return 'Aucun devis enregistré';
    }

    protected function shouldPersistTableSortInSession(): bool
    {
        return true;
    }

    protected function getDefaultTableSortColumn(): ?string
    {
        return 'reference';
    }

    protected function getDefaultTableSortDirection(): ?string
    {
        return 'desc';
    }
}
