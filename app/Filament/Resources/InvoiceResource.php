<?php

namespace App\Filament\Resources;

use App\Filament\Resources\InvoiceResource\Pages;
use App\Filament\Resources\InvoiceResource\RelationManagers;
use App\Models\Invoice;
use Carbon\Carbon;
use Closure;
use Filament\Forms;
use Filament\Forms\Components\Card;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Tabs;
use Filament\Forms\Components\Tabs\Tab;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class InvoiceResource extends Resource
{
    protected static ?string $model = Invoice::class;
    protected static ?string $navigationIcon = 'heroicon-o-collection';
    protected static ?string $label = 'Facture émise';
    protected static ?string $pluralLabel = 'Factures émises';
    protected static ?string $navigationLabel = 'Factures émises';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Card::make()
                    ->schema([
                        TextInput::make('reference')
                            ->label("Numéro de facture")
                            ->disabled()
                            ->default(fn (): string => Invoice::generateReference())
                            ->required(),
                        TextInput::make('vcs')
                            ->label("Communication structurée")
                            ->disabled()
                            ->default(fn (): string => Invoice::generateVCS())
                            ->required(),
                        DatePicker::make('issue_date')
                            ->label("Date d'émission")
                            ->minDate(Carbon::now()->format('Y-m-d'))
                            ->default(Carbon::now()->format('Y-m-d'))
                            ->displayFormat('d/m/Y')
                            ->required(),
                        Select::make('company_id')
                            ->label("Entreprise")
                            ->relationship('company', 'name')
                            ->searchable()
                            ->required(),
                        DatePicker::make('due_date')
                            ->label("Date d'échéance")
                            ->minDate(Carbon::now()->addDay(30)->format('Y-m-d'))
                            ->default(Carbon::now()->addDay(30)->format('Y-m-d'))
                            ->displayFormat('d/m/Y')
                            ->required(),
                        TextInput::make('tax_rate')
                            ->label("Taux TVA")
                            ->numeric()
                            ->default(21)
                            ->suffix('%')
                            ->required(),
                    ])->columns(2),
                Tabs::make('Facturation')
                    ->tabs([
                        Tab::make('Service')
                            ->schema([
                                Repeater::make('items')
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
                                    ])->columns(2),
                            ]),
                        Tab::make('Réductions')
                            ->schema([
                                Repeater::make('discounts')
                                    ->defaultItems(0)
                                    ->createItemButtonLabel('Ajouter une réduction')
                                    ->relationship()
                                    ->label('')
                                    ->schema([
                                        Toggle::make('is_percentage')
                                            ->label('En pourcentage')
                                            ->reactive()
                                            ->columnSpan(2),
                                        TextInput::make('description')
                                            ->required(),
                                        TextInput::make('amount')
                                            ->label('Montant')
                                            ->required()
                                            ->numeric()
                                            ->suffix(fn (Closure $get) => $get('is_percentage') ? '%' : '€')
                                    ])->columns(2)
                            ])
                    ])->columnSpanFull(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('reference')
                    ->label('Référence'),
                TextColumn::make('company.name')
                    ->label('Entreprise')
                    ->limit(20),
                TextColumn::make('issue_date')
                    ->label("Date d'émission")
                    ->dateTime('d/m/Y'),
                TextColumn::make('due_date')
                    ->label("Date d'échéance")
                    ->dateTime('d/m/Y'),
                TextColumn::make('total_excl_tax')
                    ->label('Total HT')
                    ->suffix(' €')
                    ->getStateUsing(fn (Model $record): float => $record->getTotalExcludingTax()),
                TextColumn::make('total_incl_tax')
                    ->label('Total TTC')
                    ->suffix(' €')
                    ->getStateUsing(fn (Model $record): float => $record->getTotalIncludingTax()),
                TextColumn::make('updated_at')
                    ->getStateUsing(function (Model $record): string {
                        return Carbon::parse($record->updated_at)->diffForHumans();
                    })
                    ->label('Dernière modification'),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\DeleteBulkAction::make()
                    ->modalHeading("Supprimer la sélection de factures"),
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
            'index' => Pages\ListInvoices::route('/'),
            'create' => Pages\CreateInvoice::route('/create'),
            'edit' => Pages\EditInvoice::route('/{record}/edit'),
        ];
    }
}
