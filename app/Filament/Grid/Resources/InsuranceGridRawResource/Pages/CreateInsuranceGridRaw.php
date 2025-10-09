<?php

namespace App\Filament\Grid\Resources\InsuranceGridRawResource\Pages;

use App\Filament\Grid\Resources\InsuranceGridRawResource;
use Filament\Resources\Pages\CreateRecord;

class CreateInsuranceGridRaw extends CreateRecord
{
    protected static string $resource = InsuranceGridRawResource::class;

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
}
