<?php

namespace App\Filament\Resources;

use App\Filament\Resources\UserResource\Pages;
use App\Filament\Resources\UserResource\Pages\CreateUser;
use App\Filament\Resources\UserResource\Pages\EditUser;
use App\Models\User;
use Filament\Forms\Components\Card;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Pages\Page;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\TextColumn;
use Illuminate\Support\Facades\Hash;

class UserResource extends Resource
{
    protected static ?string $model = User::class;

    protected static ?string $navigationIcon = 'heroicon-o-users';

    protected static ?string $navigationGroup = 'Administration';

    protected static ?string $label = 'Utilisateur';

    protected static ?string $pluralLabel = 'Utilisateurs';

    protected static ?string $navigationLabel = 'Utilisateurs';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Card::make()->schema([
                    TextInput::make('first_name')
                        ->label('Prénom')
                        ->maxLength(255)
                        ->required(),
                    TextInput::make('last_name')
                        ->label('Nom')
                        ->maxLength(255)
                        ->required(),
                    TextInput::make('email')
                        ->label('Email')
                        ->email()
                        ->maxLength(255)
                        ->required(),
                    FileUpload::make('avatar')
                        ->label('Avatar')
                        ->image()
                        ->maxSize(2048)
                        ->directory('user-avatar'),
                    TextInput::make('password')
                        ->label(static fn (Page $livewire): string => ($livewire instanceof EditUser) ? 'Nouveau mot de passe' : 'Mot de passe')
                        ->password()
                        ->dehydrateStateUsing(static fn (null|string $state): null|string => filled($state) ? Hash::make($state) : null)
                        ->dehydrated(static fn (null|string $state): bool => filled($state))
                        ->confirmed()
                        ->maxLength(255)
                        ->required(static fn (Page $livewire): bool => $livewire instanceof CreateUser),
                    TextInput::make('password_confirmation')
                        ->label(static fn (Page $livewire): string => ($livewire instanceof EditUser) ? 'Confirmation du nouveau mot de passe' : 'Confirmation du mot de passe')
                        ->password()
                        ->dehydrateStateUsing(static fn (null|string $state): null|string => filled($state) ? Hash::make($state) : null)
                        ->dehydrated(static fn (null|string $state): bool => filled($state))
                        ->maxLength(255)
                        ->required(static fn (Page $livewire): bool => $livewire instanceof CreateUser),
                    Toggle::make('is_admin')
                        ->label('Admin'),
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
                TextColumn::make('email')
                    ->label('Email')
                    ->searchable(),
                IconColumn::make('is_admin')
                    ->boolean()
                    ->label('Admin'),
            ])
            ->filters([])
            ->actions([
                Tables\Actions\EditAction::make()
                    ->label(''),
                Tables\Actions\DeleteAction::make()
                    ->label(''),
            ])
            ->bulkActions([
                Tables\Actions\DeleteBulkAction::make(),
            ])
            ->poll('10s');
    }

    public static function getRelations(): array
    {
        return [];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListUsers::route('/'),
            'create' => Pages\CreateUser::route('/create'),
            'edit' => Pages\EditUser::route('/{record}/edit'),
        ];
    }
}
