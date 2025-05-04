<?php

namespace App\Filament\Resources\CcResource\Pages;

use App\Filament\Resources\CcResource;
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