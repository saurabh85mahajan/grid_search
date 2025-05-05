<?php

namespace App\Filament\Ppc\Resources\EntryResource\Pages;

use App\Filament\Ppc\Resources\EntryResource;
use Filament\Resources\Pages\ViewRecord;

class ViewEntry extends ViewRecord
{
    protected static string $resource = EntryResource::class;

    protected function getHeaderActions(): array
    {
        return [

        ];
    }
}