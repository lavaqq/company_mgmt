<?php

namespace App\Filament\Resources\CompanyResource\Widgets;

use App\Models\Invoice;
use Closure;
use Filament\Tables;
use Filament\Tables\Columns\BadgeColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Widgets\TableWidget as BaseWidget;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

class InvoiceTable extends BaseWidget
{
    protected static ?string $heading = 'Factures émises';

    protected function getTableEmptyStateIcon(): ?string
    {
        return 'heroicon-o-document-text';
    }

    protected function getTableEmptyStateHeading(): ?string
    {
        return 'Aucune facture enregistrée';
    }

    public ?Model $record = null;

    protected function getTableQuery(): Builder
    {
        return Invoice::query()->where('company_id', $this->record->id);
    }

    protected function getTableColumns(): array
    {
        return [
            TextColumn::make('reference')
                ->label('Référence'),
            TextColumn::make('company.name')
                ->label('Entreprise')
                ->limit(10),
            TextColumn::make('issue_date')
                ->label('Émission')
                ->dateTime('d/m/Y'),
            TextColumn::make('due_date')
                ->label('Échéance')
                ->dateTime('d/m/Y'),
            TextColumn::make('total_excl_tax')
                ->label('Total HT')
                ->suffix(' €')
                ->getStateUsing(fn (Model $record): float => $record->getTotalExcludingTax()),
            TextColumn::make('total_incl_tax')
                ->label('Total TTC')
                ->suffix(' €')
                ->getStateUsing(fn (Model $record): float => $record->getTotalIncludingTax()),
            BadgeColumn::make('status')
                ->label('Statut')
                ->enum([
                    'creation' => 'En création',
                    'pending' => 'En attente',
                    'paid' => 'Payée',
                    'cancelled' => 'Annulée',
                ])
                ->colors([
                    'secondary' => 'creation',
                    'warning' => 'pending',
                    'success' => 'paid',
                    'danger' => 'cancelled',
                ]),
        ];
    }

    protected function getTableRecordUrlUsing(): ?Closure
    {
        return fn (Model $record): string => route('invoice.pdf', ['record' => $record]);
    }
}
