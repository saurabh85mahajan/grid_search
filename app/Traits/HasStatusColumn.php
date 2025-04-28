<?php

namespace App\Traits;

use Filament\Forms\Components\Select;
use Filament\Tables\Actions\BulkAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\SelectFilter;
use Illuminate\Database\Eloquent\Collection;

trait HasStatusColumn
{
    public function getStatusSelect()
    {
        return Select::make('is_active')
            ->options([
                '1' => 'Active',
                '0' => 'Inactive',
            ])
            ->default('1')
            ->required();
    }

    public function getStatusColumn(string $columnName = 'is_active'): TextColumn
    {
        return TextColumn::make($columnName)
            ->sortable()
            ->badge()
            ->formatStateUsing(fn(string $state): string => match ($state) {
                '1' => 'Active',
                '0' => 'Inactive',
            })
            ->icon(fn(string $state): string => match ($state) {
                '1' => 'heroicon-o-check-circle',
                '0' => 'heroicon-o-x-circle',
            })
            ->color(fn(string $state): string => match ($state) {
                '1' => 'success',
                '0' => 'danger',
            });
    }

    public function getStatusFilter(): SelectFilter
    {
        return SelectFilter::make('is_active')
            ->options([
                '1' => 'Active',
                '0' => 'Inactive',
            ])
            ->default('1');
    }

    public function getStatusBulkActions(): array
    {
        return [
            BulkAction::make('activate')
                ->label('Make Active')
                ->action(function (Collection $records): void {
                    $records->each->update(['is_active' => 1]);
                })
                ->icon('heroicon-o-check-circle'),

            BulkAction::make('deactivate')
                ->label('Make Inactive')
                ->action(function (Collection $records): void {
                    $records->each->update(['is_active' => 0]);
                })
                ->icon('heroicon-o-x-circle')
                ->color('danger'),
        ];
    }
}
