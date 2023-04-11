<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ReccurringInvoiceResource\Pages;
use App\Models\ReccurringInvoice;
use Closure;
use Filament\Forms\Components\Card;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\Hidden;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use Filament\Tables\Columns\BadgeColumn;
use Filament\Tables\Columns\TextColumn;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class ReccurringInvoiceResource extends Resource
{
    protected static ?string $model = ReccurringInvoice::class;
    protected static ?string $navigationIcon = 'heroicon-o-refresh';
    protected static ?string $navigationGroup = 'Comptabilité';
    protected static ?string $label = 'Facture récurrente';
    protected static ?string $pluralLabel = 'Factures récurrentes';
    protected static ?string $navigationLabel = 'Factures récurrentes';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Card::make()
                    ->schema([
                        TextInput::make('title')
                            ->label("Titre")
                            ->hint("Uniquement à titre indicatif")
                            ->required()
                            ->columnSpanFull(),
                        Card::make()
                            ->schema([
                                Select::make('company_id')
                                    ->label("Entreprise")
                                    ->relationship('company', 'name')
                                    ->searchable()
                                    ->required(),
                                TextInput::make('tax_rate')
                                    ->label("Taux TVA")
                                    ->numeric()
                                    ->default(21)
                                    ->suffix('%')
                                    ->required(),
                            ])->columnSpan(1),
                        Card::make()
                            ->schema([
                                Toggle::make('is_indefinite_duration')
                                    ->label('Durée indéfinie')
                                    ->reactive(),
                                DatePicker::make('start_date')
                                    ->label("Date de début")
                                    ->displayFormat('d/m/Y')
                                    ->reactive()
                                    ->required(),
                                DatePicker::make('end_date')
                                    ->label("Date de fin")
                                    ->displayFormat('d/m/Y')
                                    ->minDate(fn (Closure $get) => $get('start_date') ? $get('start_date') : null)
                                    ->required()
                                    ->hidden(fn (Closure $get) => $get('is_indefinite_duration')),
                                Select::make('frequency')
                                    ->label('Fréquence')
                                    ->options([
                                        'weekly' => 'Hebdomadaire',
                                        'monthly' => 'Mensuel',
                                        'quarterly' => 'Trimestrielle',
                                        'yearly' => 'Annuel',
                                    ])
                                    ->required(),
                            ])->columnSpan(1),
                    ])->columns(2),
                Card::make()
                    ->schema([
                        Repeater::make('ReccurringInvoiceItems')
                            ->defaultItems(0)
                            ->createItemButtonLabel('Ajouter un service')
                            ->relationship()
                            ->label('')
                            ->schema([
                                TextInput::make('description')
                                    ->required(),
                                TextInput::make('amount')
                                    ->label('Montant')
                                    ->numeric()
                                    ->suffix('€')
                                    ->required()
                            ])->columns(2)
                    ])->columnSpanFull(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('title')
                    ->label('Titre')
                    ->limit(50),
                TextColumn::make('company.name')
                    ->label('Entreprise'),
                TextColumn::make('start_date')
                    ->label("Date de début")
                    ->dateTime('d/m/Y'),
                TextColumn::make('end_date')
                    ->label("Date de fin")
                    ->dateTime('d/m/Y'),
                BadgeColumn::make('frequency')
                    ->label('Fréquence')
                    ->enum([
                        'weekly' => 'Hebdomadaire',
                        'monthly' => 'Mensuel',
                        'quarterly' => 'Trimestrielle',
                        'yearly' => 'Annuel',
                    ]),
                TextColumn::make('total_excl_tax')
                    ->label('Total HT')
                    ->suffix(' €')
                    ->getStateUsing(function (Model $record): float {
                        return $record->getTotalExclTax();
                    }),
                TextColumn::make('total_tax')
                    ->label('TVA')
                    ->suffix(' €')
                    ->getStateUsing(function (Model $record): float {
                        return $record->getTotalTax();
                    }),
                TextColumn::make('total_incl_tax')
                    ->label('Total TTC')
                    ->suffix(' €')
                    ->getStateUsing(function (Model $record): float {
                        return $record->getTotalInclTax();
                    }),
            ])
            ->filters([
                Tables\Filters\TrashedFilter::make(),
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\DeleteBulkAction::make(),
                Tables\Actions\ForceDeleteBulkAction::make(),
                Tables\Actions\RestoreBulkAction::make(),
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
            'index' => Pages\ListReccurringInvoices::route('/'),
            'create' => Pages\CreateReccurringInvoice::route('/create'),
            'edit' => Pages\EditReccurringInvoice::route('/{record}/edit'),
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
