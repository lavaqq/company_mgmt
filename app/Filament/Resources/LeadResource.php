<?php

namespace App\Filament\Resources;

use App\Filament\Resources\LeadResource\Pages;
use App\Models\Lead;
use Filament\Forms\Components\Card;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Resources\Form;
use Filament\Resources\Resource;

class LeadResource extends Resource
{
    protected static ?string $model = Lead::class;

    protected static ?string $navigationIcon = 'heroicon-o-document-text';

    protected static ?string $navigationGroup = 'Prospects et opportunités';

    protected static ?string $label = 'Lead';

    protected static ?string $pluralLabel = 'Leads';

    protected static ?string $navigationLabel = 'Leads';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Card::make()
                    ->schema([
                        TextInput::make('title')
                            ->label('Titre')
                            ->columnSpan(2)
                            ->required(),
                        Select::make('company_id')
                            ->label('Entreprise')
                            ->relationship('company', 'name')
                            ->preload()
                            ->searchable()
                            ->required(),
                        DatePicker::make('start_date')
                            ->label('Date de début')
                            ->default(now())
                            ->displayFormat('d/m/Y')
                            ->required(),
                        Select::make('status')
                            ->label('Statut')
                            ->options([
                                'new' => 'Nouveau',
                                'waiting_for_contact' => 'En attente de contact',
                                'contacted' => 'Contacté',
                                'qualified' => 'Qualifié',
                                'unqualified' => 'Non qualifié',
                            ])
                            ->default('new')
                            ->required(),
                        Select::make('origin')
                            ->label('Origine')
                            ->options([
                                'unknown' => 'Inconnue',
                                'inbound' => 'Entrante',
                                'outbound' => 'Sortante',
                            ])
                            ->default('unknown')
                            ->required(),
                        RichEditor::make('note')
                            ->disableToolbarButtons([
                                'attachFiles',
                            ])
                            ->columnSpanFull(),
                    ])->columns(3),
            ]);
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\MultipleListLead::route('/'),
            'create' => Pages\CreateLead::route('/create'),
            'deleted' => Pages\DeletedListLead::route('/deleted'),
            'edit' => Pages\EditLead::route('/{record}/edit'),
        ];
    }
}
