<?php

namespace App\Filament\Resources;

use App\Filament\Resources\DealResource\Pages;
use App\Filament\Resources\DealResource\RelationManagers;
use App\Models\Deal;
use Filament\Forms;
use Filament\Forms\Components\Card;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class DealResource extends Resource
{
    protected static ?string $model = Deal::class;

    protected static ?string $navigationIcon = 'heroicon-o-document-text';

    protected static ?string $navigationGroup = 'Prospects et opportunités';

    protected static ?string $label = 'Deal';

    protected static ?string $pluralLabel = 'Deals';

    protected static ?string $navigationLabel = 'Deals';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Select::make('lead_id')
                    ->relationship('lead', 'title')
                    ->required(),
                Select::make('company_id')
                    ->label('Entreprise')
                    ->relationship('company', 'name')
                    ->required(),
                Card::make()
                    ->schema([
                        TextInput::make('title')
                            ->label('Titre')
                            ->required(),
                        Select::make('status')
                            ->label('Statut')
                            ->options([
                                'new' => 'Nouveau',
                                'discovery' => 'Découverte',
                                'proposal' => 'Proposition',
                                'negotiation' => 'Négotiation',
                                'won' => 'Gagné',
                                'lost' => 'Perdu',
                            ])
                            ->default('new')
                            ->required(),
                        TextInput::make('deal_value')
                            ->label('Valeur du deal')
                            ->numeric()
                            ->suffix(' €')
                            ->required(),
                        DatePicker::make('start_date')
                            ->label('Date de début')
                            ->displayFormat('d/m/Y')
                            ->default(now())
                            ->required(),
                        TextInput::make('actual_deal_value')
                            ->label('Valeur réel du deal')
                            ->numeric()
                            ->default(0)
                            ->suffix(' €')
                            ->required(),
                        DatePicker::make('signature_date')
                            ->label('Date de signature')
                            ->displayFormat('d/m/Y'),
                        RichEditor::make('note')
                            ->disableToolbarButtons([
                                'attachFiles',
                            ])
                            ->columnSpanFull(),
                    ])->columns(2),
            ]);
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\MultipleListDeal::route('/'),
            'deleted' => Pages\DeletedListDeal::route('/deleted'),
            'create' => Pages\CreateDeal::route('/create'),
            'edit' => Pages\EditDeal::route('/{record}/edit'),
        ];
    }
}
