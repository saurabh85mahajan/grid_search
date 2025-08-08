<?php

namespace App\Filament\Demo\Resources;

use App\Filament\Demo\Resources\UserResource\Pages;
use App\Filament\Resources\Base\BaseUserResource;

class UserResource extends BaseUserResource
{
    public const ORGANISATION_ID = 3;

    protected static function getListUserClass(): string
    {
        return Pages\ListUsers::class;
    }

    protected static function getCreateUserClass(): string
    {
        return Pages\CreateUser::class;
    }

    protected static function getEditUserClass(): string
    {
        return Pages\EditUser::class;
    }
}
