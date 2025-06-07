<?php

namespace App\Filament\Resources;

use App\Filament\Resources\LifeInsuranceTypeResource\Pages;
use App\Filament\Resources\LifeInsuranceTypeResource\RelationManagers;
use App\Models\LifeInsuranceType;
use App\Traits\HasStatusColumn;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class LifeInsuranceTypeResource extends Resource
{
    use HasStatusColumn;

    protected static ?string $model = LifeInsuranceType::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';
    protected static ?string $navigationGroup = 'Config PPC';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('name')
                    ->required()
                    ->maxLength(255)
                    ->unique(ignoreRecord: true),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name')
                    ->searchable()
                    ->sortable(),
                (new static)->getStatusColumn(),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                //
                (new static)->getStatusFilter(),
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
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
            'index' => Pages\ListLifeInsuranceTypes::route('/'),
            'create' => Pages\CreateLifeInsuranceType::route('/create'),
            'edit' => Pages\EditLifeInsuranceType::route('/{record}/edit'),
        ];
    }
}
