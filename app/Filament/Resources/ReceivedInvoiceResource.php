<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ReceivedInvoiceResource\Pages;
use App\Models\ReceivedInvoice;
use Carbon\Carbon;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class ReceivedInvoiceResource extends Resource
{
    protected static ?string $model = ReceivedInvoice::class;

    protected static ?string $navigationIcon = 'heroicon-o-document-text';

    protected static ?string $navigationGroup = 'Administratifs';

    protected static ?string $label = 'Facture reçue';

    protected static ?string $pluralLabel = 'Factures reçues';

    protected static ?string $navigationLabel = 'Factures reçues';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Select::make('company_id')
                    ->label('Entreprise')
                    ->preload()
                    ->relationship('company', 'name')
                    ->required(),
                DatePicker::make('issue_date')
                    ->label("Date d'émission")
                    ->default(now())
                    ->required(),
                TextInput::make('total_excl_vat')
                    ->label('Total HT')
                    ->numeric()
                    ->suffix('€')
                    ->required(),
                TextInput::make('tax')
                    ->label('Taxe (TVA)')
                    ->numeric()
                    ->suffix('€')
                    ->required(),
                FileUpload::make('file')
                    ->label('Fichier')
                    ->required()
                    ->acceptedFileTypes(['application/pdf'])
                    ->directory('n93jYVQfaAXV5WgrZFcA')
                    ->columnSpanFull(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('company.name')
                    ->label('Entreprise'),
                TextColumn::make('issue_date')
                    ->dateTime('d/m/Y')
                    ->label("Date d'émission"),
                TextColumn::make('quarter')
                    ->dateTime('d/m/Y')
                    ->label('Trimestre')
                    ->suffix(static function (Model $record) {
                        $date = Carbon::parse($record->issue_date);

                        return "Q$date->quarter $date->year";
                    }),
                TextColumn::make('total_excl_vat')
                    ->label('Total HT')
                    ->suffix(' €'),
                TextColumn::make('tax')
                    ->label('Taxe (TVA)')
                    ->suffix(' €'),
            ])
            ->filters([
                Tables\Filters\TrashedFilter::make(),
            ])
            ->actions([
                Tables\Actions\Action::make('stream_pdf')
                    ->url(fn (Model $record): string => route('received-invoice.pdf', $record))
                    ->openUrlInNewTab()
                    ->icon('heroicon-o-eye')
                    ->label(''),
                Tables\Actions\EditAction::make()
                    ->label(''),
                Tables\Actions\DeleteAction::make()
                    ->modalHeading(function (Model $record): string {
                        return 'Supprimer : '.$record->issue_date.' ('.$record->company->name.')';
                    })
                    ->label(''),
                Tables\Actions\ForceDeleteAction::make()
                    ->modalHeading(function (Model $record): string {
                        return 'Supprimer définitivement : '.$record->issue_date.' ('.$record->company->name.')';
                    })
                    ->label(''),
                Tables\Actions\RestoreAction::make()
                    ->modalHeading(function (Model $record): string {
                        return 'Restaurer : '.$record->issue_date.' ('.$record->company->name.')';
                    })
                    ->label(''),
            ])
            ->bulkActions([
                Tables\Actions\DeleteBulkAction::make(),
                Tables\Actions\ForceDeleteBulkAction::make(),
                Tables\Actions\RestoreBulkAction::make(),
            ]);
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ManageReceivedInvoices::route('/'),
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
