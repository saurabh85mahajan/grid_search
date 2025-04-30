<?php

namespace App\Filament\Resources\GeneralInsuranceTypeResource\Pages;

use App\Filament\Resources\GeneralInsuranceTypeResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditGeneralInsuranceType extends EditRecord
{
    protected static string $resource = GeneralInsuranceTypeResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
