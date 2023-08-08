<?php

namespace App\Filament\CRM\Resources;

use App\Enums\Country;
use App\Enums\CountryCode;
use App\Enums\LegalForm;
use App\Filament\CRM\Resources\CompanyResource\Pages;
use App\Models\Company;
use Filament\Forms\Components\Fieldset;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
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

class CompanyResource extends Resource
{
    protected static ?string $model = Company::class;

    protected static ?string $navigationIcon = 'heroicon-o-building-office-2';

    protected static ?string $activeNavigationIcon = 'heroicon-s-building-office-2';

    protected static ?string $navigationLabel = 'Entreprises';

    protected static ?string $navigationGroup = 'Répértoire';

    protected static ?string $modelLabel = 'Entreprise';

    protected static ?string $pluralModelLabel = 'Entreprises';

    public static function infolist(Infolist $infolist): Infolist
    {
        return $infolist
            ->schema([
                InfolistsFieldset::make('')
                    ->schema([
                        TextEntry::make('name'),
                        TextEntry::make('contacts')
                            ->formatStateUsing(fn (Model $state): string => $state->first_name.' '.$state->last_name)
                            ->bulleted(),
                    ]),
                InfolistsFieldset::make('Informations de facturation et contractuel')
                    ->schema([
                        TextEntry::make('legal_form')
                            ->formatStateUsing(fn (string $state): string => $state),
                        TextEntry::make('legal_form')
                            ->label('Forme légale'),
                        TextEntry::make('vat_country_code')
                            ->label('Code pays (géonomenclature)'),
                        TextEntry::make('vat_number')
                            ->label('Numéro de TVA'),
                        TextEntry::make('signatory')
                            ->label('Signataire'),
                        TextEntry::make('street')
                            ->label('Rue'),
                        TextEntry::make('zipcode')
                            ->label('Code postal'),
                        TextEntry::make('number')
                            ->label('Numéro'),
                        TextEntry::make('city')
                            ->label('Ville'),
                        TextEntry::make('box')
                            ->label('Boîte'),
                        TextEntry::make('country')
                            ->label('Pays'),
                    ]),
            ]);
    }

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Fieldset::make()
                    ->schema([
                        TextInput::make('name')
                            ->label('Dénomination sociale')
                            ->required(),
                        Select::make('contacts')
                            ->label('Contact(s)')
                            ->searchable(['first_name', 'last_name'])
                            ->multiple()
                            ->relationship(name: 'contacts', titleAttribute: 'first_name')
                            ->getOptionLabelFromRecordUsing(fn (Model $record) => "{$record->first_name} {$record->last_name}")
                            ->preload()
                            ->live()
                            ->columnSpan(1),
                    ])->columns(2),
                Fieldset::make('Informations de facturation et contractuel')
                    ->schema([
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
                        Select::make('signatory')
                            ->label('Signataire')
                            ->native(false)
                            ->placeholder('WIP (Soon)')
                            ->preload(),
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
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('name')
                    ->label('Dénomination sociale')
                    ->searchable(),
                TextColumn::make('legal_form')
                    ->label('Forme légale')
                    ->searchable(),
                TextColumn::make('vat_number')
                    ->label('Numéro de TVA')
                    ->searchable(),
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
                Tables\Actions\ViewAction::make()
                    ->label(''),
                Tables\Actions\EditAction::make()
                    ->label(''),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                    Tables\Actions\ForceDeleteBulkAction::make(),
                    Tables\Actions\RestoreBulkAction::make(),
                ]),
            ])
            ->emptyStateActions([]);
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
            'index' => Pages\ListCompanies::route('/'),
            'create' => Pages\CreateCompany::route('/create'),
            'view' => Pages\ViewCompany::route('/{record}'),
            'edit' => Pages\EditCompany::route('/{record}/edit'),
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
