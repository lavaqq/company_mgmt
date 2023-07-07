<?php

namespace App\Filament\Resources\CompanyResource\Pages;

use App\Filament\Resources\CompanyResource;
use Filament\Forms\Components\Card;
use Filament\Forms\Components\Placeholder;
use Filament\Forms\Components\TextInput;
use Filament\Resources\Pages\ViewRecord;
use Illuminate\Support\HtmlString;

class ViewCompany extends ViewRecord
{
    protected static string $resource = CompanyResource::class;

    protected function getTitle(): string
    {
        return $this->record->name;
    }

    protected function getFormSchema(): array
    {
        return [
            Card::make()
                ->schema([
                    Placeholder::make('')
                        ->content(new HtmlString('<h2 class="text-xl font-bold">Informations</h2>')),
                    Card::make()
                        ->schema([
                            TextInput::make('name')
                                ->label('Dénomination sociale'),
                            TextInput::make('legal_form')
                                ->label('Forme légale'),
                            TextInput::make('vat_country_code')
                                ->label('Code pays (géonomenclature)'),
                            TextInput::make('vat_number')
                                ->label('Numéro de TVA'),
                        ])->columns(2),
                    Card::make()
                        ->schema([
                            TextInput::make('street')
                                ->label('Rue'),
                            TextInput::make('zipcode')
                                ->label('Code postal'),
                            TextInput::make('number')
                                ->label('Numéro'),
                            TextInput::make('city')
                                ->label('Ville'),
                            TextInput::make('box')
                                ->label('Boîte'),
                            TextInput::make('country')
                                ->label('Pays'),
                        ])->columns(2),
                ])
        ];
    }

    protected function getFooterWidgets(): array
    {
        return [
            CompanyResource\Widgets\ContactTable::class,
            CompanyResource\Widgets\EstimateTable::class,
            CompanyResource\Widgets\InvoiceTable::class,
        ];
    }

    protected function getFooterWidgetsColumns(): int | string | array
    {
        return 1;
    }
}
