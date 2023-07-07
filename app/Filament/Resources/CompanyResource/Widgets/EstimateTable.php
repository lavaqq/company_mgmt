<?php

namespace App\Filament\Resources\CompanyResource\Widgets;

use App\Models\Contact;
use App\Models\Estimate;
use Closure;
use Filament\Tables;
use Filament\Tables\Columns\BadgeColumn;
use Filament\Tables\Columns\TagsColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Widgets\TableWidget as BaseWidget;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

class EstimateTable extends BaseWidget
{
    protected static ?string $heading = 'Devis';

    protected function getTableEmptyStateIcon(): ?string
    {
        return 'heroicon-o-document-text';
    }

    protected function getTableEmptyStateHeading(): ?string
    {
        return 'Aucun devis enregistré';
    }

    public ?Model $record = null;

    protected function getTableQuery(): Builder
    {
        $estimates = $this->record->estimates;
        $estimateIds = $estimates->pluck('id');
        return Estimate::query()->whereIn('id', $estimateIds);
    }

    protected function getTableColumns(): array
    {
        return [
            TextColumn::make('reference')
                ->label('Référence'),
            TextColumn::make('deal.lead.company.name')
                ->label('Entreprise')
                ->limit(20),
            TextColumn::make('issue_date')
                ->label("Date d'émission")
                ->dateTime('d/m/Y'),
            TextColumn::make('total_excl_tax')
                ->label('Total HT')
                ->suffix(' €')
                ->getStateUsing(fn (Model|null $record): float => $record->getTotalExcludingTax()),
            TextColumn::make('total_incl_tax')
                ->label('Total TTC')
                ->suffix(' €')
                ->getStateUsing(fn (Model|null $record): float => $record->getTotalIncludingTax()),
            BadgeColumn::make('status')
                ->label('Statut')
                ->enum([
                    'creation' => 'En création',
                    'sended' => 'Envoyé',
                    'signed' => 'Signé',
                    'refused' => 'Refusé',
                ])
                ->colors([
                    'secondary' => 'creation',
                    'warning' => 'sended',
                    'success' => 'signed',
                    'danger' => 'refused',
                ]),
        ];
    }

    protected function getTableRecordUrlUsing(): ?Closure
    {
        return fn (Model $record): string => route('estimate.pdf', ['record' => $record]);
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
