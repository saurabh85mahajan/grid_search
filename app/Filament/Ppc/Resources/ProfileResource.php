<?php

namespace App\Filament\Ppc\Resources;

use App\Filament\Ppc\Resources\ProfileResource\Pages;
use App\Models\User;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\Hash;

class ProfileResource extends Resource
{
    protected static ?string $model = User::class;
    protected static bool $shouldRegisterNavigation = false;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                \Filament\Forms\Components\TextInput::make('password')
                ->password()
				->dehydrateStateUsing(fn ($state) => Hash::make($state))
                ->label('Change Password')
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
            'index' => Pages\ListProfiles::route('/'),
            'create' => Pages\CreateProfile::route('/create'),
            'edit' => Pages\EditProfile::route('/{record}/edit'),
        ];
    }
}