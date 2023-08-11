<?php

namespace App\Filament\CRM\Resources;

use App\Enums\DealStatus;
use App\Filament\CRM\Resources\DealResource\Pages;
use App\Filament\CRM\Resources\DealResource\RelationManagers;
use App\Models\Company;
use App\Models\Deal;
use App\Models\Lead;
use Closure;
use Filament\Tables\Grouping\Group;
use Filament\Forms;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\Fieldset;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Forms\Get;
use Filament\Forms\Set;
use Filament\Infolists\Components\Fieldset as InfolistsFieldset;
use Filament\Infolists\Components\TextEntry;
use Filament\Infolists\Infolist;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class DealResource extends Resource
{
    protected static ?string $model = Deal::class;

    protected static ?string $navigationIcon = 'heroicon-o-squares-2x2';

    protected static ?string $activeNavigationIcon = 'heroicon-s-squares-2x2';

    protected static ?string $navigationLabel = 'Deals';

    protected static ?string $navigationGroup = 'Prospects et opportunités';

    protected static ?string $modelLabel = 'Deal';

    protected static ?string $pluralModelLabel = 'Deals';

    public static function infolist(Infolist $infolist): Infolist
    {
        return $infolist
            ->schema([
                InfolistsFieldset::make('')
                    ->schema([
                        TextEntry::make('lead.title')
                            ->label('Lead'),
                        TextEntry::make('company_id')
                            ->formatStateUsing(fn (string $state): string => Company::find($state)->name)
                            ->label('Entreprise(s)'),
                        TextEntry::make('title')
                            ->label('Titre'),
                        TextEntry::make('status')
                            ->label('Statut'),
                        TextEntry::make('deal_value')
                            ->label("Valeur du deal"),
                        TextEntry::make('actual_deal_value')
                            ->label('Valeur réel du deal'),
                        TextEntry::make('start_date'),
                        TextEntry::make('signature_date')
                            ->label('Date de signature'),
                        TextEntry::make('note')
                            ->columnSpanFull(),
                    ]),
            ]);
    }

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Fieldset::make()
                    ->schema([
                        Select::make('lead_id')
                            ->label('Lead')
                            ->searchable()
                            ->options(Lead::all()->pluck('title', 'id')),
                        TextInput::make('title')
                            ->label('Titre')
                            ->required(),
                        Select::make('status')
                            ->label('Statut')
                            ->options(DealStatus::class)
                            ->default('new')
                            ->searchable(),
                        TextInput::make('deal_value')
                            ->label("Valeur du deal")
                            ->suffix('€')
                            ->required()
                            ->numeric()
                            ->default(0),
                        TextInput::make('actual_deal_value')
                            ->label('Valeur réel du deal')
                            ->suffix('€')
                            ->required()
                            ->numeric()
                            ->default(0),
                        DatePicker::make('start_date')
                            ->label('Date de début')
                            ->default(now())
                            ->required(),
                        DatePicker::make('signature_date')
                            ->label('Date de signature'),
                        Textarea::make('note')
                            ->columnSpanFull(),
                    ])
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->groups([
                Group::make('status')
                    ->groupQueryUsing(fn (Builder $query) => $query->groupBy('status'))
                    ->collapsible(),
            ])
            ->columns([
                TextColumn::make('title')
                    ->searchable()
                    ->limit(50)
                    ->toggleable(isToggledHiddenByDefault: false),
                TextColumn::make('lead.title')
                    ->numeric()
                    ->limit(50)
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: false),
                TextColumn::make('company_id')
                    ->numeric()
                    ->formatStateUsing(fn (Model $record): string => Company::find($record->company_id)->name)
                    ->badge()
                    ->label('Entreprise')
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: false),
                TextColumn::make('status')
                    ->label('Statut')
                    ->badge()
                    ->searchable()
                    ->toggleable(isToggledHiddenByDefault: false),
                TextColumn::make('deal_value')
                    ->numeric()
                    ->money('eur')
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: false),
                TextColumn::make('actual_deal_value')
                    ->numeric()
                    ->money('eur')
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: false),
                TextColumn::make('start_date')
                    ->date()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: false),
                TextColumn::make('signature_date')
                    ->date()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: false),
                TextColumn::make('created_at')
                    ->dateTime()
                    ->label('Crée le')
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                TextColumn::make('updated_at')
                    ->dateTime()
                    ->label('Modifié le')
                    ->placeholder('Jamais')
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                TextColumn::make('deleted_at')
                    ->dateTime()
                    ->label('Supprimé le')
                    ->placeholder('Jamais')
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                Tables\Filters\TrashedFilter::make(),
            ])
            ->actions([
                Tables\Actions\ViewAction::make(),
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                    Tables\Actions\ForceDeleteBulkAction::make(),
                    Tables\Actions\RestoreBulkAction::make(),
                ]),
            ])
            ->emptyStateActions([
                Tables\Actions\CreateAction::make(),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListDeals::route('/'),
            'create' => Pages\CreateDeal::route('/create'),
            'view' => Pages\ViewDeal::route('/{record}'),
            'edit' => Pages\EditDeal::route('/{record}/edit'),
        ];
    }

    public static function getEloquentQuery(): Builder
    {
        return parent::getEloquentQuery()
            ->withoutGlobalScopes([
                SoftDeletingScope::class,
            ]);
    }
}
