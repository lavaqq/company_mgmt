<?php

namespace App\Filament\Resources;

use App\Filament\Resources\InvoiceResource\Pages;
use App\Filament\Resources\InvoiceResource\RelationManagers;
use App\Models\Invoice;
use Closure;
use Filament\Forms;
use Filament\Tables\Actions\Action;
use Filament\Forms\Components\Card;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\Hidden;
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
    protected static ?string $navigationIcon = 'heroicon-o-document-text';
    protected static ?string $navigationGroup = 'Comptabilité';
    protected static ?string $label = 'Facture';
    protected static ?string $pluralLabel = 'Factures';
    protected static ?string $navigationLabel = 'Factures';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Card::make()
                    ->schema([
                        TextInput::make('invoice_number')
                            ->label("Numéro de facture")
                            ->default(Invoice::genInvoiceNum())
                            ->disabled()
                            ->required(),
                        TextInput::make('vcs')
                            ->label("Communication structurée")
                            ->default(Invoice::genVCS())
                            ->disabled()
                            ->required(),
                        DatePicker::make('issue_date')
                            ->label("Date d'émission")
                            ->minDate(now()->subDays(1))
                            ->default(now())
                            ->displayFormat('d/m/Y')
                            ->required(),
                        Select::make('company_id')
                            ->label("Entreprise")
                            ->relationship('company', 'name')
                            ->searchable()
                            ->required(),
                        DatePicker::make('due_date')
                            ->label("Date d'échéance")
                            ->minDate(now()->addDays(29))
                            ->default(now()->addDays(30))
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
                                Repeater::make('InvoiceItems')
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
                                Repeater::make('InvoiceDiscounts')
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
                TextColumn::make('invoice_number')
                    ->sortable()
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
                    ->getStateUsing(function (Model $record): float {
                        return $record->getTotalExclTax();
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
                Action::make('View PDF')
                    ->label('PDF')
                    ->icon('heroicon-o-eye')
                    ->url(fn ($record) => route('invoice.pdf', ['id' => $record->id]))
                    ->openUrlInNewTab(),
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
            'index' => Pages\ListInvoices::route('/'),
            'create' => Pages\CreateInvoice::route('/create'),
            'edit' => Pages\EditInvoice::route('/{record}/edit'),
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
