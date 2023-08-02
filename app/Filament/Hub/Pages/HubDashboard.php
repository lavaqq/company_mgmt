<?php

namespace App\Filament\Hub\Pages;

use Filament\Pages\Dashboard as BasePage;

class HubDashboard extends BasePage
{
    protected static ?string $title = null;

    public function getColumns(): int|string|array
    {
        return 4;
    }

    public function __construct()
    {
        static::$title = 'Hello, '.auth()->user()->first_name;
    }
}
