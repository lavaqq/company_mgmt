<?php

namespace App\Providers\Filament;

use App\Filament\Hub\Pages\HubDashboard;
use Filament\Http\Middleware\Authenticate;
use Filament\Http\Middleware\DisableBladeIconComponents;
use Filament\Http\Middleware\DispatchServingFilamentEvent;
use Filament\Pages;
use Filament\Panel;
use Filament\PanelProvider;
use Filament\Support\Colors\Color;
use Filament\Widgets;
use Illuminate\Cookie\Middleware\AddQueuedCookiesToResponse;
use Illuminate\Cookie\Middleware\EncryptCookies;
use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken;
use Illuminate\Routing\Middleware\SubstituteBindings;
use Illuminate\Session\Middleware\AuthenticateSession;
use Illuminate\Session\Middleware\StartSession;
use Illuminate\View\Middleware\ShareErrorsFromSession;

class HubPanelProvider extends PanelProvider
{
    public function panel(Panel $panel): Panel
    {
        return $panel
            ->default()
            ->id('hub')
            ->path('')
            ->login()
            ->colors([
                'danger' => Color::Rose,
                'gray' => Color::Gray,
                'info' => Color::Blue,
                'primary' => '#35837d',
                'success' => Color::Emerald,
                'warning' => Color::Orange,
            ])
            ->homeUrl('/')
            ->font('Poppins')
            ->navigation(false)
            ->discoverResources(in: app_path('Filament/Hub/Resources'), for: 'App\\Filament\\Hub\\Resources')
            ->discoverPages(in: app_path('Filament/Hub/Pages'), for: 'App\\Filament\\Hub\\Pages')
            ->pages([
                HubDashboard::class,
            ])
            ->discoverWidgets(in: app_path('Filament/Hub/Widgets'), for: 'App\\Filament\\Hub\\Widgets')
            ->middleware([
                EncryptCookies::class,
                AddQueuedCookiesToResponse::class,
                StartSession::class,
                AuthenticateSession::class,
                ShareErrorsFromSession::class,
                VerifyCsrfToken::class,
                SubstituteBindings::class,
                DisableBladeIconComponents::class,
                DispatchServingFilamentEvent::class,
            ])
            ->authMiddleware([
                Authenticate::class,
            ]);
    }
}
