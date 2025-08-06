<?php

namespace App\Filament\Demo\Resources\ProfileResource\Pages;

use App\Filament\Demo\Resources\ProfileResource;
use Filament\Resources\Pages\CreateRecord;

class CreateProfile extends CreateRecord
{
    protected static string $resource = ProfileResource::class;
    public static bool $canCreateAnother = false;

    protected function getRedirectUrl(): string
    {
        return '/demo'; // This will redirect to the dashboard
    }

    protected function mutateFormDataBeforeCreate(array $data): array
    {
        $data['user_id'] = auth()->id();
        
        return $data;
    }
}