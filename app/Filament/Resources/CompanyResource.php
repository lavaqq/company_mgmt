<?php

namespace App\Filament\Resources;

use App\Filament\Resources\CompanyResource\Pages;
use App\Models\Company;
use Carbon\Carbon;
use Closure;
use Filament\Forms;
use Filament\Tables\Filters\Filter;
use Illuminate\Database\Eloquent\Builder;
use Filament\Forms\Components\Card;
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
                                'AT',
                                'BE',
                                'BG',
                                'CY',
                                'CZ',
                                'DE',
                                'DK',
                                'EE',
                                'EL',
                                'ES',
                                'FI',
                                'FR',
                                'HR',
                                'HU',
                                'IE',
                                'IT',
                                'LT',
                                'LU',
                                'LV',
                                'MT',
                                'NL',
                                'PL',
                                'PT',
                                'RO',
                                'SE',
                                'SI',
                                'SK',
                                'XI',
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
                                'Allemagne',
                                'Autriche',
                                'Belgique',
                                'Bulgarie',
                                'Chypre',
                                'Croatie',
                                'Danemark',
                                'Espagne',
                                'Estonie',
                                'Finlande',
                                'France',
                                'Grèce',
                                'Hongrie',
                                'Irlande',
                                'Italie',
                                'Lettonie',
                                'Lituanie',
                                'Luxembourg',
                                'Malte',
                                'Pays-Bas',
                                'Pologne',
                                'Portugal',
                                'Roumanie',
                                'Slovaquie',
                                'Slovénie',
                                'Suède',
                                'Tchéquie',
                            ])
                            ->searchable()
                            ->required(),
                    ])->columns(2),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('name')
                    ->label('Nom')
                    ->limit(20),
                BadgeColumn::make('legal_form')
                    ->label('Forme légale')
                    ->extraAttributes(['class' => 'uppercase']),
                TextColumn::make('vat_number')
                    ->label('Numéro de TVA'),
                TextColumn::make('updated_at')
                    ->getStateUsing(function (Model $record): string {
                        return Carbon::parse($record->updated_at)->diffForHumans();
                    })
                    ->label('Dernière modification'),
            ])
            ->actions([
                Tables\Actions\EditAction::make()
                    ->label(''),
                Tables\Actions\DeleteAction::make()
                    ->modalHeading(function (Model $record): string {
                        return "Supprimer : " . $record->name;
                    })
                    ->label(''),
            ])
            ->bulkActions([
                Tables\Actions\DeleteBulkAction::make()
                    ->modalHeading("Supprimer la sélection d'entreprises"),
            ]);
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
