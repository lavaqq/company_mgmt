<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ContactResource\Pages;
use App\Models\Contact;
use Filament\Forms\Components\Card;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use Filament\Tables\Columns\BadgeColumn;
use Filament\Tables\Columns\TagsColumn;
use Filament\Tables\Columns\TextColumn;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class ContactResource extends Resource
{
    protected static ?string $model = Contact::class;

    protected static ?string $navigationIcon = 'heroicon-o-users';

    protected static ?string $navigationGroup = 'Répertoire';

    protected static ?string $label = 'Contact';

    protected static ?string $pluralLabel = 'Contacts';

    protected static ?string $navigationLabel = 'Contacts';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Card::make()
                    ->schema([
                        TextInput::make('last_name')
                            ->label('Nom')
                            ->required(),
                        TextInput::make('first_name')
                            ->label('Prénom')
                            ->required(),
                        Select::make('companies')
                            ->label('Entreprise(s)')
                            ->multiple()
                            ->relationship('companies', 'name')
                            ->preload(),
                        TextInput::make('job_title')
                            ->label('Titre du poste'),
                        TextInput::make('email')
                            ->label('E-mail')
                            ->email(),
                        TextInput::make('phone')
                            ->label('Téléphone')
                            ->tel(),
                    ])->columns(2),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('first_name')
                    ->label('Prénom')
                    ->searchable(),
                TextColumn::make('last_name')
                    ->label('Nom')
                    ->searchable(),
                TagsColumn::make('companies')
                    ->label('Entreprise(s)')
                    ->getStateUsing(function (Model $record): array {
                        $companies = $record->companies;
                        $data = [];
                        foreach ($companies as $company) {
                            $data[] =  strlen($company->name) > 15 ?  substr($company->name, 0, 15) . "..." : $company->name;
                        }
                        if (empty($data)) {
                            $data[] = 'Aucune';
                        }
                        return $data;
                    }),
                BadgeColumn::make('job_title')
                    ->getStateUsing(function (Model $record): string {
                        return $record->job_title ? (strlen($record->job_title) > 15 ? substr($record->job_title, 0, 15) . "..." : $record->job_title) : 'Aucun';
                    })
                    ->label('Titre du poste'),
            ])
            ->filters([
                Tables\Filters\TrashedFilter::make(),
            ])
            ->actions([
                Tables\Actions\EditAction::make()
                    ->label(''),
                Tables\Actions\DeleteAction::make()
                    ->modalHeading(function (Model $record): string {
                        return 'Supprimer : ' . $record->last_name . ' ' . $record->first_name;
                    })
                    ->label(''),
                Tables\Actions\ForceDeleteAction::make()
                    ->modalHeading(function (Model $record): string {
                        return 'Supprimer définitivement : ' . $record->last_name . ' ' . $record->first_name;
                    })
                    ->label(''),
                Tables\Actions\RestoreAction::make()
                    ->modalHeading(function (Model $record): string {
                        return 'Restaurer : ' . $record->last_name . ' ' . $record->first_name;
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
            'index' => Pages\ListContacts::route('/'),
            'create' => Pages\CreateContact::route('/create'),
            'edit' => Pages\EditContact::route('/{record}/edit'),
        ];
    }
}
