<?php

namespace App\Filament\Resources;

use App\Enums\Country;
use App\Enums\CountryCode;
use App\Enums\LegalForm;
use App\Filament\Resources\InvoiceResource\Pages;
use App\Filament\Resources\InvoiceResource\RelationManagers;
use Filament\Forms\Components\Repeater;
use App\Models\Invoice;
use Carbon\Carbon;
use Closure;
use Filament\Tables\Actions\Action;
use Filament\Forms;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\Fieldset;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Tabs;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Form;
use Filament\Forms\Get;
use Filament\Forms\Set;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class InvoiceResource extends Resource
{
    protected static ?string $model = Invoice::class;

    protected static ?string $navigationIcon = 'heroicon-o-document-text';

    protected static ?string $activeNavigationIcon = 'heroicon-s-document-text';

    protected static ?string $navigationLabel = 'Factures';

    protected static ?string $navigationGroup = 'Administratifs';

    protected static ?string $modelLabel = 'Facture';

    protected static ?string $pluralModelLabel = 'Factures';

    public static function generateVCS($dateValue): string
    {
        $reference = str_pad(38 + 1, 4, '0', STR_PAD_LEFT);
        $date = Carbon::parse($dateValue)->format('dmy');
        $sequence = $reference . $date;
        $verificationNumber = str_pad((intval($sequence) % 97 ?: 97), 2, '0', STR_PAD_LEFT);
        $vcs = $sequence . $verificationNumber;

        return '+++ ' . substr($vcs, 0, 3) . ' / ' . substr($vcs, 3, 4) . ' / ' . substr($vcs, 7) . ' +++';
    }

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Fieldset::make('Entreprise')
                    ->schema([
                        TextInput::make('name')
                            ->label('Dénomination sociale')
                            ->required(),
                        Select::make('legal_form')
                            ->label('Forme légale')
                            ->options(LegalForm::class)
                            ->searchable(),
                        Select::make('vat_country_code')
                            ->label('Code pays (géonomenclature)')
                            ->options(CountryCode::class)
                            ->searchable(),
                        TextInput::make('vat_number')
                            ->label('Numéro de TVA')
                            ->numeric(),
                        TextInput::make('street')
                            ->label('Rue'),
                        TextInput::make('zipcode')
                            ->label('Code postal')
                            ->numeric(),
                        TextInput::make('number')
                            ->label('Numéro')
                            ->numeric(),
                        TextInput::make('city')
                            ->label('Ville'),
                        TextInput::make('box')
                            ->label('Boîte'),
                        Select::make('country')
                            ->label('Pays')
                            ->options(Country::class)->searchable(),
                    ])->columns(2),
                Fieldset::make('Facturation')
                    ->schema([
                        TextInput::make('reference')
                            ->label('Numéro de facture')
                            ->default(fn (): string => 'LS-' . str_pad(38 + 1, 4, '0', STR_PAD_LEFT))
                            // ->disabled()
                            ->dehydrated()
                            ->required(),
                        TextInput::make('vcs')
                            ->label('Communication structurée')
                            ->disabled()
                            ->dehydrated()
                            ->default(fn (Get $get) => self::generateVCS($get('issue_date'))),
                        DatePicker::make('issue_date')
                            ->label("Date d'émission")
                            ->default(now())
                            ->afterStateUpdated(function (Set $set, ?string $state) {
                                $set('vcs', self::generateVCS($state));
                            })
                            ->displayFormat('d/m/Y')
                            ->live()
                            ->required(),
                        DatePicker::make('due_date')
                            ->label("Date d'échéance")
                            ->default(now()->addMonth())
                            ->required(),
                        TextInput::make('tax_rate')
                            ->label('Taux TVA')
                            ->required()
                            ->default(21)
                            ->suffix('%')
                            ->numeric(),
                    ]),
                Tabs::make('')
                    ->tabs([
                        Tabs\Tab::make('Services')
                            ->schema([
                                Repeater::make('items')
                                    ->relationship('items')
                                    ->schema([
                                        TextInput::make('description')
                                            ->columnSpan(2)
                                            ->required(),
                                        TextInput::make('amount')
                                            ->label('Montant')
                                            ->numeric()
                                            ->suffix('€')
                                            ->required(),
                                    ])
                                    ->defaultItems(0)
                                    ->addActionLabel('Ajouter un service')
                                    ->label('')
                                    ->reorderable(false)
                                    ->columns(3),
                            ]),
                        Tabs\Tab::make('Réductions')
                            ->schema([
                                Repeater::make('discounts')
                                    ->relationship('discounts')
                                    ->schema([
                                        Toggle::make('is_percentage')
                                            ->label('En pourcentage')
                                            ->live()
                                            ->columnSpan(3),
                                        TextInput::make('description')
                                            ->required()
                                            ->columnSpan(2),
                                        TextInput::make('amount')
                                            ->label('Montant')
                                            ->required()
                                            ->numeric()
                                            ->suffix(fn (Get $get) => $get('is_percentage') ? '%' : '€'),
                                    ])
                                    ->defaultItems(0)
                                    ->addActionLabel('Ajouter une réduction')
                                    ->label('')
                                    ->reorderable(false)
                                    ->columns(2),
                            ]),
                    ])->columnSpanFull(),
                FileUpload::make('attachment_path')
                    ->label('Fichier')
                    ->hint('Uniquement si généré hors app.'),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->emptyStateHeading('Aucune facture')
            ->emptyStateDescription('')
            ->emptyStateIcon('heroicon-o-document-text')
            ->defaultSort('reference', 'desc')
            ->columns([
                TextColumn::make('reference')
                    ->label('Référence')
                    ->sortable()
                    ->searchable(),
                TextColumn::make('name')
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
            ])
            ->filters([
                Tables\Filters\TrashedFilter::make(),
            ])
            ->actions([
                Tables\Actions\EditAction::make()
                    ->label(''),
                Tables\Actions\DeleteAction::make()
                    ->label(''),
                Action::make('show_pdf')
                    ->url(fn (Invoice $record): string => route('invoice.pdf', $record))
                    ->openUrlInNewTab()
                    ->icon('heroicon-o-eye')
                    ->label(''),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                    Tables\Actions\ForceDeleteBulkAction::make(),
                    Tables\Actions\RestoreBulkAction::make(),
                ]),
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
