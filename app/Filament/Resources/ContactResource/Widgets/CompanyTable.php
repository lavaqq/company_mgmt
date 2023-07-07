<?php

namespace App\Filament\Resources\ContactResource\Widgets;

use App\Models\Company;
use Closure;
use Filament\Tables;
use Filament\Tables\Columns\BadgeColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Widgets\TableWidget as BaseWidget;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

class CompanyTable extends BaseWidget
{
    protected static ?string $heading = 'Entreprises';

    protected function getTableEmptyStateIcon(): ?string
    {
        return 'heroicon-o-briefcase';
    }

    protected function getTableEmptyStateHeading(): ?string
    {
        return 'Aucune entreprise enregistré';
    }

    public ?Model $record = null;

    protected function getTableQuery(): Builder
    {
        return Company::query()->whereHas('contacts', function ($query) {
            $query->where('contact_id', $this->record->id);
        });
    }

    protected function getTableColumns(): array
    {
        return [
            TextColumn::make('name')
                ->label('Dénomination sociale')
                ->limit(20),
            TextColumn::make('vat_number')
                ->label('Numéro de TVA')
                ->getStateUsing(function (Model $record): string {
                    return $record->vat_country_code . $record->vat_number;
                }),
            BadgeColumn::make('legal_form')
                ->label('Forme légale')
                ->extraAttributes(['class' => 'uppercase']),
        ];
    }

    protected function getTableRecordUrlUsing(): ?Closure
    {
        return fn (Model $record): string => route('filament.resources.companies.view', ['record' => $record]);
    }
}
