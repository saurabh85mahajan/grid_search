<?php

namespace App\Filament\Resources\BusinessLockResource\Pages;

use App\Filament\Resources\BusinessLockResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListBusinessLocks extends ListRecords
{
    protected static string $resource = BusinessLockResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
