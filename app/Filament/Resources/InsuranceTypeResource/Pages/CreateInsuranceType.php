<?php

namespace App\Filament\Resources\InsuranceTypeResource\Pages;

use App\Filament\Resources\InsuranceTypeResource;
use Filament\Actions;
use Filament\Actions\Action;
use Filament\Resources\Pages\CreateRecord;

class CreateInsuranceType extends CreateRecord
{
    protected static string $resource = InsuranceTypeResource::class;

    protected function getFormActions(): array
    {
        return [
            $this->getCreateFormAction(),
            $this->getCancelFormAction(),
        ];
    }

    protected function getCreateFormAction(): Action
    {
        return parent::getCreateFormAction()
            ->label('Save');
    }
}
