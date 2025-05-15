<?php

namespace App\Providers\Filament;

use App\Filament\Llc\Resources\ProfileResource;
use App\Filament\Ppc\Pages\Dashboard;
use Filament\Http\Middleware\Authenticate;
use Filament\Http\Middleware\AuthenticateSession;
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
use Illuminate\Session\Middleware\StartSession;
use Illuminate\View\Middleware\ShareErrorsFromSession;
use Filament\Navigation\UserMenuItem;

class LlcPanelProvider extends PanelProvider
{
    public function panel(Panel $panel): Panel
    {
        return $panel
            ->default(false)
            ->id('llc')
            ->path('llc')
            ->favicon(asset('favicon.ico'))
            // ->brandLogo(asset('images/logo.svg'))
            ->brandLogoHeight('3.5rem')
            ->brandName('LLC')
            ->login()
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
            ->discoverResources(in: app_path('Filament/Llc/Resources'), for: 'App\\Filament\\Llc\\Resources')
            ->discoverPages(in: app_path('Filament/Llc/Pages'), for: 'App\\Filament\\Llc\\Pages')
            ->pages([
                Dashboard::class,
            ])
            ->discoverWidgets(in: app_path('Filament/Llc/Widgets'), for: 'App\\Filament\\Llc\\Widgets')
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
                \App\Http\Middleware\EnsureUserIsLlc::class,
            ])
            ->authMiddleware([
                Authenticate::class,
            ]);
    }
}
