<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ContactResource\Pages;
use App\Models\Contact;
use Carbon\Carbon;
use Filament\Forms;
use Filament\Forms\Components\Card;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Illuminate\Database\Eloquent\Model;

class ContactResource extends Resource
{
    protected static ?string $model = Contact::class;

    protected static ?string $navigationIcon = 'heroicon-o-collection';

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
                Card::make()
                    ->schema([
                        RichEditor::make('note')
                            ->disableToolbarButtons([
                                'attachFiles',
                            ])
                            ->columnSpanFull(),
                    ])
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('last_name')
                    ->label('Nom'),
                TextColumn::make('first_name')
                    ->label('Prénom'),
                TextColumn::make('job_title')
                    ->label('Titre du poste'),
                TextColumn::make('companies')
                    ->label('Entreprise(s)')
                    ->getStateUsing(function (Model $record): string {
                        $companies = $record->companies;
                        if ($companies->count() > 1) {
                            $firstCompany = $companies->first();
                            $remainingCount = $companies->count() - 1;
                            $autres = ($remainingCount === 1) ? 'autre' : 'autres';
                            return substr($firstCompany->name, 0, 12) . "..." . " et {$remainingCount} $autres";
                        }
                        if ($companies->count() === 1) {
                            $firstCompany = $companies->first();
                            return strlen($firstCompany->name) > 20 ? substr($firstCompany->name, 0, 20) . '...' : $firstCompany->name;
                        }
                        return 'Aucune';
                    }),
                TextColumn::make('updated_at')
                    ->getStateUsing(function (Model $record): string {
                        return Carbon::parse($record->updated_at)->diffForHumans();
                    })
                    ->label('Dernière modification'),
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\DeleteBulkAction::make()
                    ->modalHeading('Supprimer la sélection de contacts'),
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
