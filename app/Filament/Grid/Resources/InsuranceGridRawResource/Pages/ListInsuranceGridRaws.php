<?php

namespace App\Filament\Grid\Resources\InsuranceGridRawResource\Pages;

use App\Filament\Grid\Resources\InsuranceGridRawResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListInsuranceGridRaws extends ListRecords
{
    protected static string $resource = InsuranceGridRawResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
            Actions\Action::make('agentLink')
                ->label('Agent Link')
                ->url('/insurance-grid-search')
                ->openUrlInNewTab()
                ->icon('heroicon-o-link')
                ->color('primary'),

            Actions\Action::make('employeeLink')
                ->label('Employee Link')
                ->url('/employee/insurance-grid-search')
                ->openUrlInNewTab()
                ->icon('heroicon-o-link')
                ->color('primary'),
        ];
    }
}
