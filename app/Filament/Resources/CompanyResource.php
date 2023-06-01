<?php

namespace App\Filament\Resources;

use App\Filament\Resources\CompanyResource\Pages;
use App\Models\Company;
use Carbon\Carbon;
use Filament\Forms\Components\Card;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use Filament\Tables\Columns\BadgeColumn;
use Filament\Tables\Columns\TextColumn;
use Illuminate\Database\Eloquent\Model;

class CompanyResource extends Resource
{
    protected static ?string $model = Company::class;

    protected static ?string $navigationIcon = 'heroicon-o-collection';

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
                            ])
                            ->searchable()
                            ->required(),
                        Select::make('country_code')
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
                        RichEditor::make('note')
                            ->disableToolbarButtons([
                                'attachFiles',
                            ])
                            ->columnSpanFull(),
                    ]),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('name')
                    ->label('Dénomination sociale')
                    ->limit(20),
                TextColumn::make('vat_number')
                    ->label('Numéro de TVA')
                    ->getStateUsing(function (Model $record): string {
                        return $record->country_code . $record->vat_number;
                    }),
                BadgeColumn::make('legal_form')
                    ->label('Forme légale')
                    ->extraAttributes(['class' => 'uppercase']),
            ])
            ->actions([
                Tables\Actions\EditAction::make()
                    ->label(''),
                Tables\Actions\DeleteAction::make()
                    ->modalHeading(function (Model $record): string {
                        return 'Supprimer : ' . $record->name;
                    })
                    ->label(''),
            ])
            ->bulkActions([])
            ->poll('30s');
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListCompanies::route('/'),
            'create' => Pages\CreateCompany::route('/create'),
            'edit' => Pages\EditCompany::route('/{record}/edit'),
        ];
    }
}
