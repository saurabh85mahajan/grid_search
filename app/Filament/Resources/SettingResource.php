<?php

namespace App\Filament\Resources;

use App\Filament\Resources\SettingResource\Pages;
use App\Models\Setting;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class SettingResource extends Resource
{
    protected static ?string $model = Setting::class;

    protected static ?string $navigationIcon = 'heroicon-o-cog-6-tooth';
    
    protected static ?string $navigationGroup = 'System';
    
    protected static ?string $navigationLabel = 'Settings';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Section::make('Setting Details')
                    ->schema([
                        Forms\Components\TextInput::make('key')
                            ->label('Setting Key')
                            ->required()
                            ->unique(ignoreRecord: true)
                            ->placeholder('e.g., brokers, insurance_companies')
                            ->helperText('Unique identifier for this setting. Use lowercase with underscores.')
                            ->rules(['regex:/^[a-z0-9_]+$/']),

                        Forms\Components\TextInput::make('label')
                            ->label('Display Label')
                            ->required()
                            ->placeholder('e.g., Insurance Brokers')
                            ->helperText('Human-readable name for this setting.'),

                        Forms\Components\Textarea::make('value')
                            ->label('Value')
                            ->required()
                            ->rows(8)
                            ->placeholder('For dropdown options, enter each option on a new line:
Robinhood
Landmark
Certigo

For simple text values, just enter the text.')
                            ->helperText('For dropdown options: Enter each option on a new line. For simple text: Enter plain text.'),
                    ])->columns(1),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('key')
                    ->label('Key')
                    ->searchable()
                    ->sortable()
                    ->copyable()
                    ->badge()
                    ->color('gray'),

                Tables\Columns\TextColumn::make('label')
                    ->label('Label')
                    ->searchable()
                    ->sortable()
                    ->weight('bold'),

                Tables\Columns\TextColumn::make('value')
                    ->label('Value')
                    ->limit(50)
                    ->tooltip(function ($record) {
                        return $record->value;
                    })
                    ->formatStateUsing(function ($state) {
                        // Check if it's a multi-line value (dropdown options)
                        $lines = array_filter(explode("\n", trim($state)));
                        if (count($lines) > 1) {
                            return count($lines) . ' options: ' . implode(', ', array_slice($lines, 0, 3)) . (count($lines) > 3 ? '...' : '');
                        }
                        return $state;
                    }),

                Tables\Columns\TextColumn::make('created_at')
                    ->label('Created')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),

                Tables\Columns\TextColumn::make('updated_at')
                    ->label('Updated')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\ViewAction::make(),
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([

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
            'index' => Pages\ListSettings::route('/'),
            'create' => Pages\CreateSetting::route('/create'),
            'edit' => Pages\EditSetting::route('/{record}/edit'),
        ];
    }
}