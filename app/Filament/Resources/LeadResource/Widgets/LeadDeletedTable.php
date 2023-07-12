<?php

namespace App\Filament\Resources\LeadResource\Widgets;

use App\Models\Lead;
use Filament\Tables;
use Filament\Tables\Columns\BadgeColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Widgets\TableWidget as BaseWidget;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

class LeadDeletedTable extends BaseWidget
{
    protected static ?string $heading = 'Tous les leads supprimés';

    protected function getTableEmptyStateIcon(): ?string
    {
        return 'heroicon-o-briefcase';
    }

    protected function getTableEmptyStateHeading(): ?string
    {
        return 'Aucun lead supprimé';
    }

    public ?Model $record = null;

    protected function getTableQuery(): Builder
    {
        return Lead::onlyTrashed();
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
                    'waiting_for_contact' => 'En attente de contact',
                    'contacted' => 'Contacté',
                    'qualified' => 'Qualifié',
                    'unqualified' => 'Non qualifié',
                ])
                ->colors([
                    'secondary' => 'new',
                    'secondary' => 'waiting_for_contact',
                    'warning' => 'contacted',
                    'success' => 'qualified',
                    'danger' => 'unqualified',
                ]),
            TextColumn::make('start_date')
                ->label('Date de début')
                ->dateTime('d/m/Y'),
            BadgeColumn::make('origin')
                ->label('Origine')
                ->enum([
                    'unknown' => 'Inconnue',
                    'inbound' => 'Entrante',
                    'outbound' => 'Sortante',
                ])
                ->colors([
                    'secondary' => 'unknown',
                    'warning' => 'Sortante',
                    'success' => 'Entrante',
                ]),
        ];
    }

    protected function getTableActions(): array
    {
        return [
            Tables\Actions\RestoreAction::make()
                ->modalHeading(function (Model $record): string {
                    return 'Restaurer : '.$record->title;
                })
                ->label(''),
            Tables\Actions\ForceDeleteAction::make()
                ->modalHeading(function (Model $record): string {
                    return 'Supprimer définitivement : '.$record->title;
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
