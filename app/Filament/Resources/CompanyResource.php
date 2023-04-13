<?php

namespace App\Filament\Resources;

use App\Filament\Resources\CompanyResource\Pages;
use App\Filament\Resources\CompanyResource\RelationManagers;
use App\Filament\Resources\CompanyResource\RelationManagers\AdressRelationManager;
use App\Models\Company;
use Filament\Forms;
use Filament\Forms\Components\Card;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Resources\Form;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class CompanyResource extends Resource
{
    protected static ?string $model = Company::class;
    protected static ?string $navigationIcon = 'heroicon-o-folder';
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
                            ->label('Forme légal')
                            ->options([
                                "SA" => "SA (Société Anonyme)",
                                "SAS" => "SAS (Société par Actions Simplifiée)",
                                "SNC" => "SNC (Société en Nom Collectif)",
                                "SCS" => "SCS (Société en Commandite Simple)",
                                "SCOP" => "SCOP (Société Coopérative et Participative)",
                                "SCM" => "SCM (Société Civile de Moyens)",
                                "SELARL" => "SELARL (Société d'Exercice Libéral à Responsabilité Limitée)",
                                "SCI" => "SCI (Société Civile Immobilière)",
                                "EURL" => "EURL (Entreprise Unipersonnelle à Responsabilité Limitée)",
                                "SASU" => "SASU (Société par Actions Simplifiée Unipersonnelle)",
                                "SEP" => "SEP (Société en Participation)",
                                "SELAS" => "SELAS (Société d'Exercice Libéral par Actions Simplifiée)",
                                "SELAFA" => "SELAFA (Société d'Exercice Libéral à Forme Anonyme)",
                                "SEM" => "SEM (Société d'Economie Mixte)",
                                "SCA" => "SCA (Société en Commandite par Actions)",
                                "SRL" => "SRL (Société à Responsabilité Limitée)",
                                "SARL" => "SARL (Société à Responsabilité Limitée)",
                                "SPRL" => "SPRL (Société Privée à Responsabilité Limitée)",
                            ])
                            ->searchable()
                            ->required(),
                    ])->columns(3),
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
                    ])->columns(2)
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('name')
                    ->label('Nom'),
                TextColumn::make('legal_form')
                    ->label('Forme légal'),
                TextColumn::make('vat_number')
                    ->label('Numéro de TVA'),
                TextColumn::make('country')
                    ->label('Pays'),
            ])
            ->filters([
                Tables\Filters\TrashedFilter::make(),
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\DeleteBulkAction::make(),
                Tables\Actions\ForceDeleteBulkAction::make(),
                Tables\Actions\RestoreBulkAction::make(),
            ]);
    }

    public static function getRelations(): array
    {
        return [];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListCompanies::route('/'),
            'create' => Pages\CreateCompany::route('/create'),
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
