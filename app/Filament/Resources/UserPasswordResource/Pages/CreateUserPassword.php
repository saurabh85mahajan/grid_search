<?php

namespace App\Filament\Resources\UserPasswordResource\Pages;

use App\Filament\Resources\UserPasswordResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateUserPassword extends CreateRecord
{
    protected static string $resource = UserPasswordResource::class;
}
