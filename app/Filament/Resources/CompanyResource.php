<?php

namespace App\Filament\Resources;

use App\Filament\Resources\CompanyResource\Pages;
use App\Models\Company;
use Filament\Forms\Components\Card;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use Filament\Tables\Columns\BadgeColumn;
use Filament\Tables\Columns\TextColumn;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class CompanyResource extends Resource
{
    protected static ?string $model = Company::class;

    protected static ?string $navigationIcon = 'heroicon-o-briefcase';

    protected static ?string $navigationGroup = 'Répertoire';

    protected static ?string $label = 'Entreprise';

    protected static ?string $pluralLabel = 'Entreprises';

    protected static ?string $navigationLabel = 'Entreprises';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Card::make()
                    ->schema([
                        TextInput::make('name')
                            ->label('Dénomination sociale')
                            ->required(),
                        Select::make('legal_form')
                            ->label('Forme légale')
                            ->options([
                                'SA' => 'SA (Société Anonyme)',
                                'SAS' => 'SAS (Société par Actions Simplifiée)',
                                'SNC' => 'SNC (Société en Nom Collectif)',
                                'SCS' => 'SCS (Société en Commandite Simple)',
                                'SCOP' => 'SCOP (Société Coopérative et Participative)',
                                'SCM' => 'SCM (Société Civile de Moyens)',
                                'SELARL' => "SELARL (Société d'Exercice Libéral à Responsabilité Limitée)",
                                'SCI' => 'SCI (Société Civile Immobilière)',
                                'EURL' => 'EURL (Entreprise Unipersonnelle à Responsabilité Limitée)',
                                'SASU' => 'SASU (Société par Actions Simplifiée Unipersonnelle)',
                                'SEP' => 'SEP (Société en Participation)',
                                'SELAS' => "SELAS (Société d'Exercice Libéral par Actions Simplifiée)",
                                'SELAFA' => "SELAFA (Société d'Exercice Libéral à Forme Anonyme)",
                                'SEM' => "SEM (Société d'Economie Mixte)",
                                'SCA' => 'SCA (Société en Commandite par Actions)',
                                'SRL' => 'SRL (Société à Responsabilité Limitée)',
                                'SARL' => 'SARL (Société à Responsabilité Limitée)',
                                'SPRL' => 'SPRL (Société Privée à Responsabilité Limitée)',
                                'INDÉPENDANT' => 'Indépendant',
                            ])
                            ->searchable()
                            ->required(),
                        Select::make('vat_country_code')
                            ->label('Code pays (géonomenclature)')
                            ->options([
                                'AT' => 'AT',
                                'BE' => 'BE',
                                'BG' => 'BG',
                                'CY' => 'CY',
                                'CZ' => 'CZ',
                                'DE' => 'DE',
                                'DK' => 'DK',
                                'EE' => 'EE',
                                'EL' => 'EL',
                                'ES' => 'ES',
                                'FI' => 'FI',
                                'FR' => 'FR',
                                'HR' => 'HR',
                                'HU' => 'HU',
                                'IE' => 'IE',
                                'IT' => 'IT',
                                'LT' => 'LT',
                                'LU' => 'LU',
                                'LV' => 'LV',
                                'MT' => 'MT',
                                'NL' => 'NL',
                                'PL' => 'PL',
                                'PT' => 'PT',
                                'RO' => 'RO',
                                'SE' => 'SE',
                                'SI' => 'SI',
                                'SK' => 'SK',
                                'XI' => 'XI',
                            ])
                            ->searchable()
                            ->required(),
                        TextInput::make('vat_number')
                            ->label('Numéro de TVA')
                            ->numeric()
                            ->required(),
                    ])->columns(2),
                Card::make()
                    ->schema([
                        TextInput::make('street')
                            ->label('Rue')
                            ->required(),
                        TextInput::make('zipcode')
                            ->label('Code postal')
                            ->numeric()
                            ->required(),
                        TextInput::make('number')
                            ->label('Numéro')
                            ->numeric()
                            ->required(),
                        TextInput::make('city')
                            ->label('Ville')
                            ->required(),
                        TextInput::make('box')
                            ->label('Boîte'),
                        Select::make('country')
                            ->label('Pays')
                            ->options([
                                'Allemagne' => 'Allemagne',
                                'Autriche' => 'Autriche',
                                'Belgique' => 'Belgique',
                                'Bulgarie' => 'Bulgarie',
                                'Chypre' => 'Chypre',
                                'Croatie' => 'Croatie',
                                'Danemark' => 'Danemark',
                                'Espagne' => 'Espagne',
                                'Estonie' => 'Estonie',
                                'Finlande' => 'Finlande',
                                'France' => 'France',
                                'Grèce' => 'Grèce',
                                'Hongrie' => 'Hongrie',
                                'Irlande' => 'Irlande',
                                'Italie' => 'Italie',
                                'Lettonie' => 'Lettonie',
                                'Lituanie' => 'Lituanie',
                                'Luxembourg' => 'Luxembourg',
                                'Malte' => 'Malte',
                                'Pays-Bas' => 'Pays-Bas',
                                'Pologne' => 'Pologne',
                                'Portugal' => 'Portugal',
                                'Roumanie' => 'Roumanie',
                                'Slovaquie' => 'Slovaquie',
                                'Slovénie' => 'Slovénie',
                                'Suède' => 'Suède',
                                'Tchéquie' => 'Tchéquie',
                            ])
                            ->searchable()
                            ->required(),
                    ])->columns(2),
                Card::make()
                    ->schema([
                        Select::make('contacts')
                            ->label('Contact(s)')
                            ->multiple()
                            ->relationship('contacts', 'first_name')
                            ->preload()
                            ->columnSpan(1),
                    ])->columns(2),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('name')
                    ->label('Dénomination sociale')
                    ->searchable()
                    ->limit(20),
                TextColumn::make('vat_number')
                    ->label('Numéro de TVA')
                    ->searchable()
                    ->getStateUsing(function (Model $record): string {
                        return $record->vat_country_code.$record->vat_number;
                    }),
                BadgeColumn::make('legal_form')
                    ->label('Forme légale')
                    ->extraAttributes(['class' => 'uppercase']),
            ])
            ->filters([
                Tables\Filters\TrashedFilter::make(),
            ])
            ->actions([
                Tables\Actions\EditAction::make()
                    ->label(''),
                Tables\Actions\DeleteAction::make()
                    ->modalHeading(function (Model $record): string {
                        return 'Supprimer : '.$record->name;
                    })
                    ->label(''),
                Tables\Actions\ForceDeleteAction::make()
                    ->modalHeading(function (Model $record): string {
                        return 'Supprimer définitivement : '.$record->name;
                    })
                    ->label(''),
                Tables\Actions\RestoreAction::make()
                    ->modalHeading(function (Model $record): string {
                        return 'Restaurer : '.$record->name;
                    })
                    ->label(''),
            ])
            ->bulkActions([])
            ->poll('10s');
    }

    public static function getEloquentQuery(): Builder
    {
        return parent::getEloquentQuery()
            ->withoutGlobalScopes([
                SoftDeletingScope::class,
            ]);
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
}
