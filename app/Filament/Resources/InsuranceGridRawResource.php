<?php

namespace App\Filament\Resources;

use App\Filament\Resources\InsuranceGridRawResource\Pages;
use App\Models\InsuranceGridRaw;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class InsuranceGridRawResource extends Resource
{
    protected static ?string $model = InsuranceGridRaw::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    protected static ?string $navigationLabel = 'Insurance Grid';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('insurer')
                    ->required()
                    ->maxLength(50),
                Forms\Components\TextInput::make('segment')
                    ->required()
                    ->maxLength(50),
                Forms\Components\TextInput::make('policy_type')
                    ->required()
                    ->maxLength(50),
                Forms\Components\Textarea::make('location')
                    ->columnSpanFull(),
                Forms\Components\Textarea::make('location_remarks')
                    ->columnSpanFull(),
                Forms\Components\Textarea::make('insurer_remarks')
                    ->columnSpanFull(),
                Forms\Components\Textarea::make('segment_remarks')
                    ->columnSpanFull(),
                Forms\Components\Textarea::make('policy_type_remarks')
                    ->columnSpanFull(),
                Forms\Components\Textarea::make('remarks_additional')
                    ->columnSpanFull(),
                Forms\Components\TextInput::make('points')
                    ->required()
                    ->maxLength(12),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('insurer')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('segment')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('policy_type')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('points')
                    ->sortable(),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                Tables\Filters\SelectFilter::make('insurer')
                    ->options(fn () => InsuranceGridRaw::distinct()->pluck('insurer', 'insurer')->toArray()),
                Tables\Filters\SelectFilter::make('segment')
                    ->options(fn () => InsuranceGridRaw::distinct()->pluck('segment', 'segment')->toArray()),
                Tables\Filters\SelectFilter::make('policy_type')
                    ->options(fn () => InsuranceGridRaw::distinct()->pluck('policy_type', 'policy_type')->toArray()),
            ])
            ->actions([
                Tables\Actions\ViewAction::make(),
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
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
            'index' => Pages\ListInsuranceGridRaws::route('/'),
            'create' => Pages\CreateInsuranceGridRaw::route('/create'),
            'edit' => Pages\EditInsuranceGridRaw::route('/{record}/edit'),
        ];
    }
}