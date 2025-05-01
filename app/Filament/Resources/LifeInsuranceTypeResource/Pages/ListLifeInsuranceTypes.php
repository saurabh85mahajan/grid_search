<?php

namespace App\Filament\Resources\LifeInsuranceTypeResource\Pages;

use App\Filament\Resources\LifeInsuranceTypeResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListLifeInsuranceTypes extends ListRecords
{
    protected static string $resource = LifeInsuranceTypeResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
