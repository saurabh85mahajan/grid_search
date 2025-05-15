<?php

namespace App\Filament\PPc\Resources\ProfileResource\Pages;

use App\Filament\PPc\Resources\ProfileResource;
use Filament\Resources\Pages\EditRecord;

class EditProfile extends EditRecord
{
    protected static string $resource = ProfileResource::class;

    protected function getHeaderActions(): array
    {
        return [
            // Actions\DeleteAction::make(),
        ];
    }

    protected function getRedirectUrl(): string
    {
        return '/ppc'; // This will redirect to the dashboard
    }
}