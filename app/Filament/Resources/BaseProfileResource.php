<?php

namespace App\Filament\Resources;

use App\Models\User;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\Hash;

abstract class BaseProfileResource extends Resource
{
    protected static ?string $model = User::class;
    protected static bool $shouldRegisterNavigation = false;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                \Filament\Forms\Components\TextInput::make('name')
                    ->required(),
                \Filament\Forms\Components\TextInput::make('email')
                    ->email()
                    ->required()
                    ->unique(ignoreRecord: true),
                \Filament\Forms\Components\TextInput::make('password')
                    ->password()
                    ->dehydrated(fn($state) => filled($state))
                    ->dehydrateStateUsing(fn($state) => Hash::make($state))
                    ->label('Change Password')
                    ->autocomplete(false)
                    ->revealable()
                    ->extraInputAttributes(['autocomplete' => 'new-password']),
            ]);
    }

    // Only show current user's profile
    public static function getEloquentQuery(): Builder
    {
        return parent::getEloquentQuery()->where('id', auth()->id());
    }

    public static function getPages(): array
    {
        return [
            'index' => static::getListPageClass()::route('/'),
            'create' => static::getCreatePageClass()::route('/create'),
            'edit' => static::getEditPageClass()::route('/{record}/edit'),
        ];
    }

    // Abstract methods that child classes must implement to return their specific page classes
    abstract protected static function getListPageClass(): string;
    abstract protected static function getCreatePageClass(): string;
    abstract protected static function getEditPageClass(): string;
}