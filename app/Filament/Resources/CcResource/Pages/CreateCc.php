<?php

namespace App\Filament\Resources\CcResource\Pages;

use App\Filament\Resources\CcResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateCc extends CreateRecord
{
    protected static string $resource = CcResource::class;

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
}
