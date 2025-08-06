<?php

namespace App\Filament\Demo\Resources\CcResource\Pages;

use App\Filament\Demo\Resources\CcResource;
use Filament\Resources\Pages\ViewRecord;

class ViewCc extends ViewRecord
{
    protected static string $resource = CcResource::class;

    protected function getHeaderActions(): array
    {
        return [

        ];
    }
}