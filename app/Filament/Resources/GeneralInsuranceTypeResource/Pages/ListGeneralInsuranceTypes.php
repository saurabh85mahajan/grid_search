<?php

namespace App\Filament\Resources\GeneralInsuranceTypeResource\Pages;

use App\Filament\Resources\GeneralInsuranceTypeResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListGeneralInsuranceTypes extends ListRecords
{
    protected static string $resource = GeneralInsuranceTypeResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
