<?php

namespace App\Filament\Resources;

use App\Filament\Resources\InvoiceResource\Pages;
use App\Filament\Resources\InvoiceResource\Pages\CreateInvoice;
use App\Filament\Resources\InvoiceResource\Pages\EditInvoice;
use App\Models\Invoice;
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

class InvoiceResource extends Resource
{
    protected static ?string $model = Invoice::class;

    protected static ?string $navigationIcon = 'heroicon-o-document-text';

    protected static ?string $navigationGroup = 'Administratifs';

    protected static ?string $label = 'Facture émise';

    protected static ?string $pluralLabel = 'Factures émises';

    protected static ?string $navigationLabel = 'Factures émises';

    public static function generateVcs($dateValue): string
    {
        $reference = str_pad(Invoice::count() + 1, 4, '0', STR_PAD_LEFT);
        $date = Carbon::parse($dateValue)->format('dmy');
        $sequence = $reference.$date;
        $verificationNumber = str_pad((intval($sequence) % 97 ?: 97), 2, '0', STR_PAD_LEFT);
        $vcs = $sequence.$verificationNumber;

        return '+++ '.substr($vcs, 0, 3).' / '.substr($vcs, 3, 4).' / '.substr($vcs, 7).' +++';
    }

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
                            'paid' => 'Payée',
                            'cancelled' => 'Annulée',
                        ];
                        if (Auth::user()->is_admin) {
                            return $statuses;
                        }
                        if ($livewire instanceof CreateInvoice) {
                            return $statuses;
                        }
                        if ($livewire instanceof EditInvoice) {
                            switch ($record->status) {
                                case 'creation':
                                    return $statuses;
                                case 'pending':
                                    return [
                                        'pending' => $statuses['pending'],
                                        'paid' => $statuses['paid'],
                                        'cancelled' => $statuses['cancelled'],
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
                        Select::make('company_id')
                            ->disabled(static function (Model|null $record, Page $livewire) {
                                if (Auth::user()->is_admin) {
                                    return false;
                                }
                                if ($livewire instanceof CreateInvoice) {
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
                                if ($livewire instanceof CreateInvoice) {
                                    return false;
                                }
                                if ($record->status != 'creation') {
                                    return true;
                                }

                                return false;
                            })
                            ->label("Date d'émission")
                            ->displayFormat('d/m/Y')
                            ->minDate(static fn (Page $livewire) => $livewire instanceof CreateInvoice ? now()->subDay() : null)
                            ->default(now())
                            ->reactive()
                            ->afterStateUpdated(function (Closure $set, $state) {
                                $set('vcs', self::generateVcs($state));
                            })
                            ->required(),
                        DatePicker::make('due_date')
                            ->disabled(static function (Model|null $record, Page $livewire) {
                                if (Auth::user()->is_admin) {
                                    return false;
                                }
                                if ($livewire instanceof CreateInvoice) {
                                    return false;
                                }
                                if ($record->status != 'creation') {
                                    return true;
                                }

                                return false;
                            })
                            ->label("Date d'échéance")
                            ->displayFormat('d/m/Y')
                            ->default(now()->addMonth())
                            ->disabled()
                            ->required(),
                        TextInput::make('reference')
                            ->disabled(static function (Model|null $record, Page $livewire) {
                                if (Auth::user()->is_admin) {
                                    return false;
                                }
                                if ($livewire instanceof CreateInvoice) {
                                    return false;
                                }
                                if ($record->status != 'creation') {
                                    return true;
                                }

                                return false;
                            })
                            ->label('Numéro de facture')
                            ->default(fn (): string => 'LS-'.str_pad(Invoice::count() + 1, 4, '0', STR_PAD_LEFT))
                            ->disabled()
                            ->required(),
                        TextInput::make('vcs')
                            ->disabled(static function (Model|null $record, Page $livewire) {
                                if (Auth::user()->is_admin) {
                                    return false;
                                }
                                if ($livewire instanceof CreateInvoice) {
                                    return false;
                                }
                                if ($record->status != 'creation') {
                                    return true;
                                }

                                return false;
                            })
                            ->label('Communication structurée')
                            ->default(function (Closure $get) {
                                return self::generateVcs($get('issue_date'));
                            })
                            ->disabled(! Auth::user()->is_admin),
                        TextInput::make('tax_rate')
                            ->disabled(static function (Model|null $record, Page $livewire) {
                                if (Auth::user()->is_admin) {
                                    return false;
                                }
                                if ($livewire instanceof CreateInvoice) {
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
                                        if ($livewire instanceof CreateInvoice) {
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
                                        if ($livewire instanceof CreateInvoice) {
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
                    ->label('Référence')
                    ->sortable()
                    ->searchable(),
                TextColumn::make('company.name')
                    ->label('Entreprise')
                    ->sortable()
                    ->searchable()
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
            ])
            ->filters([
                Tables\Filters\TrashedFilter::make(),
            ])
            ->actions([
                Tables\Actions\Action::make('stream_pdf')
                    ->url(fn (Model $record): string => route('invoice.pdf', $record))
                    ->openUrlInNewTab()
                    ->icon('heroicon-o-eye')
                    ->label(''),
                Tables\Actions\EditAction::make()
                    ->label(''),
                Tables\Actions\DeleteAction::make()
                    ->modalHeading(function (Model $record): string {
                        return 'Supprimer : '.$record->reference;
                    })
                    ->label(''),
                Tables\Actions\ForceDeleteAction::make()
                    ->modalHeading(function (Model $record): string {
                        return 'Supprimer définitivement : '.$record->reference;
                    })
                    ->label(''),
                Tables\Actions\RestoreAction::make()
                    ->modalHeading(function (Model $record): string {
                        return 'Restaurer : '.$record->reference;
                    })
                    ->label(''),
            ])
            ->bulkActions([
                Tables\Actions\DeleteBulkAction::make(),
                Tables\Actions\ForceDeleteBulkAction::make(),
                Tables\Actions\RestoreBulkAction::make(),
            ])
            ->poll('10s');
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
