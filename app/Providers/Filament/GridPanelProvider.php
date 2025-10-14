<?php

namespace App\Providers\Filament;

use App\Filament\Grid\Pages\Dashboard;
use Filament\Http\Middleware\Authenticate;
use Filament\Http\Middleware\AuthenticateSession;
use Filament\Http\Middleware\DisableBladeIconComponents;
use Filament\Http\Middleware\DispatchServingFilamentEvent;
use Filament\Panel;
use Filament\PanelProvider;
use Filament\Support\Colors\Color;
use Filament\Widgets;
use Illuminate\Cookie\Middleware\AddQueuedCookiesToResponse;
use Illuminate\Cookie\Middleware\EncryptCookies;
use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken;
use Illuminate\Routing\Middleware\SubstituteBindings;
use Illuminate\Session\Middleware\StartSession;
use Illuminate\View\Middleware\ShareErrorsFromSession;

class GridPanelProvider extends PanelProvider
{
    public function panel(Panel $panel): Panel
    {
        return $panel
            ->id('grid')
            ->path('grid')
             ->favicon('https://aiwebdesk.com/vendor/shop/themes/default/assets/favicon.ico')
            ->brandLogo('https://aiwebdesk.com/vendor/shop/themes/default/assets/small-logo.png')
            ->brandLogoHeight('3.5rem')
            ->brandName('Grid')
            ->login()
            ->colors([
                'primary' => Color::Blue,
            ])
            ->discoverResources(in: app_path('Filament/Grid/Resources'), for: 'App\\Filament\\Grid\\Resources')
            ->discoverPages(in: app_path('Filament/Grid/Pages'), for: 'App\\Filament\\Grid\\Pages')
            ->pages([
                Dashboard::class,
            ])
            ->discoverWidgets(in: app_path('Filament/Grid/Widgets'), for: 'App\\Filament\\Grid\\Widgets')
            ->widgets([
                Widgets\AccountWidget::class,
                Widgets\FilamentInfoWidget::class,
            ])
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
                \App\Http\Middleware\EnsureUserIsGrid::class,
            ])
            ->authMiddleware([
                Authenticate::class,
            ]);
    }
}
