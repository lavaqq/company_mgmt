<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ReceivedInvoiceResource\Pages;
use App\Models\ReceivedInvoice;
use Carbon\Carbon;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Illuminate\Database\Eloquent\Model;

class ReceivedInvoiceResource extends Resource
{
    protected static ?string $model = ReceivedInvoice::class;

    protected static ?string $navigationIcon = 'heroicon-o-collection';

    protected static ?string $navigationGroup = 'Comptabilité';

    protected static ?string $label = 'Facture reçue';

    protected static ?string $pluralLabel = 'Factures reçues';

    protected static ?string $navigationLabel = 'Factures reçues';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Select::make('company_id')
                    ->label('Entreprise')
                    ->relationship('company', 'name')
                    ->required(),
                DatePicker::make('issue_date')
                    ->label("Date d'émission")
                    ->default(Carbon::now()->format('Y-m-d'))
                    ->displayFormat('d/m/Y')
                    ->required(),
                TextInput::make('tax_rate')
                    ->label('Taux TVA')
                    ->numeric()
                    ->default(21)
                    ->suffix('%')
                    ->required(),
                TextInput::make('total_excl_tax')
                    ->label('Total HT')
                    ->numeric()
                    ->suffix('€')
                    ->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('company.name')
                    ->label('Entreprise')
                    ->limit(20),
                TextColumn::make('issue_date')
                    ->label("Date d'émission")
                    ->dateTime('d/m/Y'),
                TextColumn::make('total_excl_tax')
                    ->label('Total HT')
                    ->suffix(' €'),
                TextColumn::make('total_incl_tax')
                    ->label('Total TTC')
                    ->suffix(' €')
                    ->getStateUsing(fn (Model $record): float => $record->getTotalIncludingTax()),
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
                Tables\Actions\EditAction::make()
                    ->modalHeading(function (Model $record): string {
                        return 'Modifier la facture : '.$record->getTotalIncludingTax().'€ du '.$record->issue_date;
                    }),
                Tables\Actions\DeleteAction::make()
                    ->modalHeading(function (Model $record): string {
                        return 'Supprimer la facture : '.$record->getTotalIncludingTax().'€ du '.$record->issue_date;
                    }),
            ])
            ->bulkActions([
                Tables\Actions\DeleteBulkAction::make()
                    ->modalHeading('Supprimer la sélection de factures'),
            ]);
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ManageReceivedInvoices::route('/'),
        ];
    }
}
