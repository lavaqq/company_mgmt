<?php

namespace App\Filament\Resources;

use App\Filament\Resources\EstimateResource\Pages;
use App\Filament\Resources\EstimateResource\Pages\CreateEstimate;
use App\Filament\Resources\EstimateResource\Pages\EditEstimate;
use App\Models\Estimate;
use Closure;
use Filament\Forms\Components\Card;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Tabs;
use Filament\Forms\Components\Tabs\Tab;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Pages\Page;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use Filament\Tables\Columns\BadgeColumn;
use Filament\Tables\Columns\TextColumn;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Illuminate\Support\Facades\Auth;

class EstimateResource extends Resource
{
    protected static ?string $model = Estimate::class;

    protected static ?string $navigationIcon = 'heroicon-o-document-text';

    protected static ?string $navigationGroup = 'Administratifs';

    protected static ?string $label = 'Devis émis';

    protected static ?string $pluralLabel = 'Devis émis';

    protected static ?string $navigationLabel = 'Devis émis';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Select::make('status')
                    ->label('Statut')
                    ->options(static function (Page $livewire, Model|null $record) {
                        $statuses = [
                            'creation' => 'En création',
                            'pending' => 'En attente',
                            'signed' => 'Signé',
                            'refused' => 'Refusé',
                        ];
                        if (Auth::user()->is_admin) {
                            return $statuses;
                        }
                        if ($livewire instanceof CreateEstimate) {
                            return $statuses;
                        }
                        if ($livewire instanceof EditEstimate) {
                            switch ($record->status) {
                                case 'creation':
                                    return $statuses;
                                case 'pending':
                                    return [
                                        'pending' => $statuses['pending'],
                                        'signed' => $statuses['signed'],
                                        'refused' => $statuses['refused'],
                                    ];
                                default:
                                    return $statuses;
                            }
                        }
                    })
                    ->default('creation')
                    ->disablePlaceholderSelection(),
                Card::make()
                    ->schema([
                        Toggle::make('no_prepayment')
                            ->disabled(static function (Model|null $record, Page $livewire) {
                                if (Auth::user()->is_admin) {
                                    return false;
                                }
                                if ($livewire instanceof CreateEstimate) {
                                    return false;
                                }
                                if ($record->status != 'creation') {
                                    return true;
                                }

                                return false;
                            })
                            ->label("Pas d'acompte")
                            ->columnSpanFull(),
                        Select::make('company_id')
                            ->disabled(static function (Model|null $record, Page $livewire) {
                                if (Auth::user()->is_admin) {
                                    return false;
                                }
                                if ($livewire instanceof CreateEstimate) {
                                    return false;
                                }
                                if ($record->status != 'creation') {
                                    return true;
                                }

                                return false;
                            })
                            ->label('Entreprise')
                            ->relationship('company', 'name')
                            ->preload()
                            ->placeholder('Sélectionnez une entreprise')
                            ->required(),
                        DatePicker::make('issue_date')
                            ->disabled(static function (Model|null $record, Page $livewire) {
                                if (Auth::user()->is_admin) {
                                    return false;
                                }
                                if ($livewire instanceof CreateEstimate) {
                                    return false;
                                }
                                if ($record->status != 'creation') {
                                    return true;
                                }

                                return false;
                            })
                            ->label("Date d'émission")
                            ->minDate(static fn (Page $livewire) => $livewire instanceof CreateEstimate ? now() : null)
                            ->default(now())
                            ->displayFormat('d/m/Y')
                            ->required(),
                        TextInput::make('reference')
                            ->disabled(static function (Model|null $record, Page $livewire) {
                                if (Auth::user()->is_admin) {
                                    return false;
                                }
                                if ($livewire instanceof CreateEstimate) {
                                    return false;
                                }
                                if ($record->status != 'creation') {
                                    return true;
                                }

                                return false;
                            })
                            ->label('Numéro de facture')
                            ->default(fn (): string => 'D-'.str_pad(Estimate::count() + 21, 4, '0', STR_PAD_LEFT)) // need fix
                            ->disabled()
                            ->required(),
                        TextInput::make('tax_rate')
                            ->disabled(static function (Model|null $record, Page $livewire) {
                                if (Auth::user()->is_admin) {
                                    return false;
                                }
                                if ($livewire instanceof CreateEstimate) {
                                    return false;
                                }
                                if ($record->status != 'creation') {
                                    return true;
                                }

                                return false;
                            })
                            ->label('Taux TVA')
                            ->numeric()
                            ->default(21)
                            ->suffix('%')
                            ->required(),
                        TextInput::make('deadline')
                            ->disabled(static function (Model|null $record, Page $livewire) {
                                if (Auth::user()->is_admin) {
                                    return false;
                                }
                                if ($livewire instanceof CreateEstimate) {
                                    return false;
                                }
                                if ($record->status != 'creation') {
                                    return true;
                                }

                                return false;
                            })
                            ->hint('Uniquement chiffre et indicateur (jours, mois, ...) | Laisser vide si pas de délai.')
                            ->label('Délai de livraison/exécution')
                            ->columnSpan(2),
                    ])->columns(3),
                Tabs::make('Facturation')
                    ->tabs([
                        Tab::make('Services')
                            ->schema([
                                Repeater::make('items')
                                    ->disabled(static function (Model|null $record, Page $livewire) {
                                        if (Auth::user()->is_admin) {
                                            return false;
                                        }
                                        if ($livewire instanceof CreateEstimate) {
                                            return false;
                                        }
                                        if ($record->status != 'creation') {
                                            return true;
                                        }

                                        return false;
                                    })
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
                                    ->disabled(static function (Model|null $record, Page $livewire) {
                                        if (Auth::user()->is_admin) {
                                            return false;
                                        }
                                        if ($livewire instanceof CreateEstimate) {
                                            return false;
                                        }
                                        if ($record->status != 'creation') {
                                            return true;
                                        }

                                        return false;
                                    })
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
                    ->searchable()
                    ->sortable()
                    ->label('Référence'),
                TextColumn::make('company.name')
                    ->searchable()
                    ->sortable()
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
                        'pending' => 'En attente',
                        'signed' => 'Signé',
                        'refused' => 'Refusé',
                    ])
                    ->colors([
                        'secondary' => 'creation',
                        'warning' => 'pending',
                        'success' => 'signed',
                        'danger' => 'refused',
                    ]),
            ])
            ->filters([
                Tables\Filters\TrashedFilter::make(),
            ])
            ->actions([
                Tables\Actions\Action::make('stream_pdf')
                    ->url(fn (Model|null $record): string => route('estimate.pdf', $record))
                    ->openUrlInNewTab()
                    ->icon('heroicon-o-eye')
                    ->label(''),
                Tables\Actions\EditAction::make()
                    ->label(''),
                Tables\Actions\DeleteAction::make()
                    ->modalHeading(function (Model|null $record): string {
                        return 'Supprimer : '.$record->reference;
                    })
                    ->label(''),
                Tables\Actions\ForceDeleteAction::make()
                    ->modalHeading(function (Model|null $record): string {
                        return 'Supprimer définitivement : '.$record->reference;
                    })
                    ->label(''),
                Tables\Actions\RestoreAction::make()
                    ->modalHeading(function (Model|null $record): string {
                        return 'Restaurer : '.$record->reference;
                    })
                    ->label(''),
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
            'index' => Pages\ListEstimates::route('/'),
            'create' => Pages\CreateEstimate::route('/create'),
            'edit' => Pages\EditEstimate::route('/{record}/edit'),
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
