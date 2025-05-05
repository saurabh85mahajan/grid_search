<?php

namespace App\Filament\Llc\Resources\CcResource\Pages;

use App\Filament\Llc\Resources\CcResource;
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