<?php

namespace App\Filament\Ppc\Resources\EntryResource\Pages;

use App\Filament\Ppc\Resources\EntryResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateEntry extends CreateRecord
{
    protected static string $resource = EntryResource::class;

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
}
