<?php

namespace App\Filament\Resources;

use App\Filament\Resources\TaskResource\Pages;
use App\Filament\Resources\TaskResource\RelationManagers;
use App\Models\Task;
use Filament\Forms;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\SelectColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\ViewColumn;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class TaskResource extends Resource
{
    protected static ?string $model = Task::class;

    protected static ?string $navigationIcon = 'heroicon-o-collection';

    protected static ?string $navigationGroup = 'Gestion de projet';

    protected static ?string $label = 'Tâche';

    protected static ?string $pluralLabel = 'Tâches';

    protected static ?string $navigationLabel = 'Tâches';
    
    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('title')
                    ->required(),
                RichEditor::make('description')
                    ->required(),
                Select::make('status')
                    ->options([
                        'pending' => 'En attente',
                        'in_progress' => 'En cours',
                        'done' => 'Terminée'
                    ])
                    ->disablePlaceholderSelection()
                    ->required(),
                Select::make('users')
                    ->multiple()
                    ->relationship('users', 'name')
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                ViewColumn::make('users.avatar')->view('filament.components.images-column'),
                TextColumn::make('title'),
                SelectColumn::make('status')
                    ->options([
                        'pending' => 'En attente',
                        'in_progress' => 'En cours',
                        'done' => 'Terminée'
                    ])
                    ->disablePlaceholderSelection(),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make()
                    ->modalHeading(function (Model $record): string {
                        return 'Modifier la tâche : ' . $record->title;
                    }),
                Tables\Actions\DeleteAction::make()
                    ->modalHeading(function (Model $record): string {
                        return 'Supprimer la tâche : ' . $record->title;
                    }),
            ])
            ->bulkActions([
                Tables\Actions\DeleteBulkAction::make()
                    ->modalHeading('Supprimer la sélection de tâches'),
            ]);
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ManageTasks::route('/'),
        ];
    }
}
