<?php

namespace App\Filament\Llc\Resources\CcResource\Pages;

use App\Filament\Llc\Resources\CcResource;
use Filament\Resources\Pages\CreateRecord;

class CreateCc extends CreateRecord
{
    protected static string $resource = CcResource::class;

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
}
