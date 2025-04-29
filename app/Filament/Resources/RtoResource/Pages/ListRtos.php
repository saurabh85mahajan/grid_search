<?php

namespace App\Filament\Resources\RtoResource\Pages;

use App\Filament\Resources\RtoResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListRtos extends ListRecords
{
    protected static string $resource = RtoResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
