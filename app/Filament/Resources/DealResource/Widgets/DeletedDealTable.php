<?php

namespace App\Filament\Resources\DealResource\Widgets;

use App\Models\Deal;
use Carbon\Carbon;
use Closure;
use Filament\Tables;
use Filament\Tables\Columns\BadgeColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Widgets\TableWidget as BaseWidget;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Filament\Tables\Actions\Action;

class DeletedDealTable extends BaseWidget
{
    protected static ?string $heading = 'Tous les deals supprimés';

    protected function getTableEmptyStateIcon(): ?string
    {
        return 'heroicon-o-briefcase';
    }

    protected function getTableEmptyStateHeading(): ?string
    {
        return 'Aucun deal supprimé';
    }

    public ?Model $record = null;

    protected function getTableQuery(): Builder
    {
        return Deal::onlyTrashed();
    }

    protected function getTableColumns(): array
    {
        return [
            TextColumn::make('title')
                ->label('Titre')
                ->limit(30),
            TextColumn::make('company.name')
                ->label('Entreprise')
                ->sortable()
                ->limit(10),
            BadgeColumn::make('status')
                ->label('Statut')
                ->enum([
                    'new' => 'Nouveau',
                    'discovery' => 'Découverte',
                    'proposal' => 'Proposition',
                    'negotiation' => 'Négotiation',
                    'won' => 'Gagné',
                    'lost' => 'Perdu',
                ])
                ->colors([
                    'secondary' => 'new',
                    'secondary' => 'discovery',
                    'warning' => 'proposal',
                    'warning' => 'negotiation',
                    'success' => 'won',
                    'danger' => 'lost',
                ]),
        ];
    }

    protected function getTableActions(): array
    {
        return [
            Tables\Actions\RestoreAction::make()
                ->modalHeading(function (Model $record): string {
                    return 'Restaurer : ' . $record->title;
                })
                ->label(''),
            Tables\Actions\ForceDeleteAction::make()
                ->modalHeading(function (Model $record): string {
                    return 'Supprimer définitivement : ' . $record->title;
                })
                ->label(''),
        ];
    }

    protected function getTableBulkActions(): array

    {
        return [
            Tables\Actions\RestoreBulkAction::make(),
            Tables\Actions\ForceDeleteBulkAction::make(),
        ];
    }
}
