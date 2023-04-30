<?php

namespace App\Filament\Resources;

use App\Filament\Resources\CompanyResource\Pages;
use App\Models\Company;
use Carbon\Carbon;
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
                            ->label('Nom')
                            ->required(),
                        TextInput::make('vat_number')
                            ->label('Numéro de TVA')
                            ->required(),
                        Select::make('legal_form')
                            ->label('Forme légale')
                            ->options([
                                'sa' => 'SA (Société Anonyme)',
                                'sas' => 'SAS (Société par Actions Simplifiée)',
                                'snc' => 'SNC (Société en Nom Collectif)',
                                'scs' => 'SCS (Société en Commandite Simple)',
                                'scop' => 'SCOP (Société Coopérative et Participative)',
                                'scm' => 'SCM (Société Civile de Moyens)',
                                'selarl' => "SELARL (Société d'Exercice Libéral à Responsabilité Limitée)",
                                'sci' => 'SCI (Société Civile Immobilière)',
                                'eurl' => 'EURL (Entreprise Unipersonnelle à Responsabilité Limitée)',
                                'sasu' => 'SASU (Société par Actions Simplifiée Unipersonnelle)',
                                'sep' => 'SEP (Société en Participation)',
                                'selas' => "SELAS (Société d'Exercice Libéral par Actions Simplifiée)",
                                'selafa' => "SELAFA (Société d'Exercice Libéral à Forme Anonyme)",
                                'sem' => "SEM (Société d'Economie Mixte)",
                                'sca' => 'SCA (Société en Commandite par Actions)',
                                'srl' => 'SRL (Société à Responsabilité Limitée)',
                                'sarl' => 'SARL (Société à Responsabilité Limitée)',
                                'sprl' => 'SPRL (Société Privée à Responsabilité Limitée)',
                            ])
                            ->searchable()
                            ->required(),
                    ])->columns(3),
                Card::make()
                    ->relationship('address')
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
                                'germany' => 'Allemagne',
                                'austria' => 'Autriche',
                                'belgium' => 'Belgique',
                                'bulgaria' => 'Bulgarie',
                                'cyprus' => 'Chypre',
                                'croatia' => 'Croatie',
                                'denmark' => 'Danemark',
                                'spain' => 'Espagne',
                                'estonia' => 'Estonie',
                                'finland' => 'Finlande',
                                'france' => 'France',
                                'greece' => 'Grèce',
                                'hungary' => 'Hongrie',
                                'ireland' => 'Irlande',
                                'italy' => 'Italie',
                                'latvia' => 'Lettonie',
                                'lithuania' => 'Lituanie',
                                'luxembourg' => 'Luxembourg',
                                'malta' => 'Malte',
                                'netherlands' => 'Pays-Bas',
                                'poland' => 'Pologne',
                                'portugal' => 'Portugal',
                                'romania' => 'Roumanie',
                                'slovakia' => 'Slovaquie',
                                'slovenia' => 'Slovénie',
                                'sweden' => 'Suède',
                                'czech_republic' => 'Tchéquie',
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
                    ->label('Forme légale'),
                TextColumn::make('vat_number')
                    ->label('Numéro de TVA'),
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
                    ->modalHeading("Supprimer la sélection d'entreprises"),
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
            'index' => Pages\ListCompanies::route('/'),
            'create' => Pages\CreateCompany::route('/create'),
            'edit' => Pages\EditCompany::route('/{record}/edit'),
        ];
    }
}
