<?php

namespace App\Filament\Resources;

use App\Filament\Resources\EstimateResource\Pages;
use App\Models\Estimate;
use Carbon\Carbon;
use Closure;
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
use Illuminate\Database\Eloquent\Model;

class EstimateResource extends Resource
{
    protected static ?string $model = Estimate::class;

    protected static ?string $navigationIcon = 'heroicon-o-collection';

    protected static ?string $navigationGroup = 'Administratifs';

    protected static ?string $label = 'Devis émis';

    protected static ?string $pluralLabel = 'Devis émis';

    protected static ?string $navigationLabel = 'Devis émis';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Card::make()
                    ->schema([
                        Toggle::make('no_prepayment')
                            ->label("Pas d'acompte")
                            ->columnSpanFull(),
                        Select::make('company_id')
                            ->label('Entreprise')
                            ->relationship('company', 'name')
                            ->preload()
                            ->placeholder('Sélectionnez une entreprise')
                            ->required(),
                        DatePicker::make('issue_date')
                            ->label("Date d'émission")
                            ->minDate(Carbon::now()->format('Y-m-d'))
                            ->default(Carbon::now()->format('Y-m-d'))
                            ->displayFormat('d/m/Y')
                            ->required(),
                        TextInput::make('reference')
                            ->label('Numéro de facture')
                            ->default(fn (): string => 'D-' . str_pad(Estimate::count() + 1, 4, '0', STR_PAD_LEFT))
                            ->disabled()
                            ->required(),
                        TextInput::make('tax_rate')
                            ->label('Taux TVA')
                            ->numeric()
                            ->default(21)
                            ->suffix('%')
                            ->required(),
                        TextInput::make('deadline')
                            ->hint('Uniquement chiffre et indicateur (jours, mois, ...) | Laisser vide si pas de délai.')
                            ->label('Délai de livraison/exécution')
                            ->columnSpan(2),
                    ])->columns(3),
                Tabs::make('Facturation')
                    ->tabs([
                        Tab::make('Services')
                            ->schema([
                                Repeater::make('items')
                                    ->defaultItems(0)
                                    ->createItemButtonLabel('Ajouter un service')
                                    ->relationship()
                                    ->label('')
                                    ->schema([
                                        TextInput::make('description')
                                            ->required()
                                            ->columnSpan(2),
                                        TextInput::make('amount')
                                            ->label('Montant')
                                            ->numeric()
                                            ->suffix('€')
                                            ->required(),
                                    ])->columns(3),
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
                                            ->columnSpan(3),
                                        TextInput::make('description')
                                            ->required()
                                            ->columnSpan(2),
                                        TextInput::make('amount')
                                            ->label('Montant')
                                            ->required()
                                            ->numeric()
                                            ->suffix(fn (Closure $get) => $get('is_percentage') ? '%' : '€'),
                                    ])->columns(3),
                            ]),
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
                TextColumn::make('total_excl_tax')
                    ->label('Total HT')
                    ->suffix(' €')
                    ->getStateUsing(fn (Model $record): float => $record->getTotalExcludingTax()),
                TextColumn::make('total_incl_tax')
                    ->label('Total TTC')
                    ->suffix(' €')
                    ->getStateUsing(fn (Model $record): float => $record->getTotalIncludingTax()),
            ])
            ->actions([
                Tables\Actions\Action::make('stream_pdf')
                    ->url(fn (Model $record): string => route('estimate.pdf.stream', $record))
                    ->icon('heroicon-o-eye')
                    ->label(''),
                Tables\Actions\Action::make('download_pdf')
                    ->url(fn (Model $record): string => route('estimate.pdf.download', $record))
                    ->icon('heroicon-o-download')
                    ->label(''),
                Tables\Actions\EditAction::make()
                    ->label(''),
                Tables\Actions\DeleteAction::make()
                    ->modalHeading(function (Model $record): string {
                        return 'Supprimer : ' . $record->reference;
                    })
                    ->label(''),
            ])
            ->bulkActions([]);
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListEstimates::route('/'),
            'create' => Pages\CreateEstimate::route('/create'),
            'edit' => Pages\EditEstimate::route('/{record}/edit'),
        ];
    }
}
