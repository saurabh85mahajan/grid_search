<?php

namespace App\Filament\Resources\NcbResource\Pages;

use App\Filament\Resources\NcbResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListNcbs extends ListRecords
{
    protected static string $resource = NcbResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
