<?php

namespace App\Filament\Resources\CompanyResource\Widgets;

use App\Models\Company;
use App\Models\Contact;
use App\Models\Invoice;
use Closure;
use Filament\Tables;
use Filament\Tables\Columns\BadgeColumn;
use Filament\Tables\Columns\TagsColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Widgets\TableWidget as BaseWidget;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\Relation;
use Illuminate\Support\Facades\DB;

class ContactTable extends BaseWidget
{
    protected static ?string $heading = 'Contacts';

    protected function getTableEmptyStateIcon(): ?string
    {
        return 'heroicon-o-users';
    }

    protected function getTableEmptyStateHeading(): ?string
    {
        return 'Aucun contact enregistré';
    }

    public ?Model $record = null;

    protected function getTableQuery(): Builder
    {
        return Contact::query()->whereHas('companies', function ($query) {
            $query->where('company_id', $this->record->id);
        });
    }

    protected function getTableColumns(): array
    {
        return [
            TextColumn::make('first_name')
                ->label('Prénom'),
            TextColumn::make('last_name')
                ->label('Nom'),
            TagsColumn::make('companies')
                ->label('Entreprise(s)')
                ->getStateUsing(function (Model $record): array {
                    $companies = $record->companies;
                    $data = [];
                    foreach ($companies as $company) {
                        $data[] = strlen($company->name) > 15 ? substr($company->name, 0, 15) . '...' : $company->name;
                    }
                    if (empty($data)) {
                        $data[] = 'Aucune';
                    }

                    return $data;
                }),
            BadgeColumn::make('job_title')
                ->getStateUsing(function (Model $record): string {
                    return $record->job_title ? (strlen($record->job_title) > 15 ? substr($record->job_title, 0, 15) . '...' : $record->job_title) : 'Aucun';
                })
                ->label('Titre du poste'),
        ];
    }

    protected function getTableRecordUrlUsing(): ?Closure
    {
        return fn (Model $record): string => route('filament.resources.contacts.view', ['record' => $record]);
    }
}
