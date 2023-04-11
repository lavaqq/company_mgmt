<?php

namespace App\Filament\Pages;

use App\Models\ActivityLog;
use App\Models\Log;
use App\Models\User;
use Filament\Forms\Components\DatePicker;
use Filament\Tables;
use Filament\Pages\Page;
use Filament\Tables\Columns\BadgeColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Contracts\HasTable;
use Filament\Tables\Filters\Filter;
use Filament\Tables\Filters\SelectFilter;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\Schema;
use Filament\Tables\Actions\Action;

class Logs extends Page implements HasTable
{
    use Tables\Concerns\InteractsWithTable;
    protected static ?string $navigationIcon = 'heroicon-o-database';
    protected static ?string $navigationGroup = 'Administration';
    protected static ?string $label = "Journal d'activité";
    protected static ?string $navigationLabel = "Journal d'activité";
    protected static string $view = 'filament.pages.logs';

    protected function getTitle(): string
    {
        return 'Toutes les activités';
    }

    protected function getTableQuery(): Builder
    {
        return ActivityLog::query();
    }

    protected function getTableColumns(): array
    {
        return [
            TextColumn::make('user.name')
                ->label('Utilisateur'),
            BadgeColumn::make('action')
                ->enum([
                    'create' => 'Création',
                    'update' => 'Modification',
                    'restore' => 'Récupération',
                    'delete' => 'Suppression',
                    'force_delete' => 'Suppression forcée',
                ])
                ->color(static function ($state): string {
                    if ($state === 'create') {
                        return 'success';
                    }
                    if ($state === 'delete' || $state === 'force_delete') {
                        return 'danger';
                    }
                    return 'secondary';
                })
                ->label('Action'),
            TextColumn::make('table')
                ->label('Table cible'),
            TextColumn::make('record_id')
                ->label('Entrée cible'),
            TextColumn::make('created_at')
                ->dateTime("d/m/Y H:i:s ")
                ->sortable()
                ->label('Date et heure'),
        ];
    }

    protected function getTableFilters(): array
    {
        return [
            SelectFilter::make('user')
                ->relationship('user', 'name', fn (Builder $query) => $query)
                ->label('Utilisateur'),
            SelectFilter::make('table')
                ->multiple()
                ->options(
                    fn () => collect(Schema::getConnection()->getDoctrineSchemaManager()->listTableNames())
                        ->mapWithKeys(function ($table) {
                            return [$table => $table];
                        })
                        ->toArray()
                ),
            Filter::make('created_at')
                ->form([
                    DatePicker::make('created_from')
                        ->label('Date des logs')
                        ->format('d/m/Y'),
                ])
                ->query(function (Builder $query, array $data): Builder {
                    return $query
                        ->when(
                            $data['created_from'],
                            fn (Builder $query, $date): Builder => $query->whereDate('created_at', '>=', $date),
                        );
                })
        ];
    }
}
