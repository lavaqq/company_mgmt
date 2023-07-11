<?php

namespace App\Filament\Resources\DealResource\Widgets;

use App\Filament\Resources\DealResource;
use App\Models\Deal;
use Carbon\Carbon;
use Closure;
use Filament\Tables;
use Filament\Widgets\TableWidget as BaseWidget;
use Illuminate\Database\Eloquent\Builder;
use Filament\Tables\Actions\Action;
use Filament\Tables\Columns\BadgeColumn;
use Filament\Tables\Columns\TextColumn;
use Illuminate\Database\Eloquent\Model;

class WonDealTable extends BaseWidget
{
    protected static ?string $heading = 'Deals gagnés';

    protected function getTableEmptyStateIcon(): ?string
    {
        return 'heroicon-o-briefcase';
    }

    protected function getTableEmptyStateHeading(): ?string
    {
        return 'Aucun deal gagné enregistré';
    }

    public ?Model $record = null;

    protected function getTableQuery(): Builder
    {
        return Deal::query()->where('status', 'won');
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
            TextColumn::make('start_date')
                ->label('Date de début')
                ->dateTime('d/m/Y'),
            TextColumn::make('signature_date')
                ->label('Date de signature')
                ->getStateUsing(
                    static fn (Model $record) => $record->signature_date == null ? "Aucune" : Carbon::parse($record->signature_date)->format('d/m/Y')
                ),
            TextColumn::make('time_between')
                ->label('Temps écoulé')
                ->getStateUsing(function (Model $record) {
                    if ($record->start_date && $record->signature_date) {
                        $startDate = Carbon::parse($record->start_date);
                        $signatureDate = Carbon::parse($record->signature_date);
                        $timeBetween = $startDate->diffInDays($signatureDate);
                        return $timeBetween . ' jours';
                    } else {
                        return 'Aucun';
                    }
                }),
            TextColumn::make('deal_value')
                ->label('Valeur du deal')
                ->suffix(' €'),
            TextColumn::make('actual_deal_value')
                ->label('Valeur réel du deal')
                ->suffix(' €'),
            TextColumn::make('deal_value_percentage')
                ->label('Pourcentage de la valeur')
                ->getStateUsing(function (Model $record) {
                    if ($record->deal_value && $record->actual_deal_value) {
                        $percentage = ($record->actual_deal_value / $record->deal_value) * 100;
                        return round($percentage, 2) . '%';
                    } else {
                        return 'Aucun';
                    }
                }),
        ];
    }

    protected function getTableActions(): array
    {
        return [
            Action::make('edit')
                ->url(fn (Model|null $record): string => DealResource::getUrl('edit', $record))
                ->label('')
                ->icon('heroicon-s-pencil'),
            Tables\Actions\DeleteAction::make()
                ->modalHeading(function (Model $record): string {
                    return 'Supprimer : ' . $record->title;
                })
                ->label(''),
        ];
    }

    protected function getTableBulkActions(): array

    {
        return [
            Tables\Actions\DeleteBulkAction::make(),
        ];
    }

    protected function getTableRecordUrlUsing(): ?Closure
    {
        return fn (Model|null $record): string => DealResource::getUrl('edit', $record);
    }
}
