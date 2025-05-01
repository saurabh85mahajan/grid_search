<?php

namespace App\Filament\Resources\HealthInsuranceTypeResource\Pages;

use App\Filament\Resources\HealthInsuranceTypeResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListHealthInsuranceTypes extends ListRecords
{
    protected static string $resource = HealthInsuranceTypeResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
