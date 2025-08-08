<?php

namespace App\Filament\Resources\Base;

use App\Models\User;
use App\Traits\HasStatusColumn;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\Hash;

abstract class BaseUserResource extends Resource
{
    use HasStatusColumn;

    protected static ?string $model = User::class;
    protected static ?string $modelLabel = 'Employee';
    protected static ?string $pluralModelLabel = 'Employees';
    protected static ?string $navigationIcon = 'heroicon-o-users';
    protected static ?string $navigationLabel = 'Employee';
    protected static ?string $navigationGroup = 'Manage Employees';
    protected static ?int $navigationSort = 10;

    public static function getOrganisationId()
    {
        return static::ORGANISATION_ID;
    }

    public static function canAccess(): bool
    {
        $user = auth()->user();
        return $user->is_organisation_admin || is_null($user->organisation_id);
    }

    public static function getEloquentQuery(): Builder
    {
        return parent::getEloquentQuery()->where('organisation_id', static::getOrganisationId())
            ->where('is_organisation_admin', '!=', true);
    }

    public static function form(Form $form): Form
    {
        return $form->schema([
            \Filament\Forms\Components\TextInput::make('name')
                ->required(),
            \Filament\Forms\Components\TextInput::make('email')
                ->email()
                ->required()
                ->unique(ignoreRecord: true),
            \Filament\Forms\Components\TextInput::make('password')
                ->password()
                ->required(fn($livewire) => $livewire instanceof Pages\CreateUser)
                ->dehydrateStateUsing(fn($state) =>
                filled($state) ? Hash::make($state) : null)
                ->dehydrated(fn($state) => filled($state))
                ->label(fn($livewire) =>
                $livewire instanceof Pages\EditUser ? 'New Password' : 'Password'),
            (new static)->getStatusSelect(),
            \Filament\Forms\Components\Hidden::make('organisation_id')
                ->default(static::getOrganisationId()),
            \Filament\Forms\Components\Select::make('is_manager')
                ->label('Is Manager')
                ->options([
                    '0' => 'No',
                    '1' => 'Yes',
                ])
                ->default('0')
                ->selectablePlaceholder(false)
                ->live(),
            \Filament\Forms\Components\Select::make("manager_id")
                ->label("Select Manager")
                ->visible(fn(\Filament\Forms\Get $get): bool => $get('is_manager') == 0)
                ->options(
                    fn($get): array =>
                    User::query()
                        ->active()
                        ->hasOrganisation(static::getOrganisationId())
                        ->isManager()
                        ->where('id', '!=',  auth()->user()->id)
                        ->pluck('name', 'id')->toArray()
                )
                ->placeholder("--Select--"),
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                \Filament\Tables\Columns\TextColumn::make('name')
                    ->searchable(),
                \Filament\Tables\Columns\TextColumn::make('email')
                    ->searchable(),
                (new static)->getStatusColumn(),
                \Filament\Tables\Columns\TextColumn::make('created_at')
                    ->dateTime(),
            ])
            ->filters([
                (new static)->getStatusFilter(),
            ])
            ->actions([
                \Filament\Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                \Filament\Tables\Actions\BulkActionGroup::make([
                    ...(new static)->getStatusBulkActions(),
                ]),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }
	
	public static function getPages(): array
    {
        return [
            'index' => static::getListUserClass()::route('/'),
            'create' => static::getCreateUserClass()::route('/create'),
            'edit' => static::getEditUserClass()::route('/{record}/edit'),
        ];
    }

    // Abstract methods that child classes must implement to return their specific page classes
    
	abstract protected static function getListUserClass(): string;
	
    abstract protected static function getCreateUserClass(): string;
    
	abstract protected static function getEditUserClass(): string;
}