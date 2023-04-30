<?php

namespace App\Filament\Pages;

use Filament\Pages\Page;

class IdentitySheet extends Page
{
    protected static ?string $navigationIcon = 'heroicon-o-document-text';

    protected static ?string $navigationLabel = "Fiche d'identité";

    protected function getTitle(): string
    {
        return "Fiche d'identité";
    }

    protected static string $view = 'filament.pages.identity-sheet';

    protected function getBreadcrumbs(): array
    {
        return ["Fiche d'identité"];
    }
}
