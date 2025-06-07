<?php

namespace App\Providers\Filament;

use App\Filament\Ppc\Resources\ProfileResource;
use App\Filament\Ppc\Pages\Dashboard;
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
use Filament\Navigation\UserMenuItem;

class PpcPanelProvider extends PanelProvider
{
    public function panel(Panel $panel): Panel
    {
        return $panel
            ->default(false)
            ->id('ppc')
            ->path('ppc')
             ->favicon('https://aiwebdesk.com/vendor/shop/themes/default/assets/favicon.ico')
            ->brandLogo('https://aiwebdesk.com/vendor/shop/themes/default/assets/small-logo.png')
            ->brandLogoHeight('3.5rem')
            ->brandName('Certigo Insurance Broker')
            ->login()
            // ->viteTheme([
            //     'resources/css/filament.css',
            // ])
            ->colors([
                'primary' => Color::Blue,
            ])
			->userMenuItems([
                UserMenuItem::make()
                    ->label('Edit Profile')
                    ->url(fn () => auth()->user()->id 
                        ? ProfileResource::getUrl('edit', ['record' => auth()->user()->id])
                        : "")
                    ->icon('heroicon-o-user-circle'),
            ])
			->discoverResources(in: app_path('Filament/Ppc/Resources'), for: 'App\\Filament\\Ppc\\Resources')
            ->discoverPages(in: app_path('Filament/Ppc/Pages'), for: 'App\\Filament\\Ppc\\Pages')
            ->pages([
                Dashboard::class,
            ])
            ->discoverWidgets(in: app_path('Filament/Ppc/Widgets'), for: 'App\\Filament\\Ppc\\Widgets')
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
                \App\Http\Middleware\EnsureUserIsPpc::class,
            ])
            ->authMiddleware([
                Authenticate::class,
            ]);
    }
}
